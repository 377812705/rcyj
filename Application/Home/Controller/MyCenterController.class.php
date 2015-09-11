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
	public function  _initialize(){
		$a=CONTROLLER_NAME;
		if(CONTROLLER_NAME!='Custom'&&CONTROLLER_NAME!='Index'&&CONTROLLER_NAME!='Product'&&CONTROLLER_NAME!='Author'&&$CONTROLLER_NAME!='Activity'){
			$a='Index';
		}
		$this->assign('controllername',$a);
		if (!is_login()) {
			session('PRI_URL', CONTROLLER_NAME);
			$this->redirect("Login/login");
		}
	}
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
		        $workList = $worksModel->field("works_comic.id,tags,works_comic.issell,works_comic.sellcate,works_comic.authorize,create_status,title,works_comic.user_id,works_comic.issell,main_image_url,money,theme,user.header_img")->join('left join user on works_comic.user_id = user.id')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
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
	public function del(){
		$id=I('get.id');
		if($id){
			$worksModel =D('Works');
			$work = $worksModel->field("issell")->find($id);
			if($work['issell']==1){
				$data=array('id'=>$id);
				$data1=array('ref_id'=>$id);
				//$worksModel->where();
				$worksModel->where($data)->delete();
				$imgModel =D('Img');
				$imgModel->where($data1)->delete();
				
			}
		}
		$this->redirect("index");
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
            	$data['tags']=I('Post.worktag',1);
            	$data['cate']=1;
            	$data['theme']=I('Post.theme',1);
            	$data['create_status']=I('Post.create_status',1);
            	$data['show']=I('Post.show',1);
            	$data['copy_right']=I('Post.copyri',1);
            	$data['title']=I('Post.title','');
            	$data['workrole']=I('Post.workrole',1);
            	$data['endtime']=I('Post.endtime',date('Y-m-d H:i:s',time()));
            	$data['money']=I('Post.money',1);
            	$data['workrole']=I('Post.workrole',1);
            	$data['sellcate']=I('Post.sellcate',1);
            	if($data['sellcate']==1){
            		$data['money']=I('Post.money',0.01);
            	}else{
            		$data['authorize']=I('Post.authorize','');
            		if($data['authorize']=='请填写授权类别'){
            			$data['authorize']='未填写授权类别';
            		}
            	}
            	if($data['workrole']=='作品的角色介绍等'){
            		$data['workrole']=null;
            	}
            	$data['story']=I('Post.workstory');
            	if($data['story']=='作品的简单介绍等'){
            		$data['story']=null;
            	}
            	$data['update_date']=date('Y-m-d H:i:s',time());
            	$data['user_id']=is_login();
            	$data['create_date']=date('Y-m-d H:i:s',time());
            	
            	$data['activity_id']=I('Post.activity_id');
            	$data['custom_id']=I('Post.custom_id');
            	if($data['custom_id']>0){
            		D('Custom')->where('cusid='.$data['custom_id'])->save(array('cusstatus'=>5));
            		
            		//获取需求编号
            		$prefix = C('DB_PREFIX');
            		$table = $prefix."custom c";
            		$o_table = $prefix.'order';
            		$join = array(
            		    'left join '.$o_table . ' o ON c.cusid=o.custom_id',
            		);
            		$user_id = is_login();
            		$field = "o.order_number";
            		$user_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$data['custom_id']))->field($field)->find();
                    
            		$uinfo=D('Author')->find($data['user_id']);
            		$order_id = substr($user_info['order_number'], -1 -8);
            		sendSms($uinfo['mobile'], '34917', array($order_id));
            	}
            	$main_image_url=I('Post.main_image_url','');
            	if(count(explode('/', $main_image_url))>1){
            		
            		$assistant_image_url=I('Post.assistant_image_url','');
            		$data['main_image_url']=$main_image_url;
            		$data['assistant_image_url']=$assistant_image_url;
            	}else{
            		$path="/uploads/comic/".date('Ymd',time()).'/';
            		$assistant_image_url=I('Post.assistant_image_url','');
            		$data['main_image_url']=$path.$main_image_url;
            		$data['assistant_image_url']=$path.$assistant_image_url;
            	}
            	if($wordid){
            		$arr['id']=$wordid;
            		$id=D('Works')->where($arr)->save($data);
            	}else{
            		$wordid = D('Works')->add($data);
            		
            	}
            	$sht=I('Post.sht',0);
            	if(is_array($sht)){
	            	for($i=0;$i<count($sht);$i++){
	            		$imgsht['user_id']=$data['user_id'];
	            		$imgsht['ref_id']=$wordid;
	            		$imgsht['ref_type']=1;
	            		$imgsht['image_url']='/uploads/comic/'.date('Ymd',time()).'/'."$sht[$i]";
	            		$imgsht['create_date']=date("Y-m-d H:i:s");
	            		$image=D('Img')->add($imgsht);
	            	}
            	}
            	$bqt=I('Post.bqt',0);
            	if(is_array($bqt)){
	            	for($i=0;$i<count($bqt);$i++){
	            		$imgsht['user_id']=$data['user_id'];
	            		$imgsht['ref_id']=$wordid;
	            		$imgsht['ref_type']=2;
	            		$imgsht['image_url']='/uploads/comic/'.date('Ymd',time()).'/'."$bqt[$i]";
	            		$imgsht['create_date']=date("Y-m-d H:i:s");
	            		$image=D('Img')->add($imgsht);
	            	}
            	}
            	$xqt=I('Post.xqt',0);
            	if(is_array($xqt)){
            		for($i=0;$i<count($xqt);$i++){
            			$imgsht['user_id']=$data['user_id'];
            			$imgsht['ref_id']=$wordid;
            			$imgsht['ref_type']=4;
            			$imgsht['image_url']='/uploads/comic/'.date('Ymd',time()).'/'."$xqt[$i]";
            			$imgsht['create_date']=date("Y-m-d H:i:s");
            			$image=D('Img')->add($imgsht);
            		}
            	}
            	$dzt=I('Post.dzt',0);
            	if(is_array($dzt)){
	            	for($i=0;$i<count($dzt);$i++){
	            		$imgsht['user_id']=$data['user_id'];
	            		$imgsht['ref_id']=$wordid;
	            		$imgsht['ref_type']=3;
	            		$imgsht['image_url']='/uploads/comic/'.date('Ymd',time()).'/'."$dzt[$i]";
	            		$imgsht['create_date']=date("Y-m-d H:i:s");
	            		$image=D('Img')->add($imgsht);
	            	}
            	}	
                $this->display("MyCenter/uploadsuccess");
            } else {
            	$wordid=I('get.id',0);
            	if($wordid){
            		$word=D('Works')->find($wordid);
            		$imgs=D('Img')->where('ref_id='.$word['id'])->select();
            		$this->assign('imgs', $imgs);
            		if (is_login()!=$word['user_id']) {
            				$this->assign ( 'message', '错误的作品' );
            				$this->display('Public/error');
            				exit();
            		}
            		
            	}
            	$activity_id=I('get.activityid',0);
            	if($activity_id){
            		$word['activity_id']=$activity_id;
            	}
            	$custom_id=I('get.customid',0);
            	if($custom_id){
            		$word['custom_id']=$custom_id;
            	}
            	if($word['custom_id']||$word['activity_id']){
            		$word['showmoney']='no';
            	}else{
            		$word['showmoney']='yes';
            	}
            	$this->assign('word', $word);
            	$sellcate = C('sellcate');
            	$this->assign('sellcate', $sellcate);
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

        if(empty($uinfo['mycode'])){
            $uinfo['mycode']=make_coupon_card();
        }
        D('User')->where("id={$uid}")->save($uinfo);
        $this->assign('uinfo',$uinfo);
        //被邀请的人
        $yqUser=D('User')->where("invitecode='{$uinfo["mycode"]}'")->select();

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
            //得到消息
			$where['uid']=is_login();
            $message=M('message')->where($where)->select();

			$this->assign('message',$message);
            $this->display();
        }
    }

    //修改资料
    public function editdata()
    {
        if(IS_POST){
            $data = $_POST;
            
            $userData['id'] = $data['uid'];
            $userData['intro'] = $data['intro'];
            $userData['skilled_field'] = implode($data['tag'], ';');
            
            $userModel = D('User') ;
            $user_id = $userModel->register($userData);//user表插入
            
            $userinfoData['id'] = $data['info_id'];
            $userinfoData['aname'] = $data['aname'];
            
            $userinfoModel = D('Userinfo') ;
            $result = $userinfoModel->update($userinfoData);

            if($result){
                $this->redirect("Index/index");
            }else{
                $this->error($userinfoModel->getError());
            }
        }
		$id=I('id');
		if($id){
			$id=is_login();
		}
		if($id){
		    $prefix = C('DB_PREFIX');
		    $table = "user u";
		    $o_table = $prefix.'userinfo';
		    $join = array(
		        'left join '.$o_table . ' info ON u.id=info.userid',
		    );
		    $field = "u.*,info.id as uid,info.userid,info.isme,info.aname,info.address,info.idcode,info.khname,info.yhcode,info.ename,info.oprange,info.mproduct,info.tuser,info.midea,info.blicense";
		    $uinfo =  M()->table($table)->join($join)->where(array('u.id'=>$id))->field($field)->find();
		    
		    //获取标签
		    $this->assign('tag',explode(';', $uinfo['skilled_field']));
		    $this->assign('uinfo',$uinfo);
		}
		$cate = C('cate');
		$this->assign('cate',$cate);

        $this->display();
    }

    //修改email
    public function editmail()
    {	if(IS_POST){
			$uid=$_POST['id'];
			$data=array(
				'email'=>$_POST['email']
			);
			D('Author')->where("id={$uid}")->save($data);
			$this->redirect('MyCenter/editdata/id/{$uid}');
		}else{
			$uid=I('id');
			$this->assign('uid',$uid);
			$this->display();
		}
    }

    //修改地址
    public function editaddress()
    {
		if(IS_POST){
			$uid=$_POST['id'];
			$data=array(
				'address'=>$_POST['address']
			);
			D('Author')->where("id={$uid}")->save($data);
			$this->redirect('MyCenter/editdata/id/{$uid}');
		}else{
			$uid=I('id');
			$this->assign('uid',$uid);
			$this->display();
		}
    }

    //修改头像
    public function editphoto()
    {	 $uid=I('id');
		if(empty($uid)){
			$uid=is_login();
		}
		if(IS_POST){
			$config = array(
				'maxSize'    =>    3145728,
				'rootPath'   =>    './uploads/headerimg/',
				'savePath'   =>    '',
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    true,
				'subName'    =>    array('date','Ymd'),
			);
			$upload = new \Think\Upload($config);// 实例化上传类
			// 上传单个文件
			$info   =   $upload->uploadOne($_FILES['photo']);
			if(!$info) {// 上传错误提示错误信息
				$this->error($upload->getError());
			}
//else{// 上传成功 获取上传文件信息
//				echo $info['savepath'].$info['savename'];
//			}
			$data=array(
				'header_img'=>'/uploads/headerimg/'.$info['savepath'].$info['savename']
			);
			D('Author')->where("id={$uid}")->save($data);
			$this->redirect('MyCenter/editdata/id/'.is_login());
		}else{
        	$this->assign('uid',$uid);
        	$this->display();
		}
    }

    //upload
    public function upload()
    {
		$targetDir = './uploads/upload_tmp';
		$uploadDir = './uploads/comic/'.date('Ymd',time());
		$cleanupTargetDir = true; // Remove old files
		$maxFileAge = 5 * 3600; // Temp file age in seconds
		if (!is_dir($targetDir)) {
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
        $user_id =is_login();
        $uinfo=D('Author')->getUserInfo($user_id);
        $data['2cy_order.user_id']=$user_id;
        $data['2cy_order.work_id']=array('gt',0);
        $paytype=I('get.paytype');
        if($paytype!=null){
            if($paytype>=0){
                $data['2cy_order.order_type'] = $paytype;
            }
        }
        if(empty($user_id)) {
            $paytype=I('get.paytype');
            if($paytype){
                session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME.'/paytype/'.$paytype);
            }else{
                session('PRI_URL', CONTROLLER_NAME . '/' . ACTION_NAME);
            }
            $this->redirect("Login/login");
        
        }
        $orderModel =D('Order');
        $count      = $orderModel->where($data)->count();
        $pageshowcount=5;
        $Page       = new Page($count,$pageshowcount);
        $show       = $Page->pageshow();
        $orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.work_title,2cy_order.work_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,works_comic.main_image_url,works_comic.tags,works_comic.theme,works_comic.show,works_comic.create_status")->join('left join works_comic on 2cy_order.work_id = works_comic.id')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
        $this->assign('userid',$user_id);
        $tags=C('tag');
        $this->assign('tags',$tags);
        $show1=C('show');
        $this->assign('show1',$show1);
        $theme=C('theme');
        $this->assign('theme',$theme);
        $paytype=C('paystatus');
        $this->assign('orderList',$orderList);
        $this->assign('paytype',$paytype);
        $this->assign('order_type',$data['2cy_order.order_type']);
        $this->assign('show',$show);
   
        $this->assign('uinfo',$uinfo[0]);
        $this->display();
    }
    /**
     * 用户中心的定制订单列表
     */
    public function ordercustomlist(){
        $user_id =is_login();
        $uinfo=D('Author')->getUserInfo($user_id);
        $data['2cy_order.user_id']=$user_id;
        $data['2cy_order.custom_id']=array('gt',0);
        if(empty($user_id)) {
            $this->assign ( 'message', '请登录后再操作' );
            $this->display('Public/error');
            exit();
        }
        $paytype=I('get.paytype');
        if($paytype!=null){
            if($paytype>=0){
                $data['2cy_order.order_type'] = $paytype;
            }
        }
        $orderModel =D('Order');
        $count      = $orderModel->where($data)->count();
        $pageshowcount=5;
        $Page       = new Page($count,$pageshowcount);
        $show       = $Page->pageshow();
        $orderList = $orderModel->field("2cy_order.user_id,2cy_order.order_type,2cy_order.auther,2cy_order.auther_id,2cy_order.work_title,2cy_order.custom_id,2cy_order.pay_money,2cy_order.money,2cy_order.order_id,2cy_order.order_number,2cy_order.create_date,2cy_custom.imgurl,2cy_custom.theme,2cy_custom.style,2cy_custom.endtime,2cy_custom.imgclass,2cy_custom.theme,2cy_custom.dismode,2cy_custom.mode,2cy_custom.cusstatus")->join('left join 2cy_custom on 2cy_order.custom_id = 2cy_custom.cusid')->order('create_date desc')->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
        
        $this->assign('userid',$user_id);
        $paytype=C('paystatus');
        $this->assign('orderList',$orderList);
        $this->assign('paytype',$paytype);
        $this->assign('order_type',$data['2cy_order.order_type']);
        $this->assign('show',$show);
        $this->assign('uinfo',$uinfo[0]);
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
   public function delimg(){
   		$userid=is_login();
   		$id=I('get.id',0);
   		if($id){
   			$data['id']=$id;
   			$img=D('img')->where($data)->find();
   			if($img['user_id']==$userid){	
   				D('img')->where($data)->delete();
   				die('{"stuat" : "1"}');
   			}
   		}
   }

    
    public function uploadbg()
    {
        $targetDir = './uploads/upload_tmp';
        $uploadDir = './uploads/back/'.date('Ymd',time());
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds
        if (!is_dir($targetDir)) {
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
            //             die($uploadPath);
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
        $uploadDir = substr($uploadDir, 1);
        $pic = $uploadDir.'/'.$fileNamed.'.'.$end;
        //插入数据库
        $user_id = is_login();
        D('user')->where(array('id'=>$user_id))->save(array('back_img'=>$pic));
        die('{"jsonrpc" : "2.0", "result" : "'.$fileNamed.'", "postfix" : "'.$end.'","pic":"'.$pic.'"}');
    }
}
