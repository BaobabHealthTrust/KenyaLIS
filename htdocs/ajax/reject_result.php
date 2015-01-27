<?php
include("redirect.php");
include('../includes/db_lib.php');
include('../includes/page_elems.php');
$reason = stripslashes($_REQUEST['rej_reason']);
$specimen_id = $_REQUEST['spec'];
$test = $_REQUEST['tname'];
$test_type_id = $_REQUEST['ttype'];
//echo $specimen_id." ".$reasons." ".$test;	
 reject_test($specimen_id, $test_type_id, $reason);
 header('location:../');
// header('location:../results/results_entry.php?prompt#tests');
?>