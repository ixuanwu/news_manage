$(document).ready(function(){
$("#uparticle-btn").click(function(){
	    var title, column, picture, introduce, content;
	    title		= $.trim($("#title").val());
	    column		= $.trim($("#column").val());
	    picture		= $.trim($("#picture").val());
	    introduce	= $.trim($("#introduce").val());
		if(title == ''){
			alertify.error("文章标题不能为空！");
			$("#title").focus();
			return false;
		}else if(title.length > 60){
			alertify.error("文章标题不能超过60字！");
			$("#title").focus();
			return false;
		}
		if(introduce == ''){
			alertify.error("文章导语不能为空！");
			$("#introduce").focus();
			return false;
		}else if(introduce.length > 200){
			alertify.error("文章导语不能超过200字！");
			$("#introduce").focus();
			return false;
		}
		if(window.editor1.html() == ''){
			alertify.error("文章内容不能为空！");
			$("#content").focus();
			return false;
		}
	});
});

$(document).ready(function(){
	$("#headpho_btn").click(function(){
		var photo_url	= $.trim($("#headphoto").val());
		if(photo_url == ''){
			alertify.error("上传头像不能为空！");
			$("#headphoto").focus();
			return false;
		}
	});
});