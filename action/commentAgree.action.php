<?php
/**
 * 类名：CommentArgeeAct
 * 功能：管理对于评论表news_comment的赞/踩表news_user_comment相关信息
 * 版本：2014-12-25
 * 作者: 蒋和超
 */
class CommentAgreeAct {
	/**
	 * Comment::act_iagreeadd
	 * 赞/踩表插入一条记录并该评论赞数+1
	 * @return bool
	 */
	public function act_iagreeadd() {

		$userId				= trim($_SESSION['USER_ID']);

		$commentId		= post_check(trim($_POST['commentId']));
		//该用户是否对该评论有过赞/踩操作
		$filed = ' user_comment_id,user_comment_agree ';
		$where = ' WHERE user_id= ' . $userId . ' AND comment_id='.$commentId .' AND is_delete = 0 ';
		$order = '';
		$limit = ' LIMIT 1';
		$result = CommentAgreeModel::getComAgree($filed, $where, $order, $limit);
		if(empty($result)){
			//未有过记录：insert
			$isagree = 1;
			$isdelete = 0;
			$newinfo = array(
					'userId'				=> $userId,
					'commentId'		=> $commentId,
					'isagree'			=> $isagree,
					'isdelete'			=> $isdelete,
			);
			$res = CommentAgreeModel::comAgreeInsert($newinfo);
			if (!$res) {
				return 'inerror';
			}
			// 插入成功 对改评论赞数+1：action:act
			$param		= '`comment_agrees`';
			$opt 		= '+1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if ($result['user_comment_agree'] == 0) {
			//有过记录，但为处于非赞非踩状态：update
			$usercomId = $result['user_comment_id'];
			$isagree = 1;
			$newinfo = array(
					'user_comment_agree'	=> $isagree,
			);
			$where = ' WHERE user_comment_id='.$usercomId .' AND is_delete = 0 ';
			$limit  	= ' LIMIT 1';
			$myres = CommentAgreeModel::comAgreeModify($newinfo, $where, $limit);
			if (!$myres) {
				return 'uperror';
			}
			// 更新成功 对该评论赞数+1：action:act
			$param		= 'comment_agrees';
			$opt 		= '+1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if ($result['user_comment_agree'] == 1) {         		//处于已赞状态
			return 'agreeerror';
		}
		if ($result['user_comment_agree'] == 2) {				//处于踩状态，不能赞
			return 'disagreeerror';
		}
		return false;
	}

	/**
	 * Comment::act_iagreedec
	 * 赞/踩表更新并该评论赞数-1
	 * @return bool
	 */
	public function act_iagreedec() {
		$userId				= trim($_SESSION['USER_ID']);
		$commentId		= post_check(trim($_POST['commentId']));
		//该用户是否对该评论有过赞/踩操作
		$filed = ' user_comment_id,user_comment_agree ';
		$where = ' WHERE user_id= ' . $userId . ' AND comment_id='.$commentId .' AND is_delete = 0 ';
		$order = '';
		$limit = ' LIMIT 1';
		$result = CommentAgreeModel::getComAgree($filed, $where, $order, $limit);
		if ($result['user_comment_agree'] == 1) {         		//处于已赞状态,可以更新
			$usercomId = $result['user_comment_id'];
			$isagree = 0;
			$newinfo = array(
					'user_comment_agree'	=> $isagree,
			);
			$where = ' WHERE user_comment_id='.$usercomId .' AND is_delete = 0 ';
			$limit  	= ' LIMIT 1';
			$myres = CommentAgreeModel::comAgreeModify($newinfo, $where, $limit);
			if (!$myres) {
				return 'uperror';
			}
			// 插入成功 对改评论赞数+1：action:act
			$param		= 'comment_agrees';
			$opt 		= '-1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if (empty($result)) {
			return false;
		}
		if ($result['user_comment_agree'] == 0) {
			return false;
		}
		if ($result['user_comment_agree'] == 2) {				//处于踩状态，不能赞
			return false;
		}
		return false;
	}
	
	/**
	 * Comment::act_idisagreeadd
	 * 赞/踩表插入一条记录并该评论踩数+1
	 * @return bool
	 */
	public function act_idisagreeadd() {
		$userId				= trim($_SESSION['USER_ID']);
		$commentId		= post_check(trim($_POST['commentId']));
		//该用户是否对该评论有过赞/踩操作
		$filed = ' user_comment_id,user_comment_agree ';
		$where = ' WHERE user_id= ' . $userId . ' AND comment_id='.$commentId .' AND is_delete = 0 ';
		$order = '';
		$limit = ' LIMIT 1';
		$result = CommentAgreeModel::getComAgree($filed, $where, $order, $limit);
		if(empty($result)){
			//未有过记录：insert
			$isagree = 2;
			$isdelete = 0;
			$newinfo = array(
					'userId'			=> $userId,
					'commentId'			=> $commentId,
					'isagree'			=> $isagree,
					'isdelete'			=> $isdelete,
			);
			$res = CommentAgreeModel::comAgreeInsert($newinfo);
			if (!$res) {
				return 'inerror';
			}
			// 插入成功 对改评论踩数+1：action:act
			$param		= '`comment_disagrees`';
			$opt 		= '+1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if ($result['user_comment_agree'] == 0) {
			//有过记录，但为处于非赞非踩状态：update
			$usercomId = $result['user_comment_id'];
			$isagree = 2;
			$newinfo = array(
					'user_comment_agree'	=> $isagree,
			);
			$where = ' WHERE user_comment_id='.$usercomId .' AND is_delete = 0 ';
			$limit  	= ' LIMIT 1';
			$myres = CommentAgreeModel::comAgreeModify($newinfo, $where, $limit);
			if (!$myres) {
				return 'uperror';
			}
			// 更新成功 对该评论赞数+1：action:act
			$param		= 'comment_disagrees';
			$opt 		= '+1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if ($result['user_comment_agree'] == 1) {         		//处于已踩状态
			return 'agreeerror';
		}
		if ($result['user_comment_agree'] == 2) {				//处于赞状态，不能踩
			return 'disagreeerror';
		}
		return false;
	}

	/**
	 * Comment::act_idisagreeadd
	 * 赞/踩表插入一条记录并该评论踩数+1
	 * @return bool
	 */
	public function act_idisagreedec() {
		$userId				= trim($_SESSION['USER_ID']);
		$commentId		= post_check(trim($_POST['commentId']));
		//该用户是否对该评论有过赞/踩操作
		$filed = ' user_comment_id,user_comment_agree ';
		$where = ' WHERE user_id= ' . $userId . ' AND comment_id='.$commentId .' AND is_delete = 0 ';
		$order = '';
		$limit = ' LIMIT 1';
		$result = CommentAgreeModel::getComAgree($filed, $where, $order, $limit);
		if ($result['user_comment_agree'] == 2) {         		//处于已踩状态,可以更新
			$usercomId = $result['user_comment_id'];
			$isagree = 0;
			$newinfo = array(
					'user_comment_agree'	=> $isagree,
			);
			$where = ' WHERE user_comment_id='.$usercomId .' AND is_delete = 0 ';
			$limit  	= ' LIMIT 1';
			$myres = CommentAgreeModel::comAgreeModify($newinfo, $where, $limit);
			if (!$myres) {
				return 'uperror';
			}
			// 插入成功 对改评论赞数+1
			$param		= 'comment_disagrees';
			$opt 		= '-1';
			$ires = CommentAct::act_comAgreeModify($commentId, $param, $opt);
			return 'ok';
		}
		if (empty($result)) {
			return false;
		}
		if ($result['user_comment_agree'] == 0) {
			return false;
		}
		if ($result['user_comment_agree'] == 1) {
			return false;
		}
		return false;
	}
}
?>