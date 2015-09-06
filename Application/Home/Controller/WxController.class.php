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
	const PAY_TYPE = 2;//微信支付
	
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
		//$data['ajax_type']=0;
		$OrderModel =D('Order');
		$order=$OrderModel->where($data)->find();

		$url=wxOrderPay($order);
		$this->assign ('order',$order);
		$this->assign ( 'url', $url );
		$this->display('Pay/payalipay');
	}
	function quel(){
		$order_id = I('get.orderid' );
		$OrderModel =D('Order');
		$data['order_id']=$order_id;
		$order=$OrderModel->where($data)->find();
		if($order['ajax_type']!="0"){
			$dataarr['status']=1;
			$dataarr['mge']='已经支付成功';
			//die('{"status" : "'.$dataarr['status'].'", "mge" : "'.$dataarr['mge'].'"}');
		}
		$res=wxNotifyPay($order);
		if ($res['result_code'] === 'SUCCESS' && $res['trade_state'] != 'NOTPAY') {
    		//商户订单号
    		$out_trade_no = $res['out_trade_no'];
    		//微信支付交易单号
    		$trade_no = $res['transaction_id'];
    	
    		//交易状态
    		$trade_status = $res['trade_state'];
    		$total_fee = $res['total_fee'];
    		$total_fee=floatval($total_fee)/100;
    		if($res['trade_state'] == 'SUCCESS') {

    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'ajax_type'=>1,'order_type'=>1));
    			$this->log_result('支付请求成功#'.json_encode($result));
    			
    		}    	
    		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
    	
    			//请不要修改或删除
    		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //wxReplyNotify(true);    // 返回通知给微信
    		$dataarr['status']=1;
    		die('{"status" : "'.$dataarr['status'].'"}');
    		
        }else{
            //wxReplyNotify(false);    // 返回通知给微信
            //$this->log_result("这里写入想要调试的代码变量值，或其他运行的结果记录-验证失败");
            $dataarr['status']=0;
            die('{"status" : "'.$dataarr['status'].'"}');
        }
	}
	function notify_url()
	{
		$res = wxNotifyPay2();
		if ($res['result_code'] === 'SUCCESS' && $res['return_code'] === 'SUCCESS') {
    		//商户订单号
    		$out_trade_no = $res['out_trade_no'];
    		//微信支付交易单号
    		$trade_no = $res['transaction_id'];
    		//交易状态
    		$trade_status = $res['trade_state'];
    		$total_fee = $res['total_fee'];
    		$total_fee=floatval($total_fee)/100;
    		if($res['trade_state'] == 'SUCCESS') {
    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'ajax_type'=>1,'order_type'=>1));
    			$this->log_result('支付请求成功#'.json_encode($result));
    		}    	
    		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
    	
    			//请不要修改或删除
    		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            wxReplyNotify(true);    // 返回通知给微信
    		//$this->display('Order/pay_success');
        }else{
            wxReplyNotify(false);    // 返回通知给微信
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