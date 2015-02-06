<?php

require_once "authenticate.php";

require_once "Net/HL7/Segments/MSH.php";
require_once "Net/HL7/Message.php";

$debug = false;

$debugPrint = false;

if(!isset($_REQUEST['hl7']) && !$debug)
{
    echo -2;
    return;
}

if(!$debug){

  $request=$_REQUEST['hl7'];
  
} else {

  $request = "MSH|^~&||KCH^2.16.840.1.113883.3.5986.2.15^ISO||KCH^2.16.840.1.113883.3.5986.2.15^ISO|20150126145826||OML^O21^OML_O21|20150126145826|T|2.5\r\nPID|1||P17020012293||Kenneth^Kapundi||19641004|M\r\nORC||||||||||1^Super^User|||^^^^^^^^MEDICINE||||||||KCH\r\nTQ1|1||||||||S\r\nOBR|1|||626-2^MICROORGANISM IDENTIFIED:PRID:PT:THRT:NOM:THROAT CULTURE^LOINC^78335^Throat Culture^L|||20150126145826||||||Rule out diagnosis|||439234^Moyo^Chris\r\nSPM|1|||^Urine";
  
}

$msg  = new Net_HL7_Message($request);

$msh = $msg->getSegmentsByName("MSH");

$pid = $msg->getSegmentsByName("PID");

$orc = $msg->getSegmentsByName("ORC");

$tq1 = $msg->getSegmentsByName("TQ1");

$obr = $msg->getSegmentsByName("OBR");

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

if($debugPrint && false){

  echo "sendingFacility: $sendingFacility<br />";

  echo "receivingFacility: $receivingFacility<br />";

  echo "messageDatetime: $messageDatetime<br />";

  echo "messageType: $messageType<br />";

  echo "messageControlID: $messageControlID<br />";

  echo "processingID: $processingID<br />";

  echo "hl7VersionID: $hl7VersionID<br />";

  echo"obrSetID: $obrSetID<br />";

  echo "testCode: $testCode<br />";

  echo "timestampForSpecimenCollection: $timestampForSpecimenCollection<br />";

  echo "reasonTestPerformed: $reasonTestPerformed<br />";

  echo "whoOrderedTest: $whoOrderedTest<br />";

  echo "healthFacilitySiteCodeAndName: $healthFacilitySiteCodeAndName<br />";

  echo "pidSetID: $pidSetID<br />";

  echo "nationalID: $nationalID<br />";

  echo "patientName: $patientName<br />";

  echo "dateOfBirth: $dateOfBirth<br />";

  echo "gender: $gender<br />";

  echo "spmSetID: $spmSetID<br />";

  echo "accessionNumber: $accessionNumber<br />";

  echo "typeOfSample: $typeOfSample<br />";

  echo "tq1SetID: $tq1SetID<br />";

  echo "priority: $priority<br />";

  echo "enteredBy: $enteredBy<br />";

  echo "enterersLocation: $enterersLocation<br />";
  
}

$accessionNumber = null;

if ($debug){

  $accessionNumber = rand();
  
}

$result = array(
  "sendingFacility" => $sendingFacility,
  "receivingFacility" => $receivingFacility,
  "messageDatetime" => $messageDatetime,
  "messageType" => $messageType,
  "messageControlID" => $messageControlID,
  "processingID" => $processingID,
  "hl7VersionID" => $hl7VersionID,
  "obrSetID" => $obrSetID,
  "testCode" => $testCode,
  "timestampForSpecimenCollection" => $timestampForSpecimenCollection,
  "reasonTestPerformed" => $reasonTestPerformed,
  "whoOrderedTest" => $whoOrderedTest,
  "healthFacilitySiteCodeAndName" => $healthFacilitySiteCodeAndName,
  "pidSetID" => $pidSetID,
  "nationalID" => $nationalID,
  "patientName" => $patientName,
  "dateOfBirth" => $dateOfBirth,
  "gender" => $gender,
  "spmSetID" => $spmSetID,
  "accessionNumber" => $accessionNumber,
  "typeOfSample" => $typeOfSample,
  "tq1SetID" => $tq1SetID,
  "priority" => $priority,
  "enteredBy" => $enteredBy,
  "enterersLocation" => $enterersLocation
);

if (!$debug){

  $response = API::create_order($result);
  
} else {

  $response = $result;

}

echo json_encode($response);
?>

