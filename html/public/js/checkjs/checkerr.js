$(document).ready(function(){
	$("#photo_err").hide();
	$("#picture_err").hide();
	var photo_err	= $("#photo_err").val();
	var picture_err	= $("#picture_err").val();
	
	if(photo_err == 1){
		alertify.error("亲，你选择的图片太大，请重新选择!");
	}else if(photo_err == 2){
		alertify.error("亲，你选择的文件不是图片类型，请重新选择!");
	}else if(photo_err == 3){
		alertify.error("亲,你没有选择图片");
	}else if(photo_err == 5){
		alertify.success("亲，修改头像成功！");
	}
	if(picture_err == 1){
		alertify.error("亲，你选择的图片太大，请重新选择!");
	}else if(picture_err == 2){
		alertify.error("亲，你选择的文件不是图片类型，请重新选择!");
	}else if(picture_err == 4){
		alertify.success("亲，投递文章成功！");
	}
})