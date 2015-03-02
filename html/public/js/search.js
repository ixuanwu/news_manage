$(document).ready(function(){
	$("#search").click(function(){
		location.href = "index.php?mod=article&act=search&search_input="+$("#search_input").val();
	});
}); 