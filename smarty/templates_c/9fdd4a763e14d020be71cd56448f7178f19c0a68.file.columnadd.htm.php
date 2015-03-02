<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 20:00:19
         compiled from "/data/web/news.valsun.cn/html/template/admintemplate/columnadd.htm" */ ?>
<?php /*%%SmartyHeaderCode:1022802477542949d3ba5a80-00696604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fdd4a763e14d020be71cd56448f7178f19c0a68' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/admintemplate/columnadd.htm',
      1 => 1411990979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022802477542949d3ba5a80-00696604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columnlist' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_542949d3bf2f33_51885992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542949d3bf2f33_51885992')) {function content_542949d3bf2f33_51885992($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main">
    <div class="userlogin">
        <table cellspacing="0" width="100%">
            <tr>
                <td>栏目名:</td>
                <td><input type="text" id="column_name" name="column_name" /></td>
                <td><p style="font-size:12px; color:#F00; float:right;" id="tips-name"></p></td>
            </tr>
            <tr>
                <td>父栏目:</td>
                <td>
                    <select id="column_pid">
                        <option value="0" selected="true">顶层栏目</option>
                        <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columnlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value){
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
</option>
                        <?php } ?>
                    </select>
                </td>
                <td><p style="font-size:12px; color:#F00; float:right;" id="tips-pid"></p></td>
            </tr>
            <tr>
                <td class="go"><button id="add">添加</button></td>
            </tr>
	   </table>
    </div>
	
</div>
<script>

    $("#add").click(function(){
        if($("#column_name").val() == ""){
            $("#tips-name").html("栏目名不能为空！");
            return false;
        }else if($("#column_name").val().length > 20){
            $("#tips-name").html("栏目名长度不能大于20！");
            return false;
        }else{
            $("#tips-name").html("");
        }
        
        data = {
            "mod":"column",
            "act":"add",
            "column_pid":$("#column_pid").val(),
            "column_name":$("#column_name").val()
        };
        $.get("index.php",data,function(rtn){
            if($.trim(rtn) == "ok"){
                alertify.success("添加栏目成功！");
                location.href = "index.php?mod=column&act=index";
            }else{
                alertify.error("添加栏目失败！");
            }
        });
    });

</script>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>