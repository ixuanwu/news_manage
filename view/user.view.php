<?php
/**
 * 	类名：UserView
 *	功能：个人中心相关视图层
 *	版本： 1.0
 *	日期：2014-11-26
 *	作者：蒋和超
 */
class UserView extends BaseView{
	
	/**
	 * 函数说明：个人中心显示及操作
	 */
	function view_person(){
		$this->smarty->assign("temp", "0");
		$this->smarty->assign("per_center", "个人中心");
		$msg	= isset($_GET['msg'])		? $_GET['msg'] 			: '';
		$temp	= isset($_GET['serviceid'])	? $_GET['serviceid']	: '';
		if(isset($_SESSION['USER_NAME'])){
			$colu_res		= self::view_getcolumns();		//获取栏目列表
			$res			= UserAct::act_getUserInfo();		//获取登录用户的信息
			if($msg == 1){
				$msg	= 1;
			}else if($msg == 2){
				$msg	= 2;
			}else if($msg == 3){
				$msg	= 3;
			}else if($msg == 4){
				$msg	= 4;
			}else if($msg == 5){
				$msg	= 5;
			}
			if($temp == 3){
				$this->smarty->assign("photo_err", $msg);
			}else{
				$this->smarty->assign("picture_err", $msg);
			}
			$this->smarty->assign("temp", "1");
			$userid	= $_SESSION['USER_NAME'];
			$this->smarty->assign("userid", $userid);
			$this->smarty->assign("headerpicture", $res['user_headphoto']);
			$this->smarty->assign("gender", $res['user_gender']);
			if($res['user_birthday'] == ""){
				$birthday	= "";
			}else {
				$birthday	= date('Y-m-d', $res['user_birthday']);
			}
			$this->smarty->assign("birthday", $birthday);
			$this->smarty->assign("telephone", $res['user_telephone']);
			$this->smarty->assign("columns", $colu_res);	//栏目
			$this->smarty->assign("not_notes","亲，你没有评论记录");
			$this->smarty->assign("user_fd", "#");
			$this->smarty->assign("person_cent", "index.php?mod=user&act=person");	//个人中心链接
			$this->smarty->assign("logout", "index.php?mod=public&act=logout");		//退出
			$this->smarty->assign("post_article", "index.php?mod=user&act=articleInsert");		//添加文章
			$this->smarty->assign("photo_url", "index.php?mod=user&act=uploadPicture");
			
			//评论模块
			$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
			$userCount			= CommentAct::act_getUserComNum();
			$pageclass 	 		= new Page($userCount, $perpage, $this->page, 'CN');
			$limit				= $pageclass->setLimit();
			$result 			= CommentAct::act_getComByUid('', $limit);
			$pageformat			= $userCount > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
			$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
			$this->smarty->assign("comlist", $result);
			//评论模块end
			$this->smarty->display("fronttemplate/self.html");
		} else {
			redirect_to("index.php?mod=article&act=index");
		}
	}
	
	/**
	 * 函数说明：用户修改密码，需要验证旧密码
	 * return string 
	 */
	function view_updPassw(){
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
	
	/**
	 * 函数说明：管理员修改密码，无需验证旧密码
	 * return sring
	 */
	function view_adminUpdPassw(){
		$res	= UserAct::act_adminUpdPassw();
		if($res == "uppassw_ok"){
				echo 'uppassw_ok';
			} else if($res == 'passerr'){	//格式错误
				echo 'passerr';
		} else{
				echo 'err';
		}
	}
	
	/**
	 * 函数说明：用户详细资料修改
	 */
	function view_updUserInfo(){
		$res	= UserAct::act_updUserInfo();
		if($res == "up_ok"){
			echo "up_ok";
		}else if($res == "val_exist"){	
			echo "val_exist";	//电话号码已存在
		}else if($res == "tel_err"){
			echo "tel_err";		//电话号码格式错误
		}else{
			echo "up_err";	//更新失败
		}
	}
	
	/**
	 * 函数说明：头像上传处理
	 */
	function view_uploadPicture(){
		include '../lib/upload_picture.php';
		$path	= upPicture("headphoto");
		if($path == "big"){					//判断图片产生的err
			redirect_to("index.php?mod=user&act=person&serviceid=3&msg=1");
		}else if($path == "type_err"){
			redirect_to("index.php?mod=user&act=person&serviceid=3&msg=2");
		}else if($path == 'emp'){
			redirect_to("index.php?mod=user&act=person&serviceid=3&msg=3");
		}else{
			$res	= UserAct::act_updUserInfo($path);
			if($res == 'up_ok'){
				redirect_to("index.php?mod=user&act=person&serviceid=3&msg=5");
			}
		}
	}
	
	/**
	 * 函数说明：用户投递文章
	 * return string
	 */
	function view_articleInsert(){
		include '../lib/upload_picture.php';
		$path	= upPicture("articlepicture");
		if($path == "big"){
			redirect_to("index.php?mod=user&act=person&serviceid=5&msg=1");
		}else if($path == "type_err"){
			redirect_to("index.php?mod=user&act=person&serviceid=5&msg=2");
		}else {
			if($path == "emp"){
				$path = '';
			}
			$res	= ArticleAct::getInstance()->articleInsert($path);
			if($res){
				redirect_to("index.php?mod=user&act=person&serviceid=5&msg=4");
				echo "add_ok";
			}else{
				echo "add_err";
			}
		}
	}
	
	/**
	 * 函数说明：获取栏目
	 * return array
	 */
	public function view_getcolumns() {
		$columnsingle	= ColumnAct::getInstance();
		$pcolumnlist	= $columnsingle->act_getColumnList(0);
		$columnlist		= array();
		foreach ($pcolumnlist as $pcolumn) {
			if ($pcolumn['column_name'] != '要闻' && $pcolumn['column_name'] != '读图') {
				$lcolumnlist = $columnsingle->act_getColumnList($pcolumn['column_id']);
				foreach ($lcolumnlist as $lcolumninfo) {
					array_push($columnlist, array('column_id' => $lcolumninfo['column_id'], 'column_name' => $lcolumninfo['column_name']));
				}
			} else {
				array_push($columnlist, array('column_id' => $pcolumn['column_id'], 'column_name' => $pcolumn['column_name']));
			}
		}
		return $columnlist;
	}
	
	/**
	 * 函数说明：返回当前页
	 */
	public function view_redirectHtm(){
		//'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']		获取当前页面
		redirect_to($_SERVER['HTTP_REFERER']);
	} 
}
?>