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

class ProductController extends HomeController {

    public function index() {
        //作品标签
        $tags=D('Tags')->getTags();
        //作品
        $works=D('Works')->getAllWorks();
        //dump($works);
        //作品主题
        $wzt=D('Tags')->getWorksZT();
        //作品总数
        $wTotal=D('Works')->count();

        $this->assign('wcount',$wTotal);
        $this->assign('zttag',$wzt);
        $this->assign('works',$works);
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
