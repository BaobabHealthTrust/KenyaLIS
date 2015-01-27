<?php
#
# Adds a new test type to catalog in DB
#
include("redirect.php");
include("includes/db_lib.php");

putUILog('accept_reject_specimen', 'X', basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');
static $STATUS_REJECTED = 6;
$reasons_for_rejection = $_REQUEST['reasons'];


// Loop through the array of checked box values ...
$reason="";
$flag=0;
foreach($reasons_for_rejection as $entry){
$reason .= $entry."; ";
$flag=1;
}
if($flag==1){
$reason=rtrim($reason);
}
$specimen=$_REQUEST['specimen'];
$rejection_date=date('Y-m-d H:i:s');
$rejected_by=$_SESSION['username'];
$query = mysql_query("UPDATE specimen SET status_code_id=$STATUS_REJECTED, comments='$reason', ts_accept_reject='$rejection_date',accept_rejected_by='$rejected_by' WHERE specimen_id = $specimen") or die(mysql_error());
		if($query){
			header('Location: find_patient.php?show_sc=1');
			
		}
		else{
			echo '<div class="alert alert-error">
									<button class="close" data-dismiss="alert"></button>
									<strong>Error!</strong> The daily cronjob has failed.
								</div>';
		}
?>
