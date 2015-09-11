<?php
/**
 * 订单控制类
*
* @author jhw
*
*/
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class OrderController extends HomeController {

	/**
	 * 用户中心的作品订单列表
	 */
	public function orderlist(){
		$user_id =is_login();
		$data['2cy_order.user_id']=$user_id;
		$data['2cy_order.work_id']=array('gt',0);
		$paytype=I('get.paytype');
		if($paytype!=null){
			if($paytype>=0){
				$data['2cy_order.order_type'] = $paytype;
			}
		}
		if(empty($user_id)) {
			$paytype=I('get.paytype');
			if($paytype){
				session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME.'/paytype/'.$paytype);
			}else{
				session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
			}
			$this->redirect("Login/login");
		
		}
		$orderModel =D('Order');
		$count      = $orderModel->where($data)->count();
		$pageshowcount=5;
		$Page       = new Page($count,$pageshowcount);
		$show       = $Page->pageshow();
		$orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.work_title,2cy_order.work_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,works_comic.main_image_url,works_comic.tags,works_comic.theme,works_comic.show,works_comic.create_status")->join('left join works_comic on 2cy_order.work_id = works_comic.id')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		$this->assign('userid',$user_id);
		$tags=C('tag');
		$this->assign('tags',$tags);
		$show1=C('show');
		$this->assign('show1',$show1);
		$theme=C('theme');
		$this->assign('theme',$theme);
		$paytype=C('paystatus');
		$this->assign('orderList',$orderList);
		$this->assign('paytype',$paytype);
		$this->assign('order_type',$data['2cy_order.order_type']);
		$this->assign('show',$show);
		$this->display('orderlist');
	}
	/**
	 * 用户中心的我的作品出售记录列表
	 */
	public function sellorderlist(){
		$user_id =is_login();
		$data['2cy_order.order_type']=1;
		$data['2cy_order.auther_id']=$user_id;
		$data['2cy_order.work_id']=array('gt',0);
		if(empty($user_id)) {
			$this->assign ( 'message', '请登录后再操作' );
			$this->display('Public/error');
			exit();
		}
		$paytype=I('get.paytype');
		if($paytype!=null){
			if($paytype>=0){
				$data['2cy_order.order_type'] = $paytype;
			}
		}
		$orderModel =D('Order');
		$count      = $orderModel->where($data)->count();
		$pageshowcount=5;
		$Page       = new Page($count,$pageshowcount);
		$show       = $Page->pageshow();
		$orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.work_title,2cy_order.work_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,works_comic.main_image_url,works_comic.tags,works_comic.theme,works_comic.show,works_comic.create_status")->join('left join works_comic on 2cy_order.work_id = works_comic.id')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		$this->assign('userid',$user_id);
		$tags=C('tag');
		$this->assign('tags',$tags);
		$show1=C('show');
		$this->assign('show1',$show1);
		$theme=C('theme');
		$this->assign('theme',$theme);
		$paytype=C('paystatus');
		$this->assign('orderList',$orderList);
		$this->assign('paytype',$paytype);
		$this->assign('order_type',$data['2cy_order.order_type']);
		$this->assign('show',$show);
		$this->display('sellorderlist');
	}
	/**
	 * 用户中心的定制订单列表
	 */
	public function grabcustomlist(){
		$user_id =is_login();
		$data['2cy_order.auther_id']=$user_id;
		$data['2cy_order.custom_id']=array('gt',0);
		$data['2cy_order.order_type']=1;
		if(empty($user_id)) {
			$this->assign ( 'message', '请登录后再操作' );
			$this->display('Public/error');
			exit();
		}
		$paytype=I('get.paytype');
		if($paytype!=null){
			if($paytype>=0){
				$data['2cy_order.order_type'] = $paytype;
			}
		}
		$orderModel =D('Order');
		$count      = $orderModel->where($data)->count();
		$pageshowcount=5;
		$Page       = new Page($count,$pageshowcount);
		$show       = $Page->pageshow();
		$orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.work_title,2cy_order.custom_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,2cy_custom.imgurl,2cy_custom.theme,2cy_custom.style,2cy_custom.endtime,2cy_custom.imgclass,2cy_custom.theme,2cy_custom.dismode,2cy_custom.mode,2cy_custom.cusstatus")->join('left join 2cy_custom on 2cy_order.custom_id = 2cy_custom.cusid')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		$this->assign('userid',$user_id);
		$paytype=C('paystatus');
		$this->assign('orderList',$orderList);
		$this->assign('paytype',$paytype);
		$this->assign('order_type',$data['2cy_order.order_type']);
		$this->assign('show',$show);
		$this->display('graborderlist');
	}
	/**
	 * 用户中心的定制订单列表
	 */
	public function ordercustomlist(){
		$user_id =is_login();
		$data['2cy_order.user_id']=$user_id;
		$data['2cy_order.custom_id']=array('gt',0);
		if(empty($user_id)) {
			$this->assign ( 'message', '请登录后再操作' );
			$this->display('Public/error');
			exit();
		}
		$paytype=I('get.paytype');
		if($paytype!=null){
			if($paytype>=0){
				$data['2cy_order.order_type'] = $paytype;
			}
		}
		$orderModel =D('Order');
		$count      = $orderModel->where($data)->count();
		$pageshowcount=5;
		$Page       = new Page($count,$pageshowcount);
		$show       = $Page->pageshow();
		$orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.auther_id,2cy_order.work_title,2cy_order.custom_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,2cy_custom.imgurl,2cy_custom.theme,2cy_custom.style,2cy_custom.endtime,2cy_custom.imgclass,2cy_custom.theme,2cy_custom.dismode,2cy_custom.mode,2cy_custom.cusstatus")->join('left join 2cy_custom on 2cy_order.custom_id = 2cy_custom.cusid')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		$this->assign('userid',$user_id);
		$paytype=C('paystatus');
		$this->assign('orderList',$orderList);
		$this->assign('paytype',$paytype);
		$this->assign('order_type',$data['2cy_order.order_type']);
		$this->assign('show',$show);
		$this->display('ordercustomlist');
	}
	/**
	 * 提交信息生成订单
	 * @param string type 来源 package ，cart 。普通
	 * @param int cart_ids 购物车id
	 */
	public function makeCustomOrder(){
		$customid = I('get.customid');
		if(!is_numeric($customid)){
			$this->assign ( 'message', '需求信息' );
			$this->display('Public/error');
			exit();
		}
		$data['custom_id']=$customid;
		$data['order_category']=1;
		$user_id =is_login();
		$data['user_id']=$user_id;
		if (!is_login()) {
			session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
			$this->redirect("Login/login");
		}
		$data['order_number']='2cyj'.makeOrderCardId();
		
		
		$worksModel =D('Custom');
		$work = $worksModel->getOrderCustomByid($customid);
		if(!$work) {
			$this->assign ( 'message', '生成订单异常，请重新操作' );
			$this->display('Public/error');
			exit();
		}
		$data['auther_id']=$work['touid'];
		$data['auther']=getUserNameById($work['touid']);
		$data['work_title']=$work['cusname'];
		$data['create_date']=date('Y-m-d H:i:s',time());
		$data['update_date']=$data['create_date'];
		$data['money']=$work['cusmoney'];
		$data['order_type']=0;
		$data['handle']=1;
		$data['ajax_type']=0;
		$OrderModel =D('Order');
		$id=$OrderModel->add($data);
		if($id){
			redirect('/Order/pay/orderid/'.$id);
		}else{
			$this->assign ( 'message', '订单生成异常' );
			$this->display('Public/error');
			exit();
		}
	}
	/**
	 * 提交信息生成订单
	 * @param string type 来源 package ，cart 。普通
	 * @param int cart_ids 购物车id
	 */
	public function makeOrder(){
		$work_id = I('get.workid' );
		if(!is_numeric($work_id)){
			$this->assign ( 'message', '作品信息' );
			$this->display('Public/error');
			exit();
		}
		$data['work_id']=$work_id;
		$data['order_category']=2;
		$user_id =is_login();
		if (!is_login()) {
			session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME.'/workid/'.$work_id);
				
			$this->redirect("Login/login");
		}
		$data['user_id']=$user_id;
		$data['order_number']='2cyj'.makeOrderCardId();
		$worksModel =D('Works');	
		$work = $worksModel->getOrderWorkByid($work_id);
		if(!$work) {
			$this->assign ( 'message', '生成订单异常，请重新操作' );
			$this->display('Public/error');
			exit();
		}
		$data['author_id']=$work['user_id'];
		$data['auther']=getUserNameById($work['user_id']);
		$data['work_title']=$work['title'];
		$data['create_date']=date('Y-m-d H:i:s',time());
		$data['update_date']=$data['create_date'];
		$data['money']=$work['money'];
		$data['order_type']=0;	
		$data['handle']=1;
		$data['ajax_type']=0;
		$OrderModel =D('Order');
		$id=$OrderModel->add($data);
		if($id){
			redirect('/Order/pay/orderid/'.$id);
		}else{
			$this->assign ( 'message', '订单生成异常' );
			$this->display('Public/error');
			exit();
		}
	}
	public function pay(){
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
		$order=$OrderModel->where($data)->select();
		if($order){
			$this->assign ('data', $order[0]);
			$this->display('pay-by');
		}else{
			$this->assign ( 'message', '非法的订单或者已经支付' );
			$this->display('Public/error');
			exit();
		}
	}
	/**
	 * 修改订单状态
	 *
	 * @param string $orderId   订单ID
	 * @param int    $pay_type 	支付方式 0=>线下 1=>财付通 2=>银联 3=>支付宝
	 * @param float  $total_fee	订单总金额
	 */
	public function updateOrder($orderInfo) {
		if (! isset ( $orderInfo )) {
			return array (
					'fail' => array (
							'desc' => '订单参数信息错误',
							'code' => 1000
					)
			);
		}
		$model = M ( 'order' );
		$orderId = $orderInfo ['order_number'];
		$total_fee = $orderInfo ['money'];
		$pay_type = $orderInfo ['pay_type'];
		$result = $model->where ( array (
				'order_number' => $orderId
		) )->find ();
		
		if (empty ( $result )) {// 数据空的返回空
			return array (
					'fail' => array (
							'desc' => '订单信息不存在',
							'code' => 1001
					)
			);
		}
	
		if ($result ['money'] != $total_fee) {// 金额不一致返回空 这里以元为单位
			return array (
					'fail' => array (
							'desc' => '订单金额不一致',
							'code' => 1002
					)
			);
		}
	
		if ($result ['order_type'] == 1) {// 支付成功
			return array (
					'success' => array (
							'desc1' => '支付订单已处理且成功',
							'code' => 1003
					)
			);
		}
	
		if(!isset($result['user_id'])){
			return array (
					'fail' => array (
							'desc1' => '用户ID不存在',
							'code' => 1004
					)
			);
		}
	
		$data = array (
				'pay_money' => $total_fee,
				'pay_type' => $pay_type,
				'trade_no'=>$orderInfo['trade_no'],
				'pay_time' => date('Y-m-d H:i:s',time())
		);
		if($result['custom_id']>0){
			$dataCustom['cusstatus']=2;
			D('Custom')->where('cusid='.$result['custom_id'])->save($dataCustom);
			
			//获取需求的orderid
			$cuinfo=D('Author')->find($result['user_id']);
			
			//未指定作者--发送短信
			$order_id = substr($orderId, -1 -8);
			sendSms($cuinfo['mobile'], '34911', array($order_id));
		}
		if($result['work_id']>0){
			D('Works')->where ( array (
						'id' => $result['work_id']
		) )->save( array('issell'=>2) );
		}
		
		if(isset($orderInfo['order_type'])){
			$data['order_type'] = $orderInfo['order_type'];
		}
		if(isset($orderInfo['ajax_type'])){
			$data['ajax_type'] = $orderInfo['ajax_type'];
		}
		$model->where ( array (
				'order_number' => $orderId
		) )->save ( $data );
		
		
		return array (
				'success' => array (
						'desc1' => '支付订单成功',
						'code' => 1004
				)
		);
	}
	/**
	 * 支付成功
	 */
	public function pay_success(){
		$user_id = is_login();
		$order_id = I('order_id');
		if(!$order_id){
			$this->assign ('message', '支付错误');
			$this->display('Public/error');
			exit();
		}
		$this->display('pay_success');
					
	}
}
