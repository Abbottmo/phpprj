<?php 
	session_start();
	//包含数据库连接文件
	include('../connect/connect.php');
	
	$user_id = $_GET['user_id'];
	$item = $_GET['item'];
	$data = $_GET['data'];
		//昵称
		if($item==1){
		$update_user_sql = "UPDATE `user` SET `user_nickname`='$data' WHERE `user_id`='$user_id'";
		}	
		//姓名
		if($item==2){
		$update_user_sql = "UPDATE `user` SET `user_realname`='$data' WHERE `user_id`='$user_id'";
		}	
		//生日
		if($item==3){
		$update_user_sql = "UPDATE `user` SET `user_birth`='$data' WHERE `user_id`='$user_id'";
		}	
		//性别
		if($item==4){
		$update_user_sql = "UPDATE `user` SET `user_sex`='$data' WHERE `user_id`='$user_id'";
		}	
		//所在地
		if($item==5){
		$province = $_GET['province'];
		$update_user_sql = "UPDATE `user` SET `user_city`='$data',`user_province`='$province' WHERE `user_id`='$user_id'";
		}	
		//照片
		if($item==6){
		$update_user_sql = "UPDATE `user` SET `user_pic`='$data' WHERE `user_id`='$user_id'";
		}	
				
		if( $update_user_query = mysqli_query($con, $update_user_sql)){
				$info['Msg']='已保存';
			}
			else{
				$info['Msg']='Fail';
			}
	echo json_encode($info);
?>