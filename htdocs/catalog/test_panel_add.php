<?php
#
# Adds a new test panel to catalog in DB
#
include("redirect.php");
include("includes/db_lib.php");

foreach ($_REQUEST AS $key=>$value){
	if(preg_match("/t_type/", $key)){
		$test_type_id = explode('_', $key)[2];
		if($value == 'on'){
			$query_update = "UPDATE test_type SET is_panel = 1 WHERE test_type_id = $test_type_id";
			query_update($query_update);
		}
	}
}

header("location: test_panel_updated.php");
?>