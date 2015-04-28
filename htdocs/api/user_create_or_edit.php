<?php

require_once "authenticate.php";

$rcd = array();
$rcd['userId'] = $_REQUEST['userId'];
$rcd['username'] = $_REQUEST['username'];
$rcd['actualName'] = $_REQUEST['actualName'];
$rcd['level'] = $_REQUEST['level'];
$rcd['labSection'] = $_REQUEST['labSection'];
$rcd['email'] = $_REQUEST['email'];
$rcd['phone'] = $_REQUEST['phone'];
$rcd['canverify'] = $_REQUEST['canverify'];
$rcd['activeStatus'] = $_REQUEST['activeStatus'];

if($_REQUEST['password']){
	$rcd['password'] = $_REQUEST['password'];
}

$result = API::user_create_or_edit($rcd);

if($result < 1)
    echo $result;
else	
	echo json_encode($result); 
?>
