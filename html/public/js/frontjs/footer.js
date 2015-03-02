$(document).ready(function(){
	
	//footer分割线长度控制
	$(window).load(function(){
		if($(this).width() <= 1000) {
			$(".foot_hr").css("width", "1010px");
		} else {
			$(".foot_hr").css("width", "100%");
		}
	});
	
	//footer分割线长度控制
	$(window).resize(function(){
		if($(this).width() <= 1000) {
			$(".foot_hr").css("width", "1010px");
		} else {
			$(".foot_hr").css("width", "100%");
		}
	});
	
});