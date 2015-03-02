<?php
class AgreeView extends BaseView{
	//用户对一条评论点赞
	function view_likeadd() {
		$result = CommentAgreeAct::act_iagreeadd();
		echo $result;
	}
	//取消赞
	function view_likedec() {
		$result = CommentAgreeAct::act_iagreedec();
		echo $result;
	}
	
	//用户对一条评论踩操作
	function view_dislikeadd() {
		$result = CommentAgreeAct::act_idisagreeadd();
		echo $result;
	}
	//取消踩
	function view_dislikedec() {
		$result = CommentAgreeAct::act_idisagreedec();
		echo $result;;
	}
}
?>