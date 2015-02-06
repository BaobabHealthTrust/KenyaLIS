<?php

require_once "authenticate.php";

$debug = false;

$patient_id =  $_REQUEST['patient_id'];

$result = API::get_patient_specimen_logs($patient_id);

echo json_encode($result);
?>

