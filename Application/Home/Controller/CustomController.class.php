<?php
namespace Home\Controller;

use User\Api\UserApi;
use Think\Page;

class CustomController extends HomeController
{

    public function index()
    {   //dump($_GET);
        $source=C('source');
        $this->assign('source',$source);
        //作品标签
        $tags = C('cate');
        $this->assign('tags', $tags);

        //dump($works);
        //作品主题
        $themes=C('theme');
        $this->assign('theme',$themes);
        //作品
        $cusattr=I('get.cusattr');
        if($cusattr>0){
            $data['cusattr']=$source[$cusattr];
            $dataf['cusattr']=$source[$cusattr];
        }else{
            $dataf['cusattr']='作品来源';
        }

        $tag=I('get.tags');
        if($tag>0){
            $data['tags']=$tags[$tag];
            $dataf['tags']=$tags[$tag];
        }else{
            $dataf['tags']='订制标签';
        }
        $theme=I('get.theme');
        if($theme>0){
            $data['theme']=$themes[$theme];
            $dataf['theme']=$themes[$theme];
        }else{
            $dataf['theme']='作品主题';
        }
        $news=I('get.news');
        switch ($news)
        {
            case 0:
                $order='createtime desc,cusid desc';
                $dataf['news']='最新上传';
                break;
            case 1:
                $order='createtime asc,cusid desc';
                $dataf['news']='人气最高';
                break;
            case 2:
                $order='cusmoney asc,cusid desc';
                $dataf['news']='价格最低';
                break;
            case 3:
                $order='cusmoney desc,cusid desc';
                $dataf['news']='价格最高';
                break;
            default:
                $order='createtime desc,cusid desc';
                $dataf['news']='最新上传';
        }

        $this->assign('dataf',$dataf);

        $data['cusstatus'] = array('gt',1);

        //作品总数
        $wmodel=D('Custom');
        $wTotal = $wmodel->where($data)->count();
        $pageshowcount=24;
        $Page       = new Page($wTotal,$pageshowcount);
        $show   = $Page->pageshow();

        $works = $wmodel->order($order)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();

        $this->assign('show', $show);
        $this->assign('wcount', $wTotal);
        $this->assign('custom', $works);

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
                if($_POST['theme']=='其他'){
                    $custom['theme']=$_POST['theme2'];
                }
                $custom['style'] = $_POST['style1']."/".$_POST['style2'];
                $custom['cusissue'] = implode($_POST['cusissue'], "/");
                $custom['imgurl']=$_POST['imgurl'];
                //dump($custom);
                $custom['cusissue']=$_POST['cusissue1'].$_POST['cusissue2'].$_POST['cusissue3'];
                if($custom['cusdesc']=='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。'){
                    $custom['cusdesc']='';
                }
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
            //$custom['cusstatus']=2;
            $model->where("cusid={$custom['cusid']}")->save($custom);
            $this->redirect("Order/makeCustomOrder/customid/{$custom['cusid']}");
        }else{
            $this->redirect("Custom/index");
        }


    }
    public function upload(){
        //$this->ajaxReturn($_FILES);
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './uploads/custom/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->uploadOne($_FILES['Filedata']);
        if(!$info) {// 上传错误提示错误信息
            $this->ajaxReturn($upload->getError());
        }else{// 上传成功
            //$this->ajaxReturn(think_encrypt('/uploads/custom/'.$info['savepath'].$info['savename']));
            $this->ajaxReturn('/uploads/custom/'.$info['savepath'].$info['savename'],'EVAL');
           // exit;
        }
    }
    public function detail($cusid=null){
        //人气+1
        D('Custom')->where("cusid={$cusid}")->setInc("open_count",1);
        if (is_login()) {
            //得到订制作品明细
            $custom=D('Custom')->getOrderCustomByid($cusid);
            //dump($custom);
            $this->assign('isgrab',isgrab(is_login(),$cusid));
            $this->assign('custom',$custom);

            $this->display();

        } else {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME.'/cusid/'.$cusid);
            $this->redirect("Login/login");
        }

    }

    /**
     * 抢单
     */
    public function grab(){
        $model=M('grab');
        $model->add($_POST);
        $this->ajaxReturn('已抢单');
    }

    public function pCustomReg()
    {
        $this->display();
    }

    public function eCustomReg()
    {
        $this->display();
    }

    public function pcustom()
    {
        if (is_login()) {
            $fuid = is_login();
            $tid = I('toid');
            $uinfo = D('Author')->getUserInfo($fuid);
            $cutominfo = array(
                'uid' => $fuid,
                'cusattr' => 1,
                'touid' => $tid
            );
            $this->assign('cutominfo', $cutominfo);
            $this->display();

        } else {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        }
    }
    public function ecustom()
    {
        if (is_login()) {
            $fuid = is_login();
            $tid = I('toid');
            $uinfo = D('Author')->getUserInfo($fuid);
            $cutominfo = array(
                'uid' => $fuid,
                'cusattr' => 2,
                'touid' => $tid
            );
            $this->assign('cutominfo', $cutominfo);
            $this->display();

        } else {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        }
    }
    public function userdetails(){
        $uid = I('uid');

        $uinfo = D('Author')->getUserInfo($uid);


        $data['uid']=$uid;

        $order='createtime desc,cusid desc';

        $cmodel=D('Custom');
        $cTotal = $cmodel->where($data)->count();
        $pageshowcount=16;
        $Page       = new Page($cTotal,$pageshowcount);
        $show   = $Page->pageshow();

        $custom = $cmodel->order($order)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();

        $this->assign('show', $show);
        $this->assign('wcount', $cTotal);
        $this->assign('custom', $custom);
        $this->assign("uinfo",$uinfo[0]);
        $this->display();
    }

    public function qdlist(){
        if(IS_POST){
            $cusid=I('cusid');
            $data=array(
                "user_id"=>I('user_id')
            );
            M('order')->where("custom_id={$cusid}")->save($data);
            $this->redirect('Order/ordercustomlist');
        }else{
        $cusid=I('cusid');
        $sql="select ga.cusid,u.id,u.user_name,u.nick_name,u.header_img,u.tags_content,u.address,u.pop_count,u.fans_count,u.work_count from 2cy_grab as ga join user as u on ga.uid=u.id where ga.cusid={$cusid}  order by u.fans_count desc limit 6";
        $qduser=M()->query($sql);
        $umodel=M('user',null);
        $tjuser=$umodel->order('pop_count desc')->limit(6)->select();
        $this->assign('qduser',$qduser);
        $this->assign('tjuser',$tjuser);
        $this->display();
        }
    }
}
