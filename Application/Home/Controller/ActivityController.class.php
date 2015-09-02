<?php

// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

use User\Api\UserApi;
use Think\Page;
class ActivityController extends HomeController {

    public function index() {
    	$id=is_login();
    	$this->assign('userid',$id);
        $this->display();
    }
    public function perfect(){
        if(is_login()){
            if (IS_POST) {

            } else {
                $this->display();
            }
        }else {
            $this->redirect("Login/login");
        }
    }
   public function yzindex(){
   	 $this->display();
   }
   public function worksnew(){
   	$data['status']=1;
   	$data['group_level']=0;
    $worksMolde=	D('Works');
   	$count      = $worksMolde->where($data)->count();
   	$pageshowcount=20;
   	$Page       = new Page($count,$pageshowcount);
   	$show       = $Page->pageshow();
   	$works=$worksMolde->where($data)->limit($Page->firstRow.','.$Page->listRows)->order("praise_count desc")->select();
   	$this->assign ('show', $show);
   	$this->assign ('count', $count);
   	$this->assign ('works', $works);
   	$this->display();
   }
   public function cyzhindex(){
   	$data['status']=1;
   	$worksMolde=	D('Works');
   	$works=$worksMolde->where($data)->limit(8)->order("praise_count desc")->select();
   	$this->assign ('works', $works);
   	$this->display();
   }
   public function works(){
   	$data['status']=1;
   	$data['group_level']=1;
    $worksMolde=	D('Works');
   	$count      = $worksMolde->where($data)->count();
   	$pageshowcount=20;
   	$Page       = new Page($count,$pageshowcount);
   	$show       = $Page->pageshow();
   	$works=$worksMolde->where($data)->limit($Page->firstRow.','.$Page->listRows)->order("praise_count desc")->select();
   	$this->assign ('show', $show);
   	$this->assign ('count', $count);
   	$this->assign ('works', $works);
   	$this->display();
   }
   public function join(){
   	$this->display();
   }
   public function activitylist(){
   		$id = I('get.id','0');
   		if($id){
   			if($id!=1){
   			  $data['activity_id']=$id;
   			}
   			$worksModel=D('Works');
   			$count      = $worksModel->where($data)->count();
   			$pageshowcount=16;
   			$Page       = new Page($count,$pageshowcount);
   			$show       = $Page->pageshow();
   			$works = $worksModel->field("user_id,title,main_image_url,id,create_status")->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
   			$this->assign ('works', $works);
   			$this->assign ('show', $show);
   			$this->assign ('count', $count);
   			
   		}
   		if($id==2){
   			$this->display('yzzs');
   		}
   		
   }
}
