<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:52:13
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\header.htm" */ ?>
<?php /*%%SmartyHeaderCode:3444542788a5f34a69-39202190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '588c71023a660a7401021ad5aa9bd7aa7534d80e' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\header.htm',
      1 => 1412004480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3444542788a5f34a69-39202190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_542788a6061f58_76527042',
  'variables' => 
  array (
    'title' => 0,
    'mod' => 0,
    'columnlist' => 0,
    'column' => 0,
    'columnpid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542788a6061f58_76527042')) {function content_542788a6061f58_76527042($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<script type="text/javascript" src="./public/js/jquery-1.7.2.js"></script>
<script type="text/javascript" src="./public/js/command.js"></script>
<script type="text/javascript" src="./public/js/My97DatePicker/WdatePicker.js"></script>
<script src="./public/js/jquery-ui-1.9.2.custom.js"></script>
<script src="./public/js/liquidmetal.js" type="text/javascript"></script>
<script src="./public/js/admin.js" type="text/javascript"></script>
<script src="./public/js/jquery.flexselect.js" type="text/javascript"></script>

<script charset="utf-8" src="./public/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="./public/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="./public/kindeditor/plugins/code/prettify.js"></script>
<script type="text/javascript" src="./public/js/checkjs/showpicture.js"></script>
<link href="http://misc.erp.valsun.cn/css/style.css" rel="stylesheet" type="text/css" />
<link href="./public/css/page.css" rel="stylesheet" type="text/css" />
<link href="./public/css/alertify.css" rel="stylesheet" type="text/css" />
<link href="./public/css/tran.css" rel="stylesheet">
<link href="./public/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<link href="./public/css/flexselect.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="./public/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="./public/kindeditor/plugins/code/prettify.css" />
<link href="./public/css/article.css" rel="stylesheet" type="text/css" ></link>
<script type="text/javascript">
var web_url = "<?php echo @WEB_URL;?>
";
</script>
</head>
<body class="tran-body">
	<div class="container">
    	<div class="content">
        	<div class="header">
            	<div class="logo">
                	新闻管理系统
                </div>
                <div class="onevar purchase-onevar">
                	<ul>
						<li>
                            <a href="index.php?mod=admin&act=getUserList" class="FreightInquiry <?php if (in_array($_GET['mod'],array('admin'))){?>cho<?php }?> ">用户管理</a>
                        </li>
						<li>
                            <a href="index.php?mod=column&act=index" class="openBusiness <?php if (in_array($_GET['mod'],array('column'))){?>cho<?php }?>">栏目管理</a>
                        </li>
						<li>
                        	<a href="index.php?mod=article&act=getColumn" class="Authorize <?php if (in_array($_GET['mod'],array('article'))){?>cho<?php }?> ">文章管理</a>
                        </li>
                        <li>
                            <a href="index.php?mod=comment&act=admincom" class="openBusiness <?php if (in_array($_GET['mod'],array('comment'))){?>cho<?php }?>">评论管理</a>
                        </li>
                    </ul>
                </div>
                <div class="user">
                	<a href="javascript:void(0);" ><?php echo $_SESSION['ADMIN_NAME'];?>
</a><a href="index.php?mod=public&act=logout" style="background: none; font-size: 14px;" title="注销安全退出">退出</a>
                </div>
            </div>
            <div class="twovar">
            	<ul>
            		<?php if (in_array($_smarty_tpl->tpl_vars['mod']->value,array("admin"))){?>
						<li><a href="index.php?mod=admin&act=getUserList" <?php if (($_GET['mod']=="admin")&&($_GET['act']=="getUserList")){?>class = "cho"<?php }?>>用户列表</a></li>
						<li><a href="index.php?mod=admin&act=addUser" <?php if (($_GET['mod']=="admin")&&($_GET['act']=="addUser")){?>class = "cho"<?php }?>>添加用户</a></li>
					<?php }?>
					<?php if (in_array($_smarty_tpl->tpl_vars['mod']->value,array("article"))){?>
						<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['columnlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
							<li><a href="index.php?mod=article&act=getChildColumn&columnpid=<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['columnpid']->value==$_tmp1){?>class = "cho"<?php }?>><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</a></li>
						<?php } ?>
					<?php }?>
					<?php if (in_array($_GET['mod'],array("column"))){?>
						<li><a href="index.php?mod=column&act=index" <?php if (($_GET['mod']=="column")&&($_GET['act']=="index")){?>class = "cho"<?php }?>>栏目列表</a></li>
						<li><a href="index.php?mod=column&act=add" <?php if (($_GET['mod']=="column")&&($_GET['act']=="add")){?>class = "cho"<?php }?>>添加栏目</a></li>
					<?php }?>
                </ul>
            </div><?php }} ?>