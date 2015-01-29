<?php

include("../includes/Net/HL7/Message.php");
include("../includes/Net/HL7/Types/Types.php");


# parse an OML_O21 message

if(!isset($_REQUEST['hl7']))
{
    echo -2;
    return;
}


// WHEN DONE WITH TESTING UNCOMMENT THIS LINE
//$omlString=$_REQUEST['hl7'];

// WHEN DONE WITH TESTING COMMENT OUT THIS LINE
$omlString="MSH|^~&||KCH^2.16.840.1.113883.3.5986.2.15^ISO||KCH^2.16.840.1.113883.3.5986.2.15^ISO|20150126145826||OML^O21^OML_O21|20150126145826|T|2.5\rPID|1||P17000012293||Doe^John^Q^Jr||19641004|M\rORC||||||||||1^Super^User|||^^^^^^^^MEDICINE||||||||KCH\rTQ1|1||||||||S\rOBR|1|||626-2^MICROORGANISM IDENTIFIED:PRID:PT:THRT:NOM:THROAT CULTURE^LOINC^78335^Throat Culture^L|||20150126145826||||||Rule out diagnosis|||439234^Moyo^Chris\rSPM|1|||THRT^Throat\r";

$omlMsg = new Net_HL7_Message($omlString);

$sendingFacility = (new Net_HL7_Types_XON($omlMsg->getSegmentByName("MSH")->getField(4)))->getUniversalId();
$receivingFacility =  (new Net_HL7_Types_XON($omlMsg->getSegmentByName("MSH")->getField(6)))->getUniversalId();
$patientId = (new Net_HL7_Types_CX($omlMsg->getSegmentByName("PID")->getField(3)))->getIdNumber();
$patientName = $omlMsg->getSegmentByName("PID")->getField(5);
$patientDateOfBirth = $omlMsg->getSegmentByName("PID")->getField(7);
$gender = $omlMsg->getSegmentByName("PID")->getField(8)[0];
$messageType = $omlMsg->getSegmentByName("MSH")->getField(9)[2];
$processingId = $omlMsg->getSegmentByName("MSH")->getField(11)[0];
$labAccessionNumber = $omlMsg->getSegmentByName("SPM")->getFields(2)[0];
$typeOfSample = $omlMsg->getSegmentByName("SPM")->getField(4)[0];
$priority = $omlMsg->getSegmentByName("TQ1")->getField(9);
$enterer = $omlMsg->getSegmentByName("ORC")->getField(10);
$entererLocation = $omlMsg->getSegmentByName("ORC")->getField(13);
$testCode = $omlMsg->getSegmentByName("OBR")->getField(4)[0];
$sampleTimeStamp = $omlMsg->getSegmentByName("OBR")->getField(7);
$reasonPerformed = $omlMsg->getSegmentByName("OBR")->getField(13);
$orderer = $omlMsg->getSegmentByName("OBR")->getField(16);
$facilitySiteCode = $omlMsg->getSegmentByName("ORC")->getField(21);



// COMMENT OUT THE FOLLOWING LINES WHEN DONE TESTING
echo "Sending Facility: " . $sendingFacility ."<br/>\n";
echo "Receiving Facility: " . $receivingFacility ."<br/>\n";
echo "Patient ID: " . $patientId ."<br/>\n";
echo "Patient Name:" . $patientName . "<br/>\n";
echo "Date of Birth: " . $patientDateOfBirth . "<br/>\n";
echo "Gender: " . $gender . "<br\>\n";
echo "Message Type: " . $messageType . "<br/>\n";
echo "Processing ID: " . $processingId . "<br/>\n";
echo "Lab ID / Accession Number: " . $labAccessionNumber . "<br/>\n";
echo "Type of Sample: " . $typeOfSample . "<br/>\n";
echo "Priority: " . $priority . "<br/>\n";
echo "EntererName: " . $enterer . "<br/>\n";
echo "Enterer's Location: " .$entererLocation . "<br/>\n";
echo "Test Code: " . $testCode . "<br/>\n";
echo "Timestamp of when sample collected: " . $sampleTimeStamp . "<br/>\n";
echo "Reason test performed: " . $reasonPerformed . "<br/>\n";
echo "Who ordered the test: " . $orderer . "<br/>\n";
echo "Health Facility Site Code and Name: " . $facilitySiteCode . "<br/>\n";


// ADD YOUR DATABASE CREATE ORDER CODE HERE USING THE VARIABLES ABOVE


?>