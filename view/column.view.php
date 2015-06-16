<?php
/**
 * 类名：ColumnView
 * 功能：栏目视图层
 * 作者：蒋和超
 */
class ColumnView extends BaseView{
    function view_index(){
        $columnsingle   = ColumnAct::getInstance();
        $columnpid      = isset($_REQUEST['column_pid']) ? intval($_REQUEST['column_pid']) : 0;
        $perpage        = isset($_GET['perpage'])&&intval($_GET['perpage'])>0 ? intval($_GET['perpage']) : 20;
        $columnCount    = $columnsingle->count()->act_getAllColumnList();
        $pageclass 	 	= new Page($columnCount, $perpage, $this->page, 'CN');
        $limit          = $pageclass->setLimit();
        $columnList     = $columnsingle->act_getAllColumnList($limit);
        $pageformat		= $columnCount > $perpage ? array(0,1,2,3,4,5,6,7,8,9) : array(0,1,2,3,4);
        $this->smarty->assign('columnlist', $columnList);
        $this->smarty->assign('pageStr', $pageclass->fpage($pageformat));
        $this->smarty->display("admintemplate/column.htm");
    }
    
    function view_add(){
        $columnsingle = ColumnAct::getInstance();
        if((!isset($_REQUEST['column_name'])) || (!isset($_REQUEST['column_pid']))){
            $columnList     = $columnsingle->act_getAllColumnList();
            $this->smarty->assign('columnlist', $columnList);
            $this->smarty->display("admintemplate/columnadd.htm");
            return;
        }
        $columnname = $_REQUEST['column_name'];
        $pid = intval($_REQUEST['column_pid']);
        $result = $columnsingle->act_addColumn($columnname, $pid);
        if($result == false){
            $msg = "failed!";
        } else {
            $msg = "ok";
        }
        echo $msg;
        // $this->smarty->assign("msg", $msg);
        // $this->smarty->display("*.htm");
    }
    
    function view_mod(){
        $columnsingle = ColumnAct::getInstance();
        if(!isset($_REQUEST['column_id'])){
            header("index.php?mod=column&act=index");
            return false;
        }
        if((!isset($_REQUEST['column_name'])) || (!isset($_REQUEST['column_pid']))){
            $column         = $columnsingle->act_getColumnInfo($_REQUEST['column_id']);
            $columnList     = $columnsingle->act_getAllColumnList();
            $this->smarty->assign('column', $column);
            $this->smarty->assign('columnlist', $columnList);
            $this->smarty->display("admintemplate/columnmod.htm");
            return false;
        }
        
        $columnid = intval($_REQUEST['column_id']);
        $columnname = $_REQUEST['column_name'];
        $pid = intval($_REQUEST['column_pid']);
        $result = $columnsingle->act_modColumn($columnid, $pid, $columnname);
        if($result == false){
            $msg = "failed";
        } else {
            $msg = "ok";
        }
        echo $msg;
    }
    
    function view_del(){
        $columnid = isset($_REQUEST['column_id']) ? intval($_REQUEST['column_id']) : 0;
        if($columnid <= 0){
            echo "failed!";
            return false;
        }
        $columnsingle = ColumnAct::getInstance();
        $result = $columnsingle->act_delColumn($columnid);
        if($result == false){
            $msg = "failed!";
        }else{
            $msg = "ok";
        }
        echo $msg;
        //$this->smarty->assign("msg", $msg);
        // $this->smarty->display("*.htm");
    }
}
?>