<?php
class ArticleView extends BaseView {
/**start 登录后主页显示 addby杨友能**/
	public function view_showLogin(){
		$this->smarty->assign("temp", "0");
		if(isset($_SESSION['USER_NAME'])){
			$this->smarty->assign("temp", "1");
			$userid	= $_SESSION['USER_NAME'];
			$this->smarty->assign("userid", $userid);
			$this->smarty->assign("person_cent", "index.php?mod=user&act=person");
			$this->smarty->assign("user_fd", "");
			$this->smarty->assign("logout", "index.php?mod=public&act=logout");
		}
	}
	/**登录后主页显示 end**/
	
	public function view_index() {
		self::view_showLogin();
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$importnews		= $articlesingle->getNewsListByColumn(10, 'article_addtime', 7, 1);
		$articlecolumn	= array();
		$columnnews 	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			$lcolunmlist 	= $columnsingle->act_getColumnList($columninfo['column_id']);
			if(!empty($lcolunmlist[0]) && $columninfo['column_name'] != '要闻' && $columninfo['column_name'] != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
				$left 	= $articlesingle->getNewsListByColumn($lcolunmlist[0]['column_id'], 'article_addtime', 5, 1);
				$right 	= $articlesingle->getNewsListByColumn($lcolunmlist[1]['column_id'], 'article_addtime', 7);
				array_push($columnnews, array('column_name' => $columnname, 'left' => $left, 'right' => $right, 'column_id' => $columninfo['column_id']));
			}
		}
		
		$picturetnews		= $articlesingle->getNewsListByColumn(11, 'article_addtime', 4);
		$todayhotnews 		= $articlesingle->getHotNews('article_agree', 8);
		$commenthotnews 	= $articlesingle->getHotNews('article_comments', 8);
		$articlecolumn		= array_slice($colunmlist,0,9);
		$this->smarty->assign('columninfo', $articlecolumn);
		$this->smarty->assign('importnews', $importnews);
		$this->smarty->assign('columnnews', $columnnews);
		$this->smarty->assign('picturenews', $picturetnews);
		$this->smarty->assign('todayhotnews', $todayhotnews);
		$this->smarty->assign('commenthotnews', $commenthotnews);
		$this->smarty->display('fronttemplate/index.htm');
	}
	
	public function view_column() {
		self::view_showLogin();
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		if(!isset($_GET['columnpid']) || trim($_GET['columnpid']) == ''){
			exit("栏目ID为空!");
		}
		if(!isset($_GET['columnname']) || trim($_GET['columnname']) == ''){
			exit("栏目名称为空!");
		}
		$columnpid		= $_GET['columnpid'];
		$column_name	= $_GET['columnname'];
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$articlecolumn	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			if($columnname != '要闻' && $columnname != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
			}
		}
		$soncolunm			= $columnsingle->act_getColumnList($columnpid);
		$articlecolumn		= array_slice($colunmlist,0,9);
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 9;
		
		$columnleftnews 	= $articlesingle->getNewsListByColumn($soncolunm[0]['column_id'], 'article_addtime', 5);
		$columnrightnews 	= $articlesingle->getNewsListByColumn($soncolunm[1]['column_id'], 'article_addtime', 7);

		$articlenum			= $articlesingle->getArticleNumByColumnId($soncolunm[1]['column_id'])-7 > 0 ? $articlesingle->getArticleNumByColumnId($soncolunm[1]['column_id'])-7:0;
		$pageclass 	 		= new Page($articlenum, $perpage, $this->page, 'CN');
		
		$newslist 			= $articlesingle->getKindsOfNews($soncolunm[1]['column_id'], 'article_addtime', $pageclass->setLimit(7));
		if(empty($newslist)){
			$newslist 	= array();
		}	
		$todayhotnews 		= $articlesingle->getHotNews('article_agree', 8);
		$commenthotnews 	= $articlesingle->getHotNews('article_comments', 8);
		$pageformat			= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		if ($articlenum == 0) {
			$newslist = array();
		}
		$this->smarty->assign('column_name', $column_name);
		$this->smarty->assign('columninfo', $articlecolumn);
		$this->smarty->assign('columnleftnews', $columnleftnews);
		$this->smarty->assign('columnrightnews', $columnrightnews);
		$this->smarty->assign('newslist', $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->assign('todayhotnews', $todayhotnews);
		$this->smarty->assign('commenthotnews', $commenthotnews);
		$this->smarty->display('fronttemplate/columnview.htm');
	}
	
	public function view_picture() {
		self::view_showLogin();
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		if(!isset($_GET['columnid']) || trim($_GET['columnid']) == ''){
			exit("栏目ID为空!");
		}
		if(!isset($_GET['columnname']) || trim($_GET['columnname']) == ''){
			exit("栏目名称为空!");
		}
		$columnid		= $_GET['columnid'];
		$column_name	= $_GET['columnname'];
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$articlecolumn	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			if($columnname != '要闻' && $columnname != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
			}
		}
		$perpage 	 		= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 9;
	
		$columnleftnews 	= $articlesingle->getNewsListByColumn($columnid, 'article_addtime', 5);
		$columnrightnews 	= $articlesingle->getNewsListByColumn($columnid, 'article_addtime', 7);
	
		$articlenum			= $articlesingle->getArticleNumByColumnId($columnid)-12 > 0 ? $articlesingle->getArticleNumByColumnId($columnid)-7:0;
		$pageclass 	 		= new Page($articlenum, $perpage, $this->page, 'CN');
		
		$newslist 			= $articlesingle->getKindsOfNews($columnid, 'article_addtime', $pageclass->setLimit(12));
		$todayhotnews 		= $articlesingle->getHotNews('article_agree', 8);
		$commenthotnews 	= $articlesingle->getHotNews('article_comments', 8);
		$pageformat			= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		if ($articlenum == 0) {
			$newslist = array();
		}
		$articlecolumn		= array_slice($colunmlist,0,9);
		$this->smarty->assign('column_name', $column_name);
		$this->smarty->assign('columninfo', $articlecolumn);
		$this->smarty->assign('columnleftnews', $columnleftnews);
		$this->smarty->assign('columnrightnews', $columnrightnews);
		$this->smarty->assign('newslist', $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->assign('todayhotnews', $todayhotnews);
		$this->smarty->assign('commenthotnews', $commenthotnews);
		$this->smarty->display('fronttemplate/columnview.htm');
	}
	
	public function view_search() {
		self::view_showLogin();
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$articlecolumn	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			if($columnname != '要闻' && $columnname != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
			}
		}
		$searchnewsnum	= $articlesingle->getSearchArticleNum();
		$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 7;
		$pageclass 	 	= new Page($searchnewsnum, $perpage, $this->page, 'CN');
		$searchnews 	= $articlesingle->searchNews($pageclass->limit);
		if ($searchnewsnum == 0) {
			$searchnews = array();
		}
		$todayhotnews 	= $articlesingle->getHotNews('article_agree', 8);
		$commenthotnews = $articlesingle->getHotNews('article_comments', 8);
		$pageformat		= $searchnewsnum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$articlecolumn	= array_slice($colunmlist,0,9);
		$this->smarty->assign('columninfo', $articlecolumn);
		$this->smarty->assign('searchnews', $searchnews);
		$this->smarty->assign('search_input', $_GET['search_input']);
		$this->smarty->assign('searchnews_count', $searchnewsnum);
		$this->smarty->assign('todayhotnews', $todayhotnews);
		$this->smarty->assign('commenthotnews', $commenthotnews);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		
		$this->smarty->display('fronttemplate/searchview.htm');
	}
	

	public function view_detail(){
		self::view_showLogin();
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		$colunmlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$articlecolumn	= array();
		foreach ($colunmlist as $columninfo) {
			$columnname 	= $columninfo['column_name'];
			if($columnname != '要闻' && $columnname != '读图') {
				array_push($articlecolumn, array('column_name' => $columnname, 'column_id' => $columninfo['column_id']));
			}
		}
		$check = $_GET['check'];
		if($check == '')
		{
			$check = 1;
		}
		$articleinfo 	= $articlesingle->getNewsById($check);
		
		if (empty($articleinfo[0])) {
			$this->smarty->display('fronttemplate/errorPage.html');
		} else {
			if (!isset($_GET['columnid']) || trim($_GET['columnid']) == ''){
				exit("栏目ID为空!");
			}
			$articlesingle->addArticleViews();
			$articleagree	= $articlesingle->getArticleAgree();
			$columnid		= $_GET['columnid'];
			$recommennews 	= $articlesingle->getNewsListByColumn($columnid,'article_addtime', 4);
			$todayhotnews 	= $articlesingle->getHotNews(' article_agree', 8);
			$commenthotnews	= $articlesingle->getHotNews(' article_comments', 8);
			$articlecolumn	= array_slice($colunmlist,0,9);
			$this->smarty->assign('columninfo', $articlecolumn);
			$this->smarty->assign('user_article_agree', $articleagree['user_article_agree']);
			$this->smarty->assign('articleinfo', $articleinfo[0]);
			$this->smarty->assign('recommendnews', $recommennews);
			$this->smarty->assign('todayhotnews', $todayhotnews);
			$this->smarty->assign('commenthotnews', $commenthotnews);
			if ($columnid == 11) {
				$this->smarty->display('fronttemplate/imagenewview.htm');
			} else {
				$this->smarty->display('fronttemplate/newview.htm');
			}
		}
	}
	
	public function view_agree() {
		$result = ArticleAct::getInstance()->articleAgree(1);
		echo $result;
	}
	
	public function view_agreenot() {
		$result = ArticleAct::getInstance()->articleAgree(0);
		echo $result;
	}
	
	public function view_disagree() {
		$result = ArticleAct::getInstance()->articleDisgree(2);
		echo $result;
	}
	
	public function view_disagreenot() {
		$result = ArticleAct::getInstance()->articleDisgree(0);
		echo $result;
	}
	
	public function view_addarticle() {
		include '../lib/upload_picture.php';
		$path	= upPicture("articlepicture");
		//上传文件为空
		if ($path == 'emp'){
			$result	= ArticleAct::getInstance()->articleInsert();
		} else if($path == 'type_err'){//文件类型错误
			
		} else if($path == 'big'){ //文件过大
			
		} else {
			$result = ArticleAct::getInstance()->articleInsert($path);
		}
		if ($result) {
			$columnid = post_check($_POST['columnid']);
			redirect_to("index.php?mod=article&act=getArticle&columnid=".$columnid);
		}
	}
	
	public function view_modifyarticle() {
		include '../lib/upload_picture.php';
		$path	= upPicture("articlepicture");
		if ($path == 'emp'){ //上传文件为空
			$result	= ArticleAct::getInstance()->articleModify();
		} else if($path == 'type_err'){ //文件类型错误
			
		} else if($path == 'big'){ //文件过大
			
		} else {
			$result = ArticleAct::getInstance()->articleModify($path);
		}
		if ($result) {
			$columnid = post_check($_POST['columnid']);
			redirect_to("index.php?mod=article&act=getArticle&columnid=".$columnid);
		} else {
			echo "修改失败";
		}
	}
	
	public function view_updateArticle() {
		$articleinfo = ArticleAct::getInstance()->getNewsById();
		if (empty($articleinfo[0])) {
			$this->smarty->display('fronttemplate/errorPage.html');
		} else {
			$article = json_encode($articleinfo[0]);
			echo $article;
		}
	}
	
	public function view_updateCheckArticle() {
		$articleinfo = ArticleAct::getInstance()->getCheckNewsById();
		if (empty($articleinfo[0])) {
			$this->smarty->display('fronttemplate/errorPage.html');
		} else {
			$article = json_encode($articleinfo[0]);
			echo $article;
		}
	}
	
	public function view_deletearticle() {
		$result = ArticleAct::getInstance()->articleDelete();
		if ($result) {
			echo "删除成功";
		} else {
			echo "删除失败";
		}
	}
	
	public function view_deletecheckarticle() {
		$result = ArticleAct::getInstance()->articleDelete();
		if ($result) {
			self::view_getCheckArticle();
		} else {
			echo "删除失败";
		}
	}
	
	public function view_checkarticle() {
		$result = ArticleAct::getInstance()->articleCheck();
		if ($result) {
			echo "ok";
		} else {
			echo "failed";
		}
	}
	
	public function view_getColumn(){
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		$columnlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$lcolumnlist	= $columnsingle->act_getColumnList($columnlist[0]['column_id']);//获得子栏目列表
		$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$articlenum		= $articlesingle->getArticleNumByColumnId($lcolumnlist[0]['column_id']);
		$pageclass 	 	= new Page($articlenum, $perpage, $this->page, 'CN');
		$newslist 		= $articlesingle->getKindsOfNews($lcolumnlist[0]['column_id'], 'article_addtime', $pageclass->limit);
		$pageformat		= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		$this->smarty->assign("mod",$_GET['mod']);
		$this->smarty->assign('columnpid', $columnlist[0]['column_id']);
		$this->smarty->assign('columnid', $lcolumnlist[0]['column_id']);
		$this->smarty->assign("columnlist",$columnlist) ;
		$this->smarty->assign("lcolumnlist",$lcolumnlist) ;
		$this->smarty->assign("newslist", $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->display('admintemplate/article.htm');
	}
	
	public function view_getChildColumn(){
		if (!isset($_GET['columnpid']) || trim($_GET['columnpid']) == ''){
			exit("栏目ID为空!");
		}
		
		$columnpid		= $_GET['columnpid'];
		$columnsingle	= ColumnAct::getInstance();
		$articlesingle	= ArticleAct::getInstance();
		$columnlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$lcolumnlist	= $columnsingle->act_getColumnList($columnpid);//获得子栏目列表
		
		if (empty($lcolumnlist[0])) {
			$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
			$articlenum		= $articlesingle->getArticleNumByColumnId($columnpid);
			$pageclass 	 	= new Page($articlenum, $perpage, $this->page, 'CN');
			$newslist 		= $articlesingle->getKindsOfNews($columnpid, 'article_addtime', $pageclass->limit);
			$pageformat		= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		} else {
			$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
			$articlenum		= $articlesingle->getArticleNumByColumnId($lcolumnlist[0]['column_id']);
			$pageclass 	 	= new Page($articlenum, $perpage, $this->page, 'CN');
			$newslist 		= $articlesingle->getKindsOfNews($columnpid, 'article_addtime', $pageclass->limit);
			$newslist 		= $articlesingle->getKindsOfNews($lcolumnlist[0]['column_id'], 'article_addtime', $pageclass->limit);
			$pageformat		= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
		}
		
		$this->smarty->assign("mod",$_GET['mod']);
		$this->smarty->assign('columnpid', $columnpid);
		$this->smarty->assign('columnid', $lcolumnlist[0]['column_id']);
		$this->smarty->assign("columnlist",$columnlist) ;
		$this->smarty->assign("lcolumnlist",$lcolumnlist) ;
		$this->smarty->assign("newslist", $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		$this->smarty->display('admintemplate/article.htm');
	}
	public function view_getArticle(){
		if (!isset($_GET['columnid']) || trim($_GET['columnid']) == ''){
			exit("栏目ID为空!");
		}
		$columnid		= $_GET['columnid'];
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
		
		$columnlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		$articlenum		= $articlesingle->getArticleNumByColumnId($columnid);
		$pageclass 	 	= new Page($articlenum, $perpage, $this->page, 'CN');		
		$newslist 		= $articlesingle->getKindsOfNews($columnid, 'article_addtime', $pageclass->limit);
		$pageformat		= $articlenum > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);	
		$columninfo		= $columnsingle->act_getColumnInfo($columnid);
		$columnpid		= $columninfo['column_pid'];
		$lcolumnlist	= $columnsingle->act_getColumnList($columnpid);//获得子栏目列表
 		// print_r($newslist);
		if (count($lcolumnlist) > 2) {
			$lcolumnlist = array();
		}
		$this->smarty->assign("mod", $_GET['mod']);
		$this->smarty->assign('columnpid', $columnpid);
		$this->smarty->assign('columnid', $columnid);
		$this->smarty->assign("columnlist",$columnlist) ;
		$this->smarty->assign("lcolumnlist",$lcolumnlist) ;

		$this->smarty->assign("newslist", $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
		
		$this->smarty->display('admintemplate/article.htm');
	}
	
	public function view_getCheckArticle(){
		if (!isset($_GET['columnpid']) || trim($_GET['columnpid']) == ''){
			exit("栏目ID为空!");
		}
		$columnpid		= $_GET['columnpid'];
		$articlesingle	= ArticleAct::getInstance();
		$columnsingle	= ColumnAct::getInstance();
	
		$columnlist		= $columnsingle->act_getColumnList(0);//获得栏目列表
		$lcolumnlist	= $columnsingle->act_getColumnList($columnpid);//获得子栏目列表
		$perpage 	 	= isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
		if (empty($lcolumnlist[0])) {
			$all 		= $articlesingle->getParentCheckArticle();
			if (empty($all[0])) {
				$all = array();
			}
			$pageclass 	= new Page(count($all), $perpage, $this->page, 'CN');
			$newslist 	= $articlesingle->getParentCheckArticle($pageclass->limit);		
		} else {
			$all 		= $articlesingle->getCheckArticle();
			if (empty($all[0])) {
				$all = array();
			}
			$pageclass 	= new Page(count($all), $perpage, $this->page, 'CN');
			$newslist 	= $articlesingle->getCheckArticle($pageclass->limit);
		}
		
		if (empty($newslist[0])) {
			$newslist	= array();
		}
		if (count($lcolumnlist) > 2) {
			$lcolumnlist = array();
		}
		$pageformat		= count($all) > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
	
		$this->smarty->assign("mod", $_GET['mod']);
		$this->smarty->assign('columnpid', $columnpid);
		$this->smarty->assign("columnlist",$columnlist) ;
		$this->smarty->assign("lcolumnlist",$lcolumnlist) ;
	
		$this->smarty->assign("newslist", $newslist);
		$this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
	
		$this->smarty->display('admintemplate/checkarticle.htm');
	}
	
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
		$column = json_encode($columnlist);
		echo $column;
	}
}
?>