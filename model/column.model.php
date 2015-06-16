<?php
/**
 * 类名：ColumnModel
 * 功能：新闻类别栏目管理
 * 作者：蒋和超
 */
class ColumnModel{
    static $errCode;
    static $errMsg;
    private static $_instance;
    private static $table;
    private static $dbConn;
    private $is_count = false;
    
    public function __construct(){
        self::$table = "news_column";
    }
    
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    private static function initDB(){
        global $dbConn;
        self::$dbConn = $dbConn;
    }
    
    public function count(){
        $this->is_count = true;
        return $this;
    }
    
    /**
     * 添加栏目
     * @param string $field 所添加域
     * @param string $value 添加值
     * @return "ok" 成功 | false 错误
     */
    public function addColumn($field, $value){
        self::initDB();
        $sql = "INSERT INTO " . self::$table . "({$field}) values({$value})";
        $query = self::$dbConn->query($sql);
        if(self::$dbConn->affected_rows() == 1){
            return "ok";
        }
        return false;
    }
    
    /**
     * 修改栏目
     * @param string $field 所修改域
     * @param string $where 修改条件
     * @return 成功时返回 "ok", 错误时返回false
     */
    public function modColumn($field, $where){
        self::initDB();
        $sql = "UPDATE " . self::$table . " set " . $field . $where;
        $query = self::$dbConn->query($sql);
        if(self::$dbConn->affected_rows() == 1){
            return "ok";
        }
        return false;
    }
    
    /**
     * 获取栏目信息
     * @param string $field 查询域
     * @param string $where 查询条件
     * @return array 结果集数组
     */
    public function getColumnInfo($field, $where){
        self::initDB();
        $sql = "SELECT " . $field . " from " . self::$table . $where . " and is_delete = 0 limit 1";
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
    
    public function getColumnList($field, $where){
        self::initDB();
        $sql = "SELECT " . $field . " FROM " . self::$table . $where;
        $query = self::$dbConn->query($sql);
        if (!query){
            self::$errCode  = '1803';
            self::$errMsg   = "[{$sql}] is error";
            return false;
        }
        
        if($this->is_count == true){
            $this->is_count = false;
            return self::$dbConn->num_rows($query);
        }
        self::$errCode  = 0;
        self::$errMsg   = "[{$sql}]";
        return self::$dbConn->fetch_array_all($query);
    }
}
?>