<?php 
	session_start();
	//包含数据库连接文件
	include('../connect/connect.php');
	
	$user_id = $_GET['user_id'];
	
	$info=array();
	$sql = "select * from user where user_id='$user_id' limit 1";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($result);
		//$person_info[] = $row;
		$info['user_nickname'] = $row['user_nickname'];
		$info['user_realname'] = $row['user_realname'];
		$info['user_birth'] = $row['user_birth'];
		$info['user_sex'] = $row['user_sex'];
		$info['user_city'] = $row['user_city'];
		$info['user_province'] = $row['user_province'];
		$info['user_phone'] = $row['user_phone'];
		$info['user_pic'] =  $row['user_pic'];
		
	echo json_encode($info);
?>