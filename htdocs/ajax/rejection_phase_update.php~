<?php
#
# Main page for rejection phase info
# Called via Ajax from rejection_phase_edit.php
#

include("../includes/db_lib.php");
include("../lang/lang_xml2php.php");

putUILog('rejection_phase_update', 'X', basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');

$updated_entry = new SpecimenRejectionPhases();
$updated_entry->phaseId = $_REQUEST['tcid'];
$updated_entry->name = $_REQUEST['name'];
$updated_entry->description = $_REQUEST['description'];
$reff = 1;
update_rejection_phase($updated_entry);
# Update locale XML and generate PHP list again.
if($CATALOG_TRANSLATION === true)
	update_rejection_phase_xml($updated_entry->phaseId, $updated_entry->name);
?>