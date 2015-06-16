<?php

/**
 * 	类名：AdminAct	
 *	功能：管理员登录、添加相关操作
 *	作者：蒋和超
 */

class AdminAct {
	static $errCode     = 0;
	static $errMsg      = '';
	static $_instance;
	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private static function operPassword($password){
		$password	= '_%#'.$password.'*@&';		//添加特殊字符
		return  MD5($password);
	}
	
	//管理员用户登录验证
	public function act_adminLogin(){
		if(!isset($_POST['username']) || trim($_POST['username']) == ''){
			exit("用户名为空!");
		}
		if(!isset($_POST['password']) || trim($_POST['password']) == ''){
			exit("密码为空!");
		}
		$single			= UserModel::getInstance();
		$loginip		= $_SERVER['REMOTE_ADDR'];
		$username 		= post_check(trim($_POST['username']));
		$password 		= $this->operPassword(post_check(trim($_POST['password'])));
		$result			= $single->mod_userLogin($username, $password, $loginip);
		return $result;
	}
	
	//获取普通用户列表
	public function act_getUserList($where='',$limit = ''){
		return UserModel::getInstance()->mod_getAllUserInfo($where,$limit);
	}
	
	public function act_getUserCount(){
		return UserModel::getInstance()->mod_userCount();
	}
	
	//删除用户act
	public function act_deleteUser(){
		$singuser	=	UserModel::getInstance();
		$res		=	$singuser->mod_getUserInfo($_GET['userid']);
		if(!$res){
			exit("none_user");
		}
		if($res['user_permission']==1){
			exit("permission denied");
		}
		
		return $singuser->mod_delUser($_GET['userid']);
	}
}
?>