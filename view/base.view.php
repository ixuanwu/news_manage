<?php
//view 层基类
if(!isset($_SESSION)){
	session_start();          
}
class BaseView{
	public 			$smarty		=	NULL;	//smarty
	public static 	$_username	=	"";
	protected 		$page 		= 	1;
	public function __construct(){
		$mod	=	trim($_GET['mod']);
		$act	=	trim($_GET['act']);
		if($this->checkLogin($mod, $act)){
			if(!isset($_SESSION['USER_NAME'])){
				redirect_to("index.php?mod=article&act=index");
			}
		}
		
		if($this->checkAdminLogin($mod,$act)){
			if(!isset($_SESSION['ADMIN_NAME'])){
				redirect_to("index.php?mod=admin&act=login");
			}
		}
		// if($this->checkAdminLogin($mod, $act)){
			// if()
		// }
		/*
		if(isset($_SESSION['userName'])&&$mod=="public"&&$act=="login"){
			redirect_to("index.php?mod=user&act=userList");
		}
		self::$_username	= isset($_SESSION['userName']) ? $_SESSION['userName'] : "";
		*/
		//初始化smarty
		require(WEB_PATH.'lib/template/smarty/Smarty.class.php');
		$this->smarty = new Smarty();
		$this->smarty->template_dir = WEB_PATH.'html/template/';
		$this->smarty->compile_dir 	= WEB_PATH.'smarty/templates_c/';
		$this->smarty->config_dir 	= WEB_PATH.'smarty/configs/';
		$this->smarty->cache_dir 	= WEB_PATH.'smarty/cache/';
		$this->smarty->debugging 	= FALSE;
		$this->smarty->caching 		= FALSE;
		$this->smarty->cache_lifetime = 120;
		
		//初始化当前页码
		$this->page = isset($_GET['page'])&&intval($_GET['page'])>0 ? intval($_GET['page']) : '';
		$this->smarty->assign("page", $this->page);
	}
	
	/**
	 * 检测相应的模块是否需要验证
	 * @param  $mod 
	 * @param  $act
	 * @return boolean
	 */
	protected  function checkLogin($mod, $act){
		$noAuthArray	=	explode(',', C('USER_AUTH_NODE'));
		if(in_array($mod.'-'.$act, $noAuthArray)){
			return TRUE;
		}
		return FALSE;
	}
	
		/**
	 * 检测相应的模块是否需要验证
	 * @param  $mod 
	 * @param  $act
	 * @return boolean
	 */
	protected  function checkAdminLogin($mod, $act){
		$AuthArray	=	explode(',', C('ADMIN_AUTH_NODE'));
		if(in_array($mod.'-'.$act, $AuthArray)){
			return TRUE;
		}
		return FALSE;
	}
}
?>

