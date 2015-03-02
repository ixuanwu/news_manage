<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:52:39
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\article.htm" */ ?>
<?php /*%%SmartyHeaderCode:206354298e57878620-60209185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b084659c0c0d5c925f5e86f2e4102f627622908' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\article.htm',
      1 => 1412004942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206354298e57878620-60209185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columnid' => 0,
    'columnpid' => 0,
    'mod' => 0,
    'lcolumnlist' => 0,
    'column' => 0,
    'newslist' => 0,
    'newsinfo' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54298e579f0509_67278876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54298e579f0509_67278876')) {function content_54298e579f0509_67278876($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	
<script type="text/javascript">
$(document).ready(function(){
	$("#addArticle").click(function(){
		$("#dis1").hide();
		$("#dis2").show();
		$.post("index.php?mod=article&act=getcolumns",
				function(data){
					var myjson='';
			        eval('myjson=' + data + ';');
			        var html='';
			        for(i=0;i<myjson.length;i++){
			        	html+="<option value='"+myjson[i]['column_id']+"'>———"+myjson[i]['column_name']+"———</option>";
			        }
					$("#column").html(html);
					var test = "<?php echo $_smarty_tpl->tpl_vars['columnid']->value;?>
";
					if(test == ""){
						$("#column option[value='<?php echo $_smarty_tpl->tpl_vars['columnpid']->value;?>
']").attr("selected","selected");
					} else {
						$("#column option[value='<?php echo $_smarty_tpl->tpl_vars['columnid']->value;?>
']").attr("selected","selected");
					}
		});
	});
	$("#updateArticle").click(function(){
// 		alert($("#editarticle").val());
		$("#dis1").hide();
		$("#dis2").show();
		$("#formtitle").html("修改文章");
		$("#addarticle").attr("value", "修改");
		$("#formcontent").attr("action", "index.php?mod=article&act=modifyarticle&articleid="+$("#editarticle").val());
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
		$.post("index.php?mod=article&act=updateArticle&articleid=" + $("#editarticle").val(),
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
			$.post("index.php?mod=article&act=deleteArticle&articleid=" + $("#editarticle").val(),
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
			<th>文章访问数</th>
			<th>文章点赞/踩数</th>
			<th>文章评论数</th>
			<th colspan="3">操作</th>
			<th><a id="addArticle" href="javascript:void(0)" style="color:blue">添加文章</a></th>
	</tr>
		<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['newslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['newsinfo']->key;
?>
			<tr id="del<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
">
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
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_views'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_agree'];?>
/<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_disagree'];?>
</td>		
				<td><?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_comment'];?>
</td>
				<td colspan="3">
					<a href="javascript:void(0)" id="updateArticle">编辑<input id="editarticle" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
" /></a>
					<a href="javascript:void(0)" id="deleteArticle">删除</a>
					<a href="index.php?mod=count&act=index&article_id=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
" id="countArticle">统计</a>
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
			<form id="formcontent" method="post" action="index.php?mod=article&act=addarticle" enctype="multipart/form-data">
					<div class = "my_comment" id="formtitle">投递文章</div>
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
						<input class = "my_b_button" type = "submit" value = "投递" id="addarticle"/>
						<input class = "my_b_button" type = "reset" value = "取消" id="uparticle-btn"/>
					</div>
					</form>
			</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>