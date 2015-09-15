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
                $custom['imgurl']=$_POST['imgurl'];
                if($custom['imgclass']=='卡通'){
                    if($_POST["cusissue3"]){
                        $custom['cusissue']=$_POST['cusissue1'].$_POST['cusissue2'].implode($_POST['cusissue3']," ");
                    }else{
                        $custom['cusissue']=$_POST['cusissue1'].$_POST['cusissue2'];
                    }
                }else{
                    $custom['cusissue']="";
                }

                if($custom['themedesc']=='写出您订制用途的描述，例如：能够代表我们公司的吉祥物，更多充分的展现我们公司的文化发展等。'){
                    $custom['themedesc']='';
                }
                if($custom['cusdesc']=='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。'){
                    $custom['cusdesc']='';
                }
                $custom['cusid'] = $model->add($custom);
                $this->orderConfim($custom);

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
    public function orderConfim($custom=null)
    {
           // $model = D('Custom');
       // if ($model->autoCheckToken($_POST)) {
            //$custom = $_POST;
            //$custom['orderid']=time().is_login().$custom['cusid'];
            //$custom['cusstatus']=2;
           // $model->where("cusid={$custom['cusid']}")->save($custom);

            if(isset($custom['touid'])){
                $gdata=array(
                    "uid"=>$custom['touid'],
                    "cusid"=>$custom['cusid']
                );

                $gmodel=M('grab');
                $gmodel->add($gdata);

                //订制需求信息
                $cinfo=D('Custom')->getOrderCustomByid($gdata['cusid']);

                //抢单者信息
                $uinfo=D('Author')->find($gdata['uid']);

                //订制需求者信息
                $cuinfo=D('Author')->find($gdata['uid']);

                $amsg=array(
                    'uid'=>$_POST['uid'],
                    'content'=>"您被选择为订制需求<<{$cinfo['cusname']}>>进行制作。"
                );
                M('message')->add($amsg);

                //定制短信发送--订制通知--通知作者需求者喜欢，希望其能接单
                $uinfo['nick_name'] = getUserNameById($gdata['uid']);
                
                //获取需求编号
                $prefix = C('DB_PREFIX');
                $table = $prefix."custom c";
                $o_table = $prefix.'order';
                $u_table = 'user';
                $join = array(
                    'left join '.$o_table . ' o ON c.cusid=o.custom_id',
                );
                $user_id = is_login();
                $field = "o.order_number";
                $custom_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$gdata['cusid']))->field($field)->find();
                 
                //作者不接单通知--短信通知
                $order_id = substr($custom_info['order_number'], -1 -8);
                sendSms($uinfo['mobile'], '35692', array($order_id , $uinfo['nick_name']));

                
                $cmsg=array(
                    'uid'=>$cinfo['uid'],
                    'content'=>"您的订制需求<<{$cinfo['cusname']}>>选择了作者<<{$uinfo['nick_name']}>>为此制作。"
                );
                M('message')->add($cmsg);
            }
            
            $this->redirect("Order/makeCustomOrder/customid/{$custom['cusid']}");
//        }else{
//            $this->redirect("Custom/index");
//        }


    }
    public function upload(){
        //$this->ajaxReturn($_FILES);
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './uploads/custom/',
            'savePath'   =>    '',
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        );

        $upload = new \Think\Upload($config);// 实例化上传类
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
            //得到订制者明细
            $cuinfo=D('Author')->find($custom['uid']);
            $custom['diffday']=floor((strtotime($custom['endtime'])-strtotime($custom['starttime']))/86400);
            $cstatus=array('已接单','已过期','已上传作品');
            if(in_array($custom['cusstatus'],$cstatus)){
                $this->assign('isgrab',-1);
            }elseif($custom['touid']>0){
                $this->assign('isgrab',-1);
            }elseif($custom['uid']==is_login()){
                $this->assign('isgrab',-1);
            }else{
                $this->assign('isgrab',isgrab(is_login(),$cusid));
            }

            $this->assign('custom',$custom);
            $this->assign('cuinfo',$cuinfo);

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
    	getUserAuthercheak(is_login());
        $model=M('grab');
        $model->add($_POST);

        //订制需求信息
        $cinfo=D('Custom')->getOrderCustomByid($_POST['cusid']);

        //抢单者信息
        $uinfo=D('Author')->find($_POST['uid']);

        //订制需求者信息
        $cuinfo=D('Author')->find($cinfo['uid']);

        $amsg=array(
            'uid'=>$_POST['uid'],
            'content'=>"您对订制需求<<{$cinfo['cusname']}>>进行了抢单。"
        );
        M('message')->add($amsg);
        
        $uinfo['nick_name'] = getUserNameById($_POST['uid']);
        $cmsg=array(
           'uid'=>$cinfo['uid'],
            'content'=>"您的订制需求<<{$cinfo['cusname']}>>被作者<<{$uinfo['nick_name']}>>抢单了。"
        );
        M('message')->add($cmsg);
        
        
        //获取需求编号
        $prefix = C('DB_PREFIX');
        $table = $prefix."custom c";
        $o_table = $prefix.'order';
        $u_table = 'user';
        $join = array(
            'left join '.$o_table . ' o ON c.cusid=o.custom_id',
        );
        $user_id = is_login();
        $field = "o.order_number";
        $custom_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$_POST['cusid']))->field($field)->find();
        
        //抢单通知
        $order_id = substr($custom_info['order_number'], -1 -8);
        sendSms($cuinfo['mobile'], '35768', array($order_id));

        $this->ajaxReturn('已抢单');
    }

    /**
    * 企业定制注册
    * @param
    * @date: 2015年8月31日 下午6:49:02
    * @author: yql
    * @version: 3.0.0
    */
    public function pCustomReg()
    {
        $isno=I('isno');
        $data = I('get.');//获取所有页面传递过来的参数
        unset($data['__hash__']);
        if(!empty($data) && strlen($isno)==0){
        
            if(!checkMobile($data['phone'])){//匹配手机号
                $this->error('手机号格式不符合要求');
            }
//             if(empty($data['verify'])){
//                 $this->error('验证码必填');
//             }
//             if(check_verify($data['verify']) != true){//匹配验证码
//                 $this->error('验证码错误');
//             }
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
            $userData['email_verified'] = 0 ;
            $userData['mobile_verified'] = 0 ;
            $userData['invitecode'] = $data['invite'];
            $userData['status'] = 1;
            $userData['mycode'] = make_coupon_card();//自己的邀请码
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
        $this->assign('isno',$isno);
        $this->display();
    }

    /**
    * 企业定制注册
    * @param
    * @date: 2015年8月31日 下午6:51:38
    * @author: yql
    * @version: 3.0.0
    */
    public function eCustomReg(){
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
            if(empty($data['company'])){
                $this->error('公司名称必填');
            }
            if(empty($data['sht'])){
                $this->error('营业执照必填');
            }
//             if(empty($data['verify'])){
//                 $this->error('验证码必填');
//             }
//             if(check_verify($data['verify']) != true){//匹配验证码
//                 $this->error('验证码错误');
//             }
            if($data['password'] != $data['confirm']){
                $this->error('两次输入密码不同');
            }
            if(empty($data['ready'])){
                $this->error('已阅读版权必选');
            }
            
            //组织页面注册数据
            $userData['user_name'] = $data['name'];
            $userData['nick_name'] = $data['username'];
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
            $userData['status'] = 1;
            $userData['mycode'] = make_coupon_card();//自己的邀请码
            $userModel = D('User') ;
            $user_id = $userModel->register($userData);//user表插入
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
        $this->assign('isno',$isno);
        $this->display();
    }
    /**
    * 个人定制注册
    * @param
    * @date: 2015年8月31日 下午6:58:46
    * @author: yql
    * @version: 3.0.0
    */
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
                "auther_id"=>I('user_id')
            );

            //订制需求信息
            $cinfo=D('Custom')->getOrderCustomByid($cusid);
            //抢单者信息
            $uinfo=D('Author')->find($data['auther_id']);
            //订制需求者信息
            $cuinfo=D('Author')->find($cinfo['uid']);
            $amsg=array(
                'uid'=>$data['auther_id'],
                'content'=>"您被<<{$cuinfo['nick_name']}>>选中为订制需求<<{$cinfo['cusname']}>>进行制作。抢单成功！"
            );
            M('message')->add($amsg);
            
            //抢单成功--发送短信
            
            //获取需求编号
            $prefix = C('DB_PREFIX');
            $table = $prefix."custom c";
            $o_table = $prefix.'order';
            $u_table = 'user';
            $join = array(
                'left join '.$o_table . ' o ON c.cusid=o.custom_id',
            );
            $user_id = is_login();
            $field = "o.order_number";
            $custom_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$cusid))->field($field)->find();
            
            //作者主动申请被选中
            $order_id = substr($custom_info['order_number'], -1 -8);
            sendSms($uinfo['mobile'], '35735', array($order_id));
            
            $cmsg=array(
                'uid'=>$cinfo['uid'],
                'content'=>"您已经选中<<{$uinfo['nick_name']}>>为订制需求<<{$cinfo['cusname']}>>进行制作。"
            );
            M('message')->add($cmsg);

            M('order')->where("custom_id='{$cusid}'")->save($data);
            $custom['cusstatus']=2;
            D('Custom')->where("cusid={$cusid}")->save($custom);
            $this->redirect('Order/ordercustomlist');
        }else{
            $cusid=I('cusid');
            $sql="select ga.cusid,u.id,u.user_name,u.nick_name,u.header_img,u.tags_content,u.address,u.pop_count,u.fans_count,u.work_count from 2cy_grab as ga join user as u on ga.uid=u.id where ga.cusid={$cusid} and u.id != (select uid from 2cy_custom where cusid= ga.cusid) order by u.fans_count desc,id desc limit 6";
            $qduser=M()->query($sql);
            $umodel=M('user',null);
            $tjuser=$umodel->order('pop_count desc,id desc')->limit(6)->select();
            $this->assign('qduser',$qduser);
            $this->assign('tjuser',$tjuser);
            $this->assign('cusid',$cusid);
            $this->display();
        }
    }

    public function noorder(){
        $cusid=I('cusid');
        $data=array(
            "auther_id"=>'',
            "auther"=>""
        );
        M('order')->where("custom_id='{$cusid}'")->save($data);
        $cdata=array(
            "touid"=>0
        );
        D('Custom')->where("cusid={$cusid}")->save($cdata);


        //订制需求信息
        $cinfo=D('Custom')->getOrderCustomByid($cusid);
        //抢单者信息
        $uinfo=D('Author')->find(is_login());
        //订制需求者信息
        $cuinfo=D('Author')->find($cinfo['uid']);
        $amsg=array(
            'uid'=>$data['user_id'],
            'content'=>"您选择不为订制需求<<{$cinfo['cusname']}>>进行制作。"
        );
        M('message')->add($amsg);
        $uinfo['nick_name'] = getUserNameById(is_login());
        $cmsg=array(
            'uid'=>$cinfo['uid'],
            'content'=>"<<{$uinfo['nick_name']}>>选择不为订制需求<<{$cinfo['cusname']}>>进行制作。"
        );
        M('message')->add($cmsg);
        
        //获取需求编号
        $prefix = C('DB_PREFIX');
        $table = $prefix."custom c";
        $o_table = $prefix.'order';
        $u_table = 'user';
        $join = array(
            'left join '.$o_table . ' o ON c.cusid=o.custom_id',
        );
        $user_id = is_login();
        $field = "o.order_number";
        $custom_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$cusid))->field($field)->find();
        
        //作者不接单通知--短信通知
        $order_id = substr($custom_info['order_number'], -1 -8);
        sendSms($cuinfo['mobile'], '35769', array($order_id,$uinfo['nick_name']));
        
        $this->redirect("/Order/grabcustomlist");
    }
    public function conorder(){
    	$cusid=I('cusid');
    	$cdata=array(
    			"touid"=>is_login(),
    			"cusstatus"=>3
    
    	);
    	D('Custom')->where("cusid={$cusid}")->save($cdata);
    
    
    	//订制需求信息
    	$cinfo=D('Custom')->getOrderCustomByid($cusid);
    	//抢单者信息
    	$uinfo=D('Author')->find(is_login());
    	//订制需求者信息
    	$cuinfo=D('Author')->find($cinfo['uid']);
    	$amsg=array(
    			'uid'=>$data['user_id'],
    			'content'=>"您选择为订制需求<<{$cinfo['cusname']}>>进行制作。"
    	);
    	M('message')->add($amsg);
    	$uinfo['nick_name'] = getUserNameById($uinfo['id']);
    	$cmsg=array(
    			'uid'=>$cinfo['uid'],
    			'content'=>"<<{$uinfo['nick_name']}>>选择为订制需求<<{$cinfo['cusname']}>>进行制作。"
    	);
    	M('message')->add($cmsg);
    	//作者确认接单通知--短信通知
    	//获取需求编号
    	$prefix = C('DB_PREFIX');
    	$table = $prefix."custom c";
    	$o_table = $prefix.'order';
    	$u_table = 'user';
    	$join = array(
    	    'left join '.$o_table . ' o ON c.cusid=o.custom_id',
    	);
    	$user_id = is_login();
    	$field = "o.order_number";
    	$custom_info =  M()->table($table)->join($join)->where(array('c.cusid'=>$cusid))->field($field)->find();
    	
    	//作者不接单通知--短信通知	
    	$order_id = substr($custom_info['order_number'], -1 -8);
    	sendSms($cuinfo['mobile'], '34914', array($order_id , $uinfo['nick_name']));
    	
    	$this->redirect("/Order/grabcustomlist");
    }
}
