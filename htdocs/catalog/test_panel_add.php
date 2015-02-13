<?php
#
# Adds a new test panel to catalog in DB
#
include("redirect.php");
include("includes/db_lib.php");
$ky = null;
foreach ($_REQUEST AS $key=>$value){
	if(preg_match("/tp_type/", $key)){
		$test_type_id = explode('_', $key)[2];
		$ky = $test_type_id;
		if($value == 'on'){
			$query_update = "UPDATE test_type SET is_panel = 1 WHERE test_type_id = $test_type_id";
			query_update($query_update);
		}
	}
}

if ($ky != null){
	header("location: test_panel_edit.php?tid=$ky");
}else {
	header("location: catalog.php?show_tp=1");
}
?>