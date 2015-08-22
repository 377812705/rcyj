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
                    <li class="color-li"><a href="/2ciyuanjie/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/2ciyuanjie/Public/Home/images/top-img01.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/2ciyuanjie/MyCenter/index/id/<?php echo is_login();?>.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img01.png"/>为我推荐</a></li>
                        </ul>
                    </li>
                    <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-img02.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img02.png"/>我的关注</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img03.png"/>我的粉丝</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img04.png"/>我的评价</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img05.png"/>系统通知</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/attention.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img06.png"/>活动公告</a></li>
                        </ul>
                    </li>
                    <li><a href="/2ciyuanjie/MyCenter/collect.html"><img src="/2ciyuanjie/Public/Home/images/top-img03.png"/></a></li>
                    <li><a href="/2ciyuanjie/MyCenter/uploadWork.html"><img src="/2ciyuanjie/Public/Home/images/top-img04.png"/></a></li>
                    <li class="user-img"><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/user-img.png"/></a>
                        <ul class="nextmenu" style="display:none;">
                            <li><a href="author edit.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img07.png"/>我的订单</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/invite.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img08.png"/>我的邀请</a></li>
                            <li><a href="/2ciyuanjie/MyCenter/editdata.html"><img src="/2ciyuanjie/Public/Home/images/top-nav-img09.png"/>修改资料</a></li>
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
            <ul class="nextnav no-drop">
                <li class="nextnavon"><a href="javascript:;">我的收藏</a></li>
            </ul>
        </div>
        <div class="module">
            <div class="module-tle">
                <h5>Hi， <span>二郎神</span> ，发现更多精彩订制作品记得及时收藏，<span>进行定制</span> 哦。</h5>
            </div>
            <div class="author-filter">
                <h5> 标签： <a href="javascript:;" class="aon">全部</a> <a href="javascript:;">形象</a> <span>漫画</span> <span>插画</span> <span>产品设计</span> <span>动画</span> <span>游戏</span> <span>音乐</span> <span>VI</span> <span>广告</span></h5>
            </div>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img06.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img07.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">一对一</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img08.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">个人订制</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img09.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">企业订制</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img10.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img11.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img12.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img13.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img06.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img07.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">一对一</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img08.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img09.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img10.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img11.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img12.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img13.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img06.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img07.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">一对一</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img08.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img09.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
            <ul>
                <li><img src="/2ciyuanjie/Public/Home/images/img10.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img11.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img12.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
                <li><img src="/2ciyuanjie/Public/Home/images/img13.gif" alt="作品图片-大眼眶熊猫"/>
                    <h3>大眼眶熊猫</h3>
                    <h4>￥500</h4>
                    <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                    <h5><span>1223</span>人气  /<span>876</span>点赞  /<span>60</span>收藏 </h5>
                </li>
            </ul>
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


	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>