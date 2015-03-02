<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 17:36:14
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/errorPage.html" */ ?>
<?php /*%%SmartyHeaderCode:3340032085429280e56d4b4-02604650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11df261a563f5513f5c790cfa202e01b21dd846f' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/errorPage.html',
      1 => 1411959856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3340032085429280e56d4b4-02604650',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5429280e5e49b2_33338510',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5429280e5e49b2_33338510')) {function content_5429280e5e49b2_33338510($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出错啦</title>
<link href="./public/css/frontcss/header.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/errorpage.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./public/js/jquery-1.7.2.js"></script>
<script language="javascript" type="text/javascript">
	var secs = 5;
	var URL;
	function load(url){
		URL = url;
		for(var i = secs;i >= 0;i--) {
			window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000);    
		}
	}
	function doUpdate(num) {
		$("#setTime").html("<a style='color:red'>"+num+"</a>"+'秒后自动回到新闻首页'); 
		if(num == 0) {
		window.location=URL;
		}
	}
</script>
</head>
<body>
<div class="all">
	<div class="container">
		<div class = "left">
			<img src="./public/img/1.jpg" style="width:360px;height:270px;"/>
		</div>
		<!--end of left-->
		<div class = "right">
		<div class="first_line">
			糟糕，你访问的页面不存在！
		</div>
		<div class="second_line"id ="setTime">
			<script language="javascript">
			load("self.html");
			</script>
		</div>
		<div class="third_line">
			或点此立即<a href="#" style="color:red">返回首页</a>
		</div>
		</div>
		<!--end of right-->
	</div>
	<!--end of container-->
</div>
<!--end of all-->
</body>	
</html><?php }} ?>