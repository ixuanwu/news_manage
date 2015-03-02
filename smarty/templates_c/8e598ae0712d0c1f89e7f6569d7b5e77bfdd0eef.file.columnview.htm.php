<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 01:58:37
         compiled from "I:\wamp\www\news.valsun.cn\html\template\fronttemplate\columnview.htm" */ ?>
<?php /*%%SmartyHeaderCode:13707542778478681a6-51457500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e598ae0712d0c1f89e7f6569d7b5e77bfdd0eef' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\fronttemplate\\columnview.htm',
      1 => 1411993080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13707542778478681a6-51457500',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54277847ad36f2_86829188',
  'variables' => 
  array (
    'column_name' => 0,
    'columnleftnews' => 0,
    'columnrightnews' => 0,
    'rightinfo' => 0,
    'newslist' => 0,
    'newsinfo' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54277847ad36f2_86829188')) {function content_54277847ad36f2_86829188($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>index</title>
<script type="text/javascript" src="http://misc.erp.valsun.cn/js/jquery-1.8.3.min.js"></script>
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/index.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/columnview.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/header_a.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page_div">
		<div class="allnews_div">
			<div class="category_item_div">
				<div class="category_hr_div"><hr size="3" color="#999999"></div>
				<div class="category_name_div"><?php echo $_smarty_tpl->tpl_vars['column_name']->value;?>
</div>
				<div class="category_hr_div"><hr size="1"></div>
				<div class="category_image_div">
					<div class="category_bigimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[0]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[0]['article_picture'];?>
" width="280px" height="210px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columnleftnews']->value[0]['article_title'],0,18,'utf-8');?>

						</a>
					</div>
					<div class="category_leftimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[1]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[1]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[1]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columnleftnews']->value[1]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_rightimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[2]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[2]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[2]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columnleftnews']->value[2]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_leftimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[3]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[3]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[3]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columnleftnews']->value[3]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_rightimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[4]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[4]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columnleftnews']->value[4]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columnleftnews']->value[4]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
				</div>
				<div class="category_article_div">
					<?php  $_smarty_tpl->tpl_vars['rightinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rightinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columnrightnews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rightinfo']->key => $_smarty_tpl->tpl_vars['rightinfo']->value){
$_smarty_tpl->tpl_vars['rightinfo']->_loop = true;
?>
					<div class="category_article_item_div">
						<div class="category_article_title_div">
							<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['rightinfo']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['rightinfo']->value['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['rightinfo']->value['article_title'],0,18,'utf-8');?>
</a>
						</div>
						<div class="category_article_intro_div">
							<?php echo mb_substr($_smarty_tpl->tpl_vars['rightinfo']->value['article_introduction'],0,28,'utf-8');?>

						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="list_div">
			<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
?>
				<div class="list_item_div">
					<div class="list_item_image_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_picture'];?>
" width="120px" height="90px"></a>
					</div>
					<div class="list_item_content_div">
						<div class="list_item_title_div">
							<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['newsinfo']->value['article_title'],0,20,'utf-8');?>
</a>
						</div>
						<div class="list_item_intro_div">
							<?php echo mb_substr($_smarty_tpl->tpl_vars['newsinfo']->value['article_introduction'],0,100,'utf-8');?>

						</div>
					</div>
				</div>
			<?php } ?>
			</div>
				<div class="bottomvar">
					<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
				</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>