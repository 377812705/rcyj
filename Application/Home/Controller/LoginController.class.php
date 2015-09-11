<?php
namespace Home\Controller;

use User\Api\UserApi;
use Vendor\sms\SendSMS;
class LoginController extends HomeController
{

    public function index()
    {

    }

    /* 注册页面 */

    public function register()
    {
        //dump($_POST);
        if (IS_POST) {
            $model = D('User');
            if ($model->autoCheckToken($_POST)) {
                // 令牌验证错误
                $_POST['password'] = strtoupper(md5($_POST['password']));
                $data = $_POST;

//                 if(empty($data['verify'])){
//                     $this->error('验证码必填');
//                 }
//                 if(check_verify($data['verify']) != true){//匹配验证码
//                     $this->error('验证码错误');
//                 }
                if(!checkMobile($data['mobile'])){//匹配手机号
                    $this->error('手机号格式不符合要求');
                }
                unset($data['verify']);
                $data['mycode'] = make_coupon_card();//自己的邀请码
                $data['create_date'] = date('y-m-d h:i:s', time());
                $data['invitecode'] = $data['invite'];
                unset($data['invite']);
                $model->add($data);
                $this->redirect("Login/login");
            } else {
                $this->redirect("Login/register");
            }
        } else {
            $this->display("Login/register");
        }
    }

    public function register0()
    {
        $Model = M('test', null);
        $data = array(
            'mobile' => '11111111',
            'password' => '123145611111',
            'createtime' => date('y-m-d h:i:s', time())
        );
        $Model->data($data)->add();
        echo 'ok';
        // $this->display("Index/index");
    }

    public function register1()
    {
        $Model = M('test', null);
        $Model->create();
        $Model->add();
        $this->display("Index/index");
    }

    //发送验证码
    public function sendCode()
    {
        $CheckCode = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

        $mobile = I('mobile');
        if(!checkMobile($mobile)){
            $data1 = array('status'=>-1,'msg'=>'无效的手机号码');
            $this->ajaxReturn($data1);
        }
        //判断手机号是否已经注册过
        $Model = M('user', null);
        $data = $Model->where("mobile='" . $mobile . "'")->select();
        if (0 < count($data)) {
            $data1 = array('status'=>-1,'msg'=>'手机号已存在');
            $this->ajaxReturn( $data1 );
        } else {
            $sendsms = new \Vendor\sms\SendSMS();
            //("13800000000" ,array('6532','5'),"1");
            $result = $sendsms->sendTemplateSMS($mobile, array($CheckCode, '5'), "10249");
            $verify = new \Think\Verify();
            $rs = $verify->entry('',$CheckCode);
            //保存记录
            if ($result->statusCode == '000000') {
                $mvcode = D('Mobilevcode');
                $data['mobile'] = $mobile;
                $data['vcode'] = $CheckCode;
                $data['telmpno'] = "10249";
                $data['statuscode'] = $result->statusCode;
                $smsmessage = $result->TemplateSMS;
                $data['smsMessageSid'] = $smsmessage->smsMessageSid;
                $data['dateCreated'] = $smsmessage->dateCreated;
                $mvcode->send($data);
            }
            $data1 = array('status'=>1,'msg'=>'验证码已经发送');
            $this->ajaxReturn($data1);
        }


    }

    /**
     * 登陆检测手机号是否存在
     * @param type $mobile
     */
    public function checkMobile($mobile = '')
    {
        //$mobile=I('mobile');
        $Model = M('user', null);
        $data = $Model->where("mobile='{$mobile}'")->count();
        if (0 < $data) {
            $this->ajaxReturn(TRUE);
            //echo TRUE;
        } else {
            //return TRUE;
            $this->ajaxReturn(FALSE);
        }
    }

    /**
     * 注册检测手机号是否存在
     * @param type $mobile
     */
    public function rcheckMobile($mobile = '')
    {
        //$mobile=I('mobile');
        $Model = M('user', null);
        $data = $Model->where("mobile='{$mobile}'")->count();
        if (0 < $data) {
            $this->ajaxReturn(FALSE);
            //echo TRUE;
        } else {
            //return TRUE;
            $this->ajaxReturn(TRUE);
        }
    }

    /**
     * 注册检测用户名是否存在
     * @param type $user_name
     */
    public function rcheckUserName($user_name = '')
    {
        //$mobile=I('mobile');
        $Model = M('user', null);
        $data = $Model->where("user_name='{$user_name}'")->count();
        if (0 < $data) {
            $this->ajaxReturn(FALSE);
            //echo TRUE;
        } else {
            //return TRUE;
            $this->ajaxReturn(TRUE);
        }
    }

    /**
     * 验证手机号是否正确
     * @author
     * @param INT $mobile
     */
    public function isMobile($mobile)
    {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }
    
    /**
    * 检测
    * @param
    * @date: 2015年9月8日 下午4:44:47
    * @author: yql
    * @version: 3.0.0
    */
    public function checkReg(){
        $data = I('post.');

        $mobile = $data['mobile'];
        if (!is_numeric($mobile)) {
            $data1 = array('status'=>-1,'msg'=>'手机号必须是数字');
            $this->ajaxReturn($data1);
        }

        $rs = preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile);
        if($rs == 0){
            $data1 = array('status'=>-1,'msg'=>'无效的手机号码');
            $this->ajaxReturn($data1);
        }else{//手机号是否已注册
            $Model = M('user', null);
            $count = $Model->where("mobile='{$mobile}'")->count();
            
            if($count > 0){
                $data1 = array('status'=>-1,'msg'=>'手机号已存在');
                $this->ajaxReturn($data1);
            }
        }
        
        /*$verify = $data['verify'];
        if(!is_numeric($verify)){
            $data1 = array('status'=>-1,'msg'=>'验证码必须是数字');
            $this->ajaxReturn($data1);
        }

        $my_verify = M('MobileVcode',null)->where(array('mobile'=>$mobile))->order('id desc')->getField('vcode');

        if($verify != $my_verify){//匹配验证码
            $data1 = array('status'=>-1,'msg'=>'验证码错误');
            $this->ajaxReturn($data1);
        }*/
        
        if($data['sgin'] == 1){//有营业执照页面的
            if(empty($data['vimg'])){
                $data1 = array('status'=>-1,'msg'=>'营业执照必填');
                $this->ajaxReturn($data1);
            }
        }
        $data1 = array('status'=>1);
        $this->ajaxReturn($data1);  
    }
    

    /* 忘记密码 */

    public function forgetpass()
    {
        $this->display("Login/forgetpass");
    }

    /* 登录页面 */

    public function login()
    {
        if (IS_POST) {
            //初期为了适应老用户，可使用多种方式登录，运营一段时间切换为只能手机号登录
            $map['mobile|user_name|email'] = I('mobile');
            $Model = M('user', null);
            $data = $Model->where($map)->find();
            
            // $this->assign("mobile", "欢迎".$data[0]["user_name"]."光临二次元界！");
            $password = I('password');
            if (0 < count($data)) {
                if (strtoupper(md5($password)) == $data["password"]) {
                    //记录登陆历史
                    /* 更新登录信息 */
                    $user = array(
                        'id' => $data["id"],
                        'last_login_date' => date("Y-m-d h:i:s"),
                    );
                    M('user', null)->save($user);
                    //保存session
                    $auth = array(
                        'uid' => $data["id"],
                        'username' => $data["user_name"],
                        'last_login_time' => date("Y-m-d h:i:s"),
                    );
                    session('user_auth', $auth);
                    session('user_auth_sign', data_auth_sign($auth));

                    $priurl = session('PRI_URL');
                    if (empty($priurl)) {
                        //跳转到主页
                        $this->redirect("Index/index");
                    } else {
                        $this->redirect($priurl);
                    }
                } else {
                    //$this->error($data[0]["password"].'----');
                    $this->assign('msginfo', '用户名密码错误');

                    $this->display("Login/login");
                }
            } else {
                $this->assign('msginfo', '用户不存在');
                $this->display("Login/login");
            }
        } else {
            $this->display("Login/login");
        }
    }

    public function loginout()
    {
        session('user_auth', null);
        session('user_auth_sign', null);
        session('PRI_URL', null);
        $this->redirect("Index/index");
    }

    public function thridlogin($type = null) {
        empty($type) && $this->error('参数错误');
        import('Org.ThinkSDK.ThinkOauth');


        $sns = \ThinkOauth::getInstance($type);
//echo $sns->getRequestCodeURL();exit;
//        //跳转到授权页面
        redirect($sns->getRequestCodeURL());
    }

    public function callback($type = null, $code = null) {
        header("Content-type: text/html; charset=utf-8");
        (empty($type) || empty($code)) && $this->error('参数错误');
        import('Org.ThinkSDK.ThinkOauth');
        $sns = \ThinkOauth::getInstance($type);

        //腾讯微博需传递的额外参数
        $extend = null;
        if ($type == 'tencent') {
            $extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
        }
        $tokenArr = $sns->getAccessToken($code, $extend);
        $openid = $tokenArr['openid'];
        $token = $tokenArr['access_token'];
        setSessionCookie("openid", $openid);
        setSessionCookie("access_token", $token);
//        $con = "openid:".$openid."\n"."token".$token;
//	file_put_contents("1.txt", $con);
        //获取当前登录用户信息
        if ($openid) {
            $field = strtolower($type);
            setSessionCookie("field", $field);
            $userinfo = M("thirduser")->field('id,name')->where("" . $field . "= '" . $openid . "'")->find();

            if ($userinfo) { //若是有该账号就登录
                setSessionCookie("userid", $userinfo['id']);
                setSessionCookie("username", $userinfo['name']);
                echo "<script>document.location.href='" . __APP__ . "';</script>";
                exit;
            } else { //没有的话绑定
                $userid = getSessionCookie('userid');
                $username = getSessionCookie('username');
                if ($userid != '' && $username != '') { //用户已登录，自动绑定
                    //绑定账号
                    M('user')->where("id = " . $userid . "")->save(array($field => $openid));
                    emptySessionCookie('type');
                    emptySessionCookie('openid');
                    $this->success("绑定成功！", "/");
                } else { //用户未登录，跳转到绑定页面
                    if ($filed == 'qq') { //针对新版qq互联在绑定页，要显示昵称，否则不通过***
                        $data = $sns->call('user/get_user_info');
                        $nickname = $data['nickname'];
                    } else {
                        $userinfo = A('Type', 'Event')->$type($tokenArr);
                        $nickname = $userinfo['name'];
                    }
                    setSessionCookie('nickname', $nickname);
                    $this->redirect("Index/bind");
                }
            }
        } else {
            echo "<script>alert('系统出错;请稍后再试！');document.location.href='" . __APP__ . "';</script>";
        }
    }
}
