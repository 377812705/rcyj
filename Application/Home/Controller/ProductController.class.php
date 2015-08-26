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
class ProductController extends HomeController {

    public function index() {
        //作品标签
        $tags=C('tag');
        //作品
        $data=array();
        $worksModel =D('Works');
        $tags=I('get.tags');
        if($tags!=null){
        	if($tags>=0){
        		$data['tags'] = $tags;
        	}
        }
        $count      = $worksModel->where($data)->count();
        $pageshowcount=34;
        $Page       = new Page($count,$pageshowcount);
        $show       = $Page->pageshow();
        $workList = $worksModel->field("works_comic.id,title,works_comic.user_id,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
        $this->assign('works',$workList);
        $this->assign('wcount',$count);
        $this->assign('tags',$tags);
        $this->display();
    }
    public function details(){
    	$id=I('get.id','');
    	$works=D('Works')->find($id);
    	$User=D('User')->find($works['user_id']);
    	$worklist=D('Works')->getWorksByUserId($works['user_id'],3);
    	//dump($User);
    	$this->assign('worklist',$worklist);
    	$this->assign('user',$User);
    	$this->assign('works',$works);
        $this->display();
    }
}
