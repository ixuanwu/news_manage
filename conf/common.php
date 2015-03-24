<?php
if (!defined('WEB_PATH')) exit();
define("WEB_URL","");
//全局配置信息
return  array(
	//运行相关
	"RUN_LEVEL"		=>	"DEV",		//	运行模式。 DEV(开发)，GAMMA(测试)，IDC(生产)
	//日志相关
	"LOG_RECORD"	=>	true,		//	开启日志记录
	"LOG_TYPE"		=>	3,			//	1.mail  2.file 3.api
	"LOG_PATH"	    =>	WEB_PATH."log/log",	//文件日志目录
	"LOG_FILE_SIZE"	=>	2097152, 
	"LOG_DEST"		=>	"",			//	日志记录目标
	"LOG_EXTRA"		=>	"",			//	日志记录额外信息
	//数据接口相关
	"DATAGATE"		=>	"db",		//	数据接口层 cache, db, socket
	"DB_TYPE"		=>	"mysql",	//	mysql	mssql	postsql	mongodb
	//mysql db	配置
	"DB_CONFIG"		=>	array(
		"master1"	=>	array("localhost","root","123456","3306","news_manage")//主DB
	),
	"CACHE_CONFIG"	=>	array(
		array("192.168.200.198","11211"),
	),
	"LANG"	=>	"zh",	//语言版本开关  zh , en
    "CACHEGROUP" => 'news_manage', //memcache上的保存组名
    "CACHELIFETIME" => 7200,       //memcache 过期时间默认为 两小时
	//用户管理DEBUG
	'IS_DEBUG' 			 => true,
	'IS_AUTH_ON' 		 => true,	// 是否开启验证
	'SYSTEM_VERSION'	 => "V1.0", // 系统版本号
	'NOT_AUTH_NODE' 	 => 'public-userLogin,public-login,public-logout,public-regist,article-index,article-column,user-userCheck,user-userRegist,public-getCode,public-getParam,admin-adminLogin,admin-login,article-detail,article-search,article-picture',	// 默认无需认证模块
	'ADMIN_AUTH_NODE'	 => 'admin-getUserList,admin-addUser,article-getChildColumn,column-index,column-add,article-getColumn,admin-rePassw,article-getArticle,admin-updateUser,comment-admincom,article-getCheckArticle,count-index',
	'USER_AUTH_NODE'	 => 'user-person,comment-commin',
	//用户、权限、岗位表配置
	'TABLE_USER_INFO'			=>'news_user',
	'TABLE_USER_ARTICLE_INFO'	=>'news_user_article',
	'TABLE_USER_COMMENT_INFO'	=>'news_user_comment',
	'TABLE_COMMENT_INFO'		=>'news_comment',
);
?>