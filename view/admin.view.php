<?php
/**
 * 	类名：AdminView	
 *	功能：用户管理相关视图
 *	版本：1.0
 *	日期：2014-9-28
 *	作者：蒋和超
 **/
class AdminView extends BaseView{
	
	function view_login(){
		$this->smarty->display("admintemplate/login.htm");
	}
	
	function view_adminLogin(){
		$single		=	AdminAct::getInstance();
		$res		=	$single->act_adminLogin();
		if($res===FALSE || $res['is_delete']==1 || $res['user_permission']==0){
			echo json_encode(array("tip"=>"error"));
			exit();
		}else{
			echo json_encode(array("tip"=>"ok"));
		}
		$_SESSION['ADMIN_NAME']			=	$res['user_name'];
		$_SESSION['ADMIN_ID']			=	$res['user_id'];
		$_SESSION['ADMIN_PERMISSION']	=	$res['user_permission'];	
	}
	
	function view_getUserList(){
		$adminSingle		= AdminAct::getInstance();	
		//以下几句是分页用
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$userCount			= $adminSingle->act_getUserCount();
		$pageclass 	 		= new Page($userCount, $perpage, $this->page, 'CN');
		$where				= "WHERE user_permission = 0 AND is_delete = 0";
		$limit				= $pageclass->setLimit();
		$userList			= $adminSingle->act_getUserList($where,$limit);
		$pageformat			= $userCount > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$this->smarty->assign("mod",$_GET['mod']);
		$this->smarty->assign('userlist', $userList);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->display("admintemplate/userList.htm");
	}
	
	function view_deleteUser(){
		if(AdminAct::getInstance()->act_deleteUser()){
			echo "success";
		}
	}
	
	//显示添加用户页面
	function view_addUser(){
		$this->smarty->display("admintemplate/adduser.htm");
	}
	
	//添加用户
	function view_executeAddUser(){
		$res	= UserAct::act_addUser();
		if($res	== "regist_ok"){
			echo "regist_ok";
		} else if($res == "uval_is_exist"){
			echo "uval_is_exist";		//用户名存在
		}else if($res == "name_err"){
			echo "name_err";			//用户名格式错误
		}else if($res == "eval_is_exist" ){
			echo "eval_is_exist";		//邮箱存在
		}else if($res == "email_err"){
			echo "email_err";		//邮箱格式错误
		}else if($res == "pass_err"){
			echo "pass_err";		//密码格式错误
		}else {
			echo "err";
		}
	}
	
	//显示修改密码页面
	function view_updateUser(){
		$this->smarty->assign("userid", $_GET['userid']);
		$this->smarty->display("admintemplate/resetpassw.htm");
	}
	
	//修改密码
	function view_rePassw(){
		$res	= UserAct::act_updPassw();
		if($res == "uppassw_ok"){
			echo 'uppassw_ok';
		} else if($res == 'pass_err'){	//密码是错误
			echo 'pass_err';
		} else if($res == 'passerr'){	//格式错误
			echo 'passerr';
		} else{
			echo 'err';
		}
	}
}
?>

