<?php
/**
 * 类别： CommentAgreeModel
 * 功能：处理news_user_comment评论赞/踩数据库相关操作
 * 版本：2014-11-25
 * 作者：蒋和超
 */
if (!isset($_SESSION)) {
	session_start();
}
class CommentAgreeModel {
	private static $dbConn;
	private static $table_comment_agree = 'news_user_comment';    	//评论赞/踩表
	static $errCode	  = 0;
	static $errMsg	  = '';
	static $_instance;
	
	public function __construct() {
		self::$table_comment_agree = C('TABLE_COMMENT_AGREE');
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
	 * CommentAgreeModel::comAgreeInsert
	 * 插入评论赞/踩数据
	 * @return bool
	 */
	public static function comAgreeInsert($newsinfo) {
		self::initDb();
		$userId= $newsinfo['userId'];
		$commentId= $newsinfo['commentId'];
		$isagree= $newsinfo['isagree'];
		$isdel= $newsinfo['isdelete'];
		$sql = "INSERT INTO news_user_comment(user_id,comment_id,user_comment_agree,is_delete)values('$userId','$commentId','$isagree','$isdel')";
		$query = self::$dbConn->query($sql);
		if (!$query) {
			return false;
		}
		$rows = self::$dbConn->affected_rows();
		if (!$rows) {
			return false;
		}
		return "ok";
	}
	
	/**
	 * CommentAgreeModel::comAgreeDel
	 * 评论赞/踩数据逻辑删除
	 * @return bool
	 */
	public static function comAgreeDel($agreeId) {
		self::initDb();
		$sql = "UPDATE news_user_comment SET is_delete = 1 WHERE news_user_comment.user_comment_id = '{$agreeId}' LIMIT 1";
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return 'ok';
	}
	
	/**
	 * CommentAgreeModel::comAgreeUpdate
	 * 通过Id更新评论赞/踩数据
	 * @return bool
	 */
	Public static function comAgreeUpdate($agreeId, $data) {
		self::initDb();
		$sql 	= "";
		$values	= array();
		foreach ($data as $key=>$v) {
			array_push($values,"{$key} = '{$v}'");
		}
		$sql	= implode(",",$values);
		$isql = "UPDATE `".self::$table_comment_agree."` SET ".$sql." WHERE user_comment_id = {$agreeId}";
		$query	= self::$dbConn->query($isql);
		if ($query) {
			return 'ok';
		} else {
			return false;
		}
	}
	
	/**
	 * CommentAgreeModel::comAgreeUpdate
	 * 通过user_id和comment_id更新评论赞/踩数据
	 * @return bool
	 */
	public static function comAgreeModify($newinfo, $where, $limit) {
		self::initDb();
		$sql 	= "";
		$values	= array();
		foreach ($newinfo as $key=>$v) {
			array_push($values,"{$key} = '{$v}'");
		}
		$sql	= implode(",",$values);
		$isql = "UPDATE `".self::$table_comment_agree."` SET ".$sql .' '. $where .' ' . $limit;
		$query	= self::$dbConn->query($isql);
		if (!$query) {
			return false;
		}
		return 'ok';
	}

	/**
	 * CommentAgreeModel::getComAgree
	 * 评论赞/踩数据查询
	 * @return array
	 */
	public static function getComAgreeList($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_comment_agree .' ' .$where.' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	
	/**
	 * CommentAgreeModel::getComAgree
	 * 评论赞/踩数据查询
	 * @return 一条记录
	 */
	public static function getComAgree($filed, $where, $order='', $limit='') {
		self::initDb();
		$sql = 'SELECT '.$filed.' FROM '. self::$table_comment_agree .' ' .$where.' ' .$order. ' ' .$limit;
		$query = self::$dbConn->query($sql);
		if (!$query){
			return false;
		}
		return self::$dbConn->fetch_array($query);
	}
}
?>