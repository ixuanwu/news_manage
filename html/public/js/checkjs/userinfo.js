//加载页面

var boolInfor = false;
function success_fail(blean){
	boolInfor	= blean;
}

//设置ajax传输方式为同步
$.ajaxSetup({  
    async : false  
});

//判断ajax执行的结果
function true_false(boolInfor){
	if(boolInfor == true){
		$("#tips-telephone").html('');
		return true;
	} else {
		return false;
	}
}

function checkTele(){
	var pattern		= /^(13[0-9]|15[0|3|6|7|8|9]|18[2|7|8|9])\d{8}$/;
	var telephone	= $.trim($("#telephone").val());
	if(telephone != ''){
		if(!pattern.test(telephone)){
			$("#tips-telephone").html("电话格式有错!");
			return false;
		} else {
			$("#tips-telephone").html('');
			$.post("index.php?mod=public&act=getParam",{"telephone":telephone},function(msg){	
				if($.trim(msg) == 'ok'){
					success_fail(true);		
				}else {
					$("#tips-telephone").html("电话号码已注册过!");
					success_fail(false);
				}
			});
		}
		return true_false(boolInfor);
	}
}

$(document).ready(function(){
	$("#personInfo_btn").click(function(){
		datas = {
				"gender":		$(':radio[name="sex"]:checked').val(),
				"birthday":		$("#birthday").val(),
				"telephone":	$("#telephone").val()
		}
		$.ajax({
			url:'index.php?mod=user&act=updUserInfo',
			data:datas,
			type:'POST',
			success:function(msg){
				console.log(msg);
				if($.trim(msg) == 'up_ok'){
					alertify.success("亲,详细资料保存成功！"); 
					window.setTimeout("window.location='index.php?mod=user&act=person&serviceid=2'",1000);
				}else {
					alertify.error("亲,详细资料保存失败，请检查电<br>话号码或者生日有错!"); 
				}
			}
		});
		return false;
	});
});
