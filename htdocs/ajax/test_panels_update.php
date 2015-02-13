<?php
#
# Main page for updating specimen type info
# Called via Ajax from specimen_type_edit.php
#

include("../includes/db_lib.php");


$tid = $_REQUEST['tid'];
$query_delete = "DELETE FROM test_panel WHERE parent_test_type_id = $tid";
query_delete($query_delete);

foreach ($_REQUEST AS $key=>$value){
	if(preg_match("/tp_type/", $key)){
		$child_test_type_id = explode('_', $key)[2];
		if($value == 'on'){
			$query_insert = "INSERT INTO test_panel(parent_test_type_id, child_test_type_id) VALUES($tid, $child_test_type_id)";
			query_insert_one($query_insert);
		}
	}
}

?>
