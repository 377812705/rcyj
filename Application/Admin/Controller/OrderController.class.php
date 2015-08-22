<?php

namespace Admin\Controller;
use Think\Controller;
//use Admin\Model\AuthRuleModel;
use Admin\Model\AuthGroupModel;
use Think\Page;
/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class OrderController extends Controller {
	/**
	 * 管理后台的订单列表
	 */
	public function orderlist() {
		$pid  = I('get.pid',0);
		if($pid){
			$data = M('Menu')->where("id={$pid}")->field(true)->find();
			$this->assign('data',$data);
		}
		$paytype=I('get.paytype');
		if($paytype!=null){
			if($paytype>=0){
				$data['2cy_order.order_type'] = $paytype;
			}
		}
		$order_number=I('get.order_number');
		if($order_number!=null){
			$data['2cy_order.order_number'] = $order_number;
		}
		$work_title=I('get.work_title');
		if($work_title!=null){
			$data['2cy_order.work_title'] = $work_title;
		}
		$creattime_start=I('get.creattime-start');
		if($creattime_start!=null){
			$data['2cy_order.create_date'] =array('EGT',$creattime_start);
		}
		$creattime_end=I('get.creattime-end');
		if($$creattime_end!=null){
			$data['2cy_order.create_date'] =array('ELT',$creattime_end);
		}
		$paytime_end=I('get.paytime-end');
		if($paytime_end!=null){
			$data['2cy_order.pay_time'] =array('ELT',$paytime_end);
		}
		$paytime_start=I('get.paytime-start');
		if($paytime_start!=null){
			$data['2cy_order.pay_time'] =array('EGT',$paytime_start);
		}
		$minpay_money=I('get.minpay_money');
		if($pay_money!=null){
			$data['2cy_order.pay_money'] =array('EGT',$minpay_money);
		}
		$maxpay_money=I('get.maxpay_money');
		if($maxpay_money!=null){
			$data['2cy_order.pay_money'] =array('ELT',$maxpay_money);
		}
		$orderModel =D('Order');
		$count      = $orderModel->where($data)->count();
		$pageshowcount=15;
		$Page       = new Page($count,$pageshowcount);
		$show       = $Page->show();
		$orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_category,2cy_order.handle,2cy_order.order_type,2cy_order.pay_money,2cy_order.pay_time,2cy_order.pay_type,2cy_order.work_title,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,works_comic.main_image_url,works_comic.tags_content")->join('left join works_comic on 2cy_order.work_id = works_comic.id')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		$category=C('category');
		$paystatus=C('paystatus');
		$handle=C('handle');
		$paytype=C('paytype');
		$this->assign ('orderList',$orderList);
		$this->assign ('paytype',$paytype);
		$this->assign ('paystatus',$paystatus);
		$this->assign ('category',$category);
		$this->assign ('handle',$handle);
		$this->assign ('order_type',$data['2cy_order.order_type']);
		$this->assign ('show',$show);
		$this->display('index');
	}
	public function show(){
		$orderid=I('get.id');
		if($orderid!=null){
			$data['order_id'] = $orderid;
		}
		$orderModel =D('Order');
		$order = $orderModel->where($data)->find();
		/*
		$userModel =D('user');
		$user = $userModel->field('nick_name,user_name')->where('user_id='.$order['author_id'])->find();
		$this->assign ('user',$user);
		$useraccountModel=D('user_account');
		$useraccount = $useraccountModel->field('true_name,account_name')->where('user_id='.$order['author_id'])->find();
		$this->assign ('useraccount',$useraccount);
		*/
		$paystatus=C('paystatus');
		$handle=C('handle');
		$paytype=C('paytype');
		$category=C('category');
		$this->assign ('category',$category);
		$this->assign ('order',$order);
		$this->assign ('paytype',$paytype);
		$this->assign ('paystatus',$paystatus);
		$this->assign ('handle',$handle);
		$this->display('show');
	}
	/**
	 * 财务订单详情
	 */
	public function financeshow() {
		$orderid=I('get.order_id');
		if($orderid!=null){
			$data['$orderid'] = $orderid;
		}
		$orderModel =D('Order');
		$order = $orderModel->where($data)->find();
		//dump($orderList);
		$userModel =D('user');
		$user = $userModel->field('nick_name,user_name')->where('user_id='.$order['author_id'])->find();
		$this->assign ('user',$user);
		$useraccountModel=D('user_account');
		$useraccount = $useraccountModel->field('true_name,account_name')->where('user_id='.$order['author_id'])->find();
		$this->assign ('useraccount',$useraccount);
		$paystatus=C('paystatus');
		$handle=C('handle');
		$paytype=C('paytype');
		$this->assign ('order',$order);
		$this->assign ('paytype',$paytype);
		$this->assign ('paystatus',$paystatus);
		$this->assign ('handle',$handle);
		$this->display('show');
	}
}