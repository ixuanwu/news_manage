
/**
 * 说明：对注册界面的表单进行验证
 * 版本：1.0
 * 作者：蒋和超
 */
window.boolInfor = false;
function success_fail(blean){
	window.boolInfor = blean;
}

//设置ajax传输方式为同步
$.ajaxSetup({  
    async : false  
});

//判断ajax执行的结果
function true_false(boolInfor ,tip_id){
	if(boolInfor == true){
		/*setTimeout(1000);*/
		removeMsg(tip_id);
		return true;
	} else {
		return false;
	}
}
//显示|添加错误信息
function showMsg(tip_id, msg){
	$(tip_id).html(msg);
}
//移除错误信息
function removeMsg(tip_id){
	$(tip_id).html("");
}

//检查username是否为空、格式，是否存在
function checkName(){
	var pattern	 = /^[a-zA-Z_]{1,10}$/;
	var username = $.trim($("#ausername").val());
	if(username == ''){
		showMsg("#tips-ausername", "用户名不能为空!");
		return false;
	} else if(!pattern.test(username)){	
		showMsg("#tips-ausername", "格式不对(格式:1-10个大小写字母)");
		return false;
	} else {
		removeMsg("#tips-ausername");
		$.post("index.php?mod=public&act=getParam",{"username":username},function(msg){	
			if($.trim(msg) == 'ok'){
				showMsg("#tips-ausername", "用户名可用");
				success_fail(true);
			}else {
				showMsg("#tips-ausername","用户名不可用！");
				success_fail(false);
			}
		});
	}
	return true_false(window.boolInfor ,"#tips-ausername");
}
//检查apassword是否为空
function checkPassw(){
	 var pattern	= /^[a-zA-Z_@][a-zA-Z_@0-9]{7,17}$/;
	 var password = $.trim($("#apassword").val());
	 if(password == ''){
		 showMsg("#tips-apassword", "密码不能为空!");
		 return false;
	 } else if(!pattern.test(password)){
		 showMsg("#tips-apassword", "Err(a-z,_,@,0-9组成,数字不开头)");
		 return false;
	 } else {
		 removeMsg("#tips-apassword", "#apassword");
		 return true;
	 }
}

//检查第二次输入密码是否为空，
function checkRepassw(){
	 var password = $.trim($("#apassword").val());
	 var repassw = $.trim($("#arepassw").val());
	 if(arepassw == ''){
		 showMsg("#tips-arepassw", "密码不能为空!");
		 return false;
	 } else if(password != repassw){
		 showMsg("#tips-arepassw", "两次输入密码不一样!");
		 return false;
	 } else {
		 removeMsg("#tips-arepassw", "#arepassw");
		 return true;
	 }
}
//检查email是否为空、格式
function checkEmail(){
	var pattern		=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]w+)*$/;
	var email	= $.trim($("#aemail").val());
	if(email == ''){
		showMsg("#tips-aemail", "邮箱不能为空!");
		return false;
	} else 	if(!pattern.test(email)){
		showMsg("#tips-aemail", "邮箱格式不正确！");
	} else {
		removeMsg("#tips-aemail");
		$.post("index.php?mod=public&act=getParam",{"email":email},function(msg){	
			if($.trim(msg) == 'ok'){
				success_fail(true);
			}else {
				showMsg("#tips-aemail","邮箱已注册过！");
				success_fail(false);
			}
		});
	}
	return true_false(window.boolInfor ,"#tips-aemail");
}

//加载页面---前台注册页面
$(document).ready(function(){
	$("#addur-btn").click(function(){
		var r1 = checkName() ;
		var r2 = checkPassw();
		var r3 = checkRepassw();
		var r4 = checkEmail();
		if(r1 && r2 && r3 && r4){
			datas = {
					"username":	$("#ausername").val(),
					"password":	$("#apassword").val(),
					"email":	$("#aemail").val()
			}
			$.ajax({
				url:'index.php?mod=public&act=regist',
				data:datas,
				type:'POST',
				success:function(msg){
					if($.trim(msg)== "regist_ok"){
						alertify.success("亲,注册成功！"); 
						window.setTimeout("window.location='index.php?mod=article&act=index'",1000);
					} else if($.trim(msg) 	== "uval_is_exist"){
						alertify.error("亲,注册失败,用户名已存在！");
					}else if($.trim(msg) 	== "name_err"){
						alertify.error("亲,注册失败,用户名格式错误,格式为：1-10个大小写字母或下划线组成！");
					}else if($.trim(msg) 	== "eval_is_exist" ){ 
						alertify.error("亲,注册失败,邮箱已存在！");
					}else if($.trim(msg) 	== "email_err"){
						alertify.error("亲,注册失败，邮箱格式错误，邮箱中必须含有@和‘.’!");
					}else if($.trim(msg) 	== "pass_err"){
						alertify.error("亲,注册失败,密码格式错误，格式为大小写字母、下划线、@数字组成的8-18位，数字不能开头。");
					}else {
						alertify.error("亲,注册失败，请检查密码和邮箱！");
					}
				}
			});
			return false;
		}
		return false;
	});
});

//加载页面---后台添加用户页面
$(document).ready(function(){
	$("#addadmin_btn").click(function(){
		if(checkName() && checkPassw() && checkRepassw() && checkEmail()){
			datas = {
					"username":	$("#ausername").val(),
					"password":	$("#apassword").val(),
					"email":	$("#aemail").val()
			}
			$.ajax({
				url:'index.php?mod=admin&act=executeAddUser',
				data:datas,
				type:'POST',
				success:function(msg){
					if($.trim(msg)== "regist_ok"){
						alertify.success("亲,添加用户成功！"); 
						window.setTimeout("window.location='index.php?mod=admin&act=getUserList'",1000);
					} else if($.trim(msg) 	== "uval_is_exist"){
						alertify.error("亲,添加用户失败,用户名已存在！");
					}else if($.trim(msg) 	== "name_err"){
						alertify.error("亲,添加用户失败,用户名格式错误,格式为：1-10个大小写字母或下划线组成！");
					}else if($.trim(msg) 	== "eval_is_exist" ){ 
						alertify.error("亲,添加用户失败,邮箱已存在！");
					}else if($.trim(msg) 	== "email_err"){
						alertify.error("亲,添加用户失败，邮箱格式错误，邮箱中必须含有@和‘.’!");
					}else if($.trim(msg) 	== "pass_err"){
						alertify.error("亲,添加用户失败,密码格式错误，格式为大小写字母、下划线、@数字组成的8-18位，数字不能开头。");
					}else {
						alertify.error("亲,添加用户失败，请检查密码和邮箱！");
					}
				}
			});
			return false;
		}
		return false;
	});
});
