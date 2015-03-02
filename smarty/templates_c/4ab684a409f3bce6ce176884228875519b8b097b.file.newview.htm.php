<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 19:09:45
         compiled from "/data/web/news.valsun.cn/html/template/fronttemplate/newview.htm" */ ?>
<?php /*%%SmartyHeaderCode:872933655428ab79649db7-96811391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ab684a409f3bce6ce176884228875519b8b097b' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/fronttemplate/newview.htm',
      1 => 1411988982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '872933655428ab79649db7-96811391',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5428ab796cf1e6_66606803',
  'variables' => 
  array (
    'articleinfo' => 0,
    'user_article_agree' => 0,
    'recommendnews' => 0,
    'newsinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5428ab796cf1e6_66606803')) {function content_5428ab796cf1e6_66606803($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="new-Type" content="text/html; charset=UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_title'];?>
</title>
<script type="text/javascript" src="http://misc.erp.valsun.cn/js/jquery-1.8.3.min.js"></script>
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/newview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
	$("#comsubmit").click(function(){
		var comment = $.trim($("#comment").val());
		if(comment == ''){
			return false;
		}
		if(comment.length>140){
			$("#msg2").fadeToggle();
			setTimeout(function () {
				$("#msg2").fadeToggle();
			},2000);
			return false;
		}
		$.post("index.php?mod=comment&act=commin",
				  {
				    "articleId": "<?php echo $_GET['articleid'];?>
",
				    "comContent": comment,
				  },
				  function(data){
					  var mydata='';
					  eval('mydata=' + data +';');
					  if ($.trim(mydata.comment_id) != null) {
						  $("#comment").val("");
						  $("#msg").fadeToggle();
						  setTimeout(function () {
							  $("#msg").fadeToggle();
						},2000);
					  }else {
//						  alert($.trim(mydata));
					}
				  });
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	//赞和取消赞操作
	function iagree(){
		var id = $(this).attr("id");
		var articleid = id.split("_")[1];
		var dislikeid = "#dislike_"+articleid;
		if ($(dislikeid).attr("dislike") == 1) {
			//处于踩状态不能赞
			return;
		}
		var islike = $(this).attr("like");
		url = "index.php?mod=article&act=";
		url +=(islike=="0")?"agree":"agreenot";
		$.post(url,{
			"articleid": articleid,
		},
		function(data){
			if ($.trim(data) == "ok") {
				  var trId			= "#like_" + articleid;
				  var str = $(trId).html();
				  str = str.split("（")[1];
				  str = str.split("）")[0];
				  var likenum	= parseInt(str);
				  likenum			= (islike=="0")?(likenum+1):(likenum-1);
				  msg				= (islike=="0")?"取消赞":"点个赞";
				  imgsrc			= (islike=="0")?"./public/img/frontimg/1_visited.jpg":"./public/img/frontimg/1.jpg";
				  color 			= (islike=="0")?"<font style='color:#FA73EA'>":"<font style='color:#0099FF'>";
				  islike			= (islike=="0")?"1":"0";
				  $("#"+id).attr("like",islike);
				  $("[like]").unbind("mouseover");
				  $("#"+id).html("<img src='"+imgsrc+"' width='20px' height='20px'>"+color+msg+"（"+likenum+"）</font>");
			  }else {
				  $("#login_btn").click();
			}
		});
	}
	//踩和取消踩操作
	function idisagree(){
		var id = $(this).attr("id");
		var articleid = id.split("_")[1];
		var likeid = "#like_"+articleid;
		if ($(likeid).attr("like") == 1) {
			//处于赞状态不能踩
			return;
		}
		var isdislike = $(this).attr("dislike");
		url = "index.php?mod=article&act=";
		url +=(isdislike=="0")?"disagree":"disagreenot";
		$.post(url,{
			"articleid": articleid,
		},
		function(data){
			if ($.trim(data) == "ok") {
				  var trId			= "#dislike_" + articleid;
				  var str = $(trId).html();
				  str = str.split("（")[1];
				  str = str.split("）")[0];
				  var dislikenum	= parseInt(str);
				  dislikenum			= (isdislike=="0")?(dislikenum+1):(dislikenum-1);
				  msg					= (isdislike=="0")?"取消踩":"踩一脚";
				  isdislike				= (isdislike=="0")?"1":"0";
				  $("#"+id).attr("dislike",isdislike);
				  $("#"+id).html("<img src='./public/img/frontimg/2.jpg' width='20px' height='20px'>"+msg+"（"+dislikenum+"）");
			  }else {
				  $("#login_btn").click();
			}
		});
	}
	//赞踩视觉效果
	$("[like]").mouseover(function(){
		$(this).children("img").attr("src", "./public/img/frontimg/1_hover.jpg");
		$(this).children("font").attr("style", "color:#F78543");
	});
	$("[dislike]").mouseover(function(){
		$(this).children("img").attr("src", "./public/img/frontimg/2_hover.jpg");
	});
	$("[like]").mouseout(function(){
		if($(this).children("font").html == "点个赞"){
			
		}
		$("[like]").bind("mouseover", function(){
			$(this).children("img").attr("src", "./public/img/frontimg/1_hover.jpg");
			$(this).children("font").attr("style", "color:#F78543");
		});
	});
	$("[dislike]").mouseout(function(){
		$(this).children("img").attr("src", "./public/img/frontimg/2.jpg");
	});
	$("[like]").click(iagree);
	$("[dislike]").click(idisagree);
});
</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/header_a.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page_div">
		<div class="allnew_div">
			<div class="new_title_div"><?php echo mb_substr($_smarty_tpl->tpl_vars['articleinfo']->value['article_title'],0,28,'utf-8');?>
</div>
			<div class="new_writer_div"><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_author'];?>
&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_addtime'];?>
</div>
			<div class="new_agree_div">
				<!-- 赞和踩 -->
				<?php if ($_smarty_tpl->tpl_vars['user_article_agree']->value==''||$_smarty_tpl->tpl_vars['user_article_agree']->value==0){?>		
						<div class="new_agree_item_div">
							<a like="0" id="like_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/1.jpg" width="20px" height="20px"><font style="color:#0099FF">点个赞（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_agree'];?>
）</font></a> 
						</div>
						<div class="new_disagree_item_div">
							<a dislike="0" id="dislike_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/2.jpg" width="20px" height="20px">踩一脚（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_disagree'];?>
）</a>
						</div>
				<?php }elseif($_smarty_tpl->tpl_vars['user_article_agree']->value=="1"){?>		
						<div class="new_agree_item_div">
							<a like="1" id="like_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/1_visited.jpg" width="20px" height="20px"><font style="color:#FA73EA">取消赞（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_agree'];?>
）</font></a> 
						</div>
						<div class="new_disagree_item_div">
							<a dislike="0" id="dislike_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/2.jpg" width="20px" height="20px">踩一脚（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_disagree'];?>
）</a>
						</div>
				<?php }elseif($_smarty_tpl->tpl_vars['user_article_agree']->value=="2"){?>		
						<div class="new_agree_item_div">
							<a like="0" id="like_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/1.jpg" width="20px" height="20px"><font style="color:#0099FF">点个赞（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_agree'];?>
）</font></a> 
						</div>
						<div class="new_disagree_item_div">
							<a dislike="1" id="dislike_<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
" href="#"><img src="./public/img/frontimg/2-visited.jpg" width="20px" height="20px"><font style="color:#FA73EA">取消踩（<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_disagree'];?>
）</font></a>
						</div>
				<?php }?>
<!-- 				<a href="index.php?mod=article&act=agree&articleid=<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
"><img src="" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_agree'];?>
</a> -->
<!-- 				<a href="index.php?mod=article&act=disagree&articleid=<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_id'];?>
"><img src="" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_disagree'];?>
</a> -->
				<a href="#">
					<img src="./public/img/frontimg/commenticon.png" width="20px" height="20px">&nbsp;<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_comments'];?>

				</a>
			</div>
			<div class="new_hr_div"><hr size="1" color="#CCCCCC"></div>
			<div class="new_content_div">
				<?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_content'];?>

				<span><a href="index.php?mod=article&act=index">返回新闻首页&gt;&gt;</a></span>
			</div>
			<div class="new_aboutreading_div">
				<span class="new_aboutreading_name_span">相关阅读：</span><br>
				<?php  $_smarty_tpl->tpl_vars['newsinfo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsinfo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recommendnews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsinfo']->key => $_smarty_tpl->tpl_vars['newsinfo']->value){
$_smarty_tpl->tpl_vars['newsinfo']->_loop = true;
?>
				<span class="new_aboutreading_list_span">&nbsp;<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['newsinfo']->value['column_id'];?>
"><?php echo mb_substr($_smarty_tpl->tpl_vars['newsinfo']->value['article_title'],0,28,'utf-8');?>
</a></span><br>
				<?php } ?>
			</div>
			<div class="new_comment_div">
				<span class="new_comment_name_span">网友评论</span>
				<span class="new_comment_number_span"><a href= "index.php?mod=comment&act=artcom&articleId=<?php echo $_GET['articleid'];?>
"><?php echo $_smarty_tpl->tpl_vars['articleinfo']->value['article_comments'];?>
条评论</a></span>
				<div class="new_comment_frame_div">
					<div class="new_comment_input_div">
						<form>
							<textarea id="comment"></textarea>
						</form>
					</div>
					<div class="new_comment_hr_div"><hr size="1" color="#666666"></div>
					<div class="new_comment_btn_div" id="comsubmit">提交</div>
					<div class="new_comment_msg" id="msg" style="display: none">评论成功！</div>
					<div class="new_comment_msg" id="msg2" style="display: none">请把字数限制在140以内</div>
					
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>