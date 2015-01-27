<?php
#
# Deletes a test category from DB
//# Sets disabled flag to true instead of deleting the record
//# This maintains info for samples that were linked to this test type previously
#

include("../includes/db_lib.php");

$saved_session = SessionUtil::save();
$saved_db = DbUtil::switchToGlobal();

$rejection_reason_id = $_REQUEST['rr'];
SpecimenRejectionReasons::deleteById($rejection_reason_id);

DbUtil::switchRestore($saved_db);
SessionUtil::restore($saved_session);

header("Location: catalog.php?show_sr=1");
?>
