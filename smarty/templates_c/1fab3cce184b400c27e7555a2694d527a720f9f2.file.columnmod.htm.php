<?php /* Smarty version Smarty-3.1.12, created on 2014-09-29 20:16:23
         compiled from "/data/web/news.valsun.cn/html/template/admintemplate/columnmod.htm" */ ?>
<?php /*%%SmartyHeaderCode:1942178478542947dd4eeff2-20589530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fab3cce184b400c27e7555a2694d527a720f9f2' => 
    array (
      0 => '/data/web/news.valsun.cn/html/template/admintemplate/columnmod.htm',
      1 => 1411992923,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1942178478542947dd4eeff2-20589530',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_542947dd550575_48277910',
  'variables' => 
  array (
    'column' => 0,
    'columnlist' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_542947dd550575_48277910')) {function content_542947dd550575_48277910($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("admintemplate/header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="main">
    <div class="userlogin">
	   <table cellspacing="0" width="100%">
            <tr>
                <td>栏目ID</td>
                <td><?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
</td>
            <tr>
                <td>栏目名</td>
                <td><input type="text" id="column_name" name="column_name" value="<?php echo $_smarty_tpl->tpl_vars['column']->value['column_name'];?>
" /></td>
                <td><p style="font-size:12px; color:#F00; float:right;" id="tips-name"></p></td>
            </tr>
			     <td>父栏目</td>
                 <td>
                    <select id="column_pid">
                        <option value="0">顶层栏目</option>
                        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columnlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['column_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['column_id']==$_smarty_tpl->tpl_vars['column']->value['column_pid']){?> selected="true" <?php }?> ><?php echo $_smarty_tpl->tpl_vars['item']->value['column_name'];?>
</option>
                        <?php } ?>
                    </select>
                 </td>
                <td><p style="font-size:12px; color:#F00; float:right;" id="tips-pid"></p></td>
            </tr>
            <tr>
                <td>
                    <button id="mod">修改</button>
                </td>
            </tr>
	   </table>
    </div>
</div>
<script>
var id = <?php echo $_smarty_tpl->tpl_vars['column']->value['column_id'];?>
;

    $("#mod").click(function(){
        if($("#column_name").val() == ""){
            $("#tips-name").html("栏目名不能为空！");
            return false;
        }else if($("#column_name").val().length > 20){
            $("#tips-name").html("栏目名长度不能大于20！");
            return false;
        }else{
            $("#tips-name").html("");
        }
        
        if($("#column_pid").val() == id){
            $("#tips-pid").html("栏目的父栏目不能为自己！");
            return false;
        }else{
            $("#tips-pid").html("");
        }
        data = {
            "mod":"column",
            "act":"mod",
            "column_id":id,
            "column_pid":$("#column_pid").val(),
            "column_name":$("#column_name").val()
        };
        $.get("index.php",data,function(rtn){
            if($.trim(rtn) == "ok"){
                alertify.success("修改成功！");
				location.href = "index.php?mod=column&act=index";
            }else{
                alertify.error("修改失败！");
            }
        });
    });

</script>
<?php echo $_smarty_tpl->getSubTemplate ("admintemplate/footer.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>