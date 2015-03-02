<?php
/**
 * 类名：UserAct
 * 功能：获取用户的信息（用户登录，修改，显示信息）
 * 版本：1.0
 * 日期：2014-9-25
 * 作者：杨友能
 */

if(!isset($_SESSION)){
	session_start();
}
class UserAct {
	public static $errCode	  = 0;
	public static $errMsg	  = '';
	public static $debug	  = false;
	public static $_instance;
	public function __construct(){
		
	}
	
	//单实例
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance	= new self();
		}
		return self::$_instance;
	} 
	
	/****
	 * 函数说明：判断值是否为空
	 * @param string $name
	 * @param string $msg
	 */
	public  static function isEmpty($name, $msg){
		if(!isset($_POST[$name]) || trim($_POST[$name]) == ''){
			exit($msg);
		}
	}
	
	/****
	 * 函数说明：匹配正则表达式-邮箱
	 * @param string $email
	 * @return boolean
	 */
	private static function checkEmail($email){
		$pattern	="/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]w+)*$/";	//邮箱正则表达式
		if(preg_match($pattern, $email)){
		$where	= 	"USER_NAME	='$email'";
			$result	= UserModel::mod_getParam($where);
			if($result !== false){
				return 'eval_is_exist';
			} else {
				return 'ok';
			}
		}
		return 'email_err';
	}
	
	/****
	* 函数说明：匹配正则表达式-用户名
	* @param string $uname
	* @return boolean
	*/
	private static function checkName($uname){
		$pattern	= "/^[a-zA-Z_]{1,10}$/";		//用户名正则表达式
		if(preg_match($pattern, $uname)){
			$where	= 	"USER_NAME	='$uname'";
			//查询数据库中是否有记录
			if(UserModel::mod_getParam($where) !== false){
				return 'uval_is_exist';
			} else {
				return 'ok';
			}
		}
		return 'name_err';
	}
	
	/****
	* 函数说明：匹配正则表达式-电话号码
	* @param string $tel
	* @return boolean
	*/
	private static function checkTel($tel){
		$pattern	= "/^(13[0-9]|15[0|3|6|7|8|9]|18[2|7|8|9])\d{8}$/";
		if(preg_match($pattern, $tel)){
			$where	= 	"USER_TELEPHONE	='$tel'";
			$res	= UserModel::mod_getParam($where);
			//查询数据库中是否有记录
			if($res != $_SESSION['USER_ID'] && $res != false){
				return 'tval_is_exist';
			} else {
				return 'ok';
			}
		}
		return 'tel_err';
	}
	
	/****
	* 函数说明：匹配正则表达式-密码
	* @param string $uname
	* @return boolean
	*/
	private static function checkPassw($password){
		$pattern	= "/^[a-zA-Z_@][a-zA-Z_@0-9]{7,17}$/";
		if(preg_match($pattern, $password)){
			return 'ok';
		}
		return 'passerr';
	}
	private static function operPassword($password){
		$password	= '_%#'.$password.'*@&';		//添加特殊字符
		return  MD5($password);
	}
	
	/****
	 * 函数说明：用户登录逻辑
	 * @return boolean
	 */
	public function act_userLogin(){
		self::isEmpty('username', "用户名为空!");
		self::isEmpty('password', "密码为空！");
		$ip			= getClientIP();		/*获取客户端IP地址*/
		$username	= post_check(trim($_POST['username']));
		$password 	= post_check(trim($_POST['password']));
		$password	= self::operPassword($password);
		$res		= UserModel::mod_userLogin($username, $password, $ip);
		if($res == false){
			return 'info_err';
		} else if($res['is_delete'] == 0){
			$_SESSION['USER_ID']	= $res['user_id'];		//设置session会话
			$_SESSION['USER_NAME']	= $res['user_name'];
			$_SESSION['USER_PREM']	= $res['user_premission'];
			$_SESSION['USER_EMAIL']	= $res['user_email'];
			$_SESSION['USER_HEADPHOTO']	= $res['user_headphoto'];
			return 'log_ok';
		} else {
			return 'notlogin';
		}
	}
	
	/**
	 * 函数说明：验证验证码
	 * @return string|boolean
	 */
	public function act_getCode(){
		if( strtolower($_SESSION['CODE_NUM']) ==  strtolower($_POST['code'])){
			return 'code_ok';
		}
		return false;
	}

	/****
	 * 函数说明：验证用户名，邮箱，电话号码是否已注册
	 * @return string
	 */
	public function act_getParam(){	//只能有一个值不为空
		$username	= isset($_POST['username']) ? trim($_POST['username']) : "";
		$telephone	= isset($_POST['telephone']) ? trim($_POST['telephone']) : "";
		$email		= isset($_POST['email']) ? trim($_POST['email']) : "";
		$where		= '';
		if($username != ''){
			$where	= 	"USER_NAME 		='$username'";
		} else if($telephone != ''){
			$where	= 	"USER_TELEPHONE	= '$telephone'";
		} else if($email != '') {
			$where	= 	"USER_EMAIL		= '$email'";
		} else {
			exit('邮箱、手机号码、用户名为空!');
		}
		return UserModel::mod_getParam($where);  // true 为无记录  false 有记录
	}
	
	/****
	 * 函数说明：获取用户的数量
	 * @return Ambigous <boolean, unknown>
	 */
	public function act_userCount(){
		return UserModel::mod_userCount();
	}
	/****
	 * 函数说明：注册用户信息
	 * @return string
	 */
	public function act_addUser(){
		$username	= trim($_POST['username']);
		$password	= trim($_POST['password']);
		$email		= trim($_POST['email']);
		$resname	= self::checkName($username);
		$resemail	= self::checkEmail($email);
		$respass	= self::checkPassw($password);
		if($resname =='uval_is_exist'){
			return 'uval_is_exist';
		} else if($resname == 'name_err') {
			return 'name_err';
		}
		if($resemail =='eval_is_exist'){
			return 'eval_is_exist';
		} else if($resemail == 'email_err') {
			return 'email_err';
		}
		if($respass =='pass_err'){
			return 'pass_err';
		}
		$password	= self::operPassword($password);		//密码加密
		$time		= time();
		$clientIP	= getClientIP();
		$filed		= "USER_NAME,USER_PASSWORD,USER_EMAIL,USER_ADDTIME,USER_LOGINTIME,USER_LOGINIP, USER_HEADPHOTO";
		$where		= "'$username', '$password', '$email', '$time', '$time', '$clientIP','public/upload/header/header.jpg'";
		if(UserModel::mod_addUser($where, $filed)){
			return "regist_ok";
		}else{
			return "err";	
		}
	}
	
	/****
	 * 函数说明：删除用户信息
	 * @return string
	 */
	public function act_delUser(){
		if(!isset($_POST['userid']) || trim($_POST['userid']) == ''){
			exit('获取用户ID失败！');
		}
		$userid 	= post_check(trim($_POST['userid']));
		return UserModel::mod_delUser($userid);   //返回true false
	}
	
	/****
	 * 函数说明：更新用户信息
	 * @return string
	 */
	public function act_updUserInfo($headphotopath = ''){
		$userid		= $_SESSION['USER_ID'];
		$newInfo	= '';
		$gender		= $_POST['gender'];
		$birthday	= $_POST['birthday'];
		$telephone	= $_POST['telephone'];
		if($gender != ''){
			$newInfo	= $newInfo."USER_GENDER		= $gender";
		}
		if($birthday != ''){
			$birthday	= strtotime($birthday);	//转化为时间戳
			if($newInfo != ''){
				$newInfo	= $newInfo.", USER_BIRTHDAY	= $birthday";
			}else{
				$newInfo	= $newInfo."USER_BIRTHDAY	= $birthday";
			}
		}
		if($telephone != ''){
			$restel		= self::checkTel($_POST['telephone']);	//验证电话号码的格式及是否注册过
			if($restel 			=='tval_is_exist'){
				return 'val_exist';
			} else if($restel 	== 'tel_err') {
				return 'tel_err';
			}else{
				if($newInfo	!= ''){
					$newInfo	= $newInfo.", USER_TELEPHONE	= '$telephone'";
				}else{
					$newInfo	= $newInfo."USER_TELEPHONE	= '$telephone'";
				}
			}
		}
		if($headphotopath != ''){
			$headphotopath	= post_check($headphotopath);
			if($newInfo	!= ''){
				$newInfo	= $newInfo.", USER_HEADPHOTO	= '$headphotopath'";
			}else{
				$newInfo	= $newInfo."USER_HEADPHOTO	= '$headphotopath'";
			}
		}
		
		if($newInfo != ''){
			$newInfo	= $newInfo." WHERE USER_ID = '$userid'";
			if(UserModel::mod_updUserinfo($newInfo) == true){
				return "up_ok";
			}else{
				return "err";
			}
		}else{
			return 'err';
		}
		
	}
	
	/****
	* 函数说明：用户更新用户密码
	* @return string
	*/
	public function act_updPassw(){
		self::isEmpty('oldpassw', "旧密码为空！");
		self::isEmpty('newpassw', "新密码为空！");
		$userid		=$_SESSION['USER_ID'];
		$oldpassw	= post_check(trim($_POST['oldpassw']));
		$newpassw	= trim($_POST['newpassw']);
		$checknewpassw	= self::checkPassw($newpassw);
		if($checknewpassw =='passerr'){
			return 'passerr';
		}
		$oldpassw	= self::operPassword($oldpassw);
		$newpassw	= self::operPassword($newpassw);
		
		if(UserModel::mod_getUserPassw($userid, $oldpassw) == true){
			if(UserModel::mod_updPassw($userid, $newpassw) == true){
				return "uppassw_ok";
			}else{
				return "err";
			}
		} else {
			return "pass_err";
		}
	}
	
	/****
	* 函数说明：管理员更新用户密码
	* @return string
	*/
	public function act_adminUpdPassw(){
		$userid		=$_POST['userid'];
		$newpassw	= trim($_POST['newpassw']);
		$checknewpassw	= self::checkPassw($newpassw);
		if($checknewpassw =='passerr'){
			return 'passerr';
		}
		$newpassw	= self::operPassword($newpassw);
	
		if(UserModel::mod_updPassw($userid, $newpassw) == true){
			return "uppassw_ok";
		}else{
			return "err";
		}
	}
	
	/****
	 * 函数说明：根据页数，获取用户的信息
	* @param int $page		当前页数
	* @param int $pagenum	每页显示的数量
	* @return array
	*/
	public function act_getAllUserInfo($page, $pagenum){
		return  UserModel::mod_getAllUserInfo();
	}
	
	/****
	 * UserAct::act_getCommentList
	 * 函数说明：获取评论数据
	 * @return array
	 */
	public function act_getComByUid($order='',$limit='') {
		$userId = $_SESSION['USER_ID'];
		$filed = ' a.comment_id,a.user_id,a.article_id,a.comment_content,a.comment_addtime,a.comment_agrees,a.comment_disagrees,c.article_title';
		$where =' WHERE a.user_id= ' . $userId . ' AND a.is_delete = 0 AND c.is_delete = 0 ';
		$order = empty($order) ? '' : " ORDER BY {$order} ";
		return CommentModel::getCommentListV2($filed, $where, $order, $limit);
	}
	
	public function act_getUserInfo(){
		$userId = $_SESSION['USER_ID'];
		return  UserModel::getInstance()->mod_getUserInfo($userId);
	}
}

?>