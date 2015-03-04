<?php
/**
 * 	类名：CommentView
 *	功能：评论管理相关视图层
 *	版本： 1.0
 *	日期：2014-11-26
 *	作者：蒋和超
 */
class CommentView extends BaseView{
	public function view_showLogin(){
		$this->smarty->assign("temp", "0");
		if(isset($_SESSION['USER_NAME'])){
			$this->smarty->assign("temp", "1");
			$userid	= $_SESSION['USER_NAME'];
			$this->smarty->assign("userid", $userid);
			$this->smarty->assign("person_cent", "index.php?mod=user&act=person");
			$this->smarty->assign("user_fd", "");
			$this->smarty->assign("logout", "index.php?mod=public&act=logout");
		}
	}
	
	//提交评论操作
	function view_commin(){
		$result	=	CommentAct::act_commentInsert();
		$result['comment_addtime']	=	date("Y-m-d H:i:s",$result['comment_addtime']);
		echo json_encode($result);
	}
	
	//显示文章的评论
	function view_artcom(){
		self::view_showLogin();
		$articlesingle		= ArticleAct::getInstance();
		$columnsingle		= ColumnAct::getInstance();
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$articlecolumn	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			if($columnname != '要闻' && $columnname != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
			}
		}
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$userCount			= CommentAct::act_getArtComNum();
		$pageclass 	 		= new Page($userCount, $perpage, $this->page, 'CN');
		$limit				= $pageclass->setLimit();
		$pageformat			= $userCount > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$result 			= CommentAct::act_getComByArticle('', $limit);
		$article			= ArticleAct::getInstance()->getNewsTitleById();
		$todayhotnews 	= $articlesingle->getHotNews('article_agree', 8);
		$commenthotnews = $articlesingle->getHotNews('article_comments', 8);
		$this->smarty->assign('columninfo', $articlecolumn);
		$this->smarty->assign("article",$article[0]);
		$this->smarty->assign("comnum",$userCount);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->assign("commentnum",$comnum);
		$this->smarty->assign("comlist", $result);
		$this->smarty->assign('todayhotnews', $todayhotnews);
		$this->smarty->assign('commenthotnews', $commenthotnews);
		$this->smarty->display("fronttemplate/commentview.htm");
	}
	
	//显示用户的评论
	function view_usercom(){
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$userCount			= CommentAct::act_getUserComNum();
		$pageclass 	 		= new Page($userCount, $perpage, $this->page, 'CN');
		$limit				= $pageclass->setLimit();
		$result 			= CommentAct::act_getComByUid('', $limit);
		$pageformat			= $userCount > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->assign("title","我的评论");
		$this->smarty->assign("comlist", $result);
		$this->smarty->display("fronttemplate/self.html");
	}
	
	//删除一条评论（用户行为）
	function view_icomdel(){
		$result = CommentAct::act_icommentDel();
		echo  $result;
	}
	
	//查询评论（管理员行为）
	function view_admincom() {
		$myarray	= array();			//筛选条件
		$select    	= array();			//筛选条件反馈给用户
		$msg 		= '';					//提示信息
		if (isset($_GET['page'])) {				//有page 从session中取筛选条件
			$select 		= $_SESSION['select'];
			$article 	= $select['articleId'];
			$userId		= $select['userId'];
			$order		= $select['order'];
			if (!empty($article)) {
				$myarray['article_id'] = 'article_id = ' . $article;
				$msg .= ' 文章ID--'. $article;
			}
			if (!empty($userId)) {
				$myarray['user_id']	= 'user_id = ' . $userId;
				$msg .= ' 用户ID--' . $userId;
			}
			if (!empty($order)) {
				if ($order == '1') {
					$iorder 				= ' comment_addtime DESC ';
					$msg 				.= ' 按时间降序 ';
				}else {
					$msg 				.= ' 按时间升序 ';
				}
			}
		}else {											//无page 处理post过来的表单
			if (isset($_POST['articleId']) && !trim($_POST['articleId']) == ""&&is_numeric($_POST['articleId'])) {
				$article = post_check($_POST['articleId']);
				$myarray['article_id'] = 'article_id = ' . $article;
				$select['articleId']		= $article;
				$msg .= ' 文章ID--'. $article;
			}
			if (isset($_POST['userId']) && !trim($_POST['userId']) == ""&&is_numeric($_POST['userId'])) {
				$userId = post_check($_POST['userId']);
				$myarray['user_id']	= 'user_id = ' . $userId;
				$select['userId']		 	= $userId;	
				$msg .= ' 用户ID--' . $userId;
			}
			if (isset($_POST['order']) && !trim($_POST['order']) == "") {
				$order = post_check($_POST['order']);
				if ($order == '1') {
					$iorder 				= ' comment_addtime DESC ';
					$select['order']	= '1'; 
					$msg 				.= ' 按时间降序 ';
				}else if ($order == '2') {
					$select['order']	= '2';
					$msg 				.= ' 按时间升序 ';
				}
			}
		}
		if (empty($msg)) {
			$msg ='搜索条件：无';
		}else {
			$msg = '搜索条件：' . $msg;
		}
		$_SESSION['select'] = $select;
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$comnum				= CommentAct::act_getComNum($myarray);
		$pageclass 	 		= new Page($comnum, $perpage, $this->page, 'CN');
		$limit					= $pageclass->setLimit();
		$result 					= CommentAct::act_getComList($myarray, $iorder, $limit);
		$pageformat			= $comnum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->assign('title','评论管理');
		$this->smarty->assign('comlist',$result);
		$this->smarty->assign('select', $select);
		$this->smarty->assign('msg',$msg);
		$this->smarty->display("admintemplate/commentList.htm");
	}
	
	//删除一条评论（管理员行为）
	function  view_admincomdel() {
		$result = CommentAct::act_adminComDel();
		echo  $result;
	}
}
?>