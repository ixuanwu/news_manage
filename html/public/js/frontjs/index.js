$(document).ready(function(){
	
	$.extend({scroll_time: function(){
		//每隔 3 秒自动滚动图片
		scroll_interval = setInterval(function scroll_time(){
			// 如果滚动图片动画进行中 点击无效
	        if(!$(".scroll_image_item_div:animated").length) {
	        	for (var i = 1; i < 6; i++) {
	    			var item = $("#scroll_image_item" + i);
	    			if(item.css("display") != "none"){
	    				// i 为正在显示的滚动图片序号
	    				if(i < 5) {
	    					// 图片向左滑动 1 格
	    					$("#scroll_image_item" + (i + 1)).css("left", "400px");
	    					$("#scroll_image_item" + (i + 1)).css("display", "inline");
	    					item.animate({left: "-400px"}, function(){
	    						item.css("display", "none");
	    					});
	    					$("#scroll_image_item" + (i + 1)).animate({left: "0px"});
	    				} else {
	    					// 图片滑回 1 格
	    					$("#scroll_image_item1").css("left", "400px");
	    					$("#scroll_image_item1").css("display", "inline");
	    					item.animate({left: "-400px"}, function(){
	    						item.css("display", "none");
	    					});
	    					$("#scroll_image_item1").animate({left: "0px"});
	    				}
	    				break;
	    			}
	   			}
	        }
		}, 3000);
	}});
	
	$(window).load(function(){
		// 滚动图片显示第一张
		$("#scroll_image_item1").css("display", "inline");
		// 每隔 3 秒滚动图片一次
		$.scroll_time();
	});
	
	$(".scroll_bar_btn_div").mouseover(function(){
		// 改变样式
		$(this).css("opacity", "1");
		$(this).css("filter", "alpha(opacity=100)");
		$(this).css("-moz-opacity", "1");
		$(this).css("-khtml-opacity", "1");
		// 如果滚动图片动画进行中 点击无效
        if(!$(".scroll_image_item_div:animated").length) {
    		// 获得点击的序号
    		var num = this.id.substring(this.id.length-1, this.id.length);
    		for (var i = 1; i < 6; i++) {
    			var item = $("#scroll_image_item" + i);
    			if(item.css("display") != "none"){
    				// i 为正在显示的滚动图片序号
    				if(i > parseInt(num)) {
    					// 图片向右滑动
    					$("#scroll_image_item" + num).css("left", "-400px");
    					$("#scroll_image_item" + num).css("display", "inline");
    					item.animate({left: "400px"}, function(){
    						item.css("display", "none");
    					});
    					$("#scroll_image_item" + num).animate({left: "0px"});
    				} else if (i < parseInt(num)) {
    					// 图片向左滑动
    					$("#scroll_image_item" + num).css("left", "400px");
    					$("#scroll_image_item" + num).css("display", "inline");
    					item.animate({left: "-400px"}, function(){
    						item.css("display", "none");
    					});
    					$("#scroll_image_item" + num).animate({left: "0px"});
    				}
    				break;
    			}
        		//自动滑动重新计时
    			clearInterval(scroll_interval);
        		$.scroll_time();
    		}
        }
        
	});$(".scroll_bar_btn_div").mouseout(function(){
		// 改变样式
		$(this).css("opacity", "0.3");
		$(this).css("filter", "alpha(opacity=30)");
		$(this).css("-moz-opacity", "0.3");
		$(this).css("-khtml-opacity", "0.3");
	});
	
});