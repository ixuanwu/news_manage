function checkDel(username,userid){
	res =	confirm("您确定要删除用户："+username+" ?");
	if(res==1){
		data	=	{"mod":"admin","act":"deleteUser","userid":userid};
		$.get("index.php",data,function(rtn){
			console.log(rtn);
			if($.trim(rtn)=="success"){
				alertify.success("成功删除："+username);
				console.log("#del"+userid);
				$("#del"+userid).remove();
			}else{
				alertify.error("删除失败,可能:<br/><1>该用户不存在<br/><2>您不具备相应的权限");
			}
		});
	}else{
		return false;
	}
}

//管理员删除评论
function admincomdel(comid,articleid){
	if (confirm("确定要删除吗?")) {
		$.post("index.php?mod=comment&act=admincomdel",
				  {
				    "commentId": comid,
				    "articleId": articleid,
				  },
				  function(data){
					  if ($.trim(data) == "success") {
						  var trId = "#com_" + comid;
						  $(trId).remove();
						  alertify.success("成功删除!");
					  }else {
						  alert($.trim(data));
					}
		});
	}
}

//检测文章ID和用户ID是否为数字
function checkselect(){
	var id = '' + $("#articleId").val();
	if(id != '' && isNaN(id)){
		alertify.error("文章ID为数字！");
		return false;
	}
	id 	= '' + $("#userId").val();
	if(id != '' && isNaN(id)){
		alertify.error("用户ID为数字！");
		return false;
	}
}