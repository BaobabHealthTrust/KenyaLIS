<?php

require_once "authenticate.php";

$enable = $_REQUEST['enable'];
$tid = $_REQUEST['tid'];
$result = -2;

if ($_REQUEST['action'] == 'test_type_disable') {
	$result = API::disableTest($tid, $enable);
}

if($result < 1)
    echo $result;
else	
	echo json_encode($result); 
?>

