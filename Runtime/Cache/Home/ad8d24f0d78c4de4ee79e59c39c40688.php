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
	
    <div class="container author-details">
        <div class="details-left">
                	<span>
                    	<img src="/Public/Home/images/author-img03.gif"/>
                        <h5><a class="add-attention" href="javascript:;">加关注</a></h5>
                        <h5><a class="custom-a" href="custom.html">我要订制</a></h5>
                        <h5><a class="report-a" href="javascript:;">举报</a></h5>
                    </span>
            <span class="author-name"><h3><?php echo ($uinfo["user_name"]); ?></h3><h5><?php echo ($uinfo["address"]); ?> / <?php echo (strtr($uinfo["tags_content"],';','
                ')); ?></h5><h5>形象最低接单金额 ￥<?php echo ($uinfo["minmoney"]); ?></h5></span>
                    <span class="author-status"><h3>
                        <?php switch($uinfo["workstatus"]): case "1": ?>工作中<?php break;?>
                            <?php case "2": ?>未接单<?php break;?>
                            <?php default: ?>
                            暂停接单<?php endswitch;?>
                        <span>接单状态</span></h3></span>
            <span class="author-status"><h3><?php echo ($uinfo["workcount"]); ?> <span>作品</span><span>/</span> <?php echo ($uinfo["customcount"]); ?> <span>成交量</span>
            </h3></span>
            <span class="author-status"><img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img22.gif"/><img
                    src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img23.gif"/><img src="/Public/Home/images/img23.gif"/><h3>
                <span>诚信度</span><span>/</span>80%<span>好评率</span></h3></span>
            <span class="author-status"><h3><?php echo ($uinfo["pop_count"]); ?><span>人气</span><span>/</span> <?php echo ($uinfo["fans_count"]); ?>
                <span>粉丝</span></h3></span>
        </div>
        <div class="details-right"><img src="/Public/Home/images/img25.gif"/></div>
    </div>
    <div class="container content">
        <div class="custom">
            <ul class="nextnav no-drop author-nav">
                <li class="nextnavon"><a href="javascript:;">作品</a></li>
                <li><a href="javascript:;">收藏作品</a></li>
                <li><a href="javascript:;">关注作者</a></li>
            </ul>
        </div>
        <div class="author-content">
            <div class="module">
                <div class="author-filter">
                    <h5>
                        标签： <a href="#" class="aon">全部</a>
                        <?php if(is_array($zttag)): $i = 0; $__LIST__ = $zttag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="javascript:;"><?php echo ($data["tag_content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </h5>
                    <h5>
                        状态： <a href="javascript:;" class="carryout aon"> 已经完成</a> <a href="javascript:;"
                                                                                     class="current">正在进行</a></h5>
                    <h5>
                        排序： <a href="javascript:;" class="aon">最新上传</a> <a href="javascript:;">人气最高</a> <a
                            href="javascript:;">价格最低</a> <a href="javascript:;">价格最高</a> <a href="javascript:;">点赞最多</a>
                    </h5>
                </div>

                <ul>
                    <?php if(is_array($uwork)): $i = 0; $__LIST__ = $uwork;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 4 );++$i;?><li style="display:block;"><img
                                src="http://www.2ciyuanjie.com/<?php echo ($data["main_image_url"]); ?>" alt="作品图片-<?php echo ($data["title"]); ?>"
                                style="display：block;width: 293px;height: 222px;"/>

                            <h3><?php echo (mb_substr($data["title"],0,8,'utf-8')); ?></h3>
                                <h4>￥<?php echo ($data["money"]); ?></h4>
                                <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                                <h5><span><?php echo ($data["open_count"]); ?></span>人气 /<span><?php echo ($data["praise_count"]); ?></span>点赞 /<span><?php echo ($data["favorite_count"]); ?></span>收藏
                                </h5>
                        </li>
                        <?php if(($mod) == "3"): ?></ul><ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="module" style="display:none;">
                <div class="author-filter">
                    <h5>
                        标签： <a href="javascript:;" class="aon">全部</a>
                        <?php if(is_array($zttag)): $i = 0; $__LIST__ = $zttag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="javascript:;"><?php echo ($data["tag_content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </h5>
                    <h5>
                        排序： <a href="javascript:;" class="aon">人气最高</a> <a href="javascript:;">价格最低</a> <a
                            href="javascript:;">价格最高</a> <a href="javascript:;">点赞最多</a></h5>
                </div>
                <ul>
                    <?php if(is_array($uswork)): $i = 0; $__LIST__ = $uswork;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 4 );++$i;?><li style="display: block;"><img
                                src="http://www.2ciyuanjie.com/<?php echo ($data["main_image_url"]); ?>" alt="作品图片-<?php echo ($data["title"]); ?>"
                                style="display：block;width: 293px;height: 222px;"/>
                            <h3><?php echo (mb_substr($data["title"],0,8,'utf-8')); ?></h3>
                                <h4>￥<?php echo ($data["money"]); ?></h4>
                                <span class="label-a"><a href="javascript:;">动漫</a><a href="javascript:;">自创</a></span>
                                <h5><span><?php echo ($data["open_count"]); ?></span>人气 /<span><?php echo ($data["praise_count"]); ?></span>点赞 /<span><?php echo ($data["favorite_count"]); ?></span>收藏
                                </h5>
                        </li>
                        <?php if(($mod) == "3"): ?></ul><ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="module" style="display:none;">
                <div class="author-filter">
                    <h5>
                        标签： <a href="javascript:;" class="aon">全部</a>
                        <?php if(is_array($zttag)): $i = 0; $__LIST__ = $zttag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="javascript:;"><?php echo ($data["tag_content"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </h5>
                    <h5>
                        地区： <a href="javascript:;" class="aon"> 全部地区</a> <a href="javascript:;">北京</a> <a
                            href="javascript:;">上海</a> <a href="javascript:;">广州</a> <a href="javascript:;">深圳 重庆</a> <a
                            href="javascript:;">杭州</a> <a href="javascript:;">成都</a> <a href="javascript:;">南京</a> <a
                            href="javascript:;">武汉</a> <a href="javascript:;">其他地区</a></h5>
                    <h5>
                        排序： <a href="javascript:;" class="aon">最新加入</a> <a href="javascript:;">人气最高</a> <a
                            href="javascript:;">粉丝最多</a> <a href="javascript:;">作品最多</a> <a
                            href="javascript:;">成交量最多</a> <a href="javascript:;">诚信度最高</a></h5>
                </div>
                <?php if(is_array($author)): $i = 0; $__LIST__ = $author;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="author-module">
                        <div class="module-left">
                            <?php if(empty($data["header_img"])): ?><img src="/Public/Home/images/author-img01.gif"/>
                                <?php else: ?>
                                <img src="http://www.2ciyuanjie.com/<?php echo ($data["header_img"]); ?>" style="width: 127px;height: 127px;"/><?php endif; ?>
                                <span>
                                	<h3><?php echo ($data["user_name"]); ?></h3>
                                    <h6><?php echo ($data["address"]); ?> / <?php echo (strtr($data["tags_content"],';',' ')); ?></h6>
                                    <h6>人气：<?php echo ($data["pop_count"]); ?></h6>
                                    <h6>粉丝：<?php echo ($data["fans_count"]); ?> / 作品：<?php echo ($uinfo["workcount"]); ?></h6>
                                    <h6>成交量：<?php echo ($uinfo["customcount"]); ?></h6>
                                </span>
                        </div>
                        <div class="module-right">
                            <span class="works"><img src="/Public/Home/images/author-works01.gif"/><img
                                    src="/Public/Home/images/author-works02.gif"/><img src="/Public/Home/images/author-works03.gif"/></span>
                            <input name="" type="button" value="+ 关注">
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div class="page">
                <ul>
                    <li class="lion"><a href="javascript:;">1</a></li>
                    <li><a href="javascript:;">2</a></li>
                    <li><a href="javascript:;">3</a></li>
                    <li class="omission">…</li>
                    <li><a href="javascript:;">30</a></li>
                    <li class="goto"><input name="" type="text"></li>
                    <li class="nextpage"><a href="javascript:;">下一页</a></li>
                </ul>
            </div>

            <div class="report-content" style="display:none;">
                <div class="report-tle">举报<a href="javascript:;"><img src="/Public/Home/images/colse-btn.gif"/></a></div>
                <div class="report-main">
                    <textarea name="" cols="" rows="" class="description"
                              onkeyup="this.value = this.value.slice(0, 2000)"
                              onfocus="if(value=='请输入举报理由'){value='';this.className='description02'}"
                              onblur="if (value==''){value='请输入举报理由';this.className='description'}">请输入举报理由</textarea>
                    <h6>还可以输入 <span> 299 </span> 字符</h6>
                </div>
                <div class="report-btn"><input name="" type="button" value="确认"><input class="cancel-btn" name=""
                                                                                       type="button" value="取消"></div>
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