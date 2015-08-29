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
use Think\Page;
class MyCenterController extends HomeController
{
    /**
     * 我的首页
     * @param string $id 用户ID
     */
    public function index()
    {
        if (!is_login()) {
            session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            $this->redirect("Login/login");
        } else {
        		$data['user_id']=is_login();
        		$data['title']=array('exp',"is not Null");
        		$tags=I('get.tags');
        		if($tags>0){
        			$data['tags']=$tags;
        		}
                $worksModel =D('Works');
		        $count      = $worksModel->where($data)->count();
		        $pageshowcount=8;
		        $Page       = new Page($count,$pageshowcount);
		        $show       = $Page->pageshow();
		        $workList = $worksModel->field("works_comic.id,tags,create_status,title,works_comic.user_id,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
		        $this->assign('works',$workList);
		        $this->assign('show',$show);
		        $this->assign('wcount',$count);
		        $source=C('source');
		        $this->assign('source',$source);
		        $tags=C('tag');
		        $this->assign('tags',$tags);
		        $this->display();
        }
    }

    public function uploadWork()
    {

        if (!is_login()) {
        	$activityid=I('get.activityid',0);
			if($activityid){
				session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME.'/activityid/'.$activityid);
			}else{
            	session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
			}
            $this->redirect("Login/login");
        } else {
            if (IS_POST) {
            	$wordid=I('Post.workid',0);
            	$data['worktag']=I('Post.worktag',1);
            	$data['theme']=I('Post.theme',1);
            	$data['create_status']=I('Post.create_status',1);
            	$data['show']=I('Post.show',1);
            	$data['copy_right']=I('Post.copyri',1);
            	$data['title']=I('Post.title','');
            	$data['money']=I('Post.money',1);
            	$data['workrole']=I('Post.workrole',1);
            	$data['endtime']=I('Post.endtime',1);
            	$data['money']=I('Post.money',1);
            	$data['workrole']=I('Post.workrole',1);
            	$data['story']=I('Post.workstory');
            	$data['update_date']=date('Y-m-d H:i:s',time());
            	$data['user_id']=is_login();
            	$data['create_date']=date('Y-m-d H:i:s',time());
            	$path="/uploads/comic/".date('Ymd',time()).'/';
            	$main_image_url=I('Post.main_image_url','');
            	$assistant_image_url=I('Post.assistant_image_url','');
            	$data['main_image_url']=$path.$main_image_url;
            	$data['assistant_image_url']=$path.$assistant_image_url;
            	if($wordid){
            		$arr['id']=$wordid;
            		$id=D('Works')->where($arr)->save($data);
            	}else{
            		$workid = D('Works')->add($data);
            	}
                $this->display("MyCenter/uploadsuccess");
            } else {
            	$wordid=I('get.id',0);
            	if($wordid){
            		
            		$word=D('Works')->find($wordid);
            		$this->assign('word', $word);
            		if (is_login()!=$word['user_id']) {
            				$this->assign ( 'message', '错误的作品' );
            				$this->display('Public/error');
            				exit();
            		}
            	}
                $tags = C('tag');
                $source = C('source');
                $theme = C('theme');
                $show = C('show');
                $use = C('use');
                $this->assign('use', $use);
                $this->assign('show', $show);
                $this->assign('source', $source);
                $this->assign('theme', $theme);
                $this->assign('tags', $tags);
                $this->assign('today', date('Y-m-d'));
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
        $uid=I('id');
        $uinfo=D('User')->where("id={$uid}")->find();

        if(empty($uinfo['love_type'])){
            $uinfo['love_type']=make_coupon_card();
        }
        D('User')->where("id={$uid}")->save($uinfo);
        $this->assign('uinfo',$uinfo);
        //被邀请的人
        $yqUser=D('User')->where("love_status='{$uinfo["love_type"]}'")->select();

        $this->assign('yquser',$yqUser);

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
		$targetDir = './uploads/upload_tmp';
		$uploadDir = './uploads/upload';
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds
		if (!is_dir($targetDir)) {
			echo 111;die;
		    mkdir($targetDir);
		}
		if (!is_dir($uploadDir)) {
		    mkdir($uploadDir);
		}
		if (isset($_REQUEST["name"])) {
		    $fileNametrue = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
		    $fileNametrue = $_FILES["file"]["name"];
		} else {
		    $fileNametrue = uniqid("file_");
		}
		$fileNamed=makeOrderCardId(); 
		$end=pathinfo($fileNametrue, PATHINFO_EXTENSION);
		$fileName=$fileNamed.'.'.$end;
		$md5File = @file('md5list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$md5File = $md5File ? $md5File : array();
		if (isset($_REQUEST["md5"]) && array_search($_REQUEST["md5"], $md5File ) !== FALSE ) {
		    die('{"jsonrpc" : "2.0", "result" : null, "id" : "id", "exist": 1}');
		}
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
		if ($cleanupTargetDir) {
		    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
		}
	    while (($file = readdir($dir)) !== false) {
	        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
	
	        // If temp file is current file proceed to the next
	        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
	            continue;
	        }
	
	        // Remove temp file if it is older than the max age and is not the current file
	        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
	            @unlink($tmpfilePath);
	        }
	    }
	    closedir($dir);
		}
		if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
		    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream1."}, "id" : "id"}');
		}
		
		if (!empty($_FILES)) {
		    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		    }
		
		    // Read binary input stream and append it to temp file
		    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		    }
		} else {
		    if (!$in = @fopen("php://input", "rb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		    }
		}
		
		while ($buff = fread($in, 4096)) {
		    fwrite($out, $buff);
		}
		
		@fclose($out);
		@fclose($in);
		
		rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
		
		$index = 0;
		$done = true;
		for( $index = 0; $index < $chunks; $index++ ) {
		    if ( !file_exists("{$filePath}_{$index}.part") ) {
		        $done = false;
		        break;
		    }
		}
		if ( $done ) {
		    if (!$out = @fopen($uploadPath, "wb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream2."}, "id" : "id"}');
		    }
		
		    if ( flock($out, LOCK_EX) ) {
		        for( $index = 0; $index < $chunks; $index++ ) {
		            if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
		                break;
		            }
		
		            while ($buff = fread($in, 4096)) {
		                fwrite($out, $buff);
		            }
		
		            @fclose($in);
		            @unlink("{$filePath}_{$index}.part");
		        }
		
		        flock($out, LOCK_UN);
		    }
		    @fclose($out);
		}
		die('{"jsonrpc" : "2.0", "result" : "'.$fileNamed.'", "postfix" : "'.$end.'"}');
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
    	
    	$data['main_image_url']=$filename162;
    	$data['assistant_image_url']=$filename48;
    	/*
    	$workid=I('post.petname');
    	
    	if($workid){
    		D('Works')->where('id='.$workid)->save($data);
    	}else{
    		dump($workid);
    		
    		$workid = D('Works')->add($data);
    	}*/
    	file_put_contents($path.$filename162,$pic1);
    	file_put_contents($path.$filename48,$pic2);
    	$rs['status'] = 1;
    	$rs['picUrl'] = $path1;
    	$rs['main_image_url'] = $data['main_image_url'];
    	$rs['assistant_image_url'] =$data['assistant_image_url'];
    	echo json_encode($rs);
    }
}