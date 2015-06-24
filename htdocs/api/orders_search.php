<?php

require_once "authenticate.php";

$search_string = '';

if ($_REQUEST['search_string'])
	$search_string = $_REQUEST['search_string'];

$result = API::orders_search($search_string);

if($result < 1)
	echo $result;
else
	echo json_encode($result);
?>
