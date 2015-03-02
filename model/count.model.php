<?php
/**
 * 类名：CountModel
 * 功能：读取统计信息
 * 版本：2014-09-24
 * 作者：张高鹏
 */
class CountModel{
    private static $dbConn;
    private static $test_table_user;
    static $errCode     = 0;
    static $errMsg      = '';
    static $_instance;
    
    public function __construct(){
        self::$test_table_user = 'news_article';
    }
    
    private static function initDB(){
        global $dbConn;
        self::$dbConn = $dbConn;
    }
    
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    /**
     * 获取统计信息
     * @param string $field查询域
     * @param string $where查询条件
     * @return array 结果集合
     */
    public function getCountInfo($field, $where){
        self::initDB();
        $sql = 'SELECT '.$field.' FROM '.self::$test_table_user .
                $where.' LIMIT 1';
        $query = self::$dbConn->query($sql);
        if (!query){
            self::$errCode  = '1803';
            self::$errMsg   = "[{$sql}] is error";
            return false;
        }
        self::$errCode  = 0;
        self::$errMsg   = "[{$sql}]";
        return self::$dbConn->fetch_array($query);
    }
}
?>