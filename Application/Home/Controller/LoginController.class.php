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
use Vendor\sms\SendSMS;

class LoginController extends HomeController {

    public function index() {
      
    }

    /* 注册页面 */

    public function register() {
        //dump($_POST);
        if(IS_POST){
            $model=D('User');
            if ($model->autoCheckToken($_POST)){
                // 令牌验证错误
                $_POST['password']=strtoupper(md5($_POST['password']));
                $model->add($_POST);
                $this->redirect("Login/login");
            }else{
            $this->redirect("Login/register");
            }
        }else{
            $this->display("Login/register");
        }
    }
    
    public function register0(){
        $Model = M('test', null);
        $data = array(
            'mobile'             => '11111111',
            'password'           => '123145611111',
            'createtime' => date('y-m-d h:i:s',time())
        );
        $Model->data($data)->add();
        echo 'ok';
       // $this->display("Index/index");
    }
    public function register1(){
        $Model = M('test', null);
        $Model->create();
        $Model->add();
        $this->display("Index/index");
    }
    //发送验证码
    public function sendCode(){
        $CheckCode= rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        
        $mobile=I('mobile');
        //判断是否是手机号
        $isMobileNO=$this->isMobile($mobile);
        if($isMobileNO){
            //判断手机号是否已经注册过
            $Model=M('user',null);
            $data=$Model->where("mobile='".$mobile."'")->select();
            if(0< count($data)){
                $this->ajaxReturn('手机号已经存在');
            }else{
                $sendsms=new \Vendor\sms\SendSMS();
                //("13800000000" ,array('6532','5'),"1");
                $result=$sendsms->sendTemplateSMS($mobile, array($CheckCode,'5'), "10249");
                //保存记录
                if($result->statusCode=='000000'){
                    $mvcode=M('mobilevcode');
                    $data['mobile']=$mobile;
                    $data['vcode']=$CheckCode;
                    $data['telmpno']="10249";
                    $data['statuscode']=$result->statusCode;
                    $smsmessage = $result->TemplateSMS;
                    $data['smsMessageSid']=$smsmessage->smsMessageSid;
                    $data['dateCreated']=$smsmessage->dateCreated;
                    $mvcode->data($data)->add();
                }
                $this->ajaxReturn('验证码已经发送');
            }
            
        }else{
            $this->ajaxReturn('不是有效手机号');
        }
        
        
    }
    /**
     * 登陆检测手机号是否存在
     * @param type $mobile
     */
    public function checkMobile($mobile=''){
        //$mobile=I('mobile');
        $Model=M('user',null);
        $data=$Model->where("mobile='{$mobile}'")->count();
        if(0 < $data){
            $this->ajaxReturn(TRUE);
            //echo TRUE;
        }else{
            //return TRUE;
             $this->ajaxReturn(FALSE);
        }
    }
    /**
     * 注册检测手机号是否存在
     * @param type $mobile
     */
    public function rcheckMobile($mobile=''){
        //$mobile=I('mobile');
        $Model=M('user',null);
        $data=$Model->where("mobile='{$mobile}'")->count();
        if(0 < $data){
            $this->ajaxReturn(FALSE);
            //echo TRUE;
        }else{
            //return TRUE;
             $this->ajaxReturn(TRUE);
        }
    }
      /**
     * 注册检测用户名是否存在
     * @param type $user_name
     */
    public function rcheckUserName($user_name=''){
        //$mobile=I('mobile');
        $Model=M('user',null);
        $data=$Model->where("user_name='{$user_name}'")->count();
        if(0 < $data){
            $this->ajaxReturn(FALSE);
            //echo TRUE;
        }else{
            //return TRUE;
             $this->ajaxReturn(TRUE);
        }
    }
    
    /**
    * 验证手机号是否正确
    * @author 
    * @param INT $mobile
    */
    public function isMobile($mobile) {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }

    /* 忘记密码 */

    public function forgetpass() {
        $this->display("Login/forgetpass");
    }

    /* 登录页面 */

    public function login() {
        if (IS_POST) {
            $map['mobile'] = I('mobile');
            $Model = M('user', null);
            $data = $Model->where($map)->select();
           // $this->assign("mobile", "欢迎".$data[0]["user_name"]."光临二次元界！");
            $password=I('password');
            if (0 < count($data)) {
                if (strtoupper(md5($password)) == $data[0]["password"]) {
                    //记录登陆历史
                    /* 更新登录信息 */
                    $user = array(
                        'id'             => $data[0]["id"],
                        'last_login_date' => date("Y-m-d h:i:s"),
                    );
                    M('user',null)->save($user);
                    //保存session
                    $auth = array(
                        'uid'             => $data[0]["id"],
                        'username'        => $data[0]["user_name"],
                        'last_login_time' => date("Y-m-d h:i:s"),
                    );
                    session('user_auth', $auth);
                    session('user_auth_sign', data_auth_sign($auth));

                    $priurl=session('PRI_URL');
                    if(empty($priurl)){
                    //跳转到主页
                        $this->redirect("Index/index");
                    }else{
                        $this->redirect($priurl);
                    }
                }else{
                    //$this->error($data[0]["password"].'----');
                    $this->assign('msginfo','用户名密码错误');
                    
                    $this->display("Login/login");
                }
            } else {
                $this->assign('msginfo','用户不存在');
                $this->display("Login/login");
            }
        } else {
            $this->display("Login/login");
        }
    }
    public function loginout(){
        session('user_auth', null);
        session('user_auth_sign', null);
        $this->redirect("Index/index");
    }
}
