<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keyword" content="">
<meta name="author" content="">
<title>二次元界</title>
<link rel="stylesheet" href="/Public/Home/css/base1.css" />
<link rel="stylesheet" href="/Public/Home/css/master.css" />
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/master.js"></script>
<!--[if lt IE 9]>
<script src="/Public/Home/js/html5shiv.min.js"></script>
<![endif]-->

    <script type="text/javascript" src="/Public/Home/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery.validator.addMethod("isMobile", function (value, element) {
            var length = value.length;
            var mobile = /^(((1[3578][0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            return this.optional(element) || (length == 11 && mobile.test(value));
        }, "请正确填写您的手机号码");
        $(function () {
            var err = 0;
            $(".login-btn").bind('click', function () {
                err = 0;
                $("#form0").submit();
            });
            $("#form0").validate({
                errorPlacement: function (error, element) {
                    if (err == 0) {
                        alert(error.html());
                        //element.focus();
                    }
                    err++;
                },
                rules: {
                    mobile: {
                        required: true,
                        isMobile: true,
                        remote: "<?php echo U('Login/checkMobile');?>"
                    },
                    password: {
                        rangelength: [6, 20]
                    }
                },
                messages: {
                    mobile: {
                        digits: "请输入有效手机号码",
                        required: "请填写手机号码",
                        remote: "账号不存在!"
                    },
                    password: {
                        required: "请输入密码!",
                        rangelength: "密码必须是6到20个字符"
                    }
                }
            });
        });</script>

</head>
<body>
	<section>
	<!-- 头部 -->
	<div class="nav-wrapper">
    <header class="container">
        <ul class="nav">
            <li><a href="/Index.html">首页</a></li>
            <li><a href="/Product.html">作品</a></li>
            <li><a href="/Custom.html">订制</a></li>
            <li><a href="/Author.html">作者</a></li>
            <li><a href="/Activity.html">活动</a></li>
            <li><a href="/Index.html">更多</a></li>
        </ul>
        <?php if((is_login() == 0)): ?><div class="header-right login-top">
            <input name="" type="text" value="搜索"  class="gray" onclick="if (this.value == '搜索') {
                        this.value = '';
                        this.className = 'white'
                    }" onblur="if (this.value == '') {
                                this.value = '搜索';
                                this.className = 'gray'
                            }">
            <ul>
                <li><a href="/Login/login.html">登录</a></li>
                <li>|</li>
                <li><a href="/Login/register.html">注册</a></li>
            </ul>
        </div>
            <?php else: ?>
            <div class="header-right success">
                <input name="" type="text" value="搜索"  class="gray" onclick="if(this.value=='搜索'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='搜索';this.className='gray'}">

                <ul class="img-btn">
                    <li class="color-li"><a href="/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/Public/Home/images/top-img01.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/Public/Home/images/top-nav-img01.png"/>为我推荐</a></li>
                        </ul>
                    </li>
                    <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-img02.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-nav-img02.png"/>我的关注</a></li>
                            <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-nav-img03.png"/>我的粉丝</a></li>
                            <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-nav-img04.png"/>我的评价</a></li>
                            <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-nav-img05.png"/>系统通知</a></li>
                            <li><a href="/MyCenter/attention.html"><img src="/Public/Home/images/top-nav-img06.png"/>活动公告</a></li>
                        </ul>
                    </li>
                    <li><a href="/MyCenter/collect.html"><img src="/Public/Home/images/top-img03.png"/></a></li>
                    <li><a href="/MyCenter/uploadWork.html"><img src="/Public/Home/images/top-img04.png"/></a></li>
                    <li class="user-img"><a href="author edit.html"><img src="/Public/Home/images/user-img.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="author edit.html"><img src="/Public/Home/images/top-nav-img07.png"/>我的订单</a></li>
                            <li><a href="/MyCenter/invite.html"><img src="/Public/Home/images/top-nav-img08.png"/>我的邀请</a></li>
                            <li><a href="/MyCenter/editdata.html"><img src="/Public/Home/images/top-nav-img09.png"/>修改资料</a></li>
                            <li><a href="/Login/loginout.html"><img src="/Public/Home/images/top-nav-img10.png"/>退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><?php endif; ?>
    </header>
</div>
	
	<!-- 主体 -->
	
    <section> 
        <!--------登录页面内容部分--------->
        <div class="container login">
            <div class="login-left">
                <h4>欢迎来到二次元界</h4>
                <h5>没有账号可登录？ <a href="<?php echo U('Login/register');?>">点击注册</a></h5>
                <form id="form0" action="/Login/login.html" method="post">
                    <ul class="login-ul">
                        <li class="txt-input phone"><img src="/Public/Home/images/login-img01.gif" alt="手机号图标"/>
                            <input name="mobile" type="text" value="请输入手机号"  class="gray" onclick="if (this.value == '请输入手机号') {
                                        this.value = '';
                                        this.className = 'black'
                                    }" onblur="if (this.value == '') {
                                                this.value = '请输入手机号';
                                                this.className = 'gray'
                                            }">
                        </li>
                        <li class="txt-input password"><img src="/Public/Home/images/login-img02.gif" alt="密码图标"/>
                            <input name="password" type="password" value="请输入密码"  class="gray" onclick="if (this.value == '请输入密码') {
                                        this.value = '';
                                        this.className = 'black'
                                    }" onblur="if (this.value == '') {
                                                this.value = '请输入密码';
                                                this.className = 'gray'
                                            }">
                        </li>
                        <h6 id="msginfo" style="margin-top: 10px;margin-left: 20px; color: red;"><?php echo ($msginfo); ?></h6>
                        <li class="auto">
                            <input name="islogin" type="checkbox" value="islogin">
                            <span></span>下次自动登录
                            <h6>使用公用电脑勿勾选</h6>
                        </li>
                        <li>
                            <input class="login-btn" name="" type="button" value="登 录">
                            <a href="<?php echo U('Login/forgetpass');?>">忘记密码</a>|<a href="<?php echo U('Login/register');?>" class="register-a">注册</a></li>
                    </ul>
                    {__TOKEN__}
                </form>
            </div>
            <div class="login-right">
                <h4>第三方账号登录</h4>
                <input class="blog-btn" name="" type="button" value="新浪微博登录">
                <input class="qq-btn" name="" type="button" value="QQ账号登录">
            </div>
        </div>
    </section>



	<!-- /底部 -->
	<footer class="bottom">
    <div class="container">
        <div class="botm-left">
            <div class="botm-btn"><a href="#" class="botm-share sina"><img src="/Public/Home/images/bottom-share1.png"/></a>
                <a href="#" class="botm-share mail"><img src="/Public/Home/images/bottom-share2.png"/></a></div>
            <h5><a href="/Index/standard.html#jygf">交易规范</a> <a href="/Index/standard.html#jfgz">积分规则</a> <a href="/Index/mechanism.html#yqzjz">邀请者机制</a> <a href="/Index/mechanism.html#dyzjz">订制者机制</a> <a href="/Index/mechanism.html#zzjz">作者机制</a> <a href="/Index/about.html#wo">关于我们</a> <a href="/Index/about.html#yisi">关于隐私</a> <a href="/Index/about.html">问题反馈</a> <a href="/Index/about.html#bq">版权声明</a></h5>
            <h5>联系我们：</h5>
            <h5><span>站内求助或投诉举报：   Email:  service@2ciyuanjie.com</span>          <span>作者服务：   010-222222222</span>    <span>Email:  originator@2ciyuanjie.com</span></h5>
            <h5><span>订制者服务：   010-22222222</span>   <span>Email:  demander@2ciyuanjie.com</span>          <span>活动及商务合作：   010-22222222</span>   <span>Email:cooperation@2ciyuanjie.com</span></h5>
            <h5><span>媒体服务：   010-22222222</span>   <span>Email: media@2ciyuanjie.com</span></h5>
            <h5 class="gray-h5">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</h5>
        </div>
        <div class="botm-right"><img src="/Public/Home/images/bottom-img.png"/></div>
    </div>
</footer>
	</section>
</body>
</html>