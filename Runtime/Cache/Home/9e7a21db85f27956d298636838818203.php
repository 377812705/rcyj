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
	
	<div class="container content details">
		<div class="details brief">
			<div class="brief-left">
				<h4>大眼眶熊猫</h4>
				<h5>标签：<span>形象</span>形象分类：<span>卡通</span>作品来源：<span>自创</span></h5>
				<h5>展示方式：<span>数码 ／ 电脑绘画</span></h5>
				<h5>作品价格：<span class="red-span">500 RMB</span>出售状态：<span class="red-span">10 天</span></h5>
			</div>
			<div class="brief-right"> <img src="/Public/Home/images/user-img10.gif"/> <span>
        <h4>大眼眶熊猫</h4>
        <h5>作者标签：卡通  动漫  人物</h5>
        <h5>成交量：234 笔</h5>
        <h5>诚信度：<img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img23.gif"/><img src="/Public/Home/images/img23.gif"/></h5>
        </span>
				<input name="" type="button" value="+ 关注">
			</div>
		</div>
		<div class="details-content "> <img src="/Public/Home/images/banner02.jpg"/>
			<div class="details-icon module01"> <span> <img src="/Public/Home/images/icon-img01.gif"/> <img src="/Public/Home/images/icon-img011.gif"/> <img src="/Public/Home/images/icon-img012.gif"/> </span> </div>
			<div class="details-icon module02"> <span> <img src="/Public/Home/images/icon-img02.gif"/> <img src="/Public/Home/images/icon-img021.gif"/> <img src="/Public/Home/images/icon-img022.gif"/> </span> <span> <img src="/Public/Home/images/icon-img023.gif"/> <img src="/Public/Home/images/icon-img024.gif"/> <img src="/Public/Home/images/icon-img025.gif"/> </span> </div>
			<div class="details-icon module03"> <span> <img src="/Public/Home/images/icon-img03.gif"/> <img src="/Public/Home/images/icon-img031.gif"/> <img src="/Public/Home/images/icon-img032.gif"/> </span> <span> <img src="/Public/Home/images/icon-img033.gif"/> <img src="/Public/Home/images/icon-img034.gif"/> <img src="/Public/Home/images/icon-img035.gif"/> </span> </div>
			<div class="details-icon module04"> <span> <img src="/Public/Home/images/icon-img04.gif"/> <img src="/Public/Home/images/icon-img041.gif"/> <img src="/Public/Home/images/icon-img042.gif"/> </span> <span> <img src="/Public/Home/images/icon-img043.gif"/> <img src="/Public/Home/images/icon-img044.gif"/> <img src="/Public/Home/images/icon-img045.gif"/> </span> </div>
		</div>
		<div class="explain">
			<h4>角色说明</h4>
			<h5>名字：大眼眶熊猫      眼睛：两个黑大眼眶     身型：白色胶囊状     星球：地球     身高：12cm</h5>
			<h5>性格：易满足、爱享受、猥琐、幽默、无厘头      属性：呆蠢、贱萌       喜欢：搞笑、整人      讨厌：被嘲笑 </h5>
			<h5>喜爱食物：黑白巧克力豆</h5>
			<h4>故事梗概</h4>
			<h5>有一天熊猫中心里来了一位博士，在博士临走时不小心掉了一颗黑白巧克力豆，后来被一只出世不久的小熊猫偷吃了 ， 这个巧克力豆是博士用奇妙药水和黑白巧克力糖组成的，一旦吃了它，都会变
				成胶囊状。小熊猫偷吃后瞬间变成了与原来体形相差巨大的胶囊形熊猫，随后逃出了熊猫中心，偷偷跑到城市里，从此展开奇妙的旅行。
				原本肥胖的熊猫，变成了微小的胶囊熊猫后动作也迅速了很多，它的生活多姿多彩，而且常常模仿人类。它易满足、爱享受，无处不在，喜欢做些无厘头的
				行为，逗大家开心。唯一改变不了的还是一直喜欢吃巧克力豆，喜欢它的朋友们，一起来它关注吧！</h5>
			<h6><span>作品版权：</span> 大眼眶熊猫 <span>版权所有，禁止匿名转载；禁止商业使用；禁止个人使用。</span></h6>
      <span class="details-btn">
		  <?php if(1 == 1): ?><input name="" type="button" value="我要购买" onclick="javascript:location.href='/Custom/custom.html'"><?php endif; ?>
		  <input name="" type="button" value="我要订制" onclick="javascript:location.href='/Custom/custom.html'">
      </span> <span class="third-party"> <a href="javascript:;" class="sina"></a> <a href="javascript:;" class="wechat"></a> <a href="javascript:;" class="qq"></a> <a href="javascript:;" class="space"></a> </span> </div>
		<div class="tag"> <span class="collect like"> <img src="/Public/Home/images/tag-img00.png"/> <span>
      <h4>点赞</h4>
      <h5>23789人点赞</h5>
      </span> </span> <span class="collect"> <img src="/Public/Home/images/tag-img01.png"/> <span>
      <h4>收藏</h4>
      <h5>233人收藏</h5>
      </span> </span> <span class="collect report-bottom"> <img src="/Public/Home/images/tag-img02.png"/> <span>
      <h4>举报</h4>
      <h5>0人举报</h5>
      </span> </span> <span class="collect popularity"> <img src="/Public/Home/images/tag-img03.png"/> <span>
      <h4>人气</h4>
      <h5>232736人浏览</h5>
      </span> </span> </div>
		<div class="author">
			<div class="author-left"> <img src="/Public/Home/images/user-img10.gif"/> <span>
        <h4>大眼眶熊猫</h4>
        <h5>作者标签：卡通  动漫  人物</h5>
        <h5>成交量：234 笔</h5>
        <h5>诚信度：<img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img22.gif"/><img src="/Public/Home/images/img23.gif"/><img src="/Public/Home/images/img23.gif"/></h5>
        </span>
				<input name="" type="button" value="已关注">
			</div>
			<div class="author-right"> <img src="/Public/Home/images/img24.gif"/><img src="/Public/Home/images/img24.gif"/><img src="/Public/Home/images/img24.gif"/> <span class="cutover"> <a href="#"></a><a href="#"></a><a href="#"></a> </span> </div>
		</div>
		<div class="activity-banner"> <img src="/Public/Home/images/banner-img03.gif"/> </div>
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