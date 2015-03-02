<?php /* Smarty version Smarty-3.1.12, created on 2014-09-28 15:27:13
         compiled from "I:\wamp\www\news.valsun.cn\html\template\fronttemplate\searchview.htm" */ ?>
<?php /*%%SmartyHeaderCode:99495427a1fd413c05-60547576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '167d6542ff91d9a140c158e432c9eb887511b492' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\fronttemplate\\searchview.htm',
      1 => 1411887698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99495427a1fd413c05-60547576',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5427a1fd491245_31685102',
  'variables' => 
  array (
    'search_input' => 0,
    'searchnews_count' => 0,
    'searchnews' => 0,
    'newsinfo' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5427a1fd491245_31685102')) {function content_5427a1fd491245_31685102($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
			<div class="search_info_div">
				搜索“
				<span><?php echo $_smarty_tpl->tpl_vars['search_input']->value;?>
</span>
				”的结果：（共找到<?php echo $_smarty_tpl->tpl_vars['searchnews_count']->value;?>
条结果）
			</div>
			<div class="list_div">
			<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['searchnews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
?>
				<div class="list_item_div">
					<div class="list_item_image_div">
						<a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_picture'];?>
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
<!-- 			<div class="topage_div"> -->
				<div class="bottomvar">
					<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
				</div>
<!-- 			</div> -->
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>