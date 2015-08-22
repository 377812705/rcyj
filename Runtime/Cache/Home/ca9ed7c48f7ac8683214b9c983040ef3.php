<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="keyword" content="">
<meta name="author" content="">
<title>注册</title>
<link rel="stylesheet" href="/Public/Home/css/base1.css" />
<link rel="stylesheet" href="/Public/Home/css/master.css" />
<!--[if lt IE 9]>
      <script src="/Public/Home/js/html5shiv.min.js"></script>
<![endif]-->
</head>

<body>
<section> 
		<!--------页面头部--------->
		<header class="container logo02">
				<div class="header-right">
						<ul>
							<li>已有账户，<a href="/Login/login.html">马上登录</a></li>
							<li class="gray">|</li>
							<li><a href="/Index.html">返回二次元界</a></li>
						</ul>
				</div>
		</header>
		<!--------登录页面内容部分--------->
		<div class="container register">
				<div class="register-div">
						<ul class="nextnav">
								<li class="nextnavon"><a href="register.html">注册</a></li>
						</ul>
						<ul class="login-ul">
								<li class="txt-input username"><img src="/Public/Home/images/login-img03.gif"/ alt="用户名图标">
										<input name="" type="text" value="用户名，4~16个字符，字母/中文/数字/下划线"  class="gray" onclick="if(this.value=='用户名，4~16个字符，字母/中文/数字/下划线'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='用户名，4~16个字符，字母/中文/数字/下划线';this.className='gray'}">
										<span class="prompt">用户名是您唯一的名称注册后将不可修改，请您谨慎填写</span></li>
								<li class="txt-input phone"><img src="/Public/Home/images/login-img01.gif" alt="手机号图标"/>
										<input name="" type="text" value="请输入手机号"  class="gray" onclick="if(this.value=='请输入手机号'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入手机号';this.className='gray'}">
								</li>
								<li class="txt-input password"><img src="/Public/Home/images/login-img02.gif" alt="密码图标"/>
										<input name="" type="text" value="请输入密码"  class="gray" onclick="if(this.value=='请输入密码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入密码';this.className='gray'}">
								</li>
								<li class="txt-input confirm"><img src="/Public/Home/images/login-img04.gif" alt="确认密码图标"/>
										<input name="" type="text" value="请确认密码"  class="gray" onclick="if(this.value=='请确认密码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请确认密码';this.className='gray'}">
								</li>
								<li class="txt-input verify"><img src="/Public/Home/images/login-img05.gif" alt="验证码图标"/>
										<input name="" type="text" value="请输入验证码"  class="gray" onclick="if(this.value=='请输入验证码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请输入验证码';this.className='gray'}">
										<input name="" type="button" value="验证码">
								</li>
								<li class="txt-input invite"><img src="/Public/Home/images/login-img06.gif" alt="邀请码图标"/>
										<input name="" type="text" value="请确认邀请码"  class="gray" onclick="if(this.value=='请确认邀请码'){this.value='';this.className='black'}" onblur="if(this.value=='') {this.value='请确认邀请码';this.className='gray'}">
										<span class="prompt">通过您的好友邀请，输入邀请码如没有邀请码则不用填写</span></li>
								<li class="auto">
										<input name="" type="checkbox" value="" checked>
										<span></span>我已阅读并接受<a href="#">版权声明</a>和<a href="#">隐私保护</a>条款</li>
								<li>
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