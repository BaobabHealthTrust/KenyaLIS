<?php
#
# Marks submitted results as verified, with corrections if any
# Called via ajax from verify_results.php
#

include("../includes/db_lib.php");
$result=$_REQUEST['ver_result'];
$comment=$_REQUEST['ver_comment'];
$testid=$_REQUEST['testId'];
# Helper function
# TODO: Move this to Test::verifyAndUpdate()
function verify_and_update($result, $comment, $testid)
{
global $con;
		# Update with corrections and mark as verified
		$query_verify ="UPDATE test SET comments='$comment' WHERE test_id=$testid";
mysql_query($query_verify);
}
verify_and_update($result, $comment, $testid);
?>
<div class='sidetip_nopos'>
Results verified and updated.
</div>
