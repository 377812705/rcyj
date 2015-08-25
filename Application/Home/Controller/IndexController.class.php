<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: ����� <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

class IndexController extends HomeController {

    public function index(){
        //推荐作品
        $tjwork=D('Works')->getTJWoks();
        $this->assign("tjwork",$tjwork);

        //定制作品推荐
        $dzwork=D('Works')->getTJWoks();
        $this->assign("dzwork",$dzwork);
        //作者推荐
        $author=D('Author')->getTjAuthor();
        $this->assign('author',$author);

        $this->display();
    }
    public function about(){
        $this->display();
    }
    public function standard(){
        $this->display();
    }
    public function mechanism(){
        $this->display();
    }
    public function feedback(){
        $this->display();
    }
}