<?php
#
# Main page for updating specimen type info
# Called via Ajax from specimen_type_edit.php
#

include("../includes/db_lib.php");
$return;

$tid = $_REQUEST['tid'];
$query_delete = "DELETE FROM test_type_container_type WHERE test_type_id = $tid";
query_delete($query_delete);

foreach ($_REQUEST AS $key=>$value){
	if(preg_match("/tct_type/", $key)){
		$container_type_id = explode('_', $key)[2];
		if($value == 'on'){
			$query_insert = "INSERT INTO test_type_container_type(test_type_id, container_type_id) VALUES($tid, $container_type_id)";
			query_insert_one($query_insert);
		}
	}
}
echo $return;
?>
