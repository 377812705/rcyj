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
	
    <div class="container content">
        <div class="custom">
            <ul class="nextnav">
                <li class="nextnavon activ-li"> <a href="#">我的邀请</a> </li>
            </ul>
            <div class="custom-content">
                <div class="module-tle invite-h5">
                    <h5>Hi，<span>二郎神</span>，以下是举办的活动，快来参加活动，赢取丰厚的奖金。</h5>
                </div>
                <div class="module recommend">
                    <div class="module-tle">
                        <h3>邀请好友</h3>
                    </div>
                    <ul class="invite-content">
                        <li><h1>1<span>我的邀请码</span></h1><h3><span>这是您专属的邀请码向朋友发送专属的<br/>邀请码并进行注册就可以<br/>赢取奖金啦！</span>0000</h3></li>
                        <li class="exclusive-span"><h1>2<span>专属连接</span></h1><h3><span>这是您专属的邀请连接，请通过QQ、微信<br/>发送给朋友就可以赢取奖金：</span><span class="border-span">我最近在二次元界发现更多好的作品，你可以在这上面进行订制，订制一个专属你得形象，快来试试吧！<a href="index.html">http://www.2ciyuanjie.com</a></span></h3></li>
                        <li><h1>3<span>分享设计</span></h1><h3><span>快速分享到社区：</span>
                                	<span class="share">
                                    	<a href="#"><img src="/Public/Home/images/share-img.gif"/>新浪微博</a><a href="#"><img src="/Public/Home/images/share-img02.gif"/>腾讯微博</a>
                                        <a href="#"><img src="/Public/Home/images/share-img03.gif"/>开心</a><a href="#"><img src="/Public/Home/images/share-img04.gif"/>人人</a>
                                        <a href="#"><img src="/Public/Home/images/share-img05.gif"/>豆瓣</a><a href="#"><img src="/Public/Home/images/share-img06.gif"/>QQ空间</a>
                                     </span>
                        </h3>

                        </li>
                    </ul>
                </div>
                <div class="module recommend">
                    <div class="module-tle">
                        <h3>我邀请的人</h3>
                    </div>
                    <ul>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img01.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img03.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img04.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img05.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img06.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img07.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img08.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                        <li><a href="author details.html"><img src="/Public/Home/images/user-img09.gif"/></a><span>
										<h5><a href="author details.html">樱桃爱丸子</a></h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                    </ul>
                </div>
            </div>
            <div class="page">
                <ul>
                    <li class="lion"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="omission">…</li>
                    <li><a href="#">30</a></li>
                    <li class="goto">
                        <input name="" type="text">
                    </li>
                    <li class="nextpage"><a href="#">下一页</a></li>
                </ul>
            </div>
        </div>
    </div>



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