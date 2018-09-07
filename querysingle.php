<?php
	
	$jkxlh=$_POST['jkxlh'];
	$requestid=$_POST['requestid'];
	
	
	$head = array();
	$head['code'] = "1";
	$head['message'] = "成功";
	$head['rownum'] = "2";
	
	$result1 = array("zpzl"=>"red","jg"=>"green","sm"=>"halou");
	$result2 = array("zpzl"=>"blue","jg"=>"qwreqt","sm"=>"halou");
	$result = array();
	array_push($result,$result1,$result2);
	//print_r($result);
	$params = array(
	 'head'=>$head,
	 'result'=>$result,
	);
	echo json_encode($params);
	//print_r($params);
		
?>