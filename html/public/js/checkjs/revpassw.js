/**
 * 说明：对修改密码界面的表单进行验证 版本：1.0 日期：2014-09-26 作者：杨友能
 */

// 显示|添加错误信息
function showMsg(tip_id, msg, id) {
	$(tip_id).html(msg);
}
// 移除错误信息
function removeMsg(tip_id) {
	$(tip_id).html("");
}

function checkRenewPassw() {
	var pattern = /^[a-zA-Z_@]\w{5,17}$/;
	var newpassw = $.trim($("#newpassw").val());
	var renewpassw = $.trim($("#renewpassw").val());
	if (renewpassw == '') {
		showMsg("#tips-renewpassw", "新密码不能为空!", "#renewpassw");
		return false;
	} else if (renewpassw != newpassw) { // 验证两次输入的密码是否一样
		showMsg("#tips-renewpassw", "两次输入密码不相同!", "#renewpassw");
		return false;
	} else {
		removeMsg("#tips-renewpassw");
		return true;
	}
}

function checkOldpassw() {
	var oldpassw = $.trim($("#oldpassw").val());
	if (oldpassw == '') { // 判断旧密码是否为空
		showMsg("#tips-oldpassw", "旧密码不能为空!", "#oldpassw");
		return false;
	} else {
		removeMsg("#tips-oldpassw");
		return true;
	}
}

function checkNewpassw() {
	var pattern = /^[a-zA-Z_@][a-zA-Z_@0-9]{7,17}$/;
	var newpassw = $.trim($("#newpassw").val());
	if (newpassw == '') {
		showMsg("#tips-newpassw", "新密码不能为空!", "#newpassw");
		return false;
	} else if (!pattern.test(newpassw)) {
		showMsg("#tips-newpassw", "格式：大小写字母,下划线,@,数字组成8-18位,数字不开头","#newpassw");
		return false;
	} else {
		removeMsg("#tips-newpassw");
		return true;
	}
}
// 对表单进行验证
$(document).ready(function() {
	$("#revise-btn").click(function() {
		var oldpassw = $.trim($("#oldpassw").val());
		var newpassw = $.trim($("#newpassw").val());
		if (checkNewpassw() && checkOldpassw() && checkRenewPassw()) {
			$.post("index.php?mod=user&act=updPassw", {
				"oldpassw" : oldpassw,
				"newpassw" : newpassw
			}, function(msg) {
				console.log(msg);
				if ($.trim(msg) == 'uppassw_ok') {
					alertify.success("亲,基本资料保存成功！");
					setTimeout("location.href = 'index.php?mod=user&act=person&serviceid=1'", 1000);
				} else if ($.trim(msg) == 'pass_err') {
					alertify.error("亲，基本资料保存失败，旧密码错误");
				} else if ($.trim(msg) == 'passerr') {
					alertify.error("亲，密码格式有误！");
				} else {
					alertify.error("亲，基本资料保存失败，旧密码错误");
				}
			});
			return false;
		}
		return false;
	});
});

//后台修改密码
$(document).ready(function() {
	$("#revpassw-btn").click(function() {
		var userid		= $.trim($("#userid").val());
		var newpassw = $.trim($("#newpassw").val());
		if (checkNewpassw() && checkRenewPassw()) {
			$.post("index.php?mod=user&act=adminUpdPassw", {
				"userid"	: userid,
				"newpassw"	: newpassw
			}, function(msg) {
				if ($.trim(msg) == 'uppassw_ok') {
					alertify.success("亲,修改密码成功！");
					setTimeout("location.href = 'index.php?mod=admin&act=getUserList'", 1000);
				} else if ($.trim(msg) == 'passerr') {
					alertify.error("亲，密码格式有误！");
				} else {
					alertify.error("亲，修改密码失败!");
				}
			});
			return false;
		}
		return false;
	});

});