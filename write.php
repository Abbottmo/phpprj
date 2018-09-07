<?php
	
	$head=$_POST['head'];
	$vehicle=$_POST['vehicle'];
	$photodes=$_POST['photodes'];
	$refphotodes=$_POST['refphotodes'];
	$head=json_decode($head,TRUE);
	$vehicle=json_decode($vehicle,TRUE);
	$photodes=json_decode($photodes,TRUE);
	$refphotodes=json_decode($refphotodes,TRUE);

	//print_r($head);
	//print_r($vehicle);
	//print_r($photodes);
	//print_r($refphotodes);
	$info = array();
	$info['code'] = "1";
	$info['message'] = "成功";
	//print_r($info);
	echo json_encode($info);
	
	
	
?>