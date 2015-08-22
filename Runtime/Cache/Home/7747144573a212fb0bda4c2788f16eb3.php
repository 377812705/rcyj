<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keyword" content="">
<meta name="author" content="">
<title>企业订制注册</title>
<link rel="stylesheet" href="/2ciyuanjie/Public/Home/css/base1.css" />
<link rel="stylesheet" href="/2ciyuanjie/Public/Home/css/master.css" />
<!--[if lt IE 9]>
      <script src="/2ciyuanjie/Public/Home/js/html5shiv.min.js"></script>
<![endif]-->
</head>

<body>
<section> 
		<!--------页面头部--------->
		<header class="container logo02">
				<div class="header-right">
						<ul>
							<li>已有账户，<a href="/2ciyuanjie/Login/login.html">马上登录</a></li>
							<li class="gray">|</li>
							<li><a href="/2ciyuanjie/Index.html">返回二次元界</a></li>
						</ul>
				</div>
		</header>
		<!--------登录页面内容部分--------->
		<div class="container register">
				<div class="retrieve firm">
						<ul class="nextnav">
								<li class="nextnavon"><a href="register03.html">企业订制注册</a></li>
						</ul>
						<ul class="login-ul">
								<li class="txt-input name"><span class="input-tle">姓名：</span>
										<input name="" type="text" value="请输入姓名"  class="gray" onclick="if(this.value=='请输入姓名'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入姓名';this.className='gray'}">
								</li>
								<li class="txt-input phone"><span class="input-tle">联系电话：</span>
										<input name="" type="text" value="请输入联系电话"  class="gray" onclick="if(this.value=='请输入联系电话'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入联系电话';this.className='gray'}">
								</li>
								<li class="txt-input address"><span class="input-tle">联系地址：</span>
										<input name="" type="text" value="请输入联系地址"  class="gray" onclick="if(this.value=='请输入联系地址'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入联系地址';this.className='gray'}">
								</li>
								<li class="txt-input password"><span class="input-tle">密码：</span>
										<input name="" type="text" value="请输入密码"  class="gray" onclick="if(this.value=='请输入密码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入密码';this.className='gray'}">
								</li>
								<li class="txt-input confirm"><span class="input-tle">&nbsp;</span>
										<input name="" type="text" value="请确认密码"  class="gray" onclick="if(this.value=='请确认密码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请确认密码';this.className='gray'}">
								</li>
								<li class="txt-input mail"><span class="input-tle">邮箱地址：</span>
										<input name="" type="text" value="请输入邮箱地址"  class="gray" onclick="if(this.value=='请输入邮箱地址'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入邮箱地址';this.className='gray'}">
								</li>
								<li class="txt-input company"><span class="input-tle">公司名称：</span>
										<input name="" type="text" value="请输入公司名称"  class="gray" onclick="if(this.value=='请输入公司名称'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入公司名称';this.className='gray'}">
										<span class="prompt">公司名称是您唯一的名称注册后将不可修改，请您谨慎填写</span> </li>
								<li class="txt-input scope"><span class="input-tle">经营范围：</span>
										<input name="" type="text" value="请输入经营范围"  class="gray" onclick="if(this.value=='请输入经营范围'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入经营范围';this.className='gray'}">
								</li>
								<li class="txt-input produc"><span class="input-tle">主要产品：</span>
										<input name="" type="text" value="请输入主要产品"  class="gray" onclick="if(this.value=='请输入主要产品'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入主要产品';this.className='gray'}">
								</li>
								<li class="txt-input user"><span class="input-tle">目标用户：</span>
										<input name="" type="text" value="请输入目标用户"  class="gray" onclick="if(this.value=='请输入目标用户'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入目标用户';this.className='gray'}">
								</li>
								<li class="txt-input idea"><span class="input-tle">经营理念：</span>
										<input name="" type="text" value="请输入经营理念"  class="gray" onclick="if(this.value=='请输入经营理念'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入经营理念';this.className='gray'}">
								</li>
								<li class="txt-input permit"><span class="input-tle">营业执照：</span> <span class="permit-img"><img alt="企业营业执照" class="zw-img" src="/2ciyuanjie/Public/Home/images/img02.gif"/></span> </li>
								<li class="txt-input verify"><span class="input-tle">验证码：</span> <span class="verify-span">
										<input name="" type="text" value="请输入验证码"  class="gray" onclick="if(this.value=='请输入验证码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入验证码';this.className='gray'}">
										<input name="" type="button" value="验证码">
										</span> </li>
								<li class="txt-input invite"><span class="input-tle">邀请码：</span>
										<input name="" type="text" value="请确认邀请码"  class="gray" onclick="if(this.value=='请确认邀请码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请确认邀请码';this.className='gray'}">
										<span class="prompt">通过您的好友邀请，输入邀请码如没有邀请码则不用填写</span></li>
								<li class="auto">
										<input name="" type="checkbox" value="" checked>
										<span></span>我已阅读并接受<a href="#">版权声明</a>和<a href="#">隐私保护</a>条款</li>
								<li class="txt-input">
										<input class="retrieve-btn" name="" type="button" value="马上注册">
								</li>
						</ul>
				</div>
		</div>
		<!--------页面底部--------->
		<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>
</section>
</body>
</html>