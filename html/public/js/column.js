function columnDel(columnname, columnid){
    res = confirm("您确定要删除栏目："+columnname+" ?");
    if(res==1){
        data = {"mod":"column",
            "act":"del",
            "column_id":columnid
        };
        $.get("index.php",data,function(rtn){
            console.log(rtn);
            if($.trim(rtn) == "ok"){
                alertify.success("成功删除："+columnname);
				console.log("#del"+columnid);
				$("#del"+columnid).remove();
            }else{
                alertify.error("删除失败,可能:<br/><1>该栏目下还有子栏目<br/><2>该栏目下还有文章");
            }
        });
    }else{
        return false;
    }
}