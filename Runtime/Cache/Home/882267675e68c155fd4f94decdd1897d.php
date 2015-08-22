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
    <?php $uid = '<?php echo is_login();?>'; ?>
    <header class="container">
        <ul class="nav">
            <li><a href="/">首页</a></li>
            <li><a href="../Product.html">作品</a></li>
            <li><a href="../Custom.html">订制</a></li>
            <li><a href="../Author.html">作者</a></li>
            <li><a href="../Activity.html">活动</a></li>
            <li><a href="#">更多<?php echo is_login();?></a></li>
        </ul>
        <?php if(1 == 0): ?><div class="header-right login-top">
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
                <li><a href="../Index/myindex/.html"><img src="/Public/Home/images/top-img01.png"/></a></li>
                <li><a href="../Index/myattention/<?php echo ($uid); ?>.html"><img src="/Public/Home/images/top-img02.png"/></a></li>
                <li><a href="../Index/mycollect/<?php echo is_login();?>.html"><img src="/Public/Home/images/top-img03.png"/></a></li>
                <li><a href="../Index/uploadworks/<?php echo is_login();?>.html"><img src="/Public/Home/images/top-img04.png"/></a></li>
                <li class="user-img"><a href="../Index/myindex/<?php echo is_login();?>.html"><img src="/Public/Home/images/user-img.png"/></a></li>
            </ul>
        </div><?php endif; ?>
    </header>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
    <div class="container content">
				<div class="banner"> <img src="/Public/Home/images/banner01.jpg"/> <a class="left-btn" href="#"> </a> <a class="right-btn" href="#"> </a> </div>
				<div class="module">
						<div class="module-tle">
                                                    <h3>活动推荐 <span><a href="<?php echo U('Activity/perfect');?>">我要举办，发布活动，</a></span></h3>
								<a href="<?php echo U('Activity/index');?>" class="more">更多活动</a> </div>
						<ul>
								<li><a href="<?php echo U('Activity/index');?>"><span class="station"></span></a></li>
                                                                <li><a href="<?php echo U('Activity/index');?>"><span class="station"></span></a></li>
                                                                <li><a href="<?php echo U('Activity/index');?>"><span class="station"></span></a></li>
                                                                <li><a href="<?php echo U('Activity/index');?>"><span class="station"></span></a></li>
						</ul>
				</div>
				<div class="module">
						<div class="module-tle">
								<h3>作品推荐 <span><a href="#">我要上传，展现精品，创造价值</a></span></h3>
								<a href="<?php echo U('Product/index');?>" class="more">更多作品推荐</a> </div>
						<ul>
                                                    <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img06.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img07.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">一对一</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img08.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img09.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                          </ul>
                          <ul>
                              <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img10.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img11.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img12.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img13.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
						</ul>
				</div>
				<div class="module">
						<div class="module-tle">
                                                    <h3>订制推荐 <span><a href="<?php echo U('Custom/index');?>">我要订制，订制时尚，品味生活</a></span></h3>
								<a href="<?php echo U('Custom/custom');?>" class="more">更多订制需求推荐</a> </div>
						<ul>
                                                    <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img14.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
                                        <h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img15.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>未接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img16.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img17.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                          </ul>
                          <ul>
                              <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img18.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img19.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img20.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
                                                                <li><a href="<?php echo U('Product/details');?>"><img src="/Public/Home/images/img21.gif" alt="作品图片-大眼眶熊猫"/></a>
										<h3>大眼眶熊猫</h3>
										<h4>$500</h4>
										<span class="label-a"><a href="#">动漫</a><a href="#">自创</a></span>
										<h2>已接单<span>接单状态</span></h2>
										<h5><span>1223</span>人气</h5>
										<h6>番茄一点红<img src="/Public/Home/images/user-img02.gif" alt="用户头像"/></h6>
								</li>
						</ul>
				</div>
				<div class="module recommend">
						<div class="module-tle">
                                                    <h3>推荐作者 <span><a href="<?php echo U('Login/register');?>">我要申请，让世界关注你</a></span></h3>
								<a href="<?php echo U('Author/index');?>" class="more">更多推荐作者</a> </div>
						<ul>
                                                    <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img01.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img03.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img04.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img05.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img06.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img07.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img08.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
                                                                                <li><a href="<?php echo U('Author/details');?>"><img src="/Public/Home/images/user-img09.gif"/></a><span>
										<h5>樱桃爱丸子</h5>
										<h6>北京 ／ 形象  动漫</h6>
										<h6>粉丝：277789 ／ 作品：234</h6>
										</span></li>
						</ul>
				</div>
                <div class="activity-banner"> <img src="/Public/Home/images/banner-img03.gif"/> </div>
		</div>


	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>