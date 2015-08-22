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
                    <li class="color-li"><a href="/2ciyuanjie/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/2ciyuanjie/Public/Home/images/top-img01.png"/></a></li>
                    <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-img02.png"/></a></li>
                    <li><a href="my-collect.html"><img src="/2ciyuanjie/Public/Home/images/top-img03.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="my-index.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img01.png"/>为我推荐</a></li>
                        </ul>
                    </li>
                    <li><a href="/2ciyuanjie/MyCenter/uploadWork.html"><img src="/2ciyuanjie/Public/Home/images/top-img04.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img02.png"/>我的关注</a></li>
                            <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img03.png"/>我的粉丝</a></li>
                            <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img04.png"/>我的评价</a></li>
                            <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img05.png"/>系统通知</a></li>
                            <li><a href="my-attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img06.png"/>活动公告</a></li>
                        </ul>
                    </li>
                    <li class="user-img"><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/user-img.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img07.png"/>我的订单</a></li>
                            <li><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img08.png"/>我的邀请</a></li>
                            <li><a href="edit-data.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img09.png"/>修改资料</a></li>
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
								<li class="nextnavon activ-li">
                                		<a href="#">完善征集信息</a>
								</li>
						</ul>
						<div class="custom-content">
								<ul>
										<li>为您的征集活动进行填写带有 <span>*</span> 的项目是必填项哦。</li>
                                        <li class="fill name">
											<h5><span>*</span>活动名称：</h5>
											<input name="" type="text" value="请写出您要举办活动的名称，让更多人来参加您的活动。" class="gray" onclick="if(this.value=='请写出您要举办活动的名称，让更多人来参加您的活动。'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请写出您要举办活动的名称，让更多人来参加您的活动。';this.className='gray'}">
											<h6 class="price-tips">还可以输入 <span>50</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
												<h5>活动引言：</h5>
												<textarea class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您要举办活动的简单介绍，让我们可以更加了解，为您举办活动。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您要举办活动的简单介绍，让我们可以更加了解，为您举办活动。';this.className='description'}">请写出您要举办活动的简单介绍，让我们可以更加了解，为您举办活动。
                                                </textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
											<h5><span>*</span>活动时间：</h5>
											<span class="time-span activ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日 </span> <span class="activ-txt">至</span> <span class="time-span activ"> &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
										</li>
										<li class="fill">
											<h5><span>*</span>奖金总额：</h5>
											<input name="" type="text" value="请填写奖金总额" class="gray" onclick="if(this.value=='请填写奖金总额'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请填写奖金总额';this.className='gray'}"><span class="activ-txt">元</span>
										</li>
                                        <li class="fill">
												<h5>奖项设置：</h5>
												<textarea cols="" rows="" class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您活动的相关奖项设置。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您活动的相关奖项设置。';this.className='description'}">请写出您活动的相关奖项设置。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
												<h5>作品需求：</h5>
												<textarea cols="" rows="" class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您活动的相关奖项设置。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您活动的相关奖项设置。';this.className='description'}">请写出您活动的相关奖项设置。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
												<h5>评选标准：</h5>
												<textarea cols="" rows="" class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您活动的相关奖项设置。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您活动的相关奖项设置。';this.className='description'}">请写出您活动的相关奖项设置。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
												<h5>参赛须知：</h5>
												<textarea cols="" rows="" class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您活动的相关奖项设置。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您活动的相关奖项设置。';this.className='description'}">请写出您活动的相关奖项设置。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
                                        <li class="fill">
												<h5>相关权益：</h5>
												<textarea cols="" rows="" class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='请写出您活动的相关奖项设置。'){value='';this.className='description02'}"onblur="if (value==''){value='请写出您活动的相关奖项设置。';this.className='description'}">请写出您活动的相关奖项设置。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
										
									<li class="fill btn activbtn">
										<input class="submit" name="" type="button" value="提交">
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