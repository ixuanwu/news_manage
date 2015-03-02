<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 12:05:26
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/self.html" */ ?>
<?php /*%%SmartyHeaderCode:10189181255428bbd90a9b94-21992616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f7d6da5e6b81be30e5532845beb4095b2fbf098' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/self.html',
      1 => 1411963521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10189181255428bbd90a9b94-21992616',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5428bbd912c7b8_53509197',
  'variables' => 
  array (
    'time' => 0,
    'temp' => 0,
    'userid' => 0,
    'person_cen' => 0,
    'user_fd' => 0,
    'logout' => 0,
    'comlist' => 0,
    'item' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5428bbd912c7b8_53509197')) {function content_5428bbd912c7b8_53509197($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>

<link 	href="./public/css/frontcss/header.css" rel="stylesheet" type="text/css" />
<link 	href="./public/css/frontcss/self.css" rel="stylesheet" type="text/css" />
<link 	href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link 	rel="stylesheet" 		href="./public/kindeditor/themes/default/default.css" />
<link 	rel="stylesheet" 		href="./public/kindeditor/plugins/code/prettify.css" />
<link 	rel="stylesheet"		href="./public/css/alertify.css"  type="text/css" />
<link 	rel="stylesheet"		href="./public/css/page.css"  type="text/css" />
<script type="text/javascript" 	src="./public/js/jquery-1.7.2.js"></script>
<script charset="utf-8" 		src="./public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" 		src="./public/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" 		src="./public/kindeditor/plugins/code/prettify.js"></script>	
<script type="text/javascript" 	src="./public/js/frontjs/self.js"></script>
<script type="text/javascript" 	src="./public/js/checkjs/revpassw.js"></script>
<script type="text/javascript" 	src="./public/js/alertify.js"></script>

<script type="text/javascript">
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : '../../public/kindeditor/plugins/code/prettify.css',
				uploadJson : '../../public/kindeditor/php/upload_json.php',
				fileManagerJson : '../../public/kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				
			});
			prettyPrint();
		});
</script>
<script type="text/javascript">
function comdel(comid,articleid){
	if (confirm("确定要删除吗?")) {
		$.post("index.php?mod=comment&act=icomdel",
				  {
				    "commentId": comid,
				    "articleId": articleid,
				  },
				  function(data){
					  if ($.trim(data) == "success") {
						  var trId = "#com_" + comid;
						  $(trId).remove();
					  }else {
						  alert($.trim(data));
					}
		});
	}
}
</script>	
</head>
<body>
	<div class="head_page_div">
	<div class="page_div">
		<div class="top_div">
			<div class="time_div"><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</div>
			<div class="welcome_div">
				<?php if ($_smarty_tpl->tpl_vars['temp']->value==0){?>
				<a id="login_btn" href="#">登陆</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a id="regist_btn" href="#">注册</a>
				<?php }else{ ?>
				<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
,欢迎你&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['person_cen']->value;?>
">个人中心</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['user_fd']->value;?>
">用户反馈</a>
				&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['logout']->value;?>
">退出登录</a>
				<?php }?>
			</div>
			<!--end of welcom_div-->
		</div>
		<!--end of top_div-->
	</div>
	<!--end of page_div-->
	<div class="head_hr"><hr size="1"/></div>
	</div>
	<!--end of head_page_div-->
	<div class="all">
	<div class="container">
		<div class="comment">个人中心</div>
		<div class="top_hr"><hr size="1" style="width:1000px" /></div>
		<div class="left">
			<div class="my_left1">
				<div id="my_rmenu" style="cursor:pointer"><div class="my_text_font"></div>基本资料</div>
			</div>
			<div class="my_left2">
				<div id="my_menu1" style="cursor:pointer"><div class="my_text_font"></div>详细资料</div>
			</div>
			<div class="my_left3">
				<div id="my_menu2" style="cursor:pointer"><div class="my_text_font"></div>头像管理</div>
			</div>
			<div class="my_left4">
				<div id="my_menu3" style="cursor:pointer"><div class="my_text_font"></div>我的记录</div>
			</div>
			<div class="my_left5">
				<div id="my_menu4" style="cursor:pointer"><div class="my_text_font"></div>投递文章</div>
			</div>
		</div>
		<!-- end of left-->
		<div class="right">
			<div id="dis1">
				<div class = "my_comment">基本资料</div>
				<div class="line">
					<span class="my_title">用户名：</span>
				<span><input class = "my_text" type = "text" readonly="readonly" value="<?php echo $_SESSION['USER_NAME'];?>
" id="userid"/></span>
				</div>
				<div class="line">
					<span class="my_title">邮箱：</span>
					<span><input class = "my_text" type = "text" readonly="readonly" value="<?php echo $_SESSION['USER_EMAIL'];?>
"/></span>
				</div>
				<div class="line">
					<span class="my_title">原始密码：</span>
					<span><input class = "my_text" type = "password" id="oldpassw" /></span>
					<span id="tips-oldpassw" class="regist_errortip_span"></span>
				</div>
				<div class="line">
					<span class="my_title">新密码：</span>
					<span><input class = "my_text" type = "password" id="newpassw" /></span>
					<span id="tips-newpassw" class="regist_errortip_span"></span>
				</div>
				<div class="line" >
					<span class="my_title">确认密码：</span>
					<span><input class = "my_text" type = "password" id="renewpassw" /></span>
					<span id="tips-renewpassw" class="regist_errortip_span"></span>
				</div>
				<div class="line">
					<input class = "my_button" type = "button" value = "保存" id="revise-btn"/>
				</div>
			</div>
			<!-- end of dis1-->
			
			<div id="dis2" style="display:none">
				<div class = "my_comment">详细资料</div>
				<div class="line">
					<span class="my_title">性别：</span>
					<span class="my_name"><input class="my_radio" type = "radio" value="男">男</span>
					<span class="my_name"><input class="my_radio" type = "radio" value="女">女</span>
				</div>
				<div class="line">
					<span class="my_title">生日：</span>
					<span><input class = "my_text" type = "text"></span>
				</div>
				<div class="line">
					<span class="my_title">手机号码：</span>
					<span><input class = "my_text" type = "text"></span>
				</div>
				<div class="line">
					<input class = "my_button" type = "button" value = "保存"/>
				</div>
			</div>
			<!--end of dis2 -->
			
			<div id="dis3" style="display:none">
				<div class = "my_comment">头像管理</div>
				<div class="a_line">
					<span class="my_title">头像：</span>
				</div>
				<div class="my_pic">
					<img class="my_picture" src="./public/img/desert.jpg" style="width:160px;height:120px;"/>
				</div>
				<div class="line1">
					<span><input class = "my_text" type = "text"></span>
					<span><input type = "button" value = "浏览"/></span>
				</div>
				
				<div class="line2">
					<input class = "my_button" type = "button" value = "上传"/>
				</div>
			</div>
			<!--end of dis3-->
			
			<div id="dis4" style="display:none">
				<div class = "my_comment">我的记录</div>
				<div class="comment_line">
				<span class="my_a_comment1">文章标题</span>
				<span class="my_a_comment1">评论内容</span>
				<span class="my_a_comment2">评论时间</span>
				<span class="my_a_comment2">点赞/踩压</span>
				<span class="my_a_comment2">操作</span>
				</div>
				<!--显示评论-->	
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>			
					<div class="comment_line"  id="com_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
">
						<span class="comment_linea"><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['article_title'],0,8,'utf-8');?>
</span> <span
							class="comment_lineb"><?php echo mb_substr($_smarty_tpl->tpl_vars['item']->value['comment_content'],0,12,'utf-8');?>
</span> <span
							class="comment_linec"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_addtime'];?>
</span> <span
							class="comment_lined"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_agrees'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_disagrees'];?>
</span> <span class="comment_linee"  style="cursor: pointer;color:blue" onclick=comdel(<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['article_id'];?>
)>删除</span>
					</div>
				<?php } ?>
					<div class="bottomvar">
						<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
					</div>
			</div>
			<!--end of dis4-->
			
			<div id="dis5" style="display:none">
			<form id="content" method="post" action="self.php">
					<div class = "my_comment">投递文章</div>
					<div class="line">
						<span class="my_title">标题：</span>
						<span><input class = "my_a_text" type = "text"></span>
					</div>
					<div class="a_line">
						<span class="my_title">栏目：</span>
						<span>
							<select class="my_select">
								<option value = "1">————社会————
								<option value = "2">————军事————
								<option value = "3">————财经————
								<option value = "4">————体育————
								<option value = "5">————娱乐————
								<option value = "6">————科技————
								<option value = "7">————教育————
								<option value = "8">————健康————
								<option value = "9">————资讯————
							</select>
						</span>
					</div>
					<div class="a_line">
						<span class="my_title">图片：</span>
						<span><input class = "my_b_text" type = "text"></span>
						<span><input class = "my_a_button" type="button" value="浏览"></span>
					</div>
					<div class = "show_pic">
						<img class="my_picture" src="./public/img/desert.jpg" style="width:160px;height:120px;"/>
					</div>
					<div class="line">
						<span class="my_title">导语：</span>
						<span><textarea class="my_lead" cols ="68" rows = "3"></textarea></span>
					</div>
					<div class="line">
						<span class="my_title">内容：</span>
						<span style="margin-left:15px;float:right"><textarea name="content1" style="width:500px;height:200px;"></textarea></span>
					</div>
					<div class="line">
						<input class = "my_b_button" type = "submit" value = "投递"/>
					</div>
					</form>
			</div>
			<!--end of dis5-->			
		</div>
	</div>
	<!--end of container-->
	</div>
	<!--end of all-->
</body>	
</html><?php }} ?>