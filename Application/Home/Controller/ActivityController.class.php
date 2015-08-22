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

class ActivityController extends HomeController {

    public function index() {
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
}
