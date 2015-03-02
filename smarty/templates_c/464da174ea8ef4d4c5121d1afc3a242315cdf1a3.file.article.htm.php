<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 19:55:15
         compiled from "/data/web/news.valsun.cn/html/template/admintemplate/article.htm" */ ?>
<?php /*%%SmartyHeaderCode:2089147733542948a35a3470-70603619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '464da174ea8ef4d4c5121d1afc3a242315cdf1a3' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/admintemplate/article.htm',
      1 => 1411990979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2089147733542948a35a3470-70603619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'lcolumnlist' => 0,
    'column' => 0,
    'newslist' => 0,
    'newsinfo' => 0,
    'user' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_542948a36343c9_33282404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542948a36343c9_33282404')) {function content_542948a36343c9_33282404($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(document).ready(function(){
// 	$("#childcolumn").click(function(){
// 		alert("this is test");
// 		$.post("index.php?mod=article&act=getArticle",
// 				{
// 					columnid=$("#columnid").val(),
// 				},
// 				function(){
// 					alert('test');
// 					Location.href = Location.href;
// 				});
// 	});
});
</script>
<div class="main">
<div class="twovar <?php if (in_array($_smarty_tpl->tpl_vars['mod']->value,array('shippingAddress2'))){?>nothing-twovar<?php }?>">
  <ul>
  		<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lcolumnlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
			<li><a id="childcolumn" href="index.php?mod=article&act=getArticle&columnid=<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</a><span id="columnid" style="display: none"><?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
</span></li>
		<?php } ?>
  </ul>
</div>
<table cellspacing="0" width="100%">
	<tr class="title">
			<th>文章ID</th>
			<th>文章标题</th>
			<th>文章图片</th>
			<th>文章导语</th>
			<th>文章添加时间</th>
			<th>文章访问数</th>
			<th>文章点赞数</th>
			<th>文章踩数</th>
			<th>文章评论数</th>
			<th>操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['newsinfo']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_title'];?>
</td>
				<td><img src=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_picture'];?>
 width="20px" height="16px"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_introduction'];?>
</td>
				<td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['newsinfo']->value['article_addtime']);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_views'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_agree'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_disagree'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_comment'];?>
</td>
				<td colspan="2">
					<a href="index.php?mod=article&act=updateArticle&articleid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
">编辑</a>
					<a href="javascript:void(0)" onclick="return checkDel('<?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
)">删除</a>
				</td>
			</tr>
		<?php } ?>
</table>
<div class="bottomvar">
		<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>