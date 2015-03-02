<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 01:02:11
         compiled from "I:\wamp\www\news.valsun.cn\html\template\fronttemplate\self.html" */ ?>
<?php /*%%SmartyHeaderCode:5616542765722b16a5-23315897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f673dcaea643281f5f07861e283cb1abef023918' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\fronttemplate\\self.html',
      1 => 1412009983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5616542765722b16a5-23315897',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54276572323025_18888824',
  'variables' => 
  array (
    'per_center' => 0,
    'time' => 0,
    'temp' => 0,
    'userid' => 0,
    'person_cen' => 0,
    'user_fd' => 0,
    'logout' => 0,
    'gender' => 0,
    'birthday' => 0,
    'telephone' => 0,
    'headerpicture' => 0,
    'photo_err' => 0,
    'comlist' => 0,
    'item' => 0,
    'pageStr' => 0,
    'post_article' => 0,
    'columns' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54276572323025_18888824')) {function content_54276572323025_18888824($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['per_center']->value;?>
</title>
<script type="text/javascript" 		src="./public/js/jquery-1.7.2.js"></script>
<link href="./public/css/frontcss/header.css" 	rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/self.css" 	rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/public.css" 	rel="stylesheet" type="text/css" />
<link href="./public/css/alertify.css" 			rel="stylesheet" type="text/css" />
<link rel="stylesheet" 				href="./public/kindeditor/themes/default/default.css" />
<link rel="stylesheet" 				href="./public/kindeditor/plugins/code/prettify.css" />
<link rel="stylesheet"				href="./public/css/page.css"  type="text/css" />
<script charset="utf-8" 			src="./public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" 			src="./public/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" 			src="./public/kindeditor/plugins/code/prettify.js"></script>	
<script type="text/javascript" 		src="./public/js/frontjs/self.js"></script>
<script type="text/javascript" 		src="./public/js/checkjs/revpassw.js"></script>
<script type="text/javascript"  	src="./public/js/checkjs/userinfo.js"></script>

<script type="text/javascript"  	src="./public/js/checkjs/uploadarticle.js"></script>
<script type="text/javascript" 		src="./public/js/checkjs/showpicture.js"></script>
<script type="text/javascript"  	src="./public/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
	var editor1;
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="articlecontent"]', {
				cssPath : './public/kindeditor/plugins/code/prettify.css',
				uploadJson : './public/kindeditor/php/upload_json.php',
				fileManagerJson : './public/kindeditor/php/file_manager_json.php',
				allowFileManager : true,
			});
			prettyPrint();
		});

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
<script type="text/javascript" src="./public/js/alertify.js"></script>
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
				<a href="index.php?mod=user&act=person&serviceid=1">
					<div id="my_menu0"><div class="my_text_font"></div>基本资料</div>
				</a>
			</div>
			<div class="my_left2">
				<a href="index.php?mod=user&act=person&serviceid=2">
					<div id="my_menu1"><div class="my_text_font"></div>详细资料</div>
				</a>
			</div>
			<div class="my_left3">
				<a href="index.php?mod=user&act=person&serviceid=3">
					<div id="my_menu2"><div class="my_text_font"></div>头像管理</div>
				</a>
			</div>
			<div class="my_left4">
				<a href="index.php?mod=user&act=person&serviceid=4">
					<div id="my_menu3"><div class="my_text_font"></div>我的记录</div>
				</a>
			</div>
			<div class="my_left5">
				<a href="index.php?mod=user&act=person&serviceid=5">
					<div id="my_menu4"><div class="my_text_font"></div>投递文章</div>
				</a>
			</div>
		</div>
		<!-- end of left-->
		<div class="right">
			<div id="dis1" style="display:none">
				<div class = "my_comment">基本资料</div>
				<div class="line">
					<span class="my_title">用&nbsp;户&nbsp;名：</span>
				<span><input class = "my_text" type = "text" readonly="readonly" value="<?php echo $_SESSION['USER_NAME'];?>
" id="userid"/></span>
				</div>
				<div class="line">
					<span class="my_title">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span>
					<span><input class = "my_text" type = "text" readonly="readonly" value="<?php echo $_SESSION['USER_EMAIL'];?>
"/></span>
				</div>
				<div class="line">
					<span class="my_title">原始密码：</span>
					<span><input class = "my_text" type = "password" id="oldpassw" onblur="checkOldpassw()"/></span>
					<span id="tips-oldpassw" class="regist_errortip_span"></span>
				</div>
				<div class="line">
					<span class="my_title">新&nbsp;密&nbsp;码：</span>
					<span><input class = "my_text" type = "password" id="newpassw" onblur="checkNewpassw()"/></span>
					<span id="tips-newpassw" class="regist_errortip_span"></span>
				</div>
				<div class="line" >
					<span class="my_title">确认密码：</span>
					<span><input class = "my_text" type = "password" id="renewpassw" onblur="checkRenewPassw()"/></span>
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
					<span class="my_title">性&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
					<?php if ($_smarty_tpl->tpl_vars['gender']->value==0){?>
					<span class="my_name"><input class="my_radio" type = "radio" name="sex" value="男"  id="gender" checked="<?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
" >男</span>
					<span class="my_name"><input class="my_radio" type = "radio" name="sex" value="女" id="gender">女</span>
					<?php }else{ ?>
					<span class="my_name"><input class="my_radio" type = "radio" name="sex" value="男"  id="gender">男</span>
					<span class="my_name"><input class="my_radio" type = "radio" name="sex" value="女" id="gender" checked="<?php echo $_smarty_tpl->tpl_vars['gender']->value;?>
">女</span>
					<?php }?>
				</div>
				<div class="line">
					<span class="my_title">出生日期：</span>
					<span><input class = "my_text" type = "text" id="birthday" onClick="WdatePicker()" value="<?php echo $_smarty_tpl->tpl_vars['birthday']->value;?>
"></span>
				</div>
				<div class="line">
					<span class="my_title">手机号码：</span>
					<span><input class = "my_text" type = "text" id="telephone" value="<?php echo $_smarty_tpl->tpl_vars['telephone']->value;?>
" onblur="checkTele();"></span>
					<span id="tips-telephone" class="regist_errortip_span"></span>
				</div>
				<div class="line">
					<input class = "my_button" type = "button" value = "保存" id="personInfo_btn"/>
				</div>
			</div>
			<!--end of dis2 -->
			<form action="index.php?mod=user&act=uploadPicture" method="post" enctype="multipart/form-data">
			<div id="dis3" style="display:none">
				<div class = "my_comment">头像管理</div>
				<div class="a_line">
					<span class="my_title">头像：</span>
				</div>
				<div class="my_pic">
					<img class="my_picture" src="<?php echo $_smarty_tpl->tpl_vars['headerpicture']->value;?>
" style="width:160px;height:120px;" id="my_picture"/>
				</div>
				<div class="line1">
					<!-- <span><input class = "my_text" type = "text" ></span> -->
					<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="headphoto" value="浏览" id="headphoto" multiple="multiple" /></span>
				</div>
				
				<div class="line2">
					<input class = "my_button" type = "submit" value = "上传" id="headpho_btn"/>
					<div class="msg_err"><?php echo $_smarty_tpl->tpl_vars['photo_err']->value;?>
</div>
				</div>
				
			</div>
			</form>
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
							class="comment_linec"><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['item']->value['comment_addtime']);?>
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
			<form id="formcontent" method="post" action="<?php echo $_smarty_tpl->tpl_vars['post_article']->value;?>
" enctype="multipart/form-data">
					<div class = "my_comment">投递文章</div>
					<div class="line">
						<span class="my_title">标题：</span>
						<span><input class = "my_a_text" type = "text" id="title"  name="articletitle"/></span>
					</div>
					<div class="a_line">
						<span class="my_title">栏目：</span>
						<span>
							<select class="my_select" id="column" name="columnid">
							<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columns']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
								<option value = "<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
">------------<?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
------------</option>
								<?php } ?>
							</select>
						</span>
					</div>
					<div class="a_line">
						<span class="my_title">图片：</span>
						<span><input class = "my_b_text" type = "file" id="picture" name="articlepicture" multiple="multiple"></span>
						<!-- <span><input class = "my_a_button" type="button" value="浏览"></span> -->
					</div>
					<div class = "show_pic">
						<img class="my_picture" src="" style="width:160px;height:120px;" id="article_pic"/>
					</div>
					<div class="line">
						<span class="my_title">导语：</span>
						<span><textarea class="my_lead" cols ="68" rows = "3" id="introduce" name="articleintroduction"></textarea></span>
					</div>
					<div class="line">
						<span class="my_title">内容：</span>
						<span style="margin-left:15px;float:right">
							<textarea name="articlecontent" style="width:500px;height:200px;" id="content" ></textarea>
						</span>
					</div>
					<div class="line">
						<input class = "my_b_button" type = "submit" value = "投递" id="uparticle-btn"/>
						<div class="msg_err"><?php echo $_smarty_tpl->tpl_vars['photo_err']->value;?>
</div>
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