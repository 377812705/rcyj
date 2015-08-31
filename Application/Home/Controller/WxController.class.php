<?php
/**
 * 支付宝支付控制类
 * @author jhw
 *
 */
namespace Home\Controller;
use Think\Controller;
use Home\Controller\OrderController;
use Home\Model\ActivityModel;
header("content-type:text/html;charset=utf8");
include_once(APP_PATH.'Home/Common/wx/lib/WxPay.Api.php');

class WxController extends Controller {
	const PAY_TYPE = 2;//支付宝支付
	
	public function wxpay(){
		$user_id =is_login();
		$data['user_id']=$user_id;
		if(empty($user_id)) {
			$this->assign ( 'message', '请登录后再操作' );
			$this->display('Public/error');
			exit();
		}
		$order_id = I('get.orderid' );
		if(!is_numeric($order_id)){
			$this->assign ( 'message', '订单信息错误' );
			$this->display('Public/error');
			exit();
		}
		$data['order_id']=$order_id;
		$data['ajax_type']=0;
		$OrderModel =D('Order');
		$order=$OrderModel->where($data)->find();
		if(!$order){
			$this->assign ( 'message', '订单号异常' );
			$this->display('Public/error');
			exit();
		}
		$url=wxOrderPay($order);
		$this->assign ('order',$order);
		$this->assign ( 'url', $url );
		$this->display('Pay/payalipay');
	}
	
	function notify_url()
	{
		$res = wxNotifyPay();
		dump($res);
		$this->log_result("ceshiyixiasiyishi");
		/*//        $res = '{"appid":"wx1bda22ad6a430a90","attach":"\u6c47\u70b9\u83dc\u8ba2\u5355\uff1a150511417936","bank_type":"CFT","cash_fee":"1","fee_type":"CNY","is_subscribe":"N","mch_id":"1240542002","nonce_str":"bhean67kp6nhdlvf0svwvkfaryglzbph","openid":"oVn0ksx_3nz1LE7gcIWOr17wypng","out_trade_no":"d248b3c2a7c1ccb99e90df925dccbc77","result_code":"SUCCESS","return_code":"SUCCESS","sign":"E926B804077E53345C3B79E949213253","time_end":"20150511141836","total_fee":"1","trade_type":"APP","transaction_id":"1008410968201505110122716332"}';
		//        $res = json_decode($res, true);
		// 根据获得的数据，判断订单是否支付成功了（类似支付婊）
		//        file_put_contents('wxpay.txt', json_encode($res));
		if ($res['result_code'] === 'SUCCESS' && $res['return_code'] === 'SUCCESS') {
			//获取微信的通知返回参数，可参考技术文档中服务器异步通知参数列表
			$orderId = $res ['out_trade_no']; //其他字段也可用类似方式获取
			$order_sn = ssdbGet('OrderIdWxPayMD5_'.$orderId);   // 获取真正的order_sn
			if(!$order_sn){
				return false;
			}
			$oa_map = array();
			$order_id =  rtn_order_id($order_sn);
			$oa_map['order_id'] = $order_id;
			$orderInfo = M('Order')->where($oa_map)->field('user_id, order_amount')->find();
	
			// 防止微信收不到通知，导致重复刷接口
			if($orderInfo['order_type'] == 2 && $orderInfo['order_status'] != 5){  // 点菜
				wxReplyNotify(true);    // 返回通知给微信
			}
			if( ($orderInfo['order_type'] == 4 || $orderInfo['order_type'] == 3 || $orderInfo['order_type'] == 9)
					&& ($orderInfo['order_status'] != 0 || $orderInfo['pay_status'] != 0) )
			{  // 外卖、团购、充值
				wxReplyNotify(true);    // 返回通知给微信
			}
	
	
			$user_id        = $orderInfo['user_id'];
			$order_amount   = $orderInfo['order_amount'];
			$parameter = array(
					"order_id"		=> $order_sn,  //商户订单编号；
					"trade_no"		=> $res['transaction_id'],      //微信订单号
					"total_fee"		=> ($res['total_fee']/100),      //交易金额；
					"pay_back"		=> $res['result_code'],         //交易状态
					"notify_id"		=> $res['out_trade_no '],       //商户订单号
					"notify_time"	=> $res['time_end '],       //通知的发送时间。
					'user_id'		=> $user_id,
					'type'		    => 5,                       //支付类型 5微信
					'desc'			=> json_encode($res)
			);
			// 检查支付的金额是否相符 
			if ( $res['total_fee'] != ($order_amount * 100)){
				return false;
			}
			self::__pay_callback($parameter);
			wxReplyNotify(true);    // 返回通知给微信
		}else{
			wxReplyNotify(false);    // 返回通知给微信
		}*/
		$this->display('Order/pay_success');
	}

    /**
     * 支付异步通知方法
     */
    public function notify() {
    	$alipay_config = include_once (APP_PATH.'Home/Common/zfb/alipay.config.php');
    	//计算得出通知验证结果
    	$this->log_result("这里写入想要调试的代");
    	$alipayNotify = new AlipayNotify($alipay_config);
    	$verify_result = $alipayNotify->verifyNotify();
    	
    	if($verify_result) {//验证成功
    		//商户订单号
    		$out_trade_no = $_POST['out_trade_no'];
    		//支付宝交易号
    		$trade_no = $_POST['trade_no'];
    	
    		//交易状态
    		$trade_status = $_POST['trade_status'];
    	
    		$total_fee = $_POST['total_fee'];
    		if($_POST['trade_status'] == 'TRADE_FINISHED') {
    			//注意：
    			//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'ajax_type'=>1));
   
    			//调试用，写文本函数记录程序运行情况是否正常
    			$this->log_result('支付请求成功#'.json_encode($result));
    			
    		}
    		else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
    			//判断该笔订单是否在商户网站中已经做过处理
    			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
    			//如果有做过处理，不执行商户的业务程序
    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'ajax_type'=>1));
    			//调试用，写文本函数记录程序运行情况是否正常
    			$this->log_result('支付请求成功*'.json_encode($result));
    			//注意：
    			//付款完成后，支付宝系统发送该交易状态通知
    			//调试用，写文本函数记录程序运行情况是否正常
    			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    		}
    	
    		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
    	
    		echo "success";		//请不要修改或删除
    		$this->log_result("这里写入想要调试的代");
    	
    		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    	}
    	else {
    		//验证失败
    		echo "fail";
    	
    		//调试用，写文本函数记录程序运行情况是否正常
    		$this->log_result("这里写入想要调试的代码变量值，或其他运行的结果记录-验证失败");
    	}
    }
    
    /**
     * 添加日志
     * @param string $content
     */
    private function log_result($content){
    	$m = M('errorlog');
    	$data['content'] = $content;
    	$data['datetime'] = time();
    	$m->add($data);
    }
    

}