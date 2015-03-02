<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 20:01:51
         compiled from "/data/web/news.valsun.cn/html/template/admintemplate/header.htm" */ ?>
<?php /*%%SmartyHeaderCode:7225266015428b09b6135c4-59501086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51a6abe1aa857da03df415b14bbb4f98a117ca48' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/admintemplate/header.htm',
      1 => 1411992108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7225266015428b09b6135c4-59501086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5428b09b634176_81956335',
  'variables' => 
  array (
    'title' => 0,
    'mod' => 0,
    'columnlist' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5428b09b634176_81956335')) {function content_5428b09b634176_81956335($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<link href="http://misc.erp.valsun.cn/css/style.css" rel="stylesheet" type="text/css" />
<link href="./public/css/page.css" rel="stylesheet" type="text/css" />
<link href="./public/css/alertify.css" rel="stylesheet" type="text/css" />
<link href="./public/css/tran.css" rel="stylesheet">
<link href="./public/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
<link href="./public/css/flexselect.css" rel="stylesheet" type="text/css" media="screen" />

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
                        	<a href="index.php?mod=article&act=getColumn" class="Authorize">文章管理</a>
                        </li>
                        <li>
                            <a href="index.php?mod=wedoApi&act=index" class="openBusiness">评论管理</a>
                        </li>
                        <li>
                        	<a href="index.php?mod=user&act=index" class="Authorize">信息统计</a>
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
"><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</a></li>
						<?php } ?>
					<?php }?>
					<?php if (in_array($_GET['mod'],array("column"))){?>
						<li><a href="index.php?mod=column&act=index" <?php if (($_GET['mod']=="column")&&($_GET['act']=="index")){?>class = "cho"<?php }?>>栏目列表</a></li>
						<li><a href="index.php?mod=column&act=add" <?php if (($_GET['mod']=="column")&&($_GET['act']=="add")){?>class = "cho"<?php }?>>添加栏目</a></li>
					<?php }?>
                </ul>
            </div><?php }} ?>