<?php
#
# Deletes a test category from DB
//# Sets disabled flag to true instead of deleting the record
//# This maintains info for samples that were linked to this test type previously
#

include("../includes/db_lib.php");

$saved_session = SessionUtil::save();
$saved_db = DbUtil::switchToGlobal();

$test_panel_id = $_REQUEST['tpid'];

$query_delete_nodes = "DELETE FROM test_panel WHERE parent_test_type_id = $test_panel_id";
$query_update_panel = "UPDATE test_type SET is_panel = 0 WHERE test_type_id = $test_panel_id";

query_delete($query_delete_nodes);
query_update($query_update_panel);

DbUtil::switchRestore($saved_db);
SessionUtil::restore($saved_session);

header("Location: catalog.php?show_tp=1");
?>
