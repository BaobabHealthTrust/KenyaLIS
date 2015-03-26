<?php

	include "../includes/db_lib.php";
	
	$token = $_REQUEST['token'];

	$username = $_REQUEST['username'];
	
	$query = "SELECT cur_token FROM user WHERE username = '$username' AND COALESCE(cur_token, '') != ''";

	$cur_token = query_associative_one($query);
	
	$result = Array(false);
	
	if ($cur_token && $cur_token['cur_token'] == $token){
		
		$result = Array(true);
		
	}

	echo json_encode($result);
?>
