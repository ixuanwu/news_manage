function columnDel(columnname, columnid){
	data = {"mod":"column","act":"del","column_id":columnid};   
    alertify.confirm("您确定要删除栏目："+columnname+" ?",function(e){
		if(e) {
			$.get("index.php",data,
				function(rtn){
				  if ($.trim(rtn) == "ok") {
					  alertify.success("成功删除:"+columnname);
					  setTimeout('location.href=location.href',1000);
				  } else {
					  alertify.error($.trim(rtn));
				  }	  
			});
		}
	});
}