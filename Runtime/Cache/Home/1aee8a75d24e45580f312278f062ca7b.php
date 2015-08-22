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
				<ul class="nextnav no-drop author-nav">
								<li class="nextnavon"><a href="javascript:;">我的关注</a></li>
								<li><a href="javascript:;" class="fans">我的粉丝</a></li>
                                <li><a href="javascript:;">我的评价</a></li>
                                <li><a href="javascript:;">系统通知</a></li>
                                <li><a href="javascript:;">活动公告</a></li>
						</ul>
					</div>
                    
				<div class="module">
						<div class="module-tle authortle">
								<h5>Hi，<span><?php echo session('user_auth.username');?></span>，这是您已经关注的作者，您将第一时间在 <span>我的首页</span> 看见他们的最新动态。</h5>
						</div>
						<div class="author-content">
                       	  <div class="author-filter">
                          		<span class="filter-left">
                            	<h5>
                           	 		 标签：   <a href="#" class="aon">全部</a>
                                    <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="javascript:;" ><?php echo ($data["tag_content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </h5>
                                <h5>
                           	 		 地区：   <a href="#" class="aon"> 全部地区</a> <a href="#">北京</a> <a href="#">上海</a> <a href="#">广州</a> <a href="#">深圳   重庆</a> <a href="#">杭州</a> <a href="#">成都</a> <a href="#">南京</a> <a href="#">武汉</a> <a href="#">其他地区</a></h5>
                                <h5>
                           	 		 排序：   <a href="#" class="aon">最新加入</a> <a href="#">人气最高</a> <a href="#">粉丝最多</a> <a href="#">作品最多</a> <a href="#">成交量最多</a> <a href="#">诚信度最高</a></h5>
                                </span>
                              <span class="total">
                              	<h3>Total</h3>
                                <h2>23</h2>
                              </span>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                        </div>
                     </div>
                     <div class="module" style="display:none;">
						<div class="module-tle authortle">
								<h5>Hi，<span><?php echo session('user_auth.username');?></span>，欢迎查看您的粉丝团，  <span> 上传作品</span>  就会有更多粉丝哦。</h5>
						</div>
						<div class="author-content">
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img01.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works01.gif"/><img src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                                <input name="" type="button" value="+ 关注">
                            </div>
                          </div>
                          <div class="author-module">
                          	<div class="module-left">
                            	<img src="/Public/Home/images/author-img02.gif"/>
                                <span>
                                	<h3>大眼眶熊猫</h3>
                                    <h6>北京 / 形象  漫画</h6>
                                    <h6>人气：2324</h6>
                                    <h6>粉丝：230 / 作品：21</h6>
                                    <h6>成交量：65</h6>
                                </span>
                            </div>
                            <div class="module-right">
                            	<span class="works"><img src="/Public/Home/images/author-works04.gif"/><img src="/Public/Home/images/author-works05.gif"/><img src="/Public/Home/images/author-works06.gif"/></span>
                                <input class="attention" name="" type="button" value="已关注">
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="module" style="display:none;">
                        	<div class="module-tle authortle">
								<h5>Hi，<span><?php echo session('user_auth.username');?></span>，您已经发表了 <span>3 </span>条评价。</h5>
							</div>
                            <div class="author-content">
                            	<span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="module" style="display:none;">
                        	<div class="module-tle authortle">
								<h5>Hi，<span><?php echo session('user_auth.username');?></span>，您已经发表了 <span>3 </span>条评价。</h5>
							</div>
                            <div class="author-content">
                            	<span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>Hi , 亲爱的<?php echo session('user_auth.username');?>您好，欢迎加入我们2次元界，快快开启你得订制之旅吧。（2次元界）</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <h5>系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容。</h5>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="module" style="display:none;">
                        	<div class="module-tle authortle">
								<h5>Hi，<span><?php echo session('user_auth.username');?></span>，注意查看您的活动公告。如遇到问题，请  <span>在线提交</span>  给我们。</h5>
							</div>
                            <div class="author-content">
                            	<span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>Hi , 亲爱的<?php echo session('user_auth.username');?>您好，欢迎加入我们2次元界，快快开启你得订制之旅吧。（系统名称）</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <h5>系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容系统通知内容内容内容内容。</h5>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                                <span class="review">
                                	<img src="/Public/Home/images/user-img11.gif"/>
                                    <span class="review-tle">
                                    	<h4>我对作品<span>《大熊猫嘟嘟》</span>发表了评价：</h4>
                                        <h6>2015-08-07  17:23:01</h6>
                                        <img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/><img src="/Public/Home/images/stars-img01.gif"/>
                                    </span>
                                </span>
                            </div>
                        </div>
                    <div class="page">
                    	<ul>
                        	<li class="lion"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li class="omission">…</li>
                          <li><a href="#">30</a></li>
                          <li class="goto"><input name="" type="text"></li>
                          <li class="nextpage"><a href="#">下一页</a></li>
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