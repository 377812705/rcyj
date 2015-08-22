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
                <li class="nextnavon">
                    <a href="javascript:;">订制标签</a>
                    <ul class="custom-ul">
                        <li class="custom-all"><a href="javascript:;">全部</a></li>
                        <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li class="custom-li"><a href="javascript:;"><?php echo ($data["tag_content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li><a href="javascript:;">订制来源</a>
                    <ul class="custom-ul">
                        <li class="custom-all"><a href="javascript:;">全部</a></li>
                        <li class="custom-li"><a href="javascript:;">个人订制</a></li>
                        <li class="custom-li"><a href="javascript:;">企业订制</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;">订制主题</a>
                    <ul class="custom-ul">
                        <li class="custom-all"><a href="javascript:;">全部</a></li>
                        <?php if(is_array($zttag)): $i = 0; $__LIST__ = $zttag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li class="custom-li"><a href="javascript:;"><?php echo ($data["tag_content"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li><a href="javascript:;">最新上传</a>
                    <ul class="custom-ul">
                        <li class="custom-all"><a href="javascript:;">最新上传</a></li>
                        <li class="custom-li"><a href="javascript:;">人气最高</a></li>
                        <li class="custom-li"><a href="javascript:;">价格最低</a></li>
                        <li class="custom-li"><a href="javascript:;">价格最高</a></li>
                    </ul>
                </li>
                <li class="top-btn"><input name="" type="button" onClick="javascript:location.href='<?php echo U(" Custom/custom");?>'"
                    value="我要订制">
                </li>
            </ul>
        </div>
        <div class="module">
            <div class="module-tle">
                <h6>共 <span><?php echo ($wcount); ?></span> 组订制作品</h6>
            </div>
            <ul>
                <?php if(is_array($works)): $i = 0; $__LIST__ = $works;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 4 );++$i;?><li><a href="/Product/details/id/<?php echo ($data["id"]); ?>.html"><img src="http://www.2ciyuanjie.com/<?php echo ($data["main_image_url"]); ?>" alt="作品图片-<?php echo ($data["title"]); ?>" style="display：block;width: 293px;height: 222px;"/></a>

                        <h3><?php echo (mb_substr($data["title"],0,10,'utf-8')); ?></h3>
                        <h4>￥<?php echo ($data["money"]); ?></h4>
                        <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>

                        <h2>已接单<span>接单状态</span></h2>
                        <h5><span><?php echo ($data["open_count"]); ?></span>人气</h5>
                        <h6><a href="/Author/details/id/<?php echo ($data["user_id"]); ?>.html"><?php echo (getUserName($data["user_id"])); ?>
                            <?php if(($data.user_id|getUserName) == null): ?><img src="/Public/Home/images/user-img02.gif" alt="用户头像"/>
                                <?php else: ?>
                                <img src="http://www.2ciyuanjie.com/<?php echo (getUserImg($data["user_id"])); ?>" style="width: 41px;height: 41px;"/><?php endif; ?></a></h6>
                    </li>
                    <?php if(($mod) == "3"): ?></ul><ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
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