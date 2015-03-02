/*个人中心JS
作者：李金彦
日期：2014-09-27
*/
//隐藏个人中心右边版块
function hideDiv(oldId) {
	oldId.css("display", "none");
}
//显示个人中心右边版块
function showDiv(newId) {
	newId.css("display","");
}
//标记标题
function showTitle(newId) {
	newId.css("font-size", "16px");
	newId.css("color", "black");
	newId.css("font-weight", "900");

}
//取消标记
function hideTitle(oldId) {
	oldId.css("font-size", "13px");
	oldId.css("color", "gray");
	oldId.css("font-weight", "300");
}

$(document).ready(function(){
	$(window).load(function(){
		var serviceid = 0;
		var url = window.location.href.split('?')[1].split('&');
		for (var i=0;i<url.length;i++) {
			if (url[i].substr(0,9)=='serviceid') {
				serviceid = url[i].split('=')[1];
			}
		}
		switch (serviceid) {
		case "2":choosediv(1);break;
		case "3":choosediv(2);break;
		case "4":choosediv(3);break;
		case "5":choosediv(4);break;
		default:choosediv(0);break;
		}
	});
	
	function choosediv(serviceid) {
		for(var i = 0; i < 5; i++) {
			if(i == serviceid) {
				showDiv($("#dis" + (i + 1)));
				showTitle($("#my_menu" + i));
			} else {
				hideDiv($("#dis" + (i + 1)));
				hideTitle($("#my_menu" + i));
			}
		}
	}
	
});
	