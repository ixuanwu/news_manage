<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 11:04:36
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:185524970554268f8c5d7385-99240903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9df703d247fd3cfa5f744345f903fdb13e5fea9c' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/index.htm',
      1 => 1411959856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185524970554268f8c5d7385-99240903',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54268f8c6c5952_20153268',
  'variables' => 
  array (
    'importnews' => 0,
    'columnnews' => 0,
    'columninfo' => 0,
    'rightinfo' => 0,
    'picturenews' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54268f8c6c5952_20153268')) {function content_54268f8c6c5952_20153268($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>index</title>
<script type="text/javascript" src="http://misc.erp.valsun.cn/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="./public/js/search.js"></script>
<script type="text/javascript" src="./public/js/frontjs/index.js"></script>
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/index.css" rel="stylesheet" type="text/css" />
</head>
<body> 
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page_div">
		<div class="sign_div">
			<div class="topline_div">
				<div class="topline_item_div">
					<div class="topline_title_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['importnews']->value[0]['article_title'],0,23,'utf-8');?>
</a>
					</div>
					<div class="topline_image_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['article_picture'];?>
" width="160px" height="120px"></a>
					</div>
					<div class="topline_intro_div">
						<?php echo mb_substr($_smarty_tpl->tpl_vars['importnews']->value[0]['article_introduction'],0,50,'utf-8');?>

					</div>
				</div>
				<div class="topline_hr_div">
					<hr size="1">
				</div>
				<div class="topline_item_div">
					<div class="topline_title_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[1]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['importnews']->value[1]['article_title'],0,23,'utf-8');?>
</a>
					</div>
					<div class="topline_image_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[1]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['importnews']->value[0]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[1]['article_picture'];?>
" width="160px" height="120px"></a>
					</div>
					<div class="topline_intro_div">
						<?php echo mb_substr($_smarty_tpl->tpl_vars['importnews']->value[1]['article_introduction'],0,50,'utf-8');?>

					</div>
				</div>
			</div>
			<div class="scroll_image_div">
				<div id="scroll_image_item1" class="scroll_image_item_div" style="background-color:yellow">
					<img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[2]['article_picture'];?>
" width="400px" height="300px">
				</div>
				<div id="scroll_image_item2" class="scroll_image_item_div" style="background-color:red">
					<img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[3]['article_picture'];?>
" width="400px" height="300px">
				</div>
				<div id="scroll_image_item3" class="scroll_image_item_div" style="background-color:blue">
					<img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[4]['article_picture'];?>
" width="400px" height="300px">
				</div>
				<div id="scroll_image_item4" class="scroll_image_item_div" style="background-color:green">
					<img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[5]['article_picture'];?>
" width="400px" height="300px">
				</div>
				<div id="scroll_image_item5" class="scroll_image_item_div" style="background-color:black">
					<img src="<?php echo $_smarty_tpl->tpl_vars['importnews']->value[6]['article_picture'];?>
" width="400px" height="300px">
				</div>
				<div class="scroll_image_bar_div">
					<div id="scroll_bar_btn1" class="scroll_bar_btn_div">1</div>
					<div id="scroll_bar_btn2" class="scroll_bar_btn_div">2</div>
					<div id="scroll_bar_btn3" class="scroll_bar_btn_div">3</div>
					<div id="scroll_bar_btn4" class="scroll_bar_btn_div">4</div>
					<div id="scroll_bar_btn5" class="scroll_bar_btn_div">5</div>
				</div>
			</div>
			<div class="search_div">
				<a id="search" href="#"><div class="search_button_div">搜索</div></a>
				<div class="search_input_div">
					<form id="search_form" action="" method="post">
						<input id="search_input" type="text" size="20"/>
					</form>
				</div>
			</div>
		</div>
		<div class="category_div">
			<?php  $_smarty_tpl->tpl_vars['columninfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['columninfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columnnews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['columninfo']->key => $_smarty_tpl->tpl_vars['columninfo']->value){
$_smarty_tpl->tpl_vars['columninfo']->_loop = true;
?>
			<div class="category_item_div">
				<div class="category_hr_div"><hr size="3" color="#999999"></div>
				<div class="category_name_div"><?php echo $_smarty_tpl->tpl_vars['columninfo']->value['column_name'];?>
</div>
				<div class="category_more_div"><a href="index.php?mod=article&act=column&columnpid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['column_id'];?>
&columnname=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['column_name'];?>
">更多</a></div>
				<div class="category_hr_div"><hr size="1"></div>
				<div class="category_image_div">
					<div class="category_bigimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][0]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][0]['article_picture'];?>
" width="280px" height="210px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columninfo']->value['left'][0]['article_title'],0,18,'utf-8');?>

						</a>
					</div>
					<div class="category_leftimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][1]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][1]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][1]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columninfo']->value['left'][1]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_rightimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][2]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][2]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][2]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columninfo']->value['left'][2]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_leftimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][3]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][3]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][3]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columninfo']->value['left'][3]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
					<div class="category_rightimage_div">
						<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][4]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][4]['column_id'];?>
">
							<img src="<?php echo $_smarty_tpl->tpl_vars['columninfo']->value['left'][4]['article_picture'];?>
" width="120px" height="90px"><br><?php echo mb_substr($_smarty_tpl->tpl_vars['columninfo']->value['left'][4]['article_title'],0,9,'utf-8');?>

						</a>
					</div>
				</div>
				<div class="category_article_div">
				<?php  $_smarty_tpl->tpl_vars['rightinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rightinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columninfo']->value['right']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
			<?php } ?>
			
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="image_div">
			<div class="image_hr_div"><hr size="3" color="#999999"></div>
			<div class="image_name_div">读图</div>
			<div class="image_more_div"><a href="index.php?mod=article&act=picture&columnid=11&columnname=读图">更多</a></div>
			<div class="image_imgs_div">
			
				<div class="image_item_div" style="margin-left: 0px;">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[0]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[0]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[0]['article_picture'];?>
" width="240px" height="180px"></a>
				</div>
				<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['picturenews']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<div class="image_item_div">
					<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['column_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['picturenews']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['article_picture'];?>
" width="240px" height="180px"></a>
				</div>
				<?php endfor; endif; ?>
			</div>
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>