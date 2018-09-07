<?php
	
	include('connect.php');
	$id =$_GET['image_id'];
	$sql = "SELECT * FROM image_tbl WHERE image_id='".$id."'";
	$retval = mysqli_query($con, $sql);
		
	//echo $id;
	if(! $retval )
	{
		die('无法读取数据: ' . mysqli_error($conn));
		exit;
	}
	else{
		$row = mysqli_fetch_array($retval);
		
		$info = array();
		$info['image_id'] = $row['image_id'];
		$info['return_value'] = $row['return_value'];
		//$info['image_path'] = $row['image_path'];
		$info['submission_date'] = $row['submission_date'];
		//$info = json_encode($info);
		echo json_encode($info);
		
	}
	mysqli_free_result($retval);
	mysqli_close($con);
?>