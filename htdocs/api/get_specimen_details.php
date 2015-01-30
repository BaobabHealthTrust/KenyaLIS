<?php

include "../includes/db_lib.php";


//$specimen_id = $_REQUEST['specimen_id'];

$rcd = array();
$rcd['department'] = $_REQUEST['department'];
$rcd['status'] = $_REQUEST['status'];
$rcd['date'] = $_REQUEST['date'];

$result = API::get_specimen_details($rcd);

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
