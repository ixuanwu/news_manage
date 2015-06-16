/**
 * 说明：对登录界面的表单进行验证
 * 版本：1.0
 * 作者：蒋和超
 */
window.boolInforLogin = false;
function success_fail_login(blean){
	window.boolInforLogin = blean;
}

//设置ajax传输方式为同步
$.ajaxSetup({
    async : false
});

function checkCode(){
	var code= $.trim($("#lcode").val());
	if(code == ''){
		$("#tips-lcode").html("验证码不能为空!");
		return false;
	}else {
		$("#tips-lcode").html("");
		$.post("index.php?mod=public&act=getCode",{"code":code},function(msg){	
			if($.trim(msg) == 'code_ok'){
				$("#tips-lcode").html("验证码正确!");
				success_fail_login(true);		//这样使用函数设置返回值，可针对同步，异步方式，异步不能直接复制给变量
			}else {
				$("#tips-lcode").html("验证码不正确!");
				success_fail_login(false);
			}
		});
	}
	if(window.boolInforLogin == true){
		$("#tips-lcode").html("");
		return true;
	} else {
		return false;
	}
}

$(document).ready(function(){
	$("#code_image").click(function(){
		$(this).attr("src",'./public/code_num.php?'+Math.random())
	});
	$("#acode_image").click(function(){
		$("#code_image").attr("src",'./public/code_num.php?'+Math.random())
	});
	$("#login-btn").click(function(){
	    var username, password, code;
	    username	= $.trim($("#lusername").val());
	    password	= $.trim($("#lpassword").val());
	    code		= $.trim($("#lcode").val());
		if(username == ''){
			$("#tips-lusername").html("用户名不能为空!");
			$("#lusername").focus();
			return false;
		}else {
			$("#tips-lusername").html("");
		}
		if(password == ''){
			$("#tips-lpassword").html("密码不能为空!");
			$("#lpassword").focus();
			return false;
		}else {
			$("#tips-lpassword").html("");
		}
		if(code == ''){
			$("#tips-lcode").html("验证码不能为空!");
			$("#lcode").focus();
			return false;
		}
		$("#tips-lcode").html("");
		$("#msg").html("");
		$.post("index.php?mod=public&act=userLogin",{"username":username, "password":password,"code":code},function(msg){
			if($.trim(msg) == "code_error"){
				$("#tips-lcode").html("验证码有误");
			}else if($.trim(msg) == "log_ok"){
				alertify.success("亲,登录成功！"); 
				setTimeout("location.href = 'index.php?mod=user&act=redirectHtm'",1000);
			}else if($.trim(msg) == "notlogin"){
				alertify.error("亲，你的账号已被封！");
			}else{
				alertify.error("亲，登录失败，请检查帐号密码是否输入正确！");        
			}
		});	
		return false;
	});
});