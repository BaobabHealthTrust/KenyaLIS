<?php

	include "../includes/db_lib.php";
	
	$username = $_REQUEST['username'];

	$query = "UPDATE user SET cur_token = NULL WHERE username = '$username'";

	query_update($query);
	
	echo json_encode(Array(true));
?>
