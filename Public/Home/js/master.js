// JavaScript Document
function orderclick(id){
		$(".color-div").show();
		$("#report-content"+id).show();
}
$(function(){
	/*下拉列表*/
	$(".label-span a").click(function(){
		var obj = $(this).parent().find(".label-check");
		$(".label-check").each(function(idx, ele){
			if(obj[0] != ele){
				$(ele).hide();
			}
		});
		$(this).parent().find(".label-check").toggle();
		$(this).parent().toggleClass("check");
	})
	/*下拉列内容表选项选中取消*/
	$(".label-check>li").click(function(){
	$(this).toggleClass("checkon");
	})
	$(".radio>li").click(function(){
	var newhtml = $(this).html();
	$(this).addClass("checkon").siblings().removeClass("checkon");
	$(this).parent().hide();
	$(this).parents(".label-span").find("a").html(newhtml).css("color","#424242");
	$(this).parent().parent().parent().find("input[type='text']").hide();
	})
	/*订制tab页切换*/
	$(".nextnav>li").click(function(evt){
		$(this).addClass("nextnavon").siblings().removeClass("nextnavon");
		$(".custom-content > ul").hide().eq($('.nextnav > li').index(this)).show();
		$(this).find(".custom-ul").toggle(); 
		if(0 == $('.nextnav > li').index(this)){
			evt.stopPropagation(); 
		}
		})
	/*订制tab内容切换*/
	$(".custom-li").click(function(){
		$(this).removeClass("custom-li").addClass("custom-all").siblings().removeClass("custom-all").addClass("custom-li");
	});
	/*描述内容添加title*/
	$(".fill textarea").mouseover(function(){
		var htmltxt=$(this).html();
		$(this).attr({title:htmltxt});
		})
	/*复选框选择”无“清空前边选项并禁用选框*/
	$(".clear-check").click(function(){
		if($(this).is(":checked")){
			$(this).parent().parent().find(".auto input[type='checkbox']").each(function(index, element) {
                if(!$(element).hasClass("clear-check")){
					$(element).attr("disabled", "true");
					$(element).removeAttr("checked")
				}
            });
		}else {
			$(this).parent().parent().find(".auto input[type='checkbox']").each(function(index, element) {
                if(!$(element).hasClass("clear-check")){
					$(element).removeAttr("disabled");
				}
            });
		}
		})
	/*点击其他显示input*/
	$(".other").click(function(){
		$(this).parent().parent().parent().find("input[type='text']").show();
		})
	/*作者详情页 筛选*/
	$(".author-filter>h5>a").click(function(){
		$(this).addClass("aon").siblings().removeClass("aon");
		})
	
	/*作者详情页切换*/
	$(".author-nav li").click(function(){
		$(".module").hide().eq($('.author-nav > li').index(this)).show();
		if($(this).children("a").hasClass("fans")){
			$(".upload-hide").show();
		}else {
			$(".upload-hide").hide();
		}
	});
	$(".details-left h5 a").click(function(){
		$(this).parent().addClass("point");
		$(this).parent().find(".add-attention").html("已关注");
		})
	$(".report-tle a").click(function(){
		$(".color-div").hide();
		$(".report-content").hide();
		$(".cancel-order").hide();
		$(".edit-order").hide();
		$(".add-money").hide();
		$(".noaccepting-order").hide();
		$(".report-alert").hide();
		})
	$(".current").click(function(){
		$(".module-get").show();
		$(".module").hide();
		})
	$(".carryout").click(function(){
		$(".module").eq(0).show();
		$(".module-get").hide();
		})
	$(".order-evaluation a").mouseover(function(){
		$(this).find("div").show();
		})
	$(".order-evaluation a").mouseout(function(){
		$(this).find("div").hide();
		})
	$(".edittle a").click(function(){
		$(this).parent().hide();
		})
	$(".pay-by>ul li a").click(function(){
		$(this).parent().addClass("payon").siblings().removeClass("payon");
		$(".pay-details").hide().eq($('.pay-by>ul li a').index(this)).show();
		})
	$(".cancel-a").click(function(){
		$(".color-div").show();
		$(".cancel-order").show();
		})
	$(".edit-a").click(function(){
		$(".color-div").show();
		$(".edit-order").show();
		})
	$(".add-edit").click(function(){
		$(".color-div").show();
		$(".add-money").show();
		})
	$(".report-click").click(function(){
		$(".color-div").show();
		$(".report-alert").show();
		})
	$(".noaccepting-a").click(function(){
		$(".color-div").show();
		$(".noaccepting-order").show();
		})
	$(".img-btn li a").mouseenter(function(){
		$(".nextmenu").hide();
		$(this).parent().addClass("color-li").siblings().removeClass("color-li");
		$(this).parent().find(".nextmenu").toggle();
		})
	$(".img-btn li a").mouseleave(function(){
		$(".nextmenu").hide();
		})
	$(".nextmenu li").mouseenter(function(){
		$(this).parent().show();
		})
	$(".nextmenu li").mouseleave(function(){
		$(this).parent().hide();
		})
	$(".page li a").click(function(){
		$(this).parent().addClass("lion").siblings().removeClass("lion");
		})
	$(".module-right input").click(function(){
		$(this).addClass("attention");
		$(this).val("已关注")
		})
	$(".brief-right input").click(function(){
		$(this).addClass("attention");
		$(this).val("已关注")
		})
	$(".brief-right input.grab-btn").click(function(){
		$(this).addClass("grab-btnon");
		$(this).val("已抢单")
		})
	});
	
	
	function strLenCalc(obj, checklen, maxlen) { 
	　　var v = obj.val(), charlen = 0, maxlen = !maxlen ? 4000 : maxlen, curlen = maxlen, len = v.length; 
	　　for(var i = 0; i < v.length; i++) { 
	　　　　if(v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) { 
			   curlen -= 1; 
			} 
		} 
	　　if(curlen >= len) { 
			$("."+checklen).html("还可输入<span class='word-count'>" + Math.floor((curlen-len)/2) + "</span> 字符 / 汉字"); 
		} else { 
			$("."+checklen).html("已经超过 <span class='word-count'>" + Math.ceil((len-curlen)/2) + "</span> 字符 / 汉字"); 
		} 
	} 
	
	
	
	$(function() { 
		//$(".fill textarea").keyup(); 
	}); 
			
			
	