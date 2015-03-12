<?php

require_once "authenticate.php";

$rcd = array();

$rcd['department'] = $_REQUEST['department'];
$rcd['status'] = $_REQUEST['status'];
$rcd['dashboard_type'] = $_REQUEST['dashboard_type'];
$rcd['ward'] = $_REQUEST['ward'];

if ($_REQUEST['date'])
	$rcd['date'] = $_REQUEST['date'];
else
	$rcd['date'] = date('Y-m-d H:i:s');	
	
$result = API::get_specimen_details($rcd);

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
