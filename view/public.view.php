<?php
class PublicView extends BaseView {
	
	function view_index(){
		redirect_to("index.php?mod=article&act=index");
	}
	
	function view_userLogin(){
		$result	=	UserAct::act_userLogin();
		echo $result;
	}

	function view_logout(){
		session_destroy();
		redirect_to($_SERVER['HTTP_REFERER']);
	}
	
	function view_getCode(){
	 	$res	= UserAct::act_getCode(); 
		echo $res;
	}
	
	function view_getParam(){
		$res	= UserAct::act_getParam();
		if($res === $_SESSION["USER_ID"]){
			echo "ok";
		}else if($res != $_SESSION["USER_ID"] && $res != '' ){
			echo 'val_exist';
		}else{
			echo "ok";
		}
	}
	
	function view_regist(){
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
}
?>

