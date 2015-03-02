<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:50:49
         compiled from "I:\wamp\www\news.valsun.cn\html\template\fronttemplate\header.htm" */ ?>
<?php /*%%SmartyHeaderCode:319365427648b3b41d1-73857069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50980bf3b9766cce6be21a8f42543e7650a7362d' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\fronttemplate\\header.htm',
      1 => 1412004162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319365427648b3b41d1-73857069',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5427648b3e9031_28275862',
  'variables' => 
  array (
    'temp' => 0,
    'userid' => 0,
    'person_cent' => 0,
    'user_fd' => 0,
    'logout' => 0,
    'columninfo' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5427648b3e9031_28275862')) {function content_5427648b3e9031_28275862($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>head</title>
<script type="text/javascript" src="./public/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="./public/js/frontjs/header.js"></script>
<script type="text/javascript" src="./public/js/checkjs/userlogin.js"></script>
<script type="text/javascript" src="./public/js/localtime.js"></script>
<script type="text/javascript" src="./public/js/checkjs/adduser.js"></script>
<link href="./public/css/frontcss/header.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./public/js/alertify.js"></script>
<link href="./public/css/alertify.css" rel="stylesheet" type="text/css" />
<script>
$(function(){
	document.onkeydown = function(e){ 
		var ev = document.all ? window.event : e;
		if(ev.keyCode==13) {
		
			if($(".loginregist_div").css("display")=="block"){
				
				if($("#login_panel").css("display")=="block"){
					$("#login-btn").click();
				}
				if($("#regist_panel").css("display")=="block"){
					$("#addur-btn").click();
				}
			}else{
				$("#search").click();
			}
		 }
	}
});
</script>
</head>
<body>
	<div class="shade_div"></div>
	<div class="loginregist_div">
		<a href="#">
			<div id="login_control_div" class="loginregist_control_hover_div">登&nbsp;&nbsp;录</div>
		</a>
		<a href="#">
			<div id="regist_control_div" class="loginregist_control_div">注&nbsp;&nbsp;册</div>
		</a>
		<div class="loginregist_close_div">
			<a href="#">
				<img src="./public/img/frontimg/closeicon.png" width="20px" height="20px">
			</a>
		</div>
		<div id="login_panel" class="loginregist_panel_div">
			<form>
				<div class="login_form_div">
					<div class="login_username_div">
						用户名：
						<span class="loginregist_errortip_span" id="tips-lusername"></span>
						<br><input type="text" class="loginregist_input" id="lusername" />
					</div>
					<div class="login_password_div">
						密码：
						<span class="loginregist_errortip_span" id="tips-lpassword"></span>
						<br><input type="text" class="loginregist_input" id="lpassword" />
					</div>
					<div class="login_secucodeinput_div">
						验证码：
						<span class="loginregist_errortip_span" id="tips-lcode"></span>
						<br><input type="text" class="loginregist_input"  id="lcode" onblur="checkCode()"/>
					</div>
					<div class="login_secucode_div">
						<a href="#"><img src="./public/code_num.php" width="80px" height="35px" id="code_image"></a>
						看不清?<a href="#" id="acode_image">换一张</a>
					</div>
					<div class="login_remember_div">
						<input type="checkbox">记住我
					</div>
					<a href=""><div class="loginregist_button_div" id="login-btn" >登陆</div></a>
				</div>
			</form>
		</div>
		<div id="regist_panel" class="loginregist_panel_div">
			<form id="myform">
				<div class="login_form_div">
					<div class="login_username_div">
						用户名：
						<span class="loginregist_errortip_span" id="tips-ausername"></span>
						<br><input type="text" class="loginregist_input" id="ausername" onblur="checkName()"/>
					</div>
					<div class="login_password_div">
						密码：
						<span class="loginregist_errortip_span" id="tips-apassword"></span>
						<br><input type="text" class="loginregist_input" id="apassword" onblur="checkPassw()"/>
					</div>
					<div class="login_secucodeinput_div">
						确认密码：
						<span class="loginregist_errortip_span" id="tips-arepassw"></span>
						<br><input type="text" class="loginregist_input" id="arepassw" onblur="checkRepassw()" />
					</div>
					<div class="regist_mail_div">
						邮箱：
						<span class="loginregist_errortip_span" id="tips-aemail"></span>
						<br><input type="text" class="loginregist_input" id="aemail" onblur="checkEmail()" />
					</div>
					<a href=""><div class="loginregist_button_div" id="addur-btn">注册</div></a>
				</div>
			</form>
		</div>
	</div>
	<div class="head_page_div">
	<div class="page_div">
		<div class="top_div">
			<div class="time_div" id="Timer"></div>
			<div class="welcome_div">
				<?php if ($_smarty_tpl->tpl_vars['temp']->value==0){?>
				<a id="login_btn" href="#">登陆</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a id="regist_btn" href="#">注册</a>
				<?php }else{ ?>
				<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
,欢迎你&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href='<?php echo $_smarty_tpl->tpl_vars['person_cent']->value;?>
'>个人中心</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['user_fd']->value;?>
">用户反馈</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['logout']->value;?>
">退出登录</a>
				<?php }?>
			</div>
		</div>
	</div>
	<div class="head_hr"><hr size="1"/></div>
	<div class="page_div">
		<div class="banner_div">
			<a href="index.php?mod=article&act=index">
				<div class="banner_item_normal">
					<div class="banner_text">首页</div>
				</div>
			</a>
			<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columninfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
			<a href="index.php?mod=article&act=column&columnpid=<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
&columnname=<?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
">
				<div class="banner_item_normal">
					<div class="banner_text"><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</div>
				</div>
			</a>
			<?php } ?>
		</div>
	</div>
	</div>
</body>
</html><?php }} ?>