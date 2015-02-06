<?php

include "../includes/db_lib.php";

//$tok = $_REQUEST['tok'];
if(!isset($_REQUEST['npid']))
{
    echo -2;
    return;
}
$patient_id = $_REQUEST['npid'];
$result = API::get_patient_by_npid($patient_id);

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
