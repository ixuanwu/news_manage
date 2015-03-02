<?php
/*
 *类别： comment
*功能：处理comment类数据库相关操作
*版本：2014-09-25
*作者：侯炼
*/

if (!isset($_SESSION)) {
	session_start();
}
class CommentModel {
	private static $dbConn;
	private static $table_news_comment = 'news_comment';    	//新闻评论表
	private static $table_news_user = 'news_user';
	private static $table_news_article = 'news_article';
	private static $table_user_comment_agree = 'news_user_comment';
	static $errCode	  = 0;
	static $errMsg	  = '';
	static $_instance;
	
	public function __construct() {
//		self::$table_news_comment = C('TABLE_NEWS_COMMENT');
		self::$table_news_comment = 'news_comment';
	}
	
	//单实例
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private static function initDb() {
		global $dbConn;
		self::$dbConn = $dbConn;
	}
	/**
	 * CommentModel::commentInsert
	 * 系统评论数据插入
	 * @return bool
	 */
	public static function commentInsert($newinfo) {
		self::initDb();
		$userId					= $newinfo['userId'];
		$articleId				= $newinfo['articleId'];
		$comContent				= $newinfo['comContent'];
		$comAddtime				= $newinfo['comAddtime'];
		$comAgrees				= $newinfo['comAgrees'];
		$comDisagrees			= $newinfo['comDisagrees'];
		$isdelete				= $newinfo['isdelete'];
		$sql = "INSERT INTO news_comment(user_id,article_id,comment_content,comment_addtime,comment_agrees,comment_disagrees,is_delete)values('$userId', '$articleId', '$comContent', '$comAddtime', '$comAgrees', '$comDisagrees','$isdelete')";
		$query = self::$dbConn->query($sql);
		if (!$query) {
			return false;
		}
		return "ok";
	}
	
	//系统评论数据插入并返回该评论数据
	public static function comInsertAndback($newinfo) {
		self::initDb();
		$userId					= $newinfo['userId'];
		$articleId				= $newinfo['articleId'];
		$comContent		= $newinfo['comContent'];
		$comAddtime		= $newinfo['comAddtime'];
		$comAgrees			= $newinfo['comAgrees'];
		$comDisagrees		= $newinfo['comDisagrees'];
		$isdelete				= $newinfo['isdelete'];
		$sql = "INSERT INTO news_comment(user_id,article_id,comment_content,comment_addtime,comment_agrees,comment_disagrees,is_delete)values('$userId', '$articleId', '$comContent', '$comAddtime', '$comAgrees', '$comDisagrees','$isdelete')";
		$query = self::$dbConn->query($sql);
		if (!$query) {
			return 'ierror';
		}
		$comId = self::$dbConn->insert_id();
		$sql = 'SELECT * FROM '. self::$table_news_comment . ' WHERE comment_id = ' . $comId;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return "noback";
		}
		return self::$dbConn->fetch_array($query);
	}
	
	/**
	 * CommentModel::commentDel
	 * 系统评论数据逻辑删除
	 * @return bool
	 */
	public static function commentDel($commentId){
		self::initDb();
		$sql = "UPDATE news_comment SET is_delete = 1 WHERE news_comment.comment_id = '{$commentId}' LIMIT 1";
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return 'ok';
	}
	
	/**
	 * CommentModel::commentUpdate
	 * 系统评论数据修改
	 * @return bool
	 */
	public static function commentUpdate($comId, $data) {
		self::initDb();
		$sql 	= "";
		$values	= array();
		foreach ($data as $key=>$v) {
			array_push($values,"{$key} = {$v}");
		}
		$sql	= implode(",",$values);
		$isql = "UPDATE `".self::$table_news_comment."` SET ".$sql." WHERE comment_id = {$comId}";
		$query	= self::$dbConn->query($isql);
		if (!$query) {
			return false;
		}
		return 'ok';
	}
	
	/**
	 * CommentModel::getAllComment
	 * 系统评论数据获取
	 * @return array
	 */
	public function getCommentList($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_news_comment .' ' .$where.' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	public function getCommentList2($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_news_comment .' a, '.self::$table_news_user.' b' .$where.' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	
	//3表连接查询
	public function getCommentListV2($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_news_comment .' as a 
				LEFT JOIN '.self::$table_news_user . ' as b ON a.user_id=b.user_id
				LEFT JOIN '.self::$table_news_article . ' as c ON a.article_id=c.article_id' .$where. ' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	
	//4表连接查询
	public function getCommentListV3($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_news_comment .' as a
				LEFT JOIN '.self::$table_news_user . ' as b ON a.user_id=b.user_id
				LEFT JOIN '.self::$table_news_article . ' as c ON a.article_id=c.article_id
				LEFT JOIN '.self::$table_user_comment_agree . ' as d ON a.comment_id=d.comment_id' .$where. ' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	
	//获取评论数目
	public function getComNum($where) {
		self::initDb();
		$sql = 'SELECT count(*) FROM '. self::$table_news_comment .' ' .$where;
		$query = self::$dbConn->query($sql);
		$result = self::$dbConn->fetch_row($query);
		return $result[0];
	}
	
	//连接news_comment和news_article表获得评论数目
	public function getComNumV2($where) {
		self::initDb();
		$sql = 'SELECT count(*) FROM '. self::$table_news_comment .' as a
		LEFT JOIN '.self::$table_news_article . ' as c ON a.article_id=c.article_id
		' .$where;
		$query = self::$dbConn->query($sql);
		$result = self::$dbConn->fetch_row($query);
		return $result[0];
	}
}
?>