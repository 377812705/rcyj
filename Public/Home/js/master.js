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
		var xflag = false;
		if(!$(this).hasClass("checkon")){
			var maxck = $(this).parent().attr("max");
			if(maxck && parseInt(maxck) > 0){
				xflag = true;
				if($(".checkon").length >= parseInt(maxck)){
					alert("最多只能选择三个项！");
					return ;
				}
			}
		}
		$(this).toggleClass("checkon");
		if(xflag){
			var txt = '';
			$(this).parent().children().each(function(){
				if($(this).hasClass("checkon")){
					txt = txt + $(this).html() + ";";
				}
			});
			if(txt != ''){
				txt = txt.substring(0, txt.lastIndexOf(';'));
			}
			$(".label-span>a").html(txt).css("color","#424242");
			$(this).parent().hide();
		}
		$("#"+$(this).parent().attr("id")).attr("value",$(this).attr("value"));
		if($(this).parent().attr("id")=='worktag'){
			if($(this).attr("value")==1){
				$("#xq").hide();
				$("#kt").show();
			}
			if($(this).attr("value")==2){
				$("#xq").show();
				$("#kt").hide();
				$('#flieinputxq').each(function () {                
				   $(this).children('div').eq(1).css('width','72px');
				   $(this).children('div').eq(1).css('height','39px');
				});
			}
		}if($(this).parent().attr("id")=='sellcate'){
			if($(this).attr("value")==1){
				$("#authorizeyesno").hide();
				$("#moneyyesno").show();
			}
			if($(this).attr("value")==2){
				$("#moneyyesno").hide();
				$("#authorizeyesno").show();
			}
		}
	});

	$(".radio>li").click(function(){
	var newhtml = $(this).html();
	$(this).addClass("checkon").siblings().removeClass("checkon");
	$(this).parent().hide();
	$(this).parents(".label-span").find("a").html(newhtml).css("color","#424242");
	$(this).parents(".label-span").find("input").val(newhtml);
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
		$("#"+$(this).parent().attr("id")+"list").attr("value",$(this).attr("value"));
		$("#formprod").submit();
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
	//$(".brief-right input").click(function(){
	//	$(this).addClass("attention");
	//	$(this).val("已关注")
	//	})
	//$(".brief-right input.grab-btn").click(function(){
	//	$(this).addClass("grab-btnon");
	//	$(this).val("已抢单");
	//	})
	});
	
	
	function strLenCalc(obj, checklen, maxlen) { 
	　　var v = obj.val(), charlen = 0, maxlen = !maxlen ? 4000 : maxlen, curlen = maxlen, len = v.length; 
	　　for(var i = 0; i < v.length; i++) { 
	　　　　if(v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) { 
			   curlen -= 1; 
			} 
		} 
	　　if(curlen >= len) {
		  obj.siblings("."+checklen).html("还可输入<span class='word-count'>" + Math.floor((curlen-len)/2) + "</span> 字符 / 汉字");
		} else {
		  obj.siblings("."+checklen).html("已经超过 <span class='word-count'>" + Math.ceil((len-curlen)/2) + "</span> 字符 / 汉字");
		} 
	}

function getFormatDate(varday)
{
	var day = varday;
	var Year = 0;
	var Month = 0;
	var Day = 0;
	var CurrentDate = "";
	//初始化时间
	//Year= day.getYear();//有火狐下2008年显示108的bug
	Year= day.getFullYear();//ie火狐下都可以
	Month= day.getMonth()+1;
	Day = day.getDate();
	//Hour = day.getHours();
	// Minute = day.getMinutes();
	// Second = day.getSeconds();
	CurrentDate += Year + "-";
	if (Month >= 10 )
	{
		CurrentDate += Month + "-";
	}
	else
	{
		CurrentDate += "0" + Month + "-";
	}
	if (Day >= 10 )
	{
		CurrentDate += Day ;
	}
	else
	{
		CurrentDate += "0" + Day ;
	}
	return CurrentDate;
}
	
	$(function() { 
		//$(".fill textarea").keyup(); 
	}); 		
	$(".nav li").click(function(){
		$(this).addClass("navon").siblings().removeClass("navon")
		})
	