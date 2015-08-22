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

</head>
<body>
	<!-- 头部 -->
	<div class="nav-wrapper">
    <header class="container">
        <ul class="nav">
            <li><a href="/">首页</a></li>
            <li><a href="../Product.html">作品</a></li>
            <li><a href="../Custom.html">订制</a></li>
            <li><a href="../Author.html">作者</a></li>
            <li><a href="../Activity.html">活动</a></li>
            <li><a href="#">更多<?php echo is_login();?></a></li>
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
                <li><a href="../Login/login.html">登录</a></li>
                <li>|</li>
                <li><a href="../Login/register.html">注册</a></li>
            </ul>
        </div>
            <?php else: ?>
        <div class="header-right success">
            <input name="" type="text" value="搜索"  class="gray" onclick="if (this.value == '搜索') {
                        this.value = '';
                        this.className = 'white'
                    }" onblur="if (this.value == '') {
                                this.value = '搜索';
                                this.className = 'gray'
                            }">
            <ul class="img-btn">
                <li><a href="<?php echo U('Index/myindex/id/'.is_login());?>"><img src="/Public/Home/images/top-img01.png"/></a></li>
                <li><a href="<?php echo U('Index/myattention/id/'.is_login());?>"><img src="/Public/Home/images/top-img02.png"/></a></li>
                <li><a href="<?php echo U('Index/mycollect/id/'.is_login());?>"><img src="/Public/Home/images/top-img03.png"/></a></li>
                <li><a href="<?php echo U('Index/uploadworks/id/'.is_login());?>"><img src="/Public/Home/images/top-img04.png"/></a></li>
                <li class="user-img"><a href="<?php echo U('Index/myindex/id/'.is_login());?>"><img src="/Public/Home/images/user-img.png"/></a></li>
            </ul>
        </div><?php endif; ?>
    </header>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
    <div class="container content">
        <div class="custom">
            <ul class="nextnav">
                <li class="nextnavon activ-li"><a href="#">上传作品</a></li>
            </ul>
            <div class="custom-content">
                <ul>
                    <li>Hi，<?php echo session('user_auth.username');?>，欢迎您来订制；带有 <span>*</span> 的项目都是必填项哦。</li>
                    <li class="fill name">
                        <h5><span>*</span>作品名称：</h5>
                        <input name="" type="text" class="gray" value="请写出你的作品名称，让你的作品更加丰富多彩。" onclick="if(this.value=='请写出你的作品名称，让你的作品更加丰富多彩。'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请写出你的作品名称，让你的作品更加丰富多彩。';this.className='gray'}">
                        <h6 class="price-tips">还可以输入 <span>50</span> 字符 / 汉字</h6>
                    </li>
                    <li class="fill">
                        <h5><span>*</span>作品标签：</h5>
            <span class="label-span"><a href="javascript:;">请选择作品标签</a>
            <ul class="label-check radio noall">
                <li class="checkon">形象</li>
                <ul>
                    <li>产品设计</li>
                    <li>漫画</li>
                    <li>插画</li>
                    <li>动画</li>
                    <li>游戏</li>
                    <li>音乐</li>
                    <li>VI</li>
                    <li>广告</li>
                </ul>
            </ul>
            </span> </li>
                    <li class="fill">
                        <h5><span>*</span>作品来源：</h5>
            <span class="label-span"><a href="javascript:;">请选择作品来源</a>
            <ul class="label-check radio">
                <li class="checkon">全部</li>
                <li>个人作品</li>
                <li>企业作品</li>
                <li>自创作品</li>
            </ul>
            </span> </li>
                    <li class="fill">
                        <h5><span>*</span>展示方式：</h5>
            <span class="label-span"><a href="javascript:;">请选择展示方式</a>
            <ul class="label-check radio">
                <li class="checkon">全部</li>
                <li>展示方式1</li>
                <li>展示方式2</li>
                <li>展示方式3</li>
            </ul>
            </span> </li>
                    <li class="fill">
                        <h5><span>*</span>作品价格：</h5>
                        <input name="" type="text" class="gray" value="请进行填写价格" onclick="if(this.value=='请进行填写价格'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请进行填写价格';this.className='gray'}">
                    </li>
                    <li class="fill">
                        <h5><span>*</span>完成时间：</h5>
                        <span class="time-span">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日  - &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
                        <h6 class="price-tips">请填写你作品完成的时间</h6>
                    </li>
                    <li class="fill">
                        <h5>上传图片：</h5>
                        <input name="" type="button" value="选择图片">
                        <h6 class="upload-tips">单张图片5M以内，RGB模式，支持jpg/gif/png格式，请上传需要绘画的照片。您还可以上传一张您喜欢的肖像风格，以便作者参考；没有上传，作者会根据您的描述，给您满意的作品。</h6>
                    </li>
                    <li class="fill">
                        <h5>角色说明：</h5>
                        <textarea class="description" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='作品的简单介绍等'){value='';this.className='description02'}"onblur="if (value==''){value='作品的简单介绍等';this.className='description'}">作品的简单介绍等</textarea>
                        <h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
                    </li>
                    <li class="fill">
                        <h5>故事梗概：</h5>
                        <textarea class="description" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='作品的简单介绍等'){value='';this.className='description02'}"onblur="if (value==''){value='作品的简单介绍等';this.className='description'}">作品的简单介绍等</textarea>
                        <h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
                    </li>
                    <li class="fill copyright">
                        <h5><span>*</span>版权设置：</h5>
            <span class="label-span"><a href="javascript:;">禁止匿名转发；禁止商业使用；禁止个人使用。</a>
            <ul class="label-check">
                <li class="checkon">禁止匿名转发</li>
                <li>禁止商业使用</li>
                <li>禁止个人使用</li>
                <li>禁止匿名转发</li>
                <li>禁止商业使用</li>
                <li>不限制作品用途</li>
            </ul>
            </span> </li>
                    <li class="fill btn">
                        <input class="submit" name="" type="button" onClick="javascript:location.href='product themes.html'"  value="提交">
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