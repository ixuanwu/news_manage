$(document).ready(function(){

	//header分割线长度控制，登陆注册框div位置控制在屏幕中间
	$(window).load(function(){
		$(".loginregist_div").css("top", $(window).height()/2 - 170 > 0 ? parseInt(($(window).height()/2 - 170) + $(document).scrollTop()) + "px" : $(document).scrollTop() + "px");
		if($(this).width() <= 1000) {
			$(".head_hr").css("width", "1010px");
			$(".loginregist_div").css("left", "330px");
			$(".loginregist_div").css("margin-left", "0px");
		} else {
			$(".head_hr").css("width", "100%");
			$(".loginregist_div").css("left", "50%");
			$(".loginregist_div").css("margin-left", "-175px");
		}
	});
	
	//header分割线长度控制，登陆注册框div位置控制在屏幕中间，遮罩层大小控制
	$(window).resize(function(){
		$(".loginregist_div").css("top", $(window).height()/2 - 170 > 0 ? parseInt(($(window).height()/2 - 170) + $(document).scrollTop()) + "px" : $(document).scrollTop() + "px");
		$(".shade_div").css("height", $(document).height());
		if($(this).width() <= 1000) {
			$(".head_hr").css("width", "1010px");
			$(".shade_div").css("width", $(document).width());
			$(".loginregist_div").css("left", "330px");
			$(".loginregist_div").css("margin-left", "0px");
		} else {
			$(".head_hr").css("width", "100%");
			$(".shade_div").css("width", $(window).width());
			$(".loginregist_div").css("left", "50%");
			$(".loginregist_div").css("margin-left", "-175px");
		}
	});
	
	//窗口滚动注册登录窗口始终在中间
	$(window).scroll(function(){
		$(".loginregist_div").css("top", $(window).height()/2 - 170 > 0 ? parseInt(($(window).height()/2 - 170) + $(document).scrollTop()) + "px" : $(document).scrollTop() + "px");
	});
	
	//点击登录链接
	$("#login_btn").click(function(){
		//开启遮罩层
		$(".shade_div").css("width", $(document).width());
		$(".shade_div").css("height", $(document).height());
		$(".shade_div").css("display", "inline");
		//调整登陆注册选项卡被点击样式
		$("#login_control_div").attr("class", "loginregist_control_hover_div");
		$("#regist_control_div").attr("class", "loginregist_control_div");
		$("#login_panel").css("display", "inline");
		$("#regist_panel").css("display", "none");
		//显示登陆注册弹出框
		$(".loginregist_div").css("display", "inline");
	});
	
	//点击注册链接
	$("#regist_btn").click(function(){
		//开启遮罩层
		$(".shade_div").css("width", $(document).width());
		$(".shade_div").css("height", $(document).height());
		$(".shade_div").css("display", "inline");
		//调整登陆注册选项卡被点击样式
		$("#login_control_div").attr("class", "loginregist_control_div");
		$("#regist_control_div").attr("class", "loginregist_control_hover_div");
		$("#login_panel").css("display", "none");
		$("#regist_panel").css("display", "inline");
		//显示登陆注册弹出框
		$(".loginregist_div").css("display", "inline");
	});
	
	$("#login_control_div").click(function(){
		//调整登陆注册选项卡被点击样式
		$("#login_control_div").attr("class", "loginregist_control_hover_div");
		$("#regist_control_div").attr("class", "loginregist_control_div");
		$("#login_panel").css("display", "inline");
		$("#regist_panel").css("display", "none");
	});
	
	$("#regist_control_div").click(function(){
		//调整登陆注册选项卡被点击样式
		$("#login_control_div").attr("class", "loginregist_control_div");
		$("#regist_control_div").attr("class", "loginregist_control_hover_div");
		$("#login_panel").css("display", "none");
		$("#regist_panel").css("display", "inline");
	});
	
	$(".loginregist_close_div").click(function(){
		//关闭登陆注册框
		$(".loginregist_div").css("display", "none");
		//关闭遮罩层
		$(".shade_div").css("display", "none");
	});
	
//	$(".banner_item_normal").mouseover(function(){
//		//导航条划过效果
//		$(this).css("background-image", "url('./public/img/frontimg/banner_hover.png')");
//		$(this).css("color", "white");
//	});
//	
//	$(".banner_item_normal").mouseout(function(){
//		//导航条划过效果
//		$(this).css("background-image", "url('./public/img/frontimg/banner_normal.png')");
//		$(this).css("color", "black");
//	});
	
});