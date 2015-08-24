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
    {   dump(is_login());
        if (is_login()) {
            $fuid = is_login();
            $tid = I('toid');
            $uinfo = D('Author')->getUserInfo($fuid);
            //判断是否是订制用户
            if ($uinfo[0]['custom_flag']) {
                //是订制用户
                //得到订制用户类型0:个人1:企业
                $cutominfo = array(
                    'uid' => $fuid,
                    'cusattr' => getUserCustomType($fuid),
                    'theme' => I('theme'),
                    'themedesc' => '',
                    'mode' => '',
                    'imgclass' => '',
                    'dismode' => '',
                    'style' => '',
                    'imgurl' => '',
                    'cusdesc' => '',
                    'cusissue' => '',
                    'cusmoney' => '',
                    'starttime' => '',
                    'endtime' => '',
                    'cusname' => '',
                    'cuscopyright' => '',
                    'cusstatus' => '1',
                    'touid' => $tid
                );
//               dump($cutominfo);
                $this->assign('cutominfo', $cutominfo);


                $this->display();
            }


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

    public function orderConfim($cusid = null)
    {
        dump($_POST);
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
