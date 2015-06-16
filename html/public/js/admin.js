function checkDel(username,userid){
	data	=	{"mod":"admin","act":"deleteUser","userid":userid};
	alertify.confirm("真的要删除吗?",function(e){
		if(e) {
			$.get("index.php",data,
			 function(rtn){
				if($.trim(rtn)=="success"){
					 alertify.success("成功用户:"+username);
					  setTimeout('location.href=location.href',1000);
				}else{
					alertify.error("删除失败,可能:<br/><1>该用户不存在<br/><2>您不具备相应的权限");
				}
			});
		}
	});
}

//管理员删除评论
function admincomdel(comid,articleid){
	alertify.confirm("真的要删除吗?",function(e){
		if(e) {
			$.post("index.php?mod=comment&act=admincomdel",
					  {
					    "commentId": comid,
					    "articleId": articleid,
					  },
					  function(data){
						  if ($.trim(data) == "success") {
							  alertify.success("成功删除一条评论");
							  setTimeout('location.href=location.href',1000);
						  }else {
							  alertify.error($.trim(data));
						}
			});
		}
	});
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