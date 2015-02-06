<?php

require_once "authenticate.php";

require_once "Net/HL7/Segments/MSH.php";
require_once "Net/HL7/Message.php";

$debug = false;

if(!isset($_REQUEST['hl7']) && !$debug)
{
    echo -2;
    return;
}

if(!$debug){

  $request=$_REQUEST['hl7'];
  
} else {

  $request = "MSH|^~&||KCH^2.16.840.1.113883.3.5986.2.15^ISO||KCH^2.16.840.1.113883.3.5986.2.15^ISO|20150205215555||ORU^R01^ORU_R01|20150205215555|T|2.5.1\nPID|1||P700809902584||Test Patient ||19660101|M\nPV1|\nORC||||||||||1^Super^User|||^^^^^^^^MEDICINE||||||||KCH\nTQ1|1||||||||R^Routine^HL70485\nOBR|1|||Sputum Tb microscopy^Sputum Tb microscopy^LOINC|||20150205215555||||||Rule out diagnosis|||439234^Moyo^Chris|||||||||Tested\nOBX|1|CE|263^Sputum Tb microscopy^ISO||^Present||||||F|||20150205215555||439234^Moyo^Chris|||20150205215555||||KCH Laboratory|^^Lilongwe^^^Malawi|Limula^Henry\nSPM|1|||Sputum^Sputum";
  
}

$msg  = new Net_HL7_Message($request);

$msh = $msg->getSegmentsByName("MSH");

$pid = $msg->getSegmentsByName("PID");

$orc = $msg->getSegmentsByName("ORC");

$tq1 = $msg->getSegmentsByName("TQ1");

$obr = $msg->getSegmentsByName("OBR");

$spm = $msg->getSegmentsByName("SPM");

$obx = $msg->getSegmentsByName("OBX");

$spm = $msg->getSegmentsByName("SPM");


$sendingFacility = $msh[0]->getField(4)[0];    // MSH.04

$receivingFacility = $msh[0]->getField(6)[0];  // MSH.06

$messageDatetime = $msh[0]->getField(7);    // MSH.07

$messageType = $msh[0]->getField(9)[2];        // MSH.09

$messageControlID = $msh[0]->getField(10);   // MSH.10

$processingID = $msh[0]->getField(11);       // MSH.11

$hl7VersionID = $msh[0]->getField(12);       // MSH.12

$obrSetID = $obr[0]->getField(1);           // OBR.01

$testCode = $obr[0]->getField(4)[0];           // OBR.04

$timestampForSpecimenCollection = $obr[0]->getField(7);     // OBR.07

$reasonTestPerformed = $obr[0]->getField(13);                // OBR.13

$whoOrderedTest = $obr[0]->getField(16)[2] . " " . $obr[0]->getField(16)[1] . " (" . $obr[0]->getField(1)[0] . ")";                     // OBR.16

$healthFacilitySiteCodeAndName = $orc[0]->getField(21);      // ORC.21

$pidSetID = $pid[0]->getField(1);           // PID.01

$nationalID = $pid[0]->getField(3);         // PID.03

$patientName = $pid[0]->getField(5)[1] . " " . $pid[0]->getField(5)[2] . " " . $pid[0]->getField(5)[0] . " " . $pid[0]->getField(5)[3];        // PID.05

$dateOfBirth = $pid[0]->getField(7);        // PID.07

$gender = $pid[0]->getField(8);             // PID.08

$spmSetID = $spm[0]->getField(1);           // SPM.01

$accessionNumber = $spm[0]->getField(2);    // SPM.02

$typeOfSample = $spm[0]->getField(4)[1];       // SPM.04

$tq1SetID = $tq1[0]->getField(1);           // TQ1.01

$priority = $tq1[0]->getField(9);           // TQ1.09

$enteredBy = $orc[0]->getField(10)[2] . " " . $orc[0]->getField(10)[1] . " (" . $orc[0]->getField(10)[0] . ")";          // ORC.10

$enterersLocation = $orc[0]->getField(11);   // ORC.13

$testName = $obr[0]->getField(4)[1];

$result = $obx[0]->getField(5);

$state = $obr[0]->getField(25);

$comments = null;

$record = array(
  "state" => $state,
  "location" => $enterersLocation,
  "doctor" => $whoOrderedTest,
  "date" => $messageDatetime,
  "reason" => null,
  "user_id" => $_SESSION['user_id'],
  "result" => $result,
  "comments" => $comments
);

// var_dump($record);

$result = API::update_order($record, $accessionNumber, $testName);

echo json_encode($result);
?>

