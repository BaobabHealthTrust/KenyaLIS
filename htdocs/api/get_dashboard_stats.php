<?php

require_once "authenticate.php";

$date = date('Y-m-d H:i:s');

if ($_REQUEST['date'])
	$date = $_REQUEST['date'];
	
$result = API::get_dashboard_stats($date);

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
