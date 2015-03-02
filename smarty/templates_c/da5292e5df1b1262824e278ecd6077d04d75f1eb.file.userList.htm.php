<?php /* Smarty version Smarty-3.1.12, created on 2014-09-28 16:44:26
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\userList.htm" */ ?>
<?php /*%%SmartyHeaderCode:54615427c6f5594e96-37763891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da5292e5df1b1262824e278ecd6077d04d75f1eb' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\userList.htm',
      1 => 1411893859,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54615427c6f5594e96-37763891',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5427c6f55dfb48_07537472',
  'variables' => 
  array (
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5427c6f55dfb48_07537472')) {function content_5427c6f55dfb48_07537472($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main">
	
	<div class="bottomvar">
		<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>