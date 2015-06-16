<?php
/**
 * 类名：CountAct
 * 功能：读取统计信息
 * 作者：蒋和超
 */
class CountAct{
    static $errCode     = 0;
    static $errMsg      = '';
    static $_instance;
    
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    /**
     * 通过Id获取文章统计信息
     * @param integer $articleid 文章ID
     * @return array 结果集合数组
     */
    public function act_getCountById($articleid){
        $articleid = intval($articleid);
        if ($articleid <= 0){
            self::$errCode = 5807;
            self::$errMsg = 'article_id is error';
            return array();
        }
        $countsingle = CountModel::getInstance();
        $field      = ' article_title, article_author, article_views, article_comments, article_agree, article_disagree';
        $where      = " where article_id = '{$articleid}' and article_status=1 and is_delete=0";
        $countinfo   = $countsingle->getCountInfo($field, $where);
        return      $this->_checkReturnData($countinfo, array());
    }
    
    private function _checkReturnData($data, $errreturn){
        if ($data === false){
            self::$errCode  = CountModel::$errCode;
            self::$errMsg   = CountModel::$errMsg;
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