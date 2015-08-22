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
use AlipayCenter\AlipaySubmit;
use AlipayCenter\AlipayNotify;
header("content-type:text/html;charset=utf8");
include_once(APP_PATH.'Home/Common/wx/lib/alipay_submit.class.php');
include_once(APP_PATH.'Home/Common/wx/lib/alipay_notify.class.php');

class ZhifubaoController extends Controller {
	const PAY_TYPE = 3;//支付宝支付
	
	 /**
     * 快钱支付下单
     */
    public function zhifubaoPay(){
    	$session = session('user');
		$user_id =2;// $session['user_id'];
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
    	echo $this->getZhifubaoData($order);
    }
    /**
     * 
     * @param float $orderAmount
     * @param string $orderId 商户订单号，以下采用时间来定义订单号，商户可以根据自己订单号的定义规则来定义该值，不能为空。
     * @return string
     */
	private function getZhifubaoData($order){
		$alipay_config = include_once (APP_PATH.'Home/Common/zfb/alipay.config.php');
		//支付类型
		//必填，不能修改
		$payment_type = "1";
		//商户订单号
		$out_trade_no = $order['order_number'];
		//服务器异步通知页面路径"http://商户网关地址/create_direct_pay_by_user-PHP-UTF-8/notify_url.php"
		$notify_url = U ( '/Home/Zhifubao/notify/', '', 'html', true);
		//需http://格式的完整路径，不能加?id=123这类自定义参数
		//页面跳转同步通知页面路径 U ( '/Home/Order/pay_success/order_id/'.$out_trade_no )
		$return_url =  U ( '/Home/Zhifubao/alipayReturn', '', '', true );
		//需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		//商户网站订单系统中唯一订单号，必填
		$short_title = $order['work_title'];
		//订单名称
		$subject = $short_title;
		//必填
		//付款金额
		$total_fee = $order['money'];
		//必填
		//订单描述
		$body = '';
		//商品展示地址
		$show_url = '';
		//需以http://开头的完整路径，例如：http://www.商户网址.com/myorder.html
		//防钓鱼时间戳
		$anti_phishing_key = "";
		//若要使用请调用类文件submit中的query_timestamp函数
		//客户端的IP地址
		$exter_invoke_ip = "";
		//非局域网的外网IP地址，如：221.0.0.1
		/************************************************************/
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "create_direct_pay_by_user",
				"partner" => trim($alipay_config['partner']),
				"seller_email" => trim($alipay_config['seller_email']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "正在努力跳转到支付宝平台，请等待");
		return $html_text;
	}
	
	//同步信息
    public function alipayReturn(){
    	$alipay_config = include_once (APP_PATH.'Home/Common/zfb/alipay.config.php');
    	//计算得出通知验证结果
    	$alipayNotify = new AlipayNotify($alipay_config);
    	$verify_result = $alipayNotify->verifyReturn();
    	if($verify_result) {//验证成功
    		//商户订单号
    		$out_trade_no = $_GET['out_trade_no'];
    		//支付宝交易号
    		$trade_no = $_GET['trade_no'];
    		 
    		//交易状态
    		$trade_status = $_GET['trade_status'];
    		 
    		$total_fee = $_GET['total_fee'];
    		if($_GET['trade_status'] == 'TRADE_FINISHED') {
    			//注意：
    			//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'order_type'=>1));
    			 
    			//调试用，写文本函数记录程序运行情况是否正常
    			$this->log_result('支付请求成功#'.json_encode($result));
    			 
    		}
    		else if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
    			//判断该笔订单是否在商户网站中已经做过处理
    			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
    			//如果有做过处理，不执行商户的业务程序
    			$order = new OrderController();
    			$result = $order -> updateOrder(array('pay_type' => self::PAY_TYPE,'trade_no'=>$trade_no, 'order_number' => $out_trade_no, 'money' => $total_fee,'order_type'=>1));
    			//调试用，写文本函数记录程序运行情况是否正常
    			$this->log_result('支付请求成功*'.json_encode($result));
    			//注意：
    			//付款完成后，支付宝系统发送该交易状态通知
    			//调试用，写文本函数记录程序运行情况是否正常
    			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    		}
    		 
    		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

    		Header ( "Location: " . U ( '/Home/Order/pay_success/order_id/'.$out_trade_no ) );
    		
    		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    	}
    	else {
    		//验证失败
    	
    		$this->assign ( 'message', '支付宝验证失败' );
    		$this->display('Public/error');
    		//调试用，写文本函数记录程序运行情况是否正常
    		$this->log_result("支付宝同步验证失败");
    		exit();
    	
    	}
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