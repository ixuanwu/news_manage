<?php
/**
 * 	类名：ColumnAct
 *	功能：新闻类别动作处理层
 *	版本： 1.0
 *	日期：2015-1-26
 *	作者：蒋和超
 */
class ColumnAct{
    static $errCode;
    static $errMsg;
    private static $_instance;
    private $is_count = false;
    
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function count(){
        $this->is_count = true;
        return $this;
    }
    
    /**
     * 添加栏目
     * @param string $columnname 所添加的栏目名
     * @param integer $pid 所添加栏目的父ID
     * @return false | 1出错时返回false, 成功时返回"ok"
     */
    public function act_addColumn($columnname, $pid = 0){
        $columnsingle = ColumnModel::getInstance();
        $pid = intval($pid);
        $columnname = mysql_real_escape_string($columnname);
        if($columnname == '' || $pid < 0){
            return false;
        }
        $columninfo = $this->act_getColumnInfoByName($columnname);
        if (!empty($columninfo)){
            return false;
        }
        
        if($pid != 0){
            $columninfo = $this->act_getColumnInfo($pid);
            if (empty($columninfo)){
                return false;
            }
        }
        
        $field = " column_pid, column_name, is_delete ";
        $value = " {$pid}, '{$columnname}', 0";
        $result = $columnsingle->addColumn($field, $value);
        return $result;
    }
    
    /**
     * 删除栏目
     * @param integer $columnid 栏目ID
     * @return false | 1出错时返回false, 成功时返回"ok"
     */
    public function act_delColumn($columnid){
        $columnid = intval($columnid);
        if($columnid <= 0){
            return false;
        }
        
        $columnsingle = ColumnModel::getInstance();
        $result = $this->act_getColumnList($columnid);
        if(!empty($result)){
            return false;
        }
        
        $articlesingle = ArticleModel::getInstance();
        $field = " article_id ";
        $where = " column_id={$columnid}";
        $result = $articlesingle->getArticleInfo($field, $where, '', ' limit 1');
        
        if($result == false){
            $field = " is_delete=1 ";
            $where = " where column_id={$columnid}";
            $result = $columnsingle->modColumn($field, $where);
            return $result;
        }
    }
    
    /**
     * 修改栏目
     * @param integer $columnid 栏目ID
     * @param integer $pid 栏目新父ID
     * @param string $columnname 栏目新名
     * @return 成功时返回 "ok", 错误时返回false
     */
    public function act_modColumn($columnid, $pid, $columnname=''){
        $columnsingle = ColumnModel::getInstance();
        $columnid = intval($columnid);
        $pid = intval($pid);
        $columnname = mysql_real_escape_string($columnname);
        
        if ($columnid < 0 || $pid <0 || $columnid == $pid){
            return false;
        }
        
        if($pid != 0){
            $columninfo = $this->act_getColumnInfo($pid);
            if (empty($columninfo)){
                return false;
            }
        }
        
        if($columnname != ''){
            
            $field = " column_id ";
            $where = " where column_name = '{$columnname}' and column_id!={$columnid} ";
            $columninfo = $columnsingle->getColumnInfo($field, $where);
            $columninfo = $this->_checkReturnData($columninfo, array());
            
            if (!empty($columninfo)){
                return false;
            }
            $field = " column_pid={$pid}, column_name='{$columnname}' ";
        } else {
            $field = " column_pid={$pid} ";
        }
        
        $where = " where column_id={$columnid} and is_delete=0";
        return $result = $columnsingle->modColumn($field, $where);
    }
    
    /**
     * 获取栏目列
     * @param string $limit 限制条件
     * @return array 结果集数组
     */
    public function act_getColumnList($pid, $limit=''){
        $pid = intval($pid);
        if($pid < 0){
            return false;
        }
        $field = " column_id, column_name ";
        $where = " where column_pid={$pid} and is_delete=0 " . $limit;
        $columnsingle = ColumnModel::getInstance();
        $result = $columnsingle->getColumnList($field, $where);
        return $this->_checkReturnData($result, array());
    }
    
    /**
     * 获取所有栏目列或长度
     * @param string $limit 限制条件
     * @return integer 长度或array 结果集数组
     */
    public function act_getAllColumnList($limit = ''){
        $field = " column_id, column_pid, column_name ";
        $where = " where is_delete=0 " . $limit;
        $columnsingle = ColumnModel::getInstance();
        if($this->is_count == true){
            $this->is_count = false;
            return $columnsingle->count()->getColumnList($field, $where);
        }
        $result = $columnsingle->getColumnList($field, $where);
        return $this->_checkReturnData($result, array());
    }
    /**
     * 获取栏目信息
     * @param integer $id 栏目ID
     * @return array 结果集数组
     */
    public function act_getColumnInfo($id){
        $id = intval($id);
        if($id < 0){
            return false;
        }
        $field = " column_id, column_pid, column_name ";
        $where = " where column_id={$id}";
        $columnsingle = ColumnModel::getInstance();
        $columninfo = $columnsingle->getColumnInfo($field, $where);
        return $this->_checkReturnData($columninfo, array());
    }
    
    /**
     * 通过栏目名获取栏目信息
     * @param string $name
     * @return array 结果集数组
     */
    public function act_getColumnInfoByName($name){
        if($name == ''){
            return false;
        }
        $columnsingle = ColumnModel::getInstance();
        $field = " column_id, column_pid, column_name ";
        $where = " where column_name = '{$name}'";
        $columninfo = $columnsingle->getColumnInfo($field, $where);
        return $this->_checkReturnData($columninfo, array());
    }
    
    private function _checkReturnData($data, $errreturn){
        if ($data === false){
            self::$errCode  = ColumnModel::$errCode;
            self::$errMsg   = ColumnModel::$errMsg;
            return $errreturn;
        }elseif (empty($data)){
            self::$errCode  = 5806;
            self::$errMsg   = 'There is no data!';
        }else {
            self::$errCode  = 1;
            self::$errMsg   = 'success';
            return $data;
        }
    }
}
?>