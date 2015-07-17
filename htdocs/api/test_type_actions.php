<?php

require_once "authenticate.php";

$enable = $_REQUEST['enable'];
$tid = $_REQUEST['tid'];
$result = -2;

if ($_REQUEST['action'] == 'test_type_disable') {
	$result = API::disableTest($tid, $enable);
}

if ($_REQUEST['action'] == 'stat_counts') {
	$result = API::getTestTypeStats();
}

if ($_REQUEST['action'] == 'point_to_point_average_times') {
	$result = API::getAveragePointToPointTimes();
}

if($result < 1)
    echo $result;
else	
	echo json_encode($result); 
?>

