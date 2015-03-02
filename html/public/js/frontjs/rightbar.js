$(document).ready(function(){
	
	$(window).load(function(){
		var init = $(document).height() - 145 - $(".rightbar_page_div").offset().top - $(".rightbar_page_div").height();
		if(init > 390) {
			for(var i = 0; i < parseInt(init / 390); i++) {
				var adv_html = "<div class='rightbar_adv_item'><img src='./public/img/frontimg/adv_blank.jpg' width='250px' height='380px'></div>"
				$(".rightbar_adv_div").append(adv_html);
			}
		}
	});
	
});