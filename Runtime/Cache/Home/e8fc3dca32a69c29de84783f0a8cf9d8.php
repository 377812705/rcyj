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
<link rel="stylesheet" href="/2ciyuanjie/Public/Home/css/base1.css" />
<link rel="stylesheet" href="/2ciyuanjie/Public/Home/css/master.css" />
<script type="text/javascript" src="/2ciyuanjie/Public/static/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/2ciyuanjie/Public/Home/js/master.js"></script>
<!--[if lt IE 9]>
<script src="/2ciyuanjie/Public/Home/js/html5shiv.min.js"></script>
<![endif]-->

</head>
<body>
	<!-- 头部 -->
	<div class="nav-wrapper">
    <header class="container">
        <ul class="nav">
            <li><a href="/2ciyuanjie/Index.html">首页</a></li>
            <li><a href="/2ciyuanjie/Product.html">作品</a></li>
            <li><a href="/2ciyuanjie/Custom.html">订制</a></li>
            <li><a href="/2ciyuanjie/Author.html">作者</a></li>
            <li><a href="/2ciyuanjie/Activity.html">活动</a></li>
            <li><a href="/2ciyuanjie/Index.html">更多</a></li>
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
                <li><a href="/2ciyuanjie/Login/login.html">登录</a></li>
                <li>|</li>
                <li><a href="/2ciyuanjie/Login/register.html">注册</a></li>
            </ul>
        </div>
            <?php else: ?>
            <div class="header-right success">
                <input name="" type="text" value="搜索"  class="gray" onclick="if(this.value=='搜索'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='搜索';this.className='gray'}">

                <ul class="img-btn">
                    <li class="color-li"><a href="/2ciyuanjie/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/2ciyuanjie/Public/Home/images/top-img01.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/2ciyuanjie/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img01.png"/>为我推荐</a></li>
                        </ul>
                    </li>
                    <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-img02.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img02.png"/>我的关注</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img03.png"/>我的粉丝</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img04.png"/>我的评价</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img05.png"/>系统通知</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img06.png"/>活动公告</a></li>
                        </ul>
                    </li>
                    <li><a href="/2ciyuanjie/MyCenter/collect.html"><img src="/2ciyuanjie/Public/Home/images/top-img03.png"/></a></li>
                    <li><a href="/2ciyuanjie/MyCenter/uploadWork.html"><img src="/2ciyuanjie/Public/Home/images/top-img04.png"/></a></li>
                    <li class="user-img"><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/user-img.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img07.png"/>我的订单</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/invite.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img08.png"/>我的邀请</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/editdata.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img09.png"/>修改资料</a></li>
                            <li><a href="/2ciyuanjie/Login/loginout.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img10.png"/>退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><?php endif; ?>
    </header>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
    <div class="container edit">
        <div class="edit-div">
            <h5>修改联系地址</h5>
            <ul class="login-ul">
                <li class="txt-input username">
                    <input name="" type="text" value="新联系地址"  class="gray" onclick="if(this.value=='新联系地址'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='新联系地址';this.className='gray'}">
                </li>
                <li class="txt-input verify">
                    <input name="" type="text" value="请输入验证码"  class="gray" onclick="if(this.value=='请输入验证码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入验证码';this.className='gray'}">
                    <input name="" type="button" value="验证码">
                </li>
                <li>
                    <input class="retrieve-btn" name="" type="button" onClick="javascript:location.href='edit-data.html'" value="确 定">
                    <input class="retrieve-btn" name="" type="button" onClick="javascript:location.href='edit-data.html'" value="返 回">
                </li>
            </ul>
        </div>
    </div>


	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>