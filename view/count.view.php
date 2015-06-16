<?php
/**
 * 类名：CountView
 * 功能：统计信息视图层
 * 作者：蒋和超
 */
class CountView extends BaseView {
    public function view_index(){
        $countsingle = CountAct::getInstance();
        $articleid = isset($_GET['article_id']) ? intval($_GET['article_id']) : 0;
        $countinfo   = $countsingle->act_getCountById($articleid);
        $article_title      = '';
        $article_author     = '';
        $article_views      = 0;
        $article_comments   = 0;
        $article_agree      = 0;
        $article_disagree   = 0;
        if(empty($countinfo)){
            $error = "不存在ID为" . $articleid ."的文章！";
        }elseif(CountAct::$errCode == 1){
            $article_title      = $countinfo['article_title'];
            $article_author     = $countinfo['article_author'];
            $article_title      = addslashes($article_title);
            $article_author     = addslashes($article_author);
            $article_views      = $countinfo['article_views'];
            $article_comments   = $countinfo['article_comments'];
            $article_agree      = $countinfo['article_agree'];
            $article_disagree   = $countinfo['article_disagree'];
            $error              = '';
        } else {
            $error = "出错了！";
        }
        $this->smarty->assign('article_title', $article_title);
        $this->smarty->assign('article_author', $article_author);
        $this->smarty->assign('article_views', $article_views);
        $this->smarty->assign('article_comments', $article_comments);
        $this->smarty->assign('article_agree', $article_agree);
        $this->smarty->assign('article_disagree', $article_disagree);
        $this->smarty->assign('error', $error);
        $this->smarty->display('admintemplate/count.htm');
    }
}
?>