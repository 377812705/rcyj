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

class CustomController extends HomeController
{

    public function index()
    {
        //作品标签
        $tags = D('Tags')->getTags();
        //作品
        $works = D('Works')->getAllWorks();
        //dump($works);
        //作品主题
        $wzt = D('Tags')->getWorksZT();
        //作品总数
        $wTotal = D('Works')->count();

        $this->assign('wcount', $wTotal);
        $this->assign('zttag', $wzt);
        $this->assign('works', $works);
        $this->assign('tags', $tags);
        $this->display();
    }

    public function custom()
    {
        if (is_login()) {
            $fuid = is_login();
            $tid = I('toid');
            $uinfo = D('Author')->getUserInfo($fuid);
            $cutominfo = array(
                'uid' => $fuid,
                'cusattr' => getUserCustomType($fuid),
                'touid' => $tid
            );
            $this->assign('cutominfo', $cutominfo);
            $this->display("Custom/custom");

        } else {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        }
    }

    public function customsave()
    {

        if (IS_POST) {
            $model = D('Custom');
            if ($model->autoCheckToken($_POST)) {
                $custom = $_POST;
                $custom['theme'] = implode($_POST['theme'], "/");
                $custom['style'] = implode($_POST['style'], "/");
                $custom['cusissue'] = implode($_POST['cusissue'], "/");

                //dump($custom);
                $custom['cusid'] = $model->add($custom);

                $this->assign('custom', $custom);
                $this->display('Custom/orderinfo');
            }else{
                $this->redirect('Custom/custom');
            }
        }
    }

    /**
     * 订制需求确认
     */
    public function orderConfim()
    {
        $model = D('Custom');
        if ($model->autoCheckToken($_POST)) {
            $custom = $_POST;
            $custom['orderid']=time().is_login().$custom['cusid'];
            $custom['cusstatus']=2;
            $model->where("cusid={$custom['cusid']}")->save($custom);
        }

        $this->redirect('Custom/index');
    }

    public function pCustomReg()
    {
        $this->display();
    }

    public function eCustomReg()
    {
        $this->display();
    }
}
