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
use Think\Page;

class AuthorController extends HomeController {
    public function index() {
        //形象最低接单金额
        $uinfo[0]['minmoney']='300';

        $this->assign('uinfo',$uinfo[0]);

        $this->assign('uid',is_login());

        $address=I('address');
        if($address!='全部地区'){
            $data['address']=$address;
        }else{
            unset($data);
        }
        $od=I('order');
        switch ($od)
        {
            case '最新加入':
                $order='create_date desc,id desc';
                break;
            case '人气最高':
                $order='pop_count asc,id desc';
                break;
            case '粉丝最多':
                $order='fans_count asc,id desc';
                break;
            case '作品最多':
                $order='work_count desc,id desc';
                break;
            case '成交量最多':
                $order='create_date desc,id desc';
                break;
            case '诚信度最高':
                $order='create_date desc,id desc';
                break;
            default:
                $order='create_date desc,id desc';
        }

        //作者
        $acount=D('Author')->where($data)->count();
        $pageshowcount=8;
        $Page       = new Page($acount,$pageshowcount);
        $show   = $Page->pageshow();
        $author=D('Author')->order($order)->where($data)->limit($Page->firstRow.','.$Page->listRows)->select();
       // dump($show);
        $this->assign('author',$author);
        $this->assign('show',$show);
        $this->display();
    }
    public function details($id=null){
        $toid=I('toid');
        $uinfo=D('Author')->getUserInfo($id);

        //作品标签
        $tags=D('Tags')->getTags();
        $this->assign('zttag',$tags);

        //作品
        $uwork=D('Works')->getUserWorks($id);
        //收藏作品
        $uswork=D('Works')->getUserSWorks($id);
        //形象最低接单金额
        $uinfo[0]['minmoney']='300';
        //作品
        $uinfo[0]['workcount']=count($uwork);
        //Ul最小高度
        $ulheight=ceil(count($uwork)/4)*387;
        $this->assign('ulheight',$ulheight);
        //成交量
        $uinfo[0]['customcount']='56';
        $this->assign('uwork',$uwork);
        $this->assign('uswork',$uswork);
        $this->assign('uinfo',$uinfo[0]);
        $this->assign('toid',$toid);
        //作者
        $author=D('Author')->getAllAuthor();
        $this->assign('author',$author);
        $this->assign('islogin',is_login());


        $this->display();
    }
    public function pAuthorReg(){
        $isno=I('isno');
        $data = I('get.');//获取所有页面传递过来的参数
        unset($data['__hash__']);
        if(!empty($data) && strlen($isno)==0){

            if(!checkMobile($data['phone'])){//匹配手机号
                $this->error('手机号格式不符合要求');
            }
            if(check_verify($data['verify']) == false){//匹配验证码
                $this->error('验证码错误');
            }
            if($data['password'] != $data['confirm']){
                $this->error('两次输入密码不同');
            }
            if(empty($data['ready'])){
                $this->error('已阅读版权必选');
            }
            
            //组织页面注册数据
            $userData['user_name'] = $data['username'];
            $userData['nick_name'] = $data['name'];
            $userData['mobile'] = $data['phone'];
            $userData['author_flag'] = 1;
            $userData['password'] = strtoupper(md5($data['password']));
            $userData['email'] = $data['mail'];
            $userData['create_date'] = date('Y-m-d H:i:s',time());
            $userData['address'] = $data['address'];
            $userData['level'] = 0 ;
            $userData['sign_contract_flag'] = 0 ;
            $userData['skilled_field'] = $data['tags'];
            $userData['email_verified'] = 0 ;
            $userData['mobile_verified'] = 0 ;
            $userData['invitecode'] = $data['invite'];
            $userData['mycode'] = make_coupon_card();//自己的邀请码
            $userData['status'] = 1;
            $userModel = D('User') ;
            $user_id = $userModel->register($userData);//user表插入
//             $user_id = 6872 ;
            if($user_id){
                //插入user_info
                $infoData['userid'] = $user_id ;
                $infoData['isme'] = 0 ;
                $infoData['aname'] = $data['name'];
                $infoData['phone'] = $data['phone'];
                $infoData['address'] = $data['address'];
                $infoData['idcode'] = $data['idcard'];
                $infoData['khname'] = $data['bank'];
                $infoData['yhcode'] = $data['number'];         
                //插入作者详细信息表
                $userinfoModel = D('Userinfo') ;
                $result = $userinfoModel->update($infoData);
                if($result){
                    $this->redirect("Login/login");
                }else{
                    $this->error($userinfoModel->getError());
                }  
            }else{
                $this->error($userModel->getError());
            }
        }
        $tag = C('cate');
        $this->assign('tag',$tag);//标签
        $this->assign('isno',$isno);
        $this->display();
    }
    public function eAuthorReg(){
        $isno=I('isno');
        $data = I('get.');//获取所有页面传递过来的参数

        unset($data['__hash__']);
        if(!empty($data) && strlen($isno)==0){
            if(!checkMobile($data['phone'])){//匹配手机号
                $this->error('手机号格式不符合要求');
            }
            if(empty($data['name'])){
                $this->error('用户名必填');
            }
            if(empty($data['address'])){
                $this->error('地址必填');
            }
            if(empty($data['mail'])){
                $this->error('邮箱必填');
            }
            if(empty($data['company'])){
                $this->error('公司名称必填');
            }
            if(empty($data['sht'])){
                $this->error('营业执照必填');
            }
            if(empty($data['tags'])){
                $this->error('标签必选');
            }
            
            if(check_verify($data['verify']) == false){//匹配验证码
                $this->error('验证码错误');
            }
            if($data['password'] != $data['confirm']){
                $this->error('两次输入密码不同');
            }
            if(empty($data['ready'])){
                $this->error('已阅读版权必选');
            }
            
            //组织页面注册数据
            $userData['user_name'] = $data['company'];
            $userData['nick_name'] = $data['name'];
            $userData['mobile'] = $data['phone'];
            $userData['author_flag'] = 1;
            $userData['password'] = strtoupper(md5($data['password']));
            $userData['email'] = $data['mail'];
            $userData['create_date'] = date('Y-m-d H:i:s',time());
            $userData['address'] = $data['address'];
            $userData['level'] = 0 ;
            $userData['sign_contract_flag'] = 0 ;
            $userData['skilled_field'] = $data['tags'];
            $userData['email_verified'] = 0 ;
            $userData['mobile_verified'] = 0 ;
            $userData['invitecode'] = $data['invite'];
            $userData['mycode'] = make_coupon_card();//自己的邀请码
            $userData['status'] = 1;
            $userModel = D('User') ;
            
            
            $user_id = $userModel->register($userData);//user表插入
//             echo $userModel->getLastSql();dump($userData);die();
            //$user_id = 6872 ;
            if($user_id){
                //插入user_info
                $infoData['userid'] = $user_id ;
                $infoData['isme'] = 1 ;
                $infoData['aname'] = $data['name'];
                $infoData['phone'] = $data['phone'];
                $infoData['address'] = $data['address'];
                $infoData['ename'] = $data['company'];
                $infoData['oprange'] = $data['scope'];
                $infoData['mproduct'] = $data['product'];
                $infoData['tuser'] = $data['user'];
                $infoData['midea'] = $data['idea'];
                $infoData['blicense'] = $data['sht'][0];
                //插入作者详细信息表
                $userinfoModel = D('Userinfo') ;
                $result = $userinfoModel->update($infoData);
                if($result){
                    $this->redirect("Login/login");
                }else{
                    $this->error($userinfoModel->getError());
                }
            }else{
                $this->error($userModel->getError());
            }
        }
        
        $tag = C('cate');
        $this->assign('tag',$tag);//标签
        $this->assign('isno',$isno);
        $this->display();
    }
    
    public function upload()
    {
        $targetDir = './uploads/upload_tmp';
        $uploadDir = './uploads/author/'.date('Ymd',time());
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
        die('{"jsonrpc" : "2.0", "result" : "'.$fileNamed.'", "postfix" : "'.$end.'","pic":"'.$pic.'"}');
    }
}
