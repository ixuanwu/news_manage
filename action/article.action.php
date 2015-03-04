<?php

/**
 * 	类名：AdminAct
 *	功能：新闻文章管理动作处理层
 *	版本： 1.0
 *	日期：2015-1-26
 *	作者：蒋和超
 */
class ArticleAct {
	static $errCode	  = 0;
	static $errMsg	  = '';
	static $debug	  = false;
	static $_instance;
	
	public function __construct(){
		self::$debug = C('IS_DEBUG');
	}
	
	//单实例
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * 功能：通过文章ID获得文章信息
	 * @return Ambigous <boolean, multitype:multitype:, multitype:multitype: >
	 */
	public function getNewsById($check = 1) {
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			redirect_to('fronttemplate/errorPage.html');
		}
		$articleid 	= post_check($_GET['articleid']);
		$field 		= ' article_id, column_id, article_title, article_introduction, article_author, article_addtime, article_picture, article_content, article_views, article_agree, article_disagree, article_comments ';
		$where 		= ' article_id = '.$articleid." and article_status = ". $check;
		return ArticleModel::getInstance()->getArticleInfo($field, $where);
	}
	
	public function getCheckNewsById() {
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			redirect_to('fronttemplate/errorPage.html');
		}
		$articleid = post_check($_GET['articleid']);
		$field = ' article_id, column_id, article_title, article_introduction, article_author, article_addtime, article_picture, article_content, article_views, article_agree, article_disagree, article_comments ';
		$where = ' article_id = '.$articleid." and article_status = '0' ";
		return ArticleModel::getInstance()->getArticleInfo($field, $where);
	}
	
	public function getNewsTitleById() {
		if(!isset($_GET['articleId']) || trim($_GET['articleId']) == ''){
			redirect_to('fronttemplate/errorPage.html');
		}
		$articleid = post_check($_GET['articleId']);
		$field = ' article_title, article_comments, article_id, column_id';
		$where = ' article_id = '.$articleid." and article_status = '1' ";
		return ArticleModel::getInstance()->getArticleInfo($field, $where);
	}
	
	/**
	 * 功能：搜索新闻
	 * @param string $limit 限制条数
	 * @return Ambigous <boolean, multitype:multitype:, multitype:multitype: >
	 */
	public function searchNews($limit = '') {
		if(!isset($_GET['search_input']) || trim($_GET['search_input']) == ''){
			redirect_to("index.php?mod=article&act=index");
		}
		$search	= post_check($_GET['search_input']);
		$field 	= ' article_id, column_id, article_title, article_introduction, article_picture, article_addtime ';
		$where 	= " article_title like '%".$search."%' and article_status = '1' and is_delete = '0' ";
		$order 	= ' order by article_addtime DESC ';
		return ArticleModel::getInstance()->getArticleInfo($field, $where, $order, $limit);
	}
	/**
	 * 功能：通过栏目ID查找新闻
	 * @param unknown $columnid 栏目ID
	 * @param unknown $order 排序条件
	 * @param string $limits 限制条数
	 * @return Ambigous <boolean, multitype:multitype:, multitype:multitype: >
	 */
	public function getNewsListByColumn($columnid, $order, $limits = '', $pic = 0) {
		$field 	= ' article_id, column_id, article_title, article_introduction, article_picture, article_addtime, article_comments ';
		$order 	= empty($order) ? '' : ' order by '.$order.' DESC ';
		$picinfo = '';
		if ($pic) {
			$picinfo = " and article_picture != './public/img/nopic.jpg' ";
		}
		$where 	= " article_status = '1' and column_id = ".$columnid.$picinfo;
		$limits	= empty($limits) ? '' : ' limit 0,'.$limits;
		return ArticleModel::getInstance()->getArticleInfo($field, $where, $order, $limits);
	}
	
	/**
	 * 功能：查找热点新闻
	 * @param string $order 排序条件
	 * @param string $limits 限制条数
	 * @return Ambigous <boolean, multitype:multitype:, multitype:multitype: >
	 */
	public function getHotNews($order = '', $limits = '') {
		$field = ' article_id, column_id, article_title, article_introduction, article_picture, article_addtime, article_comments, article_agree ';
		$where = ' 1 ';
		$order 	= empty($order) ? '' : ' order by '.$order.' DESC ';
		$limits	= empty($limits) ? '' : ' limit 0,'.$limits;
		return ArticleModel::getInstance()->getArticleInfo($field, $where, $order, $limits);
	}
	/**
	 * 功能：通过栏目Id查找新闻(限制条数条件不一样)
	 * @param unknown $columnid 栏目ID
	 * @param unknown $order 排序条件
	 * @param unknown $limits 限制条数
	 * @return Ambigous <boolean, multitype:multitype:, multitype:multitype: >
	 */
	public function getKindsOfNews($columnid, $order, $limits) {
		$field 	= ' article_id, column_id, article_title, article_author, article_introduction, article_picture ,article_agree, article_disagree, article_views, article_comments, article_addtime';
		$order 	= empty($order) ? '' : ' order by '.$order.' DESC ';
		$where 	= " article_status = '1' and column_id = ".$columnid;
		$limits	= empty($limits) ? '' : ' '.$limits;
		return ArticleModel::getInstance()->getArticleInfo($field, $where, $order, $limits);
	}
	/**
	 * 功能：获得某个栏目下新闻的总条数
	 * @param unknown $columnid 栏目ID
	 * @return boolean 
	 */
	public function getArticleNumByColumnId($columnid) {
		$where 	= " column_id = ".$columnid." AND is_delete=0 ";
		return ArticleModel::getInstance()->getArticleNum($where);
	}
	/**
	 * 功能：获得搜索新闻的总条数
	 * @return boolean
	 */
	public function getSearchArticleNum() {
		if(!isset($_GET['search_input']) || trim($_GET['search_input']) == ''){
			redirect_to("index.php?mod=article&act=index");
		}
		$search	= post_check($_GET['search_input']);
		$where 	= " article_title like '%".$search."%' and article_status = '1' and is_delete = '0' ";
		return ArticleModel::getInstance()->getArticleNum($where);
	}
	/**
	 * 功能：文章点赞
	 * @param number $mark 标识($mark为1，给文章点赞;$mark为0，取消点赞)
	 * @return boolean true点赞操作成功;false点赞操作失败
	 */
	public function articleAgree($mark) {
		if(!isset($_POST['articleid']) || trim($_POST['articleid']) == ''){
			redirect_to('fronttemplate/errorPage.html');
		}
		if(!isset($_SESSION['USER_ID'])){
			exit("你还未登录，不能进行点赞操作！");
		}
		$articleid	= post_check($_POST['articleid']);
		$userid		= $_SESSION['USER_ID'];
		$agreeornot = ArticleModel::getInstance()->isAagreeOrDisagree($articleid, $userid);
		if ($agreeornot['user_article_agree'] != 2) {
			ArticleModel::getInstance()->articleAgreeOrNot($articleid, $mark);
			ArticleModel::getInstance()->insertAgreeOrDisagree($articleid, $userid, $mark);
			return 'ok';
		} else {
			return false;
		}
	}
	/**
	 * 功能：文章踩
	 * @param number $mark 标识($mark为1，文章踩;$mark为0，取消踩)
	 * @return boolean true踩操作成功;false踩操作失败
	 */
	public function articleDisgree($mark) {
		if(!isset($_POST['articleid']) || trim($_POST['articleid']) == ''){
			exit("文章ID为空!");
		}
		if(!isset($_SESSION['USER_ID'])){
			exit("你还未登录，不能进行踩操作！");
		}
		$articleid	= post_check($_POST['articleid']);
		$userid		= $_SESSION['USER_ID'];
		$agreeornot = ArticleModel::getInstance()->isAagreeOrDisagree($articleid, $userid);
		if ($agreeornot['user_article_agree'] != 1) {
			ArticleModel::getInstance()->articleDisagreeOrNot($articleid, $mark);
			ArticleModel::getInstance()->insertAgreeOrDisagree($articleid, $userid, $mark);
			return 'ok';
		} else {
			return false;
		}
	}
	
public function articleInsert($articlepicture = '') {
		$articleauthor = '';
		$articlestatus = 1;
		if (isset($_SESSION['USER_NAME'])) {
			$articleauthor = $_SESSION['USER_NAME'];
			$articlestatus = 0;
		} else if (isset($_SESSION['ADMIN_NAME'])) {
			$articleauthor = $_SESSION['ADMIN_NAME'];
			$articlestatus = 1;
		} else {
			exit("你还未登录，不能投递文章!");
		}
		$articlepicture	= !(empty($articlepicture))		? trim($articlepicture) 		: './public/img/nopic.jpg';
		$articletitle	= post_check($_POST['articletitle']);
		$columnid 	 	= post_check($_POST['columnid']);
		$introduction 	= post_check($_POST['articleintroduction']);
		$articlecontent = post_check($_POST['articlecontent']);
		$articleinfo 	= array(
				'article_title' 		=> $articletitle,
				'column_id' 			=> $columnid,
				'article_author' 		=> $articleauthor,
				'article_addtime'		=> time(),
				'article_picture' 		=> $articlepicture,
				'article_introduction'	=> $introduction,
				'article_content' 		=> $articlecontent,
				'article_status' 		=> $articlestatus
		);
		
		return ArticleModel::getInstance()->articleInsert($articleinfo);
	}
	
	public function articleModify($articlepicture = '') {
		if (!isset($_SESSION['ADMIN_NAME'])) {
			exit("你还未登录，不能修改文章!");
		}
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			exit("文章ID为空!");
		}
		$articleid 		= post_check($_GET['articleid']);
		$articletitle	= post_check($_POST['articletitle']);
		$columnid 	 	= post_check($_POST['columnid']);
		$introduction 	= post_check($_POST['articleintroduction']);
		$articlecontent = post_check($_POST['articlecontent']);
		if (empty($articlepicture)) {
			$articleinfo 	= array(
				'article_id'			=> $articleid,
				'article_title' 		=> $articletitle,
				'column_id' 			=> $columnid,
				'article_addtime'		=> time(),
				'article_introduction'	=> $introduction,
				'article_content' 		=> $articlecontent,
			);
		} else {
			$articleinfo 	= array(
				'article_id'			=> $articleid,
				'article_title' 		=> $articletitle,
				'column_id' 			=> $columnid,
				'article_addtime'		=> time(),
				'article_picture' 		=> $articlepicture,
				'article_introduction'	=> $introduction,
				'article_content' 		=> $articlecontent,
			);
		}
		return ArticleModel::getInstance()->articleModify($articleinfo);
	}
	
	public function articleDelete() {
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			exit("文章ID为空!");
		}
		$articleid	= post_check($_GET['articleid']);
		return ArticleModel::getInstance()->articleDelete($articleid);
	}
	
	public function articleCheck() {
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			exit("文章ID为空!");
		}
		$articleid	= post_check($_GET['articleid']);
		return ArticleModel::getInstance()->articleCheck($articleid, time());
	}
	
	public function addArticleViews() {
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			exit("文章ID为空!");
		}
		$articleid = post_check($_GET['articleid']);
		return ArticleModel::getInstance()->addArticleViews($articleid);
	}
	
	public function getArticleAgree() {
		if(!isset($_SESSION['USER_ID'])){
			return null;
		}
		if(!isset($_GET['articleid']) || trim($_GET['articleid']) == ''){
			exit("文章ID为空!");
		}
		$articleid 	= post_check($_GET['articleid']);
		$userid  	= $_SESSION['USER_ID'];
		return ArticleModel::getInstance()->isAagreeOrDisagree($articleid, $userid);
	}
	
	public function getCheckArticle($limits = '') {
		
		if(!isset($_GET['columnpid']) || trim($_GET['columnpid']) == ''){
			exit("栏目ID为空!");
		}
		$field		= ' article_id, a.column_id, article_title, article_picture, article_author, article_introduction, article_addtime ';
		$columnpid 	= post_check($_GET['columnpid']);
		$where		= ' and column_pid = '.$columnpid;
		$limits		= empty($limits) ? '' : ' '.$limits;
		return ArticleModel::getInstance()->getCheckArticle($field, $where, $limits);
	}
	
	public function getParentCheckArticle($limits = '') {
		
		if(!isset($_GET['columnpid']) || trim($_GET['columnpid']) == ''){
			exit("栏目ID为空!");
		}
		$field		= ' article_id, a.column_id, article_title, article_picture, article_author, article_introduction, article_addtime ';
		$columnid 	= post_check($_GET['columnpid']);
		$where		= ' and b.column_id = '.$columnid;
		$limits		= empty($limits) ? '' : ' '.$limits;
		return ArticleModel::getInstance()->getCheckArticle($field, $where, $limits);
	}
}
?>