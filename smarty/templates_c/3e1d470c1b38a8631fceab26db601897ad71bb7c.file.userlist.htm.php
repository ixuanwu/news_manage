<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 19:44:01
         compiled from "/data/web/news.valsun.cn/html/template/admintemplate/userlist.htm" */ ?>
<?php /*%%SmartyHeaderCode:12839265215428b09b580476-28449299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e1d470c1b38a8631fceab26db601897ad71bb7c' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/admintemplate/userlist.htm',
      1 => 1411990979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12839265215428b09b580476-28449299',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5428b09b60f752_63417844',
  'variables' => 
  array (
    'userlist' => 0,
    'user' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5428b09b60f752_63417844')) {function content_5428b09b60f752_63417844($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main">
	<table cellspacing="0" width="100%">
		<tr class="title">
			<th>用户ID</th>
			<th>用户名</th>
			<th>密码</th>
			<th>性别</th>
			<th>手机号</th>
			<th>生日</th>
			<th>注册时间</th>
			<th>登录时间</th>
			<th>登录IP</th>
			<th>头像</th>
			<th>邮箱</th>
			<th>权限组</th>
			<th>操作</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
			<tr id="del<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
">
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_password'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['user']->value['user_gender']==0){?>男<?php }?><?php if ($_smarty_tpl->tpl_vars['user']->value['user_gender']==1){?>女<?php }?></td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_telephone'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_birthday'];?>
</td>
				<td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['user']->value['user_addtime']);?>
</td>
				<td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['user']->value['user_logintime']);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_loginip'];?>
</td>
				<td><img src=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_headphoto'];?>
 width="20px" height="16px"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['user_email'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['user']->value['user_permission']==0){?>普通用户组<?php }?></td>
				<td colspan="2">
					<a href="index.php?mod=admin&act=updateUser&userid=<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
" id="updateuser">编辑</a>
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