<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:52:43
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\checkarticle.htm" */ ?>
<?php /*%%SmartyHeaderCode:1244454298e5b789843-78857996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80f3e4873f6934f543cf328e256f3d6a91a59b77' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\checkarticle.htm',
      1 => 1412002028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1244454298e5b789843-78857996',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columnpid' => 0,
    'mod' => 0,
    'lcolumnlist' => 0,
    'column' => 0,
    'columnid' => 0,
    'newslist' => 0,
    'newsinfo' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54298e5b998bf7_76536209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54298e5b998bf7_76536209')) {function content_54298e5b998bf7_76536209($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
$(document).ready(function(){
	$("#editArticle").click(function(){
		$("#dis1").css("display", "none");
		$("#dis2").css("display", "");
		$.post("index.php?mod=article&act=getcolumns",
				function(data){
					var myjson='';
			        eval('myjson=' + data + ';');
			        var html='';
			        for(i=0;i<myjson.length;i++){
			        	html+="<option value='"+myjson[i]['column_id']+"'>———"+myjson[i]['column_name']+"———</option>";
			        }
					$("#column").html(html);
			});
			$.post("index.php?mod=article&act=updateCheckArticle&articleid=" + $("#detailarticle").val(),
					function(data){
						var myjson='';
				        eval('myjson=' + data + ';');
						$("#title").val(myjson['article_title']);
						var columnid = myjson['column_id'];
						$("#column option[value='"+columnid+"']").attr("selected","selected");
						$("#article_pic").attr("src", myjson['article_picture']);
						$("#introduce").val(myjson['article_introduction']);
						$("#content").val(myjson['article_content']);
			});
	});
	$("#deleteArticle").click(function(){
		var result = confirm('你确定要删除吗？');
		if(result){
			$.post("index.php?mod=article&act=deleteArticle&articleid=" + $("#detailarticle").val(),
					function(data){
				if($.trim(data) == "删除成功"){
					alertify.success(data);
					location.href=location.href;
				}else{
					alertify.error(data);
				}
			});
		}
	});
	$("#delete").click(function(){
		var result = confirm('你确定要删除吗？');
		if(result){
			$.post("index.php?mod=article&act=deleteArticle&articleid=" + $("#detailarticle").val(),
					function(data){
				if($.trim(data) == "删除成功"){
					alertify.success(data);
					location.href=location.href;
				}else{
					alertify.error(data);
				}
			});
		}
	});
	$("#preview").click(function(){
		$.post("index.php?mod=article&act=detail&check=0&articleid=" + $("#detailarticle").val()+"&columnid="+$("#articlecolumn").val(),
				function(data){
			  previewwin= open("", "previewwin","status=no,menubar=yes,toolbar=no");
			  previewwin.document.open();
			  previewwin.document.write(data);
			  previewwin.document.close();
		});
	});
	$("#previewArticle").click(function(){
		$.post("index.php?mod=article&act=detail&check=0&articleid=" + $("#detailarticle").val()+"&columnid="+$("#articlecolumn").val(),
				function(data){
			  previewwin= open("", "previewwin","status=no,menubar=yes,toolbar=no");
			  previewwin.document.open();
			  previewwin.document.write(data);
			  previewwin.document.close();
		});
	});
	$("#acceptArticle").click(function(){
		var result = confirm('你确定文章要通过审核吗？');
		if(result){
			$.post("index.php?mod=article&act=checkarticle&articleid=" + $("#detailarticle").val()+"&columnpid=<?php echo $_smarty_tpl->tpl_vars['columnpid']->value;?>
",
					function(data){
				if($.trim(data) == "审核成功"){
					location.href=location.href;
				}else{
					alertify.error(data);
				}
			});
		}
	});
	$("#accept").click(function(){
		var result = confirm('你确定文章要通过审核吗？');
		if(result){
			$.post("index.php?mod=article&act=checkarticle&articleid=" + $("#detailarticle").val()+"&columnpid=<?php echo $_smarty_tpl->tpl_vars['columnpid']->value;?>
",
					function(data){
				if($.trim(data) == "审核通过"){
					alertify.success(data);
					location.href=location.href;
				}else{
					alertify.error(data);
				}
			});
		}
	});
	$("#toreturn").click(function(){
		var result = confirm('你确定要返回吗？');
		if(result){
			location.href=location.href;
		}
	});
	var editor1;
	KindEditor.ready(function(K) {
		var editor1 = K.create('textarea[name="articlecontent"]', {
			cssPath : './public/kindeditor/plugins/code/prettify.css',
			uploadJson : './public/kindeditor/php/upload_json.php',
			fileManagerJson : './public/kindeditor/php/file_manager_json.php',
			allowFileManager : true,
		});
		prettyPrint();
	});
});
</script>
<script type="text/javascript"  src="./public/js/checkjs/uploadarticle.js"></script>
<div class="main" style="margin-top: 3px">
<div class="twovar <?php if (in_array($_smarty_tpl->tpl_vars['mod']->value,array('shippingAddress2'))){?>nothing-twovar<?php }?>" style="background-color: gray">
  <ul>
  		<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['lcolumnlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['column']->key;
?>
			<li><a style="border-color: gray" href="index.php?mod=article&act=getArticle&columnid=<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['columnid']->value==$_tmp1){?>class = "cho"<?php }?>><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</a></li>
		<?php } ?>
		<li><a id="checkArticle" style="border-color: gray" href="index.php?mod=article&act=getCheckArticle&columnpid=<?php echo $_smarty_tpl->tpl_vars['columnpid']->value;?>
" <?php if ($_GET['act']=='getCheckArticle'){?>class = "cho"<?php }?>>未审核文章</a></li>
  </ul>
</div>
<div id="dis1">
	<table cellspacing="0" width="100%">
	<tr class="title">
			<th>文章ID</th>
			<th>文章标题</th>
			<th>文章作者</th>
			<th>文章图片</th>
			<th>文章导语</th>
			<th>文章添加时间</th>
			<th>操作</th>
			<th></th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_author'];?>
</td>
				<td><img src=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_picture'];?>
 width="20px" height="16px"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_introduction'];?>
</td>
				<td><?php echo date("Y-m-d H:i:s",$_smarty_tpl->tpl_vars['newsinfo']->value['article_addtime']);?>
</td>
				<td colspan="4">
					<a href="javascript:void(0)" id="editArticle">详情<input id="detailarticle" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
" /></a>
					<a href="javascript:void(0)" id="previewArticle">预览<input id="articlecolumn" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['column_id'];?>
" /></a>
					<a href="javascript:void(0)" id="acceptArticle">通过</a>
					<a href="javascript:void(0)" id="deleteArticle">删除</a>
				</td>
				<td></td>
			</tr>
		<?php } ?>
</table>
<div class="bottomvar">
		<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
	</div>
</div>
</div>
<div id="dis2" style="display:none">
			<form id="formcontent" method="post" action="" enctype="multipart/form-data">
					<div class = "my_comment">未审核文章</div>
					<div class="line">
						<span class="my_title">标题：</span>
						<span><input class = "my_a_text" type = "text" id="title"  name="articletitle"/></span>
					</div>
					<div class="a_line">
						<span class="my_title">栏目：</span>
						<span>
							<select class="my_select" id="column" name="columnid">
				
							</select>
						</span>
					</div>
					<div class="a_line">
						<span class="my_title">图片：</span>
						<span><input class = "my_b_text" type = "file" id="picture" name="articlepicture" multiple="multiple"></span>
						<!-- <span><input class = "my_a_button" type="button" value="浏览"></span> -->
					</div>
					<div class = "show_pic">
						<img class="my_picture" src="" style="width:160px;height:120px;" id="article_pic"/>
					</div>
					<div class="line">
						<span class="my_title">导语：</span>
						<span><textarea class="my_lead" cols ="83" rows = "3" id="introduce" name="articleintroduction"></textarea></span>
					</div>
					<div class="line">
						<span class="my_title">内容：</span>
						<span style="margin-left:15px;">
							<textarea name="articlecontent" style="width:500px;height:200px;" id="content" ></textarea>
						</span>
					</div>
					<div class="line">
						<input style = "margin-left: 100px" type = "button" value = "预览" id="preview"/>
						<input style = "margin-left: 100px" type = "button" value = "通过" id="accept"/>
						<input style = "margin-left: 100px" type = "button" value = "删除" id="delete"/>
						<input style = "margin-left: 100px" type = "button" value = "再议" id="toreturn"/>
					</div>
					</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>