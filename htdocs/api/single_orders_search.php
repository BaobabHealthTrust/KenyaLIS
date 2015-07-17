<?php

require_once "authenticate.php";
$specimen_id = $_REQUEST["specimen_id"];
$result = API::single_orders_search($specimen_id);

if($result < 1)
	echo $result;
else
	echo json_encode($result);
?>
