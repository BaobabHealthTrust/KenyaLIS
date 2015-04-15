<?php

require_once "authenticate.php";

$date = date('Y-m-d H:i:s');


if ($_REQUEST['date'])
	$date = $_REQUEST['date'];

$rcd = array();

$rcd['location'] = $_REQUEST['location'];
$rcd['dashboard_type'] = $_REQUEST['dashboard_type'];
$rcd['date'] = $date;

$result = API::get_dashboard_stats($rcd);

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
