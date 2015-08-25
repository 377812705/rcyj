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

class MyCenterController extends HomeController
{
    /**
     * 我的首页
     * @param string $id 用户ID
     */
    public function index($id = '')
    {
        if (!is_login()) {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        } else {
            $tags = D('Tags')->getTags();
            $works = D('Works')->getUserWorks($id);
            $this->assign('total', count($works));
            $this->assign('works', $works);
            $this->assign('tags', $tags);
            $this->display();
        }
    }

    public function uploadWork()
    {

        if (!is_login()) {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        } else {
            if (IS_POST) {
            	//dump(I('Post.'));
            	$wordid=I('Post.workid',0);
            	$data['content']=I('Post.editorValue','');
            	$data['title']=I('Post.title','');
            	$data['money']=floatval(I('Post.workmoney',0));
            	$data['tags_content']=I('Post.worktag','');
            	$data['create_status']=I('Post.worksource',1);

                $this->display("MyCenter/uploadsuccess");
            } else {
                $tags = D('Tags')->getTags();
                $source = C('source');
                $theme = C('theme');
                $show = C('show');
                $use = C('use');
                $this->assign('use', $use);
                $this->assign('show', $show);
                $this->assign('source', $source);
                $this->assign('theme', $theme);
                $this->assign('tags', $tags);
                $this->display();
            }
        }
    }

    public function collect()
    {
        if (!is_login()) {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        } else {
            $this->display();
        }
    }

    //我的邀请
    public function invite()
    {
        $this->display();
    }

    //消息中心
    public function attention()
    {
        if (!is_login()) {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        } else {
            //作者
            $author = D('Author')->getAllAuthor();
            $this->assign('author', $author);

            $this->display();
        }
    }

    //修改资料
    public function editdata()
    {
        $this->display();
    }

    //修改email
    public function editmail()
    {
        $this->display();
    }

    //修改地址
    public function editaddress()
    {
        $this->display();
    }

    //修改头像
    public function editphoto()
    {
        $this->display();
    }

    //upload
    public function upload()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 52428800;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        //$this->ajaxReturn($info);
        if (!$info) {// 上传错误提示错误信息
            $result['status'] = 0;
            $result['msg'] = $upload->getError();
            $this->ajaxReturn($result);
            exit;
            //$this->error();
        } else {// 上传成功
            $result['status'] = 1;
                $fid=null;
                foreach ($info as $file) {
                    $file['create_time'] = NOW_TIME;
                    $fid = M('file')->add($file);
                }
            $result['msg'] =$fid;
            $this->ajaxReturn($result);
        }
        exit;
    }

    public function uploadimg()
    {
        $this->display();
    }

    public function mydetails($uid=null){
        $this->display();
    }
    public function upfile() {
    	$path1 = "/uploads/comic/".date('Ymd',time()).'/';
    	$path='.'.$path1;
    	if(!is_dir($path)){
    		mkdir($path);
    	}
    	$file_src = "src.png";
    	$filename162 = time()."1.png";
    	$filename48 =  time()."2.png";
    	$src=base64_decode($_POST['pic']);
    	$pic1=base64_decode($_POST['pic1']);
    	$pic2=base64_decode($_POST['pic2']);
    	if($src) {
    		file_put_contents($file_src,$src);
    	}
    	$workid=I('get.wordid');
    	$data['main_image_url']=$path1.$filename162;
    	$data['assistant_image_url']=$path1.$filename48;
    	$data['update_date']=date('Y-m-d H:i:s',time());
    	$data['user_id']=is_login();
    	if($workid){
    		D('Works')->where('id='.$workid)->save($data);
    	}else{
    		$data['create_date']=date('Y-m-d H:i:s',time());
    		$workid = D('Works')->add($data);
    	}
    	file_put_contents($path.$filename162,$pic1);
    	file_put_contents($path.$filename48,$pic2);
    	$rs['status'] = $workid;
    	echo json_encode($rs);
    }
}