<?php
/**
 * 类名：ArticleModel
 * 功能：文章表管理
 * 日期：2014-11-25
 * 作者：蒋和超
 */
class ArticleModel {
	private static $dbConn;
	private static $table_news_article='news_article';
	private static $table_news_column='news_column';
	private static $table_news_user_article='news_user_article';
	private static $table_news_artpicture='news_arpicture';
	static $errCode	  = 0;
	static $errMsg	  = '';
	static $_instance;
	
	public function __construct() {
// 		self::$table_news_article 		= C('');
// 		self::$table_news_column 		= C('');
// 		self::$table_news_user_article	= C('');
// 		self::$table_news_artpicture	= C('');
	}
	
	public static function initDB() {
		global $dbConn;
		self::$dbConn =	$dbConn;
	}
	
	//单实例
	public static function getInstance() {
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * 功能：获得文章信息
	 * @param unknown $field 文章信息字段
	 * @param unknown $where 获取文章条件
	 * @param unknown $order 排序条件
	 * @param unknown $limit 限制条数
	 * @return boolean|multitype:multitype: false,查找失败|文章信息
	 */
	public function getArticleInfo($field, $where, $order = '', $limit = '') {
		self::initDB();
		$sql 	= "select ".$field." from ".self::$table_news_article." where ".$where." and is_delete = '0'".$order.$limit;
		$query 	= self::$dbConn->query($sql);
		$result	= self::$dbConn->fetch_array_all($query);
		if (!$result) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return $result;
		}
	}
	/**
	 * 功能：文章点赞
	 * @param unknown $articleid 文章ID
	 * @param number $mark 标识($mark为1，给文章点赞;$mark为0，取消点赞)
	 * @return boolean 操作是否成功
	 */
	public function articleAgreeOrNot($articleid, $mark = 1) {
		self::initDB();
		if ($mark) {
			$sql	= "update ".self::$table_news_article." set article_agree = article_agree+1 where article_id=".$articleid;
		} else {
			$sql	= "update ".self::$table_news_article." set article_agree = article_agree-1 where article_id=".$articleid;
		}
		$query		= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	public function addArticleViews($articleid) {
		self::initDB();
		$sql	= "update ".self::$table_news_article." set article_views = article_views+1 where article_id=".$articleid;
		$query		= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：文章踩
	 * @param unknown $articleid 文章ID
	 * @param number $mark 标识($mark为1，文章踩;$mark为0，取消踩)
	 * @return boolean 操作是否成功
	 */
	public function articleDisagreeOrNot($articleid, $mark = 1) {
		self::initDB();
		if ($mark) {
			$sql	= "update ".self::$table_news_article." set article_disagree = article_disagree+1 where article_id = ".$articleid;
		} else {
			$sql	= "update ".self::$table_news_article." set article_disagree = article_disagree-1 where article_id = ".$articleid;
		}
		$query		= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return self::$dbConn->fetch_array($query);
		}
	}
	/**
	 * 功能:修改评论数
	 * @param unknown $articleid 文章ID
	 * @param unknown $mark 标识($mark为1，增加评论数;$mark为0，减少评论数)
	 * @return boolean 操作是否成功
	 */
	public function addCommentsNumOrNot($articleid, $mark = '1') {
		self::initDB();
		if ($mark) {
			$sql	= "update ".self::$table_news_article." set article_comments = article_comments+1 where article_id = ".$articleid;
		} else {
			$sql	= "update ".self::$table_news_article." set article_comments = article_comments-1 where article_id = ".$articleid;
		}
		
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：判断是否已经进行点赞或踩操作
	 * @param unknown $articleid 
	 * @param unknown $userid
	 * @return boolean|multitype:
	 */
	public function isAagreeOrDisagree($articleid, $userid) {
		self::initDB();
		$sql	= "select user_article_id, user_article_agree from ".self::$table_news_user_article." where article_id = ".$articleid." and user_id = ".$userid." and is_delete = '0'";
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return self::$dbConn->fetch_array($query);
		}
	}
	
	/**
	 * 功能：
	 * @param unknown $articleid
	 * @param unknown $userid
	 * @param number $agree
	 * @return boolean
	 */
	public function insertAgreeOrDisagree($articleid, $userid, $agree) {
		self::initDB();
		if (!$this->isAagreeOrDisagree($articleid, $userid)) {
			$sql 	= "insert into ".self::$table_news_user_article." (article_id, user_id, user_article_agree) values (".$articleid.",".$userid.",".$agree.")";
		} else {
			//取消点赞或踩
			$sql 	= "update ".self::$table_news_user_article." set user_article_agree = ".$agree." where article_id = ".$articleid." and user_id = ".$userid;
		}
		
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：添加文章
	 * @param unknown $articleinfo 文章信息
	 * @return boolean 添加是否成功
	 */
	public function articleInsert($articleinfo) {
		self::initDB();
		$sql = "insert into ".self::$table_news_article."(article_title, column_id, article_author, article_picture, article_addtime, article_introduction, article_content, article_status)"; 
		$sql .= "values('".$articleinfo['article_title']."', '".$articleinfo['column_id']."', '".$articleinfo['article_author']."', '".$articleinfo['article_picture']."', '".$articleinfo['article_addtime']."', '".$articleinfo['article_introduction']."', '".$articleinfo['article_content']."', '".$articleinfo['article_status']."')";
		$query	= self::$dbConn->query($sql);
		if (self::$dbConn->affected_rows($query)==0) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：修改文章
	 * @param unknown $articleinfo 文章信息
	 * @return boolean 修改是否成功
	 */
	public function articleModify($articleinfo) {
		self::initDB();
		$sql = "update ".self::$table_news_article;
		
		$update = "";
		$values	= array();
		foreach ($articleinfo as $key=>$v) {
			array_push($values,"{$key} = '{$v}'");
		}
		$update	= implode(",",$values);
		
		// $sql .=	" set article_title = '".$articleinfo['article_title']."' , column_id = '".$articleinfo['column_id']."' , article_picture = '".$articleinfo['article_picture']."' , article_addtime = '".$articleinfo['article_addtime']."' , article_introduction = '".$articleinfo['article_introduction']."', article_content = '".$articleinfo['article_content']."' where article_id = ".$articleinfo['article_id']; 
		$sql .= " set ".$update." where article_id = ".$articleinfo['article_id'];
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：删除文章
	 * @param unknown $articleid 文章ID
	 * @return boolean 操作是否成功
	 */
	public function articleDelete($articleid) {
		self::initDB();
		$sql	= "update ".self::$table_news_article." set is_delete = '1' where article_id = ".$articleid;
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 功能：审核通过文章
	 * @param unknown $articleid 文章ID
	 * @return boolean 操作是否成功
	 */
	public function articleCheck($articleid, $articletetime) {
		self::initDB();
		$sql	= "update ".self::$table_news_article." set article_status = '1', article_addtime = ".$articletetime." where article_id = ".$articleid;
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return true;
		}
	}
	/**
	 * 
	 * @param unknown $where
	 * @return boolean
	 */
	public function getArticleNum($where) {
		self::initDB();
		$sql = "select count(*) from ".self::$table_news_article." where ".$where;
		$query	= self::$dbConn->query($sql);
		if (!$query) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			$datas = self::$dbConn->fetch_row($query);
			return $datas[0];
		}
	}
	/**
	 * 功能：查找未审核文章
	 * @param unknown $field 查找字段
	 * @param string $limit 限制条数
	 * @return boolean|multitype:multitype:
	 */
	public function getCheckArticle($field, $where, $limit = '') {
		self::initDB();
		$sql 	= "select ".$field." from ".self::$table_news_article." as a left join ".self::$table_news_column."  as b on a.column_id = b.column_id where article_status = 0 ".$where." and a.is_delete = '0' order by article_addtime desc".$limit;
		$query 	= self::$dbConn->query($sql);
		$result	= self::$dbConn->fetch_array_all($query);
		if (!$result) {
			self::$errCode	= '';
			self::$errMsg	= '';
			return false;
		} else {
			return $result;
		}
	}
}
?>