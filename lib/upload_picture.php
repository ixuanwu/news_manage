<?php
function upPicture($filename){
	if (isset($_FILES[$filename]) && is_uploaded_file($_FILES[$filename]['tmp_name'])) { //提取文件域内容名称，并判断
		if($filename == 'headphoto'){
			$path		="./public/upload/header/"; //头像上传路径
		} else {
			$path		="./public/upload/article/"; //文章上传图片路径
		}
		$max_size='2000000';      // 最大文件限制（单位：byte）
		$file=$_FILES[$filename];
		if(!file_exists($path))
		{
			mkdir("$path", 0755);		//检查是否有该文件夹，如果没有就创建，并给予最高权限
		}
		//允许上传的文件格式
		$type = array("image/gif","image/pjpeg","image/jpeg","image/jpg","image/png","image/bmp",);
		if($file['size']>$max_size){  //判断文件大小是否大于500000字节
			return "big";
		}
		//检查上传文件是否在允许上传的类型
		if(!in_array($file["type"],$type))
		{
			return "type_err";
		}
		$filetype = $file['type'];
		if($filetype == 'image/jpeg'){
			$type = '.jpg';
		}
		if ($filetype == 'image/jpg') {
			$type = '.jpg';
		}
		if ($filetype == 'image/pjpeg') {
			$type = '.jpg';
		}
		if($filetype == 'image/gif'){
			$type = '.gif';
		}
		if($filetype == 'image/png'){
			$type = '.png';
		}
		if($filetype == 'image/bmp'){
			$type = '.bmp';
		}
		if($file["name"])
		{
			$time	= date("YmdHis"); //获取时间并赋值给变量
			$url 	= $path.$time.$type; //图片的完整路径
			$img = $time.$type; //图片名称
			move_uploaded_file($_FILES[$filename]['tmp_name'],$url);
		}
		if($url != ''){
			return $url;
		}
	}
	return 'emp';
}

?>