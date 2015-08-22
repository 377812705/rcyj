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

    <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.validate.min.js"></script>
    <script type="text/javascript">
        var newhtml;
        var imageid;
        $(function () {
            /* 初始化上传插件                 */
            $("#upload-file").uploadify({
                "height"          : 55,
                "width"           : 164,
                "buttonClass"     : "tupian",
                "swf"             : "/Public/static/uploadify/uploadify.swf",
                "buttonImage"     : "/Public/Home/images/optionfile.png",
                "uploader"        : "/MyCenter/upload.html",
                "fileTypeDesc"    : "请选择jpg gif png文件",
                'fileSizeLimit'   : 0,
                "removeTimeout"   : 0,
                "fileTypeExts"    : '*.jpg;*.gif;*.png',
                'onInit'		  : init,
                'multi'			  : true,
                "onUploadSuccess" : uploadSuccess,
                'onFallback' : function() {
                    alert('未检测到兼容版本的Flash.');
                }
            });
            $(".submit").bind('click', function () {
                alert(imageid);
                //$("#form0").submit();
            });

            $("#copyri").children('li').bind('click',function(){
                var newhtml;
                var copyrig=$("#copyri").children('.checkon');
                $.each(copyrig, function(i, n){
                    if(i==0){
                        newhtml= n.textContent+";";
                    }else{
                        newhtml=newhtml +n.textContent+";";
                    }
                });
                $(this).parents(".label-span").find("a").html(newhtml).css("color","#424242");
                $("#Copyright").val(newhtml);
            });
            //表单验证
            $("#form0").validate({
                errorPlacement: function (error, element) {
                        element.focus();;
                },
                rules: {
                    title: {
                        required:true,
                        maxlength: 50
                    }
                },
                messages: {
                    title: {
                        required:"请输入作品名称",
                        maxlength: "请输入最多50个字符或者汉字"
                    }
                }
            });

        });

        function init(){
            $('#upload-file').css('display','inline-block');
        }

        /* 文件上传成功回调函数 */
        function uploadSuccess(file, data){
            console.log(data);

            $('#' + file.id).find('.data').html(' 上传完毕');
            var data = $.parseJSON(data);
            //alert(data.info+'--'+data.data);
            if(data.status){
               // alert(data.msg);
                console.log(data.msg);
                imageid+=data.msg;
            } else {
               // alert(data.msg);
                console.log(data.msg);
            }
        }
    </script>

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
                <li class="nextnavon activ-li"><a href="#">上传作品</a></li>
            </ul>
            <form action="/MyCenter/uploadWork.html" id="form0" method="post">
                <input id="worktag" name="worktag" hidden/>
                <input id="worksource" name="worksource" hidden/>
                <input id="workshow" name="workshow" hidden/>
                <input id="Copyright" name="Copyright" hidden/>
                <div class="custom-content">
                    <ul>
                        <li>Hi，<?php echo session('user_auth.username');?>，欢迎您来上传作品；带有 <span>*</span> 的项目都是必填项哦。</li>
                        <li class="fill name">
                            <h5><span>*</span>作品名称：</h5>
                            <input id="title" name="title" type="text" class="gray" value="请写出你的作品名称，让你的作品更加丰富多彩。"
                                   onclick="if(this.value=='请写出你的作品名称，让你的作品更加丰富多彩。'){this.value='';this.className='white'}"
                                   onblur="if(this.value=='') {this.value='请写出你的作品名称，让你的作品更加丰富多彩。';this.className='gray'}">
                            <h6 class="price-tips">还可以输入 <span>50</span> 字符 / 汉字</h6>
                        </li>
                        <li class="fill">
                            <h5><span>*</span>作品标签：</h5>
            <span class="label-span"><a href="javascript:;" tag="worktag">请选择作品标签</a>
            <ul class="label-check radio noall">
                    <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li><?php echo ($data["tag_content"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            </span></li>
                        <li class="fill">
                            <h5><span>*</span>作品来源：</h5>
            <span class="label-span"><a href="javascript:;" tag="worksource">请选择作品来源</a>
            <ul class="label-check radio">
                <li>个人作品</li>
                <li>企业作品</li>
                <li>自创作品</li>
            </ul>
            </span></li>
                        <li class="fill">
                            <h5><span>*</span>展示方式：</h5>
            <span class="label-span"><a href="javascript:;" tag="workshow">请选择展示方式</a>
            <ul class="label-check radio">
                <li class="checkon">全部</li>
                <li>展示方式1</li>
                <li>展示方式2</li>
                <li>展示方式3</li>
            </ul>
            </span></li>
                        <li class="fill">
                            <h5><span>*</span>作品价格：</h5>
                            <input name="workmoney" type="text" class="gray" value="请进行填写价格"
                                   onclick="if(this.value=='请进行填写价格'){this.value='';this.className='white'}"
                                   onblur="if(this.value=='') {this.value='请进行填写价格';this.className='gray'}">
                        </li>
                        <li class="fill">
                            <h5><span>*</span>完成时间：</h5>
                            <span class="time-span">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;日  - &nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日</span>
                            <h6 class="price-tips">请填写你作品完成的时间</h6>
                        </li>
                        <li class="fill">
                            <h5>上传图片：</h5>
                            <input name="file" type="button" id="upload-file">
                            <!--<input type="button" name="file" value="选择图片" id="upload-img">-->
                            <h6 class="upload-tips" style="margin-top: -55px;">
                                单张图片5M以内，RGB模式，支持jpg/gif/png格式，长不超过8000，宽不超过2000。最多允许上传30张，支持批量上传。</h6>
                        </li>
                        <li class="fill">
                            <h5>角色说明：</h5>
                        <textarea name="workrole" class="description" onkeyup="this.value = this.value.slice(0, 2000)"
                                  onfocus="if(value=='作品的简单介绍等'){value='';this.className='description02'}"
                                  onblur="if (value==''){value='作品的简单介绍等';this.className='description'}">作品的简单介绍等</textarea>
                            <h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
                        </li>
                        <li class="fill">
                            <h5>故事梗概：</h5>
                        <textarea name="workcontent" class="description" onkeyup="this.value = this.value.slice(0, 2000)"
                                  onfocus="if(value=='作品的简单介绍等'){value='';this.className='description02'}"
                                  onblur="if (value==''){value='作品的简单介绍等';this.className='description'}">作品的简单介绍等</textarea>
                            <h6>还可以输入 <span>2000</span> 字符 / 汉字</h6>
                        </li>
                        <li class="fill copyright">
                            <h5><span>*</span>版权设置：</h5>
            <span class="label-span"><a href="javascript:;" tag="Copyright">不限制作品用途</a>
            <ul class="label-check" id="copyri">
                <li>禁止商业使用</li>
                <li>禁止个人使用</li>
                <li>禁止匿名转发</li>
                <li>禁止商业使用</li>
                <li>不限制作品用途</li>
            </ul>
            </span></li>
                        <li class="fill btn">
                            <input class="submit" name="" type="button" value="提交">
                        </li>
                    </ul>
                </div>
            </form>
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