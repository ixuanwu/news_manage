<?php /* Smarty version Smarty-3.1.12, created on 2014-09-30 00:52:52
         compiled from "I:\wamp\www\news.valsun.cn\html\template\admintemplate\count.htm" */ ?>
<?php /*%%SmartyHeaderCode:2730154298e64b09755-41334587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87b951fd31bf328f2c2f1b76b46b5229d5f2d325' => 
    array (
      0 => 'I:\\wamp\\www\\news.valsun.cn\\html\\template\\admintemplate\\count.htm',
      1 => 1412004268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2730154298e64b09755-41334587',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'article_title' => 0,
    'article_author' => 0,
    'article_views' => 0,
    'article_comments' => 0,
    'article_agree' => 0,
    'article_disagree' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54298e64c23598_98221031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54298e64c23598_98221031')) {function content_54298e64c23598_98221031($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="./public/js/highcharts.js"></script>
<script src="./public/js/modules/exporting.js"></script>
<script>
var title, author, views, comments, agree, disagree, error;
a_title     = "<?php echo $_smarty_tpl->tpl_vars['article_title']->value;?>
";
a_author    = "<?php echo $_smarty_tpl->tpl_vars['article_author']->value;?>
";
a_views     = <?php echo $_smarty_tpl->tpl_vars['article_views']->value;?>
;
a_comments  = <?php echo $_smarty_tpl->tpl_vars['article_comments']->value;?>
;
a_agree     = <?php echo $_smarty_tpl->tpl_vars['article_agree']->value;?>
;
a_disagree  = <?php echo $_smarty_tpl->tpl_vars['article_disagree']->value;?>
;
error       = "<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
";

$(function () {
    if(error != ""){
        alert(error);
        location.href="index.php?mod=article&act=getColumn";
        return false;
    }
    
    $('#draw').highcharts({
        chart: {
            type: 'column',
            margin: [ 50, 50, 100, 80]
        },
        title: {
            text: a_title
        },
        subtitle: {
            text: a_author
        },
        xAxis: {
            categories: [
                '访问量',
                '评论量',
                '点赞数',
                '踩压数'
            ],
            labels: {
                rotation: -45,
                align: 'right',
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '次数'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.1f} 次</b>',
        },
        series: [{
            name: 'Population',
            data: [24, 35, 12, 23],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                x: 4,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
        }]
    });
});

</script>
<div id="draw" class="main">
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>