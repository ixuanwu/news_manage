<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 11:04:36
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/rightbar.htm" */ ?>
<?php /*%%SmartyHeaderCode:187018615854268f8c6d2586-43191803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c7e654d6d89fb22a6f959d2f7926e6505920042' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/rightbar.htm',
      1 => 1411959856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187018615854268f8c6d2586-43191803',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54268f8c6d48c8_45139088',
  'variables' => 
  array (
    'todayhotnews' => 0,
    'commenthotnews' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54268f8c6d48c8_45139088')) {function content_54268f8c6d48c8_45139088($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>rightbar</title>
<link href="./public/css/frontcss/rightbar.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="rightbar_page_div">
		<div class="rightbar_item_div">
			<div class="rightbar_hr_div"><hr size="3" color="#666666"></div>
			<div class="rightbar_logo_div">
				<img src="./public/img/frontimg/jrhtLogo.png" width="140px" height="40px">
			</div>
			<div class="rightbar_topline_div">
				<div class="rightbar_topline_title_div">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_title'],0,12,'utf-8');?>
</a>
				</div>
				<div class="rightbar_topline_image_div">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_picture'];?>
" width="120px" height="90px"></a>
				</div>
				<div class="rightbar_topline_intro_div"><?php echo mb_substr($_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_introduction'],0,24,'utf-8');?>
</div>
			</div>
			<div class="rightbar_list_div">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['todayhotnews']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
				<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['todayhotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_title'],0,20,'utf-8');?>
</a><br><br>
				<?php endfor; endif; ?>
			</div>
		</div>
		<div class="rightbar_item_div">
			<div class="rightbar_hr_div"><hr size="3" color="#666666"></div>
			<div class="rightbar_logo_div">
				<img src="./public/img/frontimg/jrhtLogo.png" width="140px" height="40px">
			</div>
			<div class="rightbar_topline_div">
				<div class="rightbar_topline_title_div">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[0]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['commenthotnews']->value[0]['article_title'],0,12,'utf-8');?>
</a>
				</div>
				<div class="rightbar_topline_image_div">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[0]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['todayhotnews']->value[0]['article_picture'];?>
" width="120px" height="90px"></a>
				</div>
				<div class="rightbar_topline_intro_div"><?php echo mb_substr($_smarty_tpl->tpl_vars['commenthotnews']->value[0]['article_introduction'],0,24,'utf-8');?>
</div>
			</div>
			<div class="rightbar_list_div">
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['commenthotnews']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
				<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['commenthotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['commenthotnews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_title'],0,20,'utf-8');?>
</a><br><br>
				<?php endfor; endif; ?>
			</div>
		</div>
	</div>
</body>
</html><?php }} ?>