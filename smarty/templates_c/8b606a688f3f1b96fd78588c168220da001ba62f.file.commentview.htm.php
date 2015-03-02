<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 01:58:27
         compiled from "I:\wamp\www\news.valsun.cn\html\template\fronttemplate\commentview.htm" */ ?>
<?php /*%%SmartyHeaderCode:2964754283fcf1d7494-59302306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b606a688f3f1b96fd78588c168220da001ba62f' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\fronttemplate\\commentview.htm',
      1 => 1411993080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2964754283fcf1d7494-59302306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54283fcf2a6897_09995997',
  'variables' => 
  array (
    'article' => 0,
    'comnum' => 0,
    'comlist' => 0,
    'item' => 0,
    'pageStr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54283fcf2a6897_09995997')) {function content_54283fcf2a6897_09995997($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="new-Type" content="text/html; charset=UTF-8">
<title>newview</title>
<script type="text/javascript" src="http://misc.erp.valsun.cn/js/jquery-1.8.3.min.js"></script>
<link href="./public/css/frontcss/public.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/newview.css" rel="stylesheet" type="text/css" />
<link href="./public/css/frontcss/commentview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
	//赞和取消赞操作
	function iagree(){
		var id = $(this).attr("id");
		var comid = id.split("_")[1];
		var dislikeid = "#dislike_"+comid;
		if ($(dislikeid).attr("dislike") == 1) {
			//处于踩状态不能赞
			return;
		}
		var islike = $(this).attr("like");
		url = "index.php?mod=agree&act=";
		url +=(islike=="0")?"likeadd":"likedec";
		$.post(url,{
			"commentId": comid,
		},
		function(data){
			if ($.trim(data) == "ok") {
				  var trId			= "#like_" + comid;
				  var str = $(trId).html();
				  str = str.split("（")[1];
				  str = str.split("）")[0];
				  var likenum	= parseInt(str);
				  likenum			= (islike=="0")?(likenum+1):(likenum-1);
				  msg				= (islike=="0")?"取消赞":"点赞";
				  islike				= (islike=="0")?"1":"0";
				  $("#"+id).attr("like",islike);
				  $("#"+id).html("<img src='' width='20px' height='20px'>"+msg+"（"+likenum+"）");
			  }else {
				  alert("操作超时");
			}
		});
	}
	//踩和取消踩操作
	function idisagree(){
		var id = $(this).attr("id");
		var comid = id.split("_")[1];
		var likeid = "#like_"+comid;
		if ($(likeid).attr("like") == 1) {
			//处于赞状态不能踩
			return;
		}
		var isdislike = $(this).attr("dislike");
		url = "index.php?mod=agree&act=";
		url +=(isdislike=="0")?"dislikeadd":"dislikedec";
		$.post(url,{
			"commentId": comid,
		},
		function(data){
			if ($.trim(data) == "ok") {
				  var trId			= "#dislike_" + comid;
				  var str = $(trId).html();
				  str = str.split("（")[1];
				  str = str.split("）")[0];
				  var dislikenum	= parseInt(str);
				  dislikenum			= (isdislike=="0")?(dislikenum+1):(dislikenum-1);
				  msg					= (isdislike=="0")?"取消踩":"踩我";
				  isdislike				= (isdislike=="0")?"1":"0";
				  $("#"+id).attr("dislike",isdislike);
				  $("#"+id).html("<img src='' width='20px' height='20px'>"+msg+"（"+dislikenum+"）");
			  }else {
				  alert("操作超时");
			}
		});
	}
	$("[like]").click(iagree);
	$("[dislike]").click(idisagree);
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#comsubmit").click(function(){
		var comment = $.trim($("#comment").val());
		if(comment == ''){
			return false;
		}
		$.post("index.php?mod=comment&act=commin",
				  {
				    "articleId": "<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
",
				    "comContent": comment,
				  },
				  function(data){
					  var mydata='';
					  eval('mydata=' + data +';');
					  if ($.trim(mydata.comment_id) != null) {
						  $("#comment").val("");
						  var content = mydata.comment_content;
						  var str = "<div class='comment_list_item_div'>"
			  					+"<div class='comment_list_face_div'>"
			  					+"<img src='' width='50px' height='50px'>"
			  					+"</div>"
			  					+"<div class='comment_list_right_div'>"
			  					+"<div class='comment_list_username_div'>"
								+mydata.user_name
								+"<span>"+mydata.comment_addtime+"</span>"
								+"</div>"
								+"<div class='comment_list_content_div'>"
								+content
								+"</div>"
								+"<div class='comment_list_agree_div'>"
								+"</div>"
								+"</div>"
								+"<div class='new_hr_div'><hr size='1' color='#999999'></div>"
								+"</div>";
						$("#com_first").after(str);
					  }else {
//						  alert($.trim(mydata));
					}
				  });
	});
});
</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/header_a.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="page_div">
		<div class="allnew_div">
			<div class="new_title_div">
				<a href="index.php?mod=article&act=detail&articleid=<?php echo $_smarty_tpl->tpl_vars['article']->value['article_id'];?>
&columnid=<?php echo $_smarty_tpl->tpl_vars['article']->value['column_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['article_title'];?>
</a>
			</div>
			<div class="new_comment_div">
				<span class="new_comment_name_span">网友评论</span>
				<span class="new_comment_number_span"><?php echo $_smarty_tpl->tpl_vars['comnum']->value;?>
条评论</span>
				<div class="new_comment_frame_div">
					<div class="new_comment_input_div">
						<form>
							<textarea id="comment"></textarea>
						</form>
					</div>
					<div class="new_comment_hr_div"><hr size="1" color="#666666"></div>
					<div class="new_comment_btn_div" id="comsubmit">提交</div>
				</div>
			</div>
			<div class="comment_list_div">
				<div class="comment_list_name_div">全部评论</div>
				<div class="new_hr_div" id="com_first"><hr size="4" color="#999999"></div>
		<!-- 评论单元 -->		
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<div class="comment_list_item_div"  id="com_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
">
					<div class="comment_list_face_div">
						<img src="" width="50px" height="50px">
					</div>
					<div class="comment_list_right_div">
						<div class="comment_list_username_div"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>

								<span><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_addtime'];?>
</span>
						</div>
						<div class="comment_list_content_div"><?php echo $_smarty_tpl->tpl_vars['item']->value['comment_content'];?>
</div>
						<!-- 赞和踩 -->
						<div class="comment_list_agree_div">
				<?php if ($_smarty_tpl->tpl_vars['item']->value['user_comment_agree']==''||$_smarty_tpl->tpl_vars['item']->value['user_comment_agree']==0){?>						
							<a  like="0" id="like_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">赞（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_agrees'];?>
）</a> 
							<a dislike="0" id="dislike_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">踩（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_disagrees'];?>
）</a>
						
				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['user_comment_agree']=="1"){?>	
							<a like="1" id="like_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">取消赞（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_agrees'];?>
）</a> 
							<a dislike="0" id="dislike_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">踩（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_disagrees'];?>
）</a>

				<?php }elseif($_smarty_tpl->tpl_vars['item']->value['user_comment_agree']=="2"){?>
							<a  like="0" id="like_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">赞（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_agrees'];?>
）</a> 
							<a dislike="1" id="dislike_<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_id'];?>
"><img src="" width="20px" height="20px">取消踩（<?php echo $_smarty_tpl->tpl_vars['item']->value['comment_disagrees'];?>
）</a>
				<?php }?>
						</div>
					</div>
					<div class="new_hr_div"><hr size="1" color="#999999"></div>
				</div>
		<?php } ?>

				<div class="comment_list_item_div">
					<div class="comment_list_face_div">
						<img src="" width="50px" height="50px">
					</div>
					<div class="comment_list_right_div">
						<div class="comment_list_username_div">
							用户名
							<span>2014-09-24 15:45:21</span>
						</div>
						<div class="comment_list_content_div">
							用户名用限制长度没给，自己看着办
						</div>
						<div class="comment_list_agree_div">
							<a href="#"><img src="" width="20px" height="20px">（44）</a>
							<a href="#"><img src="" width="20px" height="20px">（44）</a>
						</div>
					</div>
					<div class="new_hr_div"><hr size="1" color="#999999"></div>
				</div>

			</div>
			<div class="bottomvar">
						<div class="pagination"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/rightbar.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("fronttemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>