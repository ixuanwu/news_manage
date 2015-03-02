<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 13:40:27
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/imagenewview.htm" */ ?>
<?php /*%%SmartyHeaderCode:11212829155428abedb10ad9-20738467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7374cdd2d2b8031f22b0b896744f7607e828e52d' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/imagenewview.htm',
      1 => 1411959856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11212829155428abedb10ad9-20738467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5428abedb8d587_90374570',
  'variables' => 
  array (
    'articleinfo' => 0,
    'recommendnews' => 0,
    'newsinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5428abedb8d587_90374570')) {function content_5428abedb8d587_90374570($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="new-Type" content="text/html; charset=UTF-8">
<title>newview</title>
<script type="text/javascript" src="http://misc.erp.valsun.cn/js/jquery-1.8.3.min.js"></script>
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/newview.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/header_a.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page_div">
		<div class="allnew_div">
			<div class="new_title_div"><?php echo mb_substr($_smarty_tpl->tpl_vars['articleinfo']->value['article_title'],0,28,'utf-8');?>
</div>
			<div class="new_writer_div"><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_author'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_addtime'];?>
</div>
			<div class="new_agree_div">
				<a href="index.php?mod=article&act=agree&articleid=<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
"><img src="" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_agree'];?>
</a>
				<a href="index.php?mod=article&act=disagree&articleid=<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
"><img src="" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_disagree'];?>
</a>
				<a href="#">
					<img src="./public/img/frontimg/commenticon.png" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_comments'];?>

				</a>
			</div>
			<div class="new_hr_div"><hr size="1" color="#CCCCCC"></div>
			<div class="new_imagecontent_div">
				<img src="<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_picture'];?>
" width="720px" height="540px">
				<span><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_introduction'];?>
</span>
			</div>
			<div class="new_aboutreading_div">
				<span class="new_aboutreading_name_span">相关阅读：</span><br>
				<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recommendnews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
?>
				<span class="new_aboutreading_list_span">&nbsp;<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['newsinfo']->value['article_title'],0,28,'utf-8');?>
</a></span><br>
				<?php } ?>
			</div>
			<div class="new_comment_div">
				<span class="new_comment_name_span">网友评论</span>
				<span class="new_comment_number_span"><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_comments'];?>
条评论</span>
				<div class="new_comment_frame_div">
					<div class="new_comment_input_div">
						<form>
							<textarea></textarea>
						</form>
					</div>
					<div class="new_comment_hr_div"><hr size="1" color="#666666"></div>
					<div class="new_comment_btn_div">提交</div>
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>