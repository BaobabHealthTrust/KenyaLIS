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

$nte = $msg->getSegmentsByName("NTE");


$sendingFacility = $msh[0]->getField(4)[0];    // MSH.04

$receivingFacility = $msh[0]->getField(6)[0];  // MSH.06

$messageDatetime = $msh[0]->getField(7);    // MSH.07

$messageType = $msh[0]->getField(9)[2];        // MSH.09

$messageControlID = $msh[0]->getField(10);   // MSH.10

$processingID = $msh[0]->getField(11);       // MSH.11

$hl7VersionID = $msh[0]->getField(12);       // MSH.12

$healthFacilitySiteCodeAndName = (count($orc) > 0 ? $orc[0]->getField(21) : null);      // ORC.21

$pidSetID = (count($pid) > 0 ? $pid[0]->getField(1) : null);           // PID.01

$nationalID = (count($pid) > 0 ? $pid[0]->getField(3) : null);         // PID.03

$patientName = (count($pid) > 0 ? $pid[0]->getField(5)[1] : "") . " " . (count($pid) > 0 ? $pid[0]->getField(5)[2] : "") . " " . (count($pid) > 0 ? $pid[0]->getField(5)[0] : "") . " " . (count($pid) > 0 ? $pid[0]->getField(5)[3] : "");        // PID.05

$dateOfBirth = (count($pid) > 0 ? $pid[0]->getField(7) : null);        // PID.07

$gender = (count($pid) > 0 ? $pid[0]->getField(8) : null);             // PID.08

$spmSetID = (count($spm) > 0 ? $spm[0]->getField(1) : null);           // SPM.01

$accessionNumber = (count($spm) > 0 ? $spm[0]->getField(2) : null);    // SPM.02

$typeOfSample = (count($spm) > 0 ? $spm[0]->getField(4)[1] : null);       // SPM.04

$enteredBy = (count($orc) > 0 ? $orc[0]->getField(10)[2] : "") . " " . (count($orc) > 0 ? $orc[0]->getField(10)[1] : "") . " (" . (count($orc) > 0 ? $orc[0]->getField(10)[0] : "") . ")";          // ORC.10

$enterersLocation = (count($orc) > 0 ? $orc[0]->getField(13) : null);   // ORC.13

$tq1SetID = (count($tq1) > 0 ? $tq1[0]->getField(1) : null);           // TQ1.01

$priority = (count($tq1) > 0 ? $tq1[0]->getField(9) : null);           // TQ1.09

$obrSetID = (count($obr) > 0 ? $obr[0]->getField(1) : null);           // OBR.01

$testCode = (count($obr) > 0 ? $obr[0]->getField(4)[0] : null);           // OBR.04

$timestampForSpecimenCollection = (count($obr) > 0 ? $obr[0]->getField(7) : null);     // OBR.07

$reasonTestPerformed = (count($obr) > 0 ? $obr[0]->getField(13) : null);                // OBR.13

$whoOrderedTest = (count($obr) > 0 ? $obr[0]->getField(16)[2] : "") . " " . (count($obr) > 0 ? $obr[0]->getField(16)[1] : "") . " (" . (count($obr) > 0 ? $obr[0]->getField(1)[0] : "") . ")";                     // OBR.16

$testName = (count($obr) > 0 ? $obr[0]->getField(4)[1] : null);

$result = (count($obx) > 0 ? $obx[0]->getField(5) : null);

$state = (count($nte[0]->getField(3)) > 1 ? $nte[0]->getField(3)[0] : $nte[0]->getField(3));

$comments = (count($nte) > 0 && gettype($nte[0]->getField(3)) == "array" ? $nte[0]->getField(3)[1] : null);

$record = array(
  "state" => $state,
  "location" => $enterersLocation,
  "doctor" => $whoOrderedTest,
  "date" => $messageDatetime,
  "reason" => $reasonTestPerformed,
  "user_id" => $_SESSION['user_id'],
  "result" => $result,
  "comments" => $comments
);

$spec = get_specimens_by_accession($accessionNumber);

$patient = get_patient_by_sp_id($spec[0]->specimenId);
  
$finalResult = array(
  "sendingFacility" => $sendingFacility,
  "receivingFacility" => $receivingFacility,
  "messageDatetime" => $messageDatetime,
  "messageType" => $messageType,
  "messageControlID" => $messageControlID,
  "processingID" => $processingID,
  "hl7VersionID" => $hl7VersionID,
  "tests" => array(),
  "healthFacilitySiteCodeAndName" => $healthFacilitySiteCodeAndName,
  "pidSetID" => $pidSetID,
  "nationalID" => ($nationalID == null ? $patient->surrogateId : $nationalID),
  "patientName" => ($patientName == null ? $patient->name : $patientName),
  "dateOfBirth" => ($dateOfBirth == null ? $patient->dob : $dateOfBirth),
  "gender" => ($gender == null ? $patient->sex : $gender),
  "spmSetID" => $spmSetID,
  "accessionNumber" => $accessionNumber,
  "typeOfSample" => $typeOfSample,
  "tq1SetID" => $tq1SetID,
  "priority" => $priority,
	"whoOrderedTest" => $response["whoOrderedTest"]
);
  
// $result = API::update_order($record, $accessionNumber, $testName);

for($i = 0; $i < sizeof($obr); $i++){

	$obrSetID = $obr[$i]->getField(1);           // OBR.01

	$testCode = $obr[$i]->getField(4)[0];           // OBR.04

	$timestampForSpecimenCollection = $obr[$i]->getField(7);     // OBR.07

	$reasonTestPerformed = $obr[$i]->getField(13);                // OBR.13

	$tq1SetID = (count($tq1) > $i ? $tq1[$i]->getField(1) : null);           // TQ1.01

	$priority = (count($tq1) > $i ? $tq1[$i]->getField(9) : null);           // TQ1.09

	$obrSetID = (count($obr) > $i ? $obr[$i]->getField(1) : null);           // OBR.01

	$testCode = (count($obr) > $i ? $obr[$i]->getField(4)[0] : null);           // OBR.04

	$timestampForSpecimenCollection = (count($obr) > $i ? $obr[$i]->getField(7) : null);     // OBR.07

	$reasonTestPerformed = (count($obr) > $i ? $obr[$i]->getField(13) : null);                // OBR.13

	$whoOrderedTest = (count($obr) > $i ? $obr[$i]->getField(16)[2] : "") . " " . (count($obr) > 0 ? $obr[$i]->getField(16)[1] : "") . " (" . (count($obr) > 0 ? $obr[$i]->getField(1)[0] : "") . ")";                     // OBR.16

	$testName = (count($obr) > $i ? $obr[$i]->getField(4)[1] : null);

	$result = (count($obx) > $i ? $obx[$i]->getField(5) : null);

	// $state = (count($nte[$i]->getField(3)) > $i ? $nte[$i]->getField(3)[0] : $nte[$i]->getField(3));

	$state = (count($nte) > $i && gettype($nte[$i]->getField(3)) == "array" ? $nte[$i]->getField(3)[0] : $nte[$i]->getField(3));

	$comments = (count($nte) > $i && gettype($nte[$i]->getField(3)) == "array" ? $nte[$i]->getField(3)[1] : null);

	echo $comments;

	$set = array(
		"obrSetID" => $obrSetID,
		"testCode" => $testCode,
		"testName" => $testName,
		"timestampForSpecimenCollection" => $timestampForSpecimenCollection,
		"reasonTestPerformed" => $reasonTestPerformed,
		"enteredBy" => $enteredBy,
		"enterersLocation" => $enterersLocation,
		"result" => $result,
		"status" => $state,
		"comments" => $comments
	);
 
	$record = array(
		"state" => $state,
		"location" => $enterersLocation,
		"doctor" => $whoOrderedTest,
		"date" => $messageDatetime,
		"reason" => $reasonTestPerformed,
		"user_id" => $_SESSION['user_id'],
		"result" => $result,
		"comments" => $comments
	);

	$result = API::update_order($record, $accessionNumber, $testName);

	array_push($finalResult["tests"], $set);

}

if($result){

	echo json_encode($finalResult);
	
} else {

	echo json_encode($result);
	
}

?>

