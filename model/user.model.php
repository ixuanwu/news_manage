<?php
/**
 * 类名：UserModel
 * 功能：获取用户的信息，与数据库交互
 * 版本：1.0
 * 日期：2014-11-25
 * 作者：蒋和超
 */
class UserModel {
	private static $dbConn;
	//private static $table_article_info;				//文章表
	//private static $table_column_info;				//栏目表
	private static $table_comment_info;				//评论表
	//private static $table_power_info;				//权限表
	private static $table_user_info;				//用户表
	private static $table_user_article_info;		//文章操作表
	private static $table_user_comment_info;		//评论操作表
	public static $errCode	  = 0;
	public static $errMsg	  = '';
	public static $_instance;

	public function __construct(){
		/* self::$table_user_user 			= C('TABLE_USER_INFO');
		self::$table_user_article_user 	= C('TABLE_USER_ARTICLE_INFO');
		self::$table_user_comment_user 	= C('TABLE_USER_COMMENT_INFO');
		self::$table_comment_user 		= C('TABLE_COMMENT_INFO'); */
	}
	
	/***
	 * 单实例
	 */
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance	= new self();
		}
		return self::$_instance;
	}
	
	/**
	 * 函数说明：获取数据库连接
	 */
	private static function initDB(){
		global $dbConn;
		self::$dbConn =	$dbConn;
		self::$dbConn->query("set names 'utf8'");
	}
	
	/**
	 * 函数说明：用户登录数据获取
	 * @param string $username	登录用户名
	 * @param string $password	登录密码
	 * @param string $loginip	客户端IP
	 * @return string|boolean
	 */
	public function mod_userLogin($username, $password,$loginip){
		self::initDB();
		$sql		=	"SELECT * FROM news_user 
						WHERE 	USER_NAME 		= '$username' 
						AND 	USER_PASSWORD 	= '$password'";
		$query		= self::$dbConn->query($sql);
		if (!(self::$dbConn->num_rows($query))){
			return false;
		}
		$res	= self::$dbConn->fetch_array($query);	
		self::mod_loginTime_Ip($res['user_id'], $loginip);		//登录成功后，修改登录时间和ip地址
		return $res;
	}
	
	/**
	 * 函数说明：登录成功，修改登录时间和IP
	 * @param string $userid	用户id
	 * @param string $loginip	用户ip
	 * @return void|boolean
	 */
	public function mod_loginTime_Ip($userid,$loginip){
		self::initDB();
		$now_time	= time();		//获取当前时间戳
		$sql	= 	"UPDATE news_user 
					SET USER_LOGINTIME 	= '$now_time',
					USER_LOGINIP		= '$loginip'
					WHERE USER_ID 		= $userid";
		$query	= self::$dbConn->query($sql);
		if(!(self::$dbConn->affected_rows())){
			return false;
		}
		return true;
	}
	
	/**
	 * 函数说明：添加用户
	 * @param stirng $where	用户信息
	 * @param stirng $filed	用户信息字段
	 * @return boolean
	 */
	public function mod_addUser($where, $filed){
		self::initDB();
		$sql	= 	"INSERT INTO news_user($filed) VALUES ($where)";
		$query	= self::$dbConn->query($sql);	
		if(!(self::$dbConn->affected_rows())){
			return false;
		}
		return true;
	}
	
	public function mod_getUserInfo($userid){
		self::initDB();
		$sql	= "SELECT * FROM news_user WHERE USER_ID = $userid AND IS_DELETE = 0";
		$query		= self::$dbConn->query($sql);
		if (!(self::$dbConn->num_rows($query))){
			return false;
		}
		$res	= self::$dbConn->fetch_array($query);
		return $res;
	}
	
	/**
	 * 函数说明：删除用户
	 * @param string $sql	sql语句
	 * @return boolean
	 */
	public function mod_delUserById($sql){
		self::initDB();
		$query	= self::$dbConn->query($sql);
		if(!(self::$dbConn->affected_rows())){
			return false;
		}
		return true;
	}
	
	/**
	 * 函数说明：删除每个表中与用户信息有关的记录
	 * @param string $userid	用户ID
	 * @return boolean
	 */
	public function mod_delUser($userid){
		$sql	= "UPDATE news_user 		SET IS_DELETE = 1 WHERE USER_ID = $userid";	//删除用户表的里记录
		$que1	= self::mod_delUserById($sql);
		/* $sql	= "UPDATE NEWS_COMMENT 		SET IS_DELETE = 1 WHERE USER_ID = $userid";	//删除有关评论内容中有关的记录
		$que2	= self::mod_delUserById($sql);
		$sql	= "UPDATE news_user_ARTICLE SET IS_DELETE = 1 WHERE USER_ID = $userid";	//删除文章是否点赞有关操作
		$que3	= self::mod_delUserById($sql);
		$sql	= "UPDATE news_user_COMMENT SET IS_DELETE = 1 WHERE USER_ID = $userid";	//删除评论内容是否点赞有关操作
		$que4	= self::mod_delUserById($sql); */
		if($que1){
			return true;
		}
		return false;
	}
	
	/**
	 * 函数说明：更新用户的信息
	 * @param string $newInfo	用户信息字段与值
	 * @return boolean
	 */
	public function mod_updUserInfo($newInfo){
		self::initDB();
		$sql	= 	"UPDATE news_user SET $newInfo";
		$query	= self::$dbConn->query($sql);
		if(!$query){
			return false;
		}
		return true;
	}
	
	/**
	 * 函数说明：修改用户的密码
	 * @param string $userid	用户id
	 * @param string $newpassw	新密码
	 * @return boolean
	 */
	public function mod_updPassw($userid, $newpassw){
		self::initDB();
		$sql	= 	"UPDATE news_user  
					SET  USER_PASSWORD 	= '$newpassw'  
					WHERE USER_ID		= $userid";
		$query	= self::$dbConn->query($sql);
		if($query){
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * 函数说明：判断用户名密码是否存在
	 * @param string $userid	用户ID
	 * @param string $oldpassw	旧密码
	 * @return boolean
	 */
	public function mod_getUserPassw($userid, $oldpassw){
		self::initDB();
		$sql		= 	"SELECT * FROM news_user
						WHERE USER_ID		= $userid
						AND USER_PASSWORD 	= '$oldpassw'";
		$query	= self::$dbConn->query($sql);
		if((self::$dbConn->num_rows($query))){
			return true;
		}
		return false;
	} 
	
	/**
	 * 函数说明：获取普通用户的个数
	 * @return boolean|int
	 * modified By 蒋和超 添加获取普通用户条件
	 */
	public function mod_userCount(){
		self::initDB();
		$sql	= "SELECT COUNT(*) FROM news_user WHERE IS_DELETE = 0 AND USER_PERMISSION=0";
		$query	= self::$dbConn->query($sql);
		if($query){
			$data	= self::$dbConn->fetch_row($query);
			return $data[0];
		} else {
			return false;
		}
	}
	
	/**
	 * 函数说明：分页获取用户信息
	 * @param int $page			当前页数
	 * @param int $pagenum		每页显示的条数
	 * @return boolean|array
	 */
	public function mod_getAllUserInfo($where = '', $limit = ''){
		self::initDB();
		/* $start	= ($page-1) * $pagenum; */
		$sql	= 	"SELECT * FROM news_user ".$where." ORDER BY USER_ID " . $limit;
		$query	= self::$dbConn->query($sql);
		if(!(self::$dbConn->num_rows($query))){
			return false;
		}
		return self::$dbConn->fetch_array_all($query);
	}
	
	/**
	 * 函数说明：验证用户名，电话，邮箱是否注册过
	 * @param string $where	用户信息
	 * @return boolean
	 */
	public function mod_getParam($where){
		self::initDB();
		$sql	= "SELECT USER_ID FROM news_user WHERE ".$where;
		$query	= self::$dbConn->query($sql);
		$datas	= self::$dbConn->fetch_array($query);
		if($datas){
			return $datas['USER_ID'];
		} else {
			return false;
		}
	}
}

?>