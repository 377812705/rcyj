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
								<li class="nextnavon">
                                		<a href="#">个人订制</a>
										<ul class="custom-ul">
												<li class="custom-li"><a href="#">形象</a></li>
												<li>产品设计</li>
												<li>漫画</li>
												<li>动画</li>
												<li>游戏</li>
												<li>音乐</li>
												<li>VI</li>
												<li>广告</li>
										</ul>
								</li>
								<li><a href="#">企业订制</a></li>
						</ul>
						<div class="custom-content">
								<ul>
										<li>Hi，二郎神，欢迎您来订制；带有 <span>*</span> 的项目都是必填项哦。</li>
										<li class="fill">
												<h5><span>*</span>订制主题：</h5>
												<span class="label-span"><a href="javascript:;">请选择订制主题</a>
												<ul class="label-check radio">
														<li class="checkon">浪漫的爱情</li>
														<li>浓浓的亲情</li>
														<li>真挚的友情</li>
														<li>独一无二的自己</li>
														<li>投资型订制</li>
														<li>节日</li>
														<li class="other">其他</li>
												</ul>
												</span> 
                                                <input style="display:none;" name="" type="text" class="gray" value="请进行填写主题" onclick="if(this.value=='请进行填写主题'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请进行填写主题';this.className='gray'}">
                                                </li>
										<li class="fill">
												<h5>主题描述：</h5>
												<textarea class="description" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='写出您订制主题的描述，例如：我想要做出一个人物，是给我好朋友的。因为今天是她生日，我想告诉他，我永远都是她最好的朋友。'){value='';this.className='description02'}"onblur="if (value==''){value='写出您订制主题的描述，例如：我想要做出一个人物，是给我好朋友的。因为今天是她生日，我想告诉他，我永远都是她最好的朋友。';this.className='description'}">写出您订制主题的描述，例如：我想要做出一个人物，是给我好朋友的。因为今天是她生日，我想告诉他，我永远都是她最好的朋友。</textarea> 
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
										<li class="fill">
												<h5><span>*</span>订制方式：</h5>
												<span class="label-span"><a href="javascript:;">请选择订制方式</a>
												<ul class="label-check radio">
														<li class="checkon">一对一</li>
														<li>征集</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>形象分类：</h5>
												<span class="label-span"><a href="javascript:;">请选择形象分类</a>
												<ul class="label-check radio">
														<li class="checkon">肖像</li>
														<li>卡通</li>
														<li>插画</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>展示方式：</h5>
												<span class="label-span"><a href="javascript:;">请选择展示方式</a>
												<ul class="label-check radio">
														<li class="checkon">数码</li>
														<li>电脑绘画</li>
														<li class="checknot">传统绘画</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>风格选择：</h5>
												<span class="label-span"> <a href="javascript:;">请选择一级分类</a>
												<ul class="label-check radio">
														<li class="checkon">现代Q版</li>
														<li>现代写实</li>
														<li>现代抽象</li>
														<li>中国风Q版</li>
														<li>中国风写实</li>
														<li>无</li>
												</ul>
												</span> 
												<span class="label-span"> <a href="javascript:;">请选择二级分类</a>
												<ul class="label-check radio">
														<li class="checkon">国画</li>
														<li>水彩</li>
														<li>油彩</li>
														<li>素描</li>
														<li>速写</li>
														<li>版画</li>
														<li>雕塑</li>
														<li>无</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5>上传图片：</h5>
												<input name="" type="button" value="选择图片">
												<h6 class="upload-tips">单张图片5M以内，RGB模式，支持jpg/gif/png格式，请上传需要绘画的照片。您还可以上传一张您喜欢的肖像风格，以便作者参考；没有上传，作者会根据您的描述，给您满意的作品。</h6>
										 </li>
										 <!--“订制描述”和“订制需求”只有用户选择“形象分类==》卡通”才会显示-->
										<li class="fill">
												<h5>订制描述：</h5>
												<textarea class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。'){value='';this.className='description02'}"onblur="if (value==''){value='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。';this.className='description'}">写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
										<li class="fill showohide">
												<h5><span>*</span>订制需求：</h5>
												<span class="label-span"><a href="javascript:;">请选择卡通动作</a>
												<ul class="label-check">
														<li class="checkon">挥手</li>
														<li>亲吻</li>
														<li>掐腰</li>
														<li>求抱抱</li>
														<li>跺脚</li>
														<li>翻滚</li>
												</ul>
												</span> 
												<span class="label-span"> <a href="javascript:;">请选择卡通表情</a>
												<ul class="label-check">
														<li class="checkon">挥手</li>
														<li>亲吻</li>
														<li>掐腰</li>
														<li>求抱抱</li>
														<li>跺脚</li>
														<li>翻滚</li>
												</ul>
												</span>
												<h4>
													<span class="auto"><input name="" type="checkbox" value=""><span></span>卡通三视图</span>
													<span class="auto"><input name="" type="checkbox" value="" ><span></span>角色说明</span>
													<span class="auto"><input name="" type="checkbox" value=""><span></span>故事梗概</span>
													<span class="auto"><input class="clear-check" name="" type="checkbox" value=""><span></span>无</span>
												</h4>
												</li>
										<!--“订制描述”和“订制需求”只有用户选择“形象分类==》卡通”才会显示-->
										<li class="fill">
											<h5><span>*</span>订制价格：</h5>
											<input name="" type="text" class="gray" value="请进行填写价格" onclick="if(this.value=='请进行填写价格'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请进行填写价格';this.className='gray'}">
											<h6 class="price-tips">数码 / 电脑绘画参考价：100~5000元     表情参考价：50元 / 个     动作参考价：80元 / 个</h6>
										</li>
										<li class="fill">
											<h5><span>*</span>时间期限：</h5>
											<span class="time-span">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日  - &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
											<h6 class="price-tips">请填写你希望最迟收到作品的时间期限，不能低于七天哦。</h6>
										</li>
										<li class="fill name">
											<h5><span>*</span>名称：</h5>
											<input name="" type="text" class="gray" value="请写出你的作品名称，让你的作品更加丰富多彩。" onclick="if(this.value=='请写出你的作品名称，让你的作品更加丰富多彩。'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请写出你的作品名称，让你的作品更加丰富多彩。';this.className='gray'}">
											<h6 class="price-tips">还可以输入 <span>50</span> 字符 / 汉字</h6>
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
										<input class="submit" name="" type="button" value="提交">
									</li>
								</ul>

								<ul style="display:none;">
										<li>Hi，二郎神，欢迎您来订制；带有 <span>*</span> 的项目都是必填项哦。</li>
										<li class="fill">
												<h5><span>*</span>订制用途：</h5>
												<span class="label-span"><a href="javascript:;">请选择订制用途</a>
												<ul class="label-check radio">
														<li class="checkon">公司吉祥物</li>
														<li>动漫周边</li>
														<li>公司吉祥物</li>
														<li>动漫周边</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5>用途描述：</h5>
												<textarea class="description" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='写出您订制用途的描述，例如：能够代表我们公司的吉祥物，更多充分的展现我们公司的文化发展等。'){value='';this.className='description02'}"onblur="if (value==''){value='写出您订制用途的描述，例如：能够代表我们公司的吉祥物，更多充分的展现我们公司的文化发展等。';this.className='description'}">写出您订制用途的描述，例如：能够代表我们公司的吉祥物，更多充分的展现我们公司的文化发展等。</textarea> 
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
										<li class="fill">
												<h5><span>*</span>订制方式：</h5>
												<span class="label-span"><a href="javascript:;">请选择订制方式</a>
												<ul class="label-check radio">
														<li class="checkon">一对一</li>
														<li>征集</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>形象分类：</h5>
												<span class="label-span"><a href="javascript:;">请选择形象分类</a>
												<ul class="label-check radio">
														<li class="checkon">肖像</li>
														<li>卡通</li>
														<li>插画</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>展示方式：</h5>
												<span class="label-span"><a href="javascript:;">请选择展示方式</a>
												<ul class="label-check radio">
														<li class="checkon">数码</li>
														<li>电脑绘画</li>
														<li class="checknot">传统绘画</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5><span>*</span>风格选择：</h5>
												<span class="label-span"> <a href="javascript:;">请选择一级分类</a>
												<ul class="label-check radio">
														<li class="checkon">现代Q版</li>
														<li>现代写实</li>
														<li>现代抽象</li>
														<li>中国风Q版</li>
														<li>中国风写实</li>
														<li>无</li>
												</ul>
												</span> 
												<span class="label-span"> <a href="javascript:;">请选择二级分类</a>
												<ul class="label-check radio">
														<li class="checkon">国画</li>
														<li>水彩</li>
														<li>油彩</li>
														<li>素描</li>
														<li>速写</li>
														<li>版画</li>
														<li>雕塑</li>
														<li>无</li>
												</ul>
												</span> </li>
										<li class="fill">
												<h5>上传图片：</h5>
												<input name="" type="button" value="选择图片">
												<h6 class="upload-tips">单张图片5M以内，RGB模式，支持jpg/gif/png格式，请上传需要绘画的照片。您还可以上传一张您喜欢的肖像风格，以便作者参考；没有上传，作者会根据您的描述，给您满意的作品。</h6>
										 </li>
										 <!--“订制描述”和“订制需求”只有用户选择“形象分类==》卡通”才会显示-->
										<li class="fill">
												<h5>订制描述：</h5>
												<textarea class="description" name="" cols="" rows="" onkeyup="this.value = this.value.slice(0, 2000)" onfocus="if(value=='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。'){value='';this.className='description02'}"onblur="if (value==''){value='写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。';this.className='description'}">写出你想要的作品外貌、性格特征，兴趣、爱好、比较常用的表情、最喜欢的食物、未来的愿望等。</textarea>
												<h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
										</li>
										<li class="fill showohide">
												<h5><span>*</span>订制需求：</h5>
												<span class="label-span"><a href="javascript:;">请选择卡通动作</a>
												<ul class="label-check">
														<li class="checkon">挥手</li>
														<li>亲吻</li>
														<li>掐腰</li>
														<li>求抱抱</li>
														<li>跺脚</li>
														<li>翻滚</li>
												</ul>
												</span> 
												<span class="label-span"> <a href="javascript:;">请选择卡通表情</a>
												<ul class="label-check">
														<li class="checkon">挥手</li>
														<li>亲吻</li>
														<li>掐腰</li>
														<li>求抱抱</li>
														<li>跺脚</li>
														<li>翻滚</li>
												</ul>
												</span>
												<h4>
													<span class="auto"><input name="" type="checkbox" value=""><span></span>卡通三视图</span>
													<span class="auto"><input name="" type="checkbox" value="" ><span></span>角色说明</span>
													<span class="auto"><input name="" type="checkbox" value=""><span></span>故事梗概</span>
													<span class="auto"><input class="clear-check" name="" type="checkbox" value=""><span></span>无</span>
												</h4>
												</li>
										<!--“订制描述”和“订制需求”只有用户选择“形象分类==》卡通”才会显示-->
                                        <!--“订制方式”选择“征集”时价格不是必填项并去掉价格参考值-->
										<li class="fill">
											<h5><span>*</span>订制价格：</h5>
											<input name="" type="text" class="gray" value="请进行填写价格" onclick="if(this.value=='请进行填写价格'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请进行填写价格';this.className='gray'}">
											<h6 class="price-tips">数码 / 电脑绘画参考价：100~5000元     表情参考价：50元 / 个     动作参考价：80元 / 个</h6>
										</li>
                                        <!--“订制方式”选择“征集”时价格不是必填项并去掉价格参考值-->
										<li class="fill">
											<h5><span>*</span>时间期限：</h5>
											<span class="time-span">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日  - &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
											<h6 class="price-tips">请填写你希望最迟收到作品的时间期限，不能低于七天哦。</h6>
										</li>
										<li class="fill name">
											<h5><span>*</span>名称：</h5>
											<input name="" type="text" class="gray" value="请写出你的作品名称，让你的作品更加丰富多彩。" onclick="if(this.value=='请写出你的作品名称，让你的作品更加丰富多彩。'){this.value='';this.className='white'}" onblur="if(this.value=='') {this.value='请写出你的作品名称，让你的作品更加丰富多彩。';this.className='gray'}">
											<h6 class="price-tips">还可以输入 <span>50</span> 字符 / 汉字</h6>
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
										<input class="submit" name="" type="button" onClick="javascript:location.href='perfect.html'"  value="提交">
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