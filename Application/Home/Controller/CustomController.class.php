<?php
namespace Home\Controller;

use User\Api\UserApi;

class CustomController extends HomeController
{

    public function index()
    {
        //作品标签
        $tags = D('Tags')->getTags();
        //作品
        $works = D('Custom')->getAllWorks();
        //dump($works);
        //作品主题
        $wzt = D('Tags')->getWorksZT();
        //作品总数
        $wTotal = D('Custom')->count();

        $this->assign('wcount', $wTotal);
        $this->assign('zttag', $wzt);
        $this->assign('custom', $works);
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
                $custom['imgurl']=think_decrypt($_POST['imgurl']);
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
    public function upload(){
        //$this->ajaxReturn($_FILES);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->uploadOne($_FILES['Filedata']);
        if(!$info) {// 上传错误提示错误信息
            $this->ajaxReturn($upload->getError());
        }else{// 上传成功
            $this->ajaxReturn(think_encrypt('/upload/'.$info['savepath'].$info['savename']));
            //$this->ajaxReturn($upload->rootPath);
        }
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
