<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:53:06
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\commentList.htm" */ ?>
<?php /*%%SmartyHeaderCode:2418654298e724fa1c2-75335076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44f9548ee0c5b74d9ffb647ed48970f40eda38fa' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\commentList.htm',
      1 => 1412000344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2418654298e724fa1c2-75335076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'select' => 0,
    'msg' => 0,
    'comlist' => 0,
    'com' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54298e7318c638_82458524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54298e7318c638_82458524')) {function content_54298e7318c638_82458524($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main">
	<div align="left" style="margin-left:160px;float:left">
		<form method="post" action="index.php?mod=comment&act=admincom" >
			<label>筛选：</label>
			文章ID<input type="text" name="articleId" id="articleId" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['articleId'];?>
">
			用户ID<input type="text" name="userId" id="userId" value="<?php echo $_smarty_tpl->tpl_vars['select']->value['userId'];?>
">
			按时间：
			<?php if ($_smarty_tpl->tpl_vars['select']->value['order']==''){?>
			<input name ="order" type="radio" value="1">降序<input name="order" type="radio" value="2">升序
			<?php }elseif($_smarty_tpl->tpl_vars['select']->value['order']==2){?>
			<input name ="order" type="radio" value="1">降序<input name="order" type="radio" value="2" checked="checked">升序
			<?php }else{ ?>
			<input name ="order" type="radio" value="1" checked="checked">降序<input name="order" type="radio" value="2">升序
			<?php }?>
			<input type="submit" value="筛选">
		</form>	
	</div>
	<div style="float:left;margin-top:6px;margin-left:60px"><a style="font-size:16px;color:blue" href="index.php?mod=comment&act=admincom">显示全部</a></div>
	<div style="float:right;margin-top:6px;margin-right:160px;"><label style="font-size:13px;color: red;"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</label></div>	
	<table cellspacing="0" width="100%">
		<tr class="title">
			<th>评论ID</th>
			<th>用户ID</th>
			<th>文章ID</th>
			<th>评论内容</th>
			<th>评论时间</th>
			<th>赞数</th>
			<th>踩数</th>
		</tr>

		<?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value){
$_smarty_tpl->tpl_vars['com']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['com']->key;
?>
			<tr id="com_<?php echo $_smarty_tpl->tpl_vars['com']->value['comment_id'];?>
">
				<td><?php echo $_smarty_tpl->tpl_vars['com']->value['comment_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['com']->value['user_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['com']->value['article_id'];?>
</td>
				<td><?php echo mb_substr($_smarty_tpl->tpl_vars['com']->value['comment_content'],0,12,'utf-8');?>
</td>
				<td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['com']->value['comment_addtime']);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['com']->value['comment_agrees'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['com']->value['comment_disagrees'];?>
</td>
				<td colspan="2">
					<a onclick=admincomdel(<?php echo $_smarty_tpl->tpl_vars['com']->value['comment_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['com']->value['article_id'];?>
)>删除</a>
				</td>
			</tr>
		<?php } ?>
	</table>
	<div class="bottomvar">
		<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
	</div>
		<?php if (count($_smarty_tpl->tpl_vars['comlist']->value)==0){?>
		<div align="center" style="margin-top:210px">
			<label style="font-size:26px;color: gray; ">抱歉，没有符合要求的评论！</label>
		</div>
		<?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>