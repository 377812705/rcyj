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
				<ul class="nextnav no-drop">
								<li class="nextnavon"><a href="javascript:;">我的收藏</a></li>
						</ul>
					</div>
				<div class="module">
                	<div class="module-tle">
								<h5>Hi， <span><?php echo session('user_auth.username');?></span> ，发现更多精彩订制作品记得及时收藏，<span>进行定制</span> 哦。</h5>
						</div>
                       	  <div class="author-filter">
                            	<h5>
                           	 		 标签：   <a href="javascript:;" class="aon">全部</a>
									<?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="javascript:;" ><?php echo ($data["tag_content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
								</h5>
                          </div>
					<ul style="height: 395px;">
						<?php if(is_array($works)): $i = 0; $__LIST__ = array_slice($works,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wdata): $mod = ($i % 2 );++$i;?><li style="display:block;width:293px;height: 395px;"><img src="http://www.2ciyuanjie.com/<?php echo ($wdata["main_image_url"]); ?>" alt="作品图片-<?php echo ($wdata["title"]); ?>" style="display：block;width: 293px;height: 222px;"/>
								<h3><?php echo ($wdata["title"]); ?></h3>
								<h4>$500</h4>
								<span class="label-a"><a href="javascript:;"><?php echo ($wdata["tags_content"]); ?></a><a href="javascript:;"><?php echo ($wdata["create_status"]); ?></a></span>
								<h5><span><?php echo ($wdata["open_count"]); ?></span>人气  /<span><?php echo ($wdata["praise_count"]); ?></span>点赞  /<span><?php echo ($wdata["favorite_count"]); ?></span>收藏 </h5>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<ul>
						<?php if(is_array($works)): $i = 0; $__LIST__ = array_slice($works,4,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wdata): $mod = ($i % 2 );++$i;?><li style="display:block;width:293px;height: 395px;"><img src="http://www.2ciyuanjie.com/<?php echo ($wdata["main_image_url"]); ?>" alt="作品图片-<?php echo ($wdata["title"]); ?>" style="display：block;width: 293px;height: 222px;"/>
								<h3><?php echo ($wdata["title"]); ?></h3>
								<h4>$500</h4>
								<span class="label-a"><a href="javascript:;"><?php echo ($wdata["tags_content"]); ?></a><a href="javascript:;"><?php echo ($wdata["create_status"]); ?></a></span>
								<h5><span><?php echo ($wdata["open_count"]); ?></span>人气  /<span><?php echo ($wdata["praise_count"]); ?></span>点赞  /<span><?php echo ($wdata["favorite_count"]); ?></span>收藏 </h5>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<ul>
						<?php if(is_array($works)): $i = 0; $__LIST__ = array_slice($works,8,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wdata): $mod = ($i % 2 );++$i;?><li style="display:block;width:293px;height: 395px;"><img src="http://www.2ciyuanjie.com/<?php echo ($wdata["main_image_url"]); ?>" alt="作品图片-<?php echo ($wdata["title"]); ?>" style="display：block;width: 293px;height: 222px;"/>
								<h3><?php echo ($wdata["title"]); ?></h3>
								<h4>$500</h4>
								<span class="label-a"><a href="javascript:;"><?php echo ($wdata["tags_content"]); ?></a><a href="javascript:;"><?php echo ($wdata["create_status"]); ?></a></span>
								<h5><span><?php echo ($wdata["open_count"]); ?></span>人气  /<span><?php echo ($wdata["praise_count"]); ?></span>点赞  /<span><?php echo ($wdata["favorite_count"]); ?></span>收藏 </h5>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<ul>
						<?php if(is_array($works)): $i = 0; $__LIST__ = array_slice($works,12,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$wdata): $mod = ($i % 2 );++$i;?><li style="display:block;width:293px;height: 395px;"><img src="http://www.2ciyuanjie.com/<?php echo ($wdata["main_image_url"]); ?>" alt="作品图片-<?php echo ($wdata["title"]); ?>" style="display：block;width: 293px;height: 222px;"/>
								<h3><?php echo ($wdata["title"]); ?></h3>
								<h4>$500</h4>
								<span class="label-a"><a href="javascript:;"><?php echo ($wdata["tags_content"]); ?></a><a href="javascript:;"><?php echo ($wdata["create_status"]); ?></a></span>
								<h5><span><?php echo ($wdata["open_count"]); ?></span>人气  /<span><?php echo ($wdata["praise_count"]); ?></span>点赞  /<span><?php echo ($wdata["favorite_count"]); ?></span>收藏 </h5>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
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