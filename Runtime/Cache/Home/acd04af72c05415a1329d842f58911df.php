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
	<!-- /头部 -->
	
	<!-- 主体 -->
	
  <!--------页面内容部分--------->
  <div class="container content">
    <div class="custom">
      <ul class="nextnav pay">
        <li class="nextnavon activ-li"><a href="#">选择付款方式</a></li>
      </ul>
      <div class="custom-content pay">
        <h3>订单提交成功，请您尽快付款！<span>订单号：<?php echo ($data["order_number"]); ?></span></h3>
        <h5>请您在提交订单后24小时内完成支付，否则订单会自动取消</h5>
        <div class="pay-div">
          <h4>应付金额：<span><?php echo ($data["money"]); ?></span> 元</h4>
          <div class="pay-by">
            <ul>
              <li class="payon"><a class="shortcut" href="#">平台支付</a></li>
              <li><a class="platform" href="#">快捷支付</a></li>
            </ul>
            <div class="pay-details">
               <input class="alipay-pay" name="" type="button" onClick="javascript:location.href='/Zhifubao/zhifubaoPay/orderid/<?php echo ($data["order_id"]); ?>'" value="支付宝支付">
               <input class="wechat-pay" name="" type="button" onClick="javascript:location.href='pay-wechat.html'" value="微信支付">
            
            </div>
            <div class="pay-details" style="display:none;">
	             <ul>
	                <li><a href="pay-detail.html"><img src="/Public/Home/images/bank01.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank02.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank03.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank04.gif"/></a></li>
	                <li><a href="pay-detail.html"><img src="/Public/Home/images/bank05.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank06.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank07.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank08.gif"/></a></li>
	                <li><a href="pay-detail.html"><img src="/Public/Home/images/bank09.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank10.gif"/></a><a href="pay-detail.html"><img src="/Public/Home/images/bank11.gif"/></a><a href="#" class="more-btn">更多银行</a></li>
	              </ul>
            </div>
          </div>
        </div>
        <div class="report-btn pay-btn">
          <input name="" type="button" onClick="javascript:location.href='pay-success.html'"  value="立即支付">
        </div>
      </div>
    </div>
  </div>



	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>