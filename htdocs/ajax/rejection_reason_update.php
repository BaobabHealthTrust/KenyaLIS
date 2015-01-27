<?php
#
# Main page for rejection phase info
# Called via Ajax from rejection_reason_edit.php
#

include("../includes/db_lib.php");
include("../lang/lang_xml2php.php");

putUILog('rejection_reason_update', 'X', basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');

$updated_entry = new SpecimenRejectionReasons();
$updated_entry->reasonId = $_REQUEST['tcid'];
$updated_entry->description = $_REQUEST['description'];
$updated_entry->phase = $_REQUEST['phase'];
$reff = 1;
update_rejection_reason($updated_entry);
# Update locale XML and generate PHP list again.
if($CATALOG_TRANSLATION === true)
	update_rejection_reason_xml($updated_entry->reasonId, $updated_entry->description);
?>