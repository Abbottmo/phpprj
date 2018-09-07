<?php
	include('connect.php');

	$info = array();
	$content = $_POST['content'];
	$id = $_POST['id'];
	/*************************************** 图片上传函数 *********************************/
	// 获取文件后缀名函数
	function fileext($filename){
		return substr(strrchr($filename, '.'), 1);
	}
	// 生成随机文件名函数
	function random($length){
		$hash = 'CR-';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		mt_srand((double)microtime() * 1000000);
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
		return time().$hash;
	}
	// 图片上传函数
	function uploadfile($FileName,$FileSize,$FileTempName){
		
		// 允许上传的图片后缀
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		// 判断文件类型
		$FileExt = strtolower(fileext($FileName));
		if(!in_array($FileExt,$allowedExts)){
			$text = implode(",",$allowedExts);
			$info['Msg'] = '您只能上传以下类型文件: '.$text;
			exit;
		}
		else if($FileSize > 10242880){
			$info['Msg'] = '上传的文件大小不能超过10M';
			exit;
		}
		else {
			$ExFileName = explode(".",$FileName);   // 旧的文件名(不含后缀)
			do {
				$ExFileName[0] = random(15); // 新的文件名(不含后缀)
				$NewFileName = implode(".",$ExFileName);  // 新的文件名(含后缀)
				$UploadFile = '/home/image_rec/'.$NewFileName;  // 给文件名加上路径
				//echo $UploadFile;
			}while(file_exists($UploadFile));
			if (move_uploaded_file($FileTempName,$UploadFile)) {
				if(is_uploaded_file($FileTempName)) { //判断指定的文件是不是通过HTTP POST上传的
					$info['Msg'] = '1、上传图片失败';
					exit;
				}
				else {
					
					//$DatabaseFile = substr($UploadFile,3,-1);
					//echo $UploadFile;
					return $UploadFile;
				}
			}else{
				$info['Msg'] = '2、上传图片失败';
				exit;
			}
		}
	}  
	
	$uploadfile = uploadfile($_FILES["file"]["name"], $_FILES["file"]["size"], $_FILES["file"]["tmp_name"]);
	echo $uploadfile;
	echo $id;
	$date = date('Y-m-d H:i:s', time());
	//* 插入到数据库
	echo $date;
	//$insert_sql = "INSERT INTO `image_tbl`(`image_path`, `image_id`, `submission_date`,`return_value`) VALUES ('".$uploadfile."', '".$id."','".$date."',"0")";
	$insert_sql = "INSERT INTO image_tbl ".
        "(image_path,image_id,return_value,submission_date) ".
        "VALUES ".
        "('$uploadfile','$id','0','$date')";
	if($insert_query = mysqli_query($con, $insert_sql)){
		$info['Msg'] = '3、图片上传成功';
	}
	else{
		$info['Msg'] = '4、图片上传失败';
	}
	mysqli_close($con);
	echo ($info['Msg']);

	
?>