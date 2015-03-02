<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:52:01
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\login.htm" */ ?>
<?php /*%%SmartyHeaderCode:592654277b17d72945-03278502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aa2d34c632dbf53eaa5be47e8334e3ae89d8fba' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\login.htm',
      1 => 1411993080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '592654277b17d72945-03278502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54277b17db7ce1_38980247',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54277b17db7ce1_38980247')) {function content_54277b17db7ce1_38980247($_smarty_tpl) {?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户登录</title>
<script type="text/javascript" src="./public/js/jquery-1.7.2.js"></script>

<link href="./public/css/style.css" rel="stylesheet" type="text/css" />
<link href="./public/css/alertify.css" rel="stylesheet" type="text/css" />
</head>
<body class="loginbody">
	<div class="loginmain">
    	<div class="box">
        	<div class="loginlogo">
            	<p>
                	新闻系统
                </p>
            </div>
            <div class="userlogin">
            	<form onsubmit="return check();">
				<table>
					<tr>
						<td style="font-size:12px; color:#F00;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</td>
					</tr>
                	<tr>
                    	<td>
                        	<span>用户名：</span>
                            <span style="font-size:12px; color:#F00; float:right;" id="tips-username"></span>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<input name="username" type="text" id="username"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<span>登录密码：</span>
                            <span style="font-size:12px; color:#F00; float:right;" id="tips-password"></span>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	<input name="password" type="password" id="password"/>
                        </td>
                    </tr>
                    <tr>
                    	<td class="go">
                        	<input type="submit" value="登录" id="login-btn"/>
                        </td>
                    </tr>
                    <tr>
                    	<td class="remenber">
                        	<span class="right">
                        		<input name="" type="checkbox" value="" id="re" />
                                <label for="re" class="rem">
                                	记住我
                                </label>
                            </span>
                            <span>
                            	<input class="reset" type="reset" value="重置" id="reset-btn"/>
                            </span>
                        </td>
                    </tr>
                </table>
				</form>
            </div>
        </div>
    </div>
<script type="text/javascript" src="./public/js/alertify.js"></script>
</body>
</html>
<script>

$("#login-btn").click(function(){
    var username,password,company;
    username = $.trim($("#username").val());
    password = $.trim($("#password").val());
	if(username == ''){
		$("#tips-username").html("用户名不能为空!");
		$("#username").focus();
		return false;
	}else {
		$("#tips-username").html("");
	}
	if(password == ''){
		$("#tips-password").html("密码不能为空!");
		$("#password").focus();
		return false;
	}else {
		$("#tips-password").html("");
	}
	$("#login-btn").val("登录中,请稍候...");
	$.post("index.php?mod=admin&act=adminLogin",{"username":username, "password":password},function(rtn){
		if(rtn.tip == "ok"){
			alertify.success("亲,登录成功！");
			setTimeout("location.href='index.php?mod=admin&act=getUserList'",1000);
		}else {
			$("#login-btn").val("登录");
			alertify.error("亲,登录失败！可能原因：<br/>1、请检查帐号密码是否输入正确！<br/>2、系统未授权你登录此系统！");        
		}
	},
	'json'
	);
});
function check(){
	return false;
}

</script>

<?php }} ?>