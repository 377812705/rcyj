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
	
<div class="container content">
    <div class="custom">
        <ul class="nextnav">
            <li class="nextnavon activ-li"><a href="#">资料修改</a></li>
        </ul>
        <div class="custom-content">
            <ul>
                <li>Hi，二郎神，欢迎您来订制；带有 <span>*</span> 的项目都是必填项哦。</li>
                <li class="base-data">
                    <ul class="fill-left">
                        <li class="fill fill-data">
                            <h5>用户名：</h5>
                            番茄一点红 </li>
                        <li class="fill fill-data">
                            <h5>邮箱：</h5>
                            122222222222@163.com
                            <input class="edit-btn" name="" type="button" onClick="javascript:location.href='/2ciyuanjie/MyCenter/editmail.html'" value="修改邮箱">
                        </li>
                        <li class="fill fill-data address">
                            <h5>联系地址：</h5>
                            北京市海淀区清河朱房路6666666号
                            <input class="edit-btn" name="" type="button" onClick="javascript:location.href='/2ciyuanjie/MyCenter/editaddress.html'" value="修改地址">
                        </li>
                    </ul>
            <span class="portrait"><img src="/2ciyuanjie/Public/Home/images/user-img12.gif"/>
            <input class="edit-btn" name="" onClick="javascript:location.href='/2ciyuanjie/MyCenter/editphoto.html'" type="button" value="修改头像">
            </span> </li>
                <li class="fill">
                    <h5>标签：</h5>
                    <h4> <span class="auto">
              <input name="" type="checkbox" value="">
              <span></span>形象</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>漫画</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>插画</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>产品设计</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>动画</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>游戏</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>音乐</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>VI</span> <span class="auto disabled">
              <input name="" type="checkbox" value="" disabled>
              <span></span>广告</span> </h4>
                </li>
                <li class="fill edit-name">
                    <h5>真实名称：</h5>
                    <input name="" type="text" class="gray" value="请写真实名称。" onclick="if(this.value=='请写真实名称。'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请写真实名称。';this.className='gray'}">
                </li>
                <li class="fill">
                    <h5>性别：</h5>
                    <h4> <span class="auto radio">
              <input name="radiobutton" type="radio" value="">
              <span></span>男</span> <span class="auto radio">
              <input name="radiobutton" type="radio" value="">
              <span></span>女</span> </h4>
                </li>
                <li class="fill fill-address">
                    <h5>家乡：</h5>
            <span class="label-span"><a href="javascript:;">请选择</a>
            <ul class="label-check radio">
                <li>选择1</li>
                <li>选择2</li>
                <li>选择3</li>
            </ul>
            </span> <span class="label-span"><a href="javascript:;">请选择</a>
            <ul class="label-check radio">
                <li>选择1</li>
                <li>选择2</li>
                <li>选择3</li>
            </ul>
            </span> </li>
                <li class="fill fill-address">
                    <h5>居住：</h5>
            <span class="label-span"><a href="javascript:;">请选择</a>
            <ul class="label-check radio">
                <li>选择1</li>
                <li>选择2</li>
                <li>选择3</li>
            </ul>
            </span> <span class="label-span"><a href="javascript:;">请选择</a>
            <ul class="label-check radio">
                <li>选择1</li>
                <li>选择2</li>
                <li>选择3</li>
            </ul>
            </span> </li>
                <li class="fill">
                    <h5>个人简介：</h5>
                    <textarea class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请填写个人简介。'){value='';this.className='description02'}"onblur="if (value==''){value='请填写个人简介。';this.className='description'}">请填写个人简介。</textarea>
                    <h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
                </li>
                <li class="fill btn">
                    <input class="submit" name="" type="button" onClick="javascript:location.href=''"  value="确认">
                </li>
            </ul>
        </div>
    </div>
</div>
    

	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>