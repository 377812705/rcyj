<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {
	public function  _initialize(){
		$a=explode('/', __ACTION__);
		if($a[2]!='Custom'&&$a[2]!='Index'&&$a[2]!='Product'&&$a[2]!='Author'&&$a[2]!='Activity'){
			$a[2]='Index';
		}
		$this->assign('controllername',$a[2]);
	}
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}

	/* 用户登录检测 */
	protected function login(){
		/* 用户登录检测 */
		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
	}

}
