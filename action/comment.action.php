<?php
/**
 * 类名：CommentAct
 * 功能：管理Comment评论信息
 * 版本：2015-01-25
 * 作者: 蒋和超
 */
class CommentAct {
	/**
	 * CommentAct::act_commentInsert
	 * 系统评论数据插入并对文章的评论数+1
	 * @return bool
	 */
	public function act_commentInsert() {
		$userId				= trim($_SESSION['USER_ID']);
		$articleId			= post_check(trim($_POST['articleId']));
		$comContent			= post_check(trim($_POST['comContent']));
		if(empty($articleId)||empty($comContent)){
			exit("参数不能为空");
		}
		$comAddtime			= strtotime(date("Y-m-d H:i:s"));
		$comAgrees			= 0;
		$comDisagrees		= 0;
		$isdelete			= 0;
		$newInfo			= array(
				'userId'	=> $userId,
				'articleId'	=> $articleId,
				'comContent'		=> $comContent,
				'comAddtime'=> $comAddtime,
				'comAgrees'=> $comAgrees,
				'comDisagrees'=> $comDisagrees,
				'isdelete'=> $isdelete,
		);
		$result		= CommentModel::comInsertAndback($newInfo);
		$result['user_name']		= $_SESSION['USER_NAME'];
		if ($result['comment_id'] != null) {
			//文章表中记录中评论数+1
			$res = ArticleModel::addCommentsNumOrNot($articleId,1);
		}
		return $result;
	}
	
	/**
	 * CommentAct::act_commentDel
	 *  系统评论数据删除
	 * @return bool
	 */
	public function act_commentDel() {
		/*
		 * 权限验证
		 */
		
		$commentId = post_check(trim($_POST['commentId']));
		$result = CommentModel::commentDel($commentId);
		return $result;
	}
	/**
	 * CommentAct::act_commentDel
	 *  系统评论数据删除(用户行为)
	 * @return bool
	 */
	public function act_icommentDel() {
		//权限验证：登陆用户是否该评论	
		$filed			= ' comment_id ';
		$userId			= $_SESSION['USER_ID'];
		$commentId	= post_check(trim($_POST['commentId']));
		$articleId		= post_check(trim($_POST['articleId']));
		$where =' WHERE user_id= ' . $userId . ' AND comment_id='.$commentId.' AND article_id='. $articleId .' AND is_delete = 0 ';
		$result =  CommentModel::getCommentList($filed, $where);
		if(empty($result)){
			//没有权限
			return "error";
		}
		//通过验证，删除该评论
		$result = CommentModel::commentDel($commentId);
		if (!$result) {
			//删除失败
			return "delerror";
		}
		//文章表中记录中评论数-1
		$res = ArticleModel::addCommentsNumOrNot($articleId,0);
		return "success";
	}
	
	/**
	 * CommentAct::act_adminComDel
	 *  系统评论数据删除(管理员行为)
	 * @return bool
	 */
	public function act_adminComDel() {
		$commentId	= post_check(trim($_POST['commentId']));
		$articleId	= post_check(trim($_POST['articleId']));
		$result 	= CommentModel::commentDel($commentId);
		//文章表中记录中评论数-1
		$res = ArticleModel::addCommentsNumOrNot($articleId,0);
		return "success";
	}
	
	
	
	/**
	 * CommentAct::act_comAgreeModify
	 *  评论赞/踩数更新
	 * @return bool
	 */
	public function act_comAgreeModify($comId, $param, $opt) {
		$data = array();
		$data[$param] = $param . $opt;
		$result = CommentModel::commentUpdate($comId, $data);
		return $result;
	}
	
	/**
	 * CommentAct::act_getCommentList
	 *  系统评论数据查询
	 * @return array
	 */
	public function act_getComByUid($order='',$limit='') {
		$filed = ' a.comment_id,a.user_id,a.article_id,a.comment_content,a.comment_addtime,a.comment_agrees,a.comment_disagrees,c.article_title';
		$userId = $_SESSION['USER_ID'];
		$where =' WHERE a.user_id= ' . $userId . ' AND a.is_delete = 0 AND c.is_delete = 0 ';
		$order = empty($order) ? '' : " ORDER BY {$order} ";
		return CommentModel::getCommentListV2($filed, $where, $order, $limit);
	}
	/**
	 * CommentAct::act_getCommentList
	 *  系统评论数据查询:通过文章id
	 * @return array
	 */
	public function act_getComByArticle($order='', $limit='') {
		if (!isset($_GET['articleId']) || trim($_GET['articleId']) == "") {
			exit("文章为空");
		}
		//是否登录
		$userId = $_SESSION['USER_ID'];
		$filed = ' a.comment_id,a.user_id,a.article_id,a.comment_content,a.comment_addtime,a.comment_agrees,a.comment_disagrees,b.user_name,b.user_headphoto,c.article_title,d.user_comment_agree';
		$articleId	= post_check(trim($_GET['articleId']));
		$where = ' WHERE a.article_id= ' . $articleId . ' AND a.is_delete = 0 AND b.is_delete = 0 AND c.is_delete = 0 ';
		if (isset($userId)) {
			$where .= 'AND ( d.user_id = ' . $userId . ' or d.user_id is null) ';
		}
		$order = empty($order) ? '' : " ORDER BY {$order} ";
		return CommentModel::getInstance()->getCommentListV3($filed, $where, $order, $limit);
	}
	
	//按条件取出评论
	public function act_getComList($condition=array(), $order='', $limit='') {
		$filed = ' comment_id,user_id,article_id,comment_content,comment_addtime,comment_agrees,comment_disagrees';
		$where = !empty($condition)&&is_array($condition) ? ' WHERE '.implode(' AND ', $condition).' ' : '';
		$order = empty($order) ? '' : " ORDER BY {$order} ";
		return CommentModel::getCommentList($filed, $where, $order, $limit);
	}
	
	//按条件取出评论个数
	public function act_getComNum($condition=array()) {
		$where = !empty($condition)&&is_array($condition) ? ' WHERE '.implode(' AND ', $condition).' ' : '';
		return CommentModel::getComNum($where);
	}
	
	//该用户评论数
	public function act_getUserComNum() {
		//是否登录
		$userId = $_SESSION['USER_ID'];
		$where = ' WHERE a.user_id= ' . $userId . ' AND a.is_delete = 0 AND c.is_delete = 0 ';
		return CommentModel::getComNumV2($where);
	}
	//该文章评论数
	public function act_getArtComNum() {
		$articleId = post_check(trim($_GET['articleId']));
		$where = ' WHERE article_id= ' . $articleId . ' AND is_delete = 0 ';
		return CommentModel::getComNum($where);
	}
}
?>