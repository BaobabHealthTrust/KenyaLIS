<?php

require_once "authenticate.php";

$debug = false;


$patient_id =  $_REQUEST["npid"];
$patient = get_patient_by_npid($patient_id);
$result = false;

if ($patient && $patient != NULL && $patient->patientId != ""){
    $result = API::get_patient_specimen_details($patient->patientId);
}

echo json_encode($result);
?>

