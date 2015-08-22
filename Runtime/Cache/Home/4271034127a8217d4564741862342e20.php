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
	<!-- /头部 -->
	
	<!-- 主体 -->
	

  <!--------页面内容部分--------->
  <div class="container content">
    <div class="custom">
      <ul class="nextnav no-drop author-nav">
        <li class="nextnavon"><a href="javascript:;">我的订单</a></li>
        <li><a href="javascript:;">我的作品</a></li>
        <li><a href="javascript:;">收藏作品</a></li>
        <li><a href="javascript:;">关注作者</a></li>
      </ul>
    </div>
    <div class="author-content">
      <div class="module">
        <div class="module-tle authortle">
          <h5>Hi，<span>二郎神</span>，欢迎查看您的订单，为了让您能更清楚自己的交易详情。 </h5>
        </div>
        <div class="author-filter">
          <h5> 状态： <a href="/order/orderlist.html" <?php if($order_type == null): ?>class="carryout aon" <?php else: ?> class="carryout"<?php endif; ?> > 全部订单</a> <a href="/order/orderlist/paytype/1.html" <?php if($order_type == 1): ?>class="carryout aon" <?php else: ?> class="carryout"<?php endif; ?> > 已支付</a> <a href="/order/orderlist/paytype/0.html" <?php if($order_type == '0'): ?>class="carryout aon" <?php else: ?> class="carryout"<?php endif; ?>>未支付</a><!-- <a href="javascript:;" class="current">未评价</a></h5> -->
        </div>
        <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="order-left nofloat"> <span class="order-tle"><?php echo ($data["create_date"]); ?>   订单号：<?php echo ($data["order_number"]); ?></span>
	          <div class="order-content order-main"> <img src="http://www.2ciyuanjie.com/<?php echo ($data["main_image_url"]); ?>" alt="作品图片-<?php echo ($data["work_title"]); ?>" style="display：block;width: 200px;height: 140px;"/> <span>
	            <h4><?php echo ($data["work_title"]); ?></h4>
	            <h5>主题：浪漫的爱情 <span> 标签：<?php echo ($data["tags_content"]); ?>  </span> <span>形象分类：肖像</span></h5>
	            <h5>订制方式：一对一 <span>展示方式：数码 / 电脑绘画</span></h5>
	            <h5>风格选择：现代Q版 <span>速写</span></h5>
	            <h5>订制价格：<?php echo ($data["money"]); ?>元<!--  <span>订制时间：10天</span>--> </h5>
	            </span> </div>
	          <div class="price">
	            <h4>￥<?php echo ($data["money"]); ?></h4>
	            <h5>（含运费：￥0.00）</h5>
	          </div>
	          <div class="operating"> <span><?php echo ($paytype[$data[order_type]]); ?><a class="report-a" onclick="orderclick(<?php echo ($data["order_id"]); ?>)" >订单详情</a></span>
	            <h5 class="evaluate-btn"><a href="javascript:;">评价</a></h5>
	          </div>
	        </div>
	    	<div class="report-content order-details" id="report-content<?php echo ($data["order_id"]); ?>" style="display:none;">
        		<div class="report-tle">订单详情<a href="javascript:;"><img src="/Public/Home/images/colse-btn.gif"/></a></div>
        		<div class="report-main">
	          		<h4>当前订单状态：<?php echo ($paytype[$data[order_type]]); ?> <?php if($data[order_type] == 1): ?><span>交易成功，请及时给作者评价。</span><?php endif; ?></h4>
	          		<span class="details-list">
	          		<h5>主题：<?php echo ($data["work_title"]); ?></h5>
	          		<h5>作者昵称：<?php echo ($data["auther"]); ?>    </h5>
	          		<h5>订单号：<?php echo ($data["order_number"]); ?></h5>
	          		<h5>创建时间：<?php echo ($data["create_date"]); ?></h5>
	          		<h5>付款时间：<?php echo ($data["pay_time"]); ?>     确认时间：<?php echo ($data["create_date"]); ?></h5>
	          		<span class="actually">
	          		<h3>实付款：<span>￥<?php if($data[pay_money] > 0): echo ($data["pay_money"]); else: ?>0<?php endif; ?></span></h3>
	          		</span> </span> 
	          	</div>
        	<div class="report-btn evaluation-btn">
          <input name="" type="button" value="评 价">
        	</div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      
      
         <?php echo ($show); ?>
         

  </div>


	<!-- /主体 -->

	<!-- 底部 -->
	<footer class="container footer">版权所有：北京世纪元通网络科技有限公司  京ICP备14025166号-1</footer>

	<!-- /底部 -->
</body>
</html>