<?php
#
# Adds result for a single test
# Called via ajax from results_entry.php
#

include("../includes/db_lib.php");
include("../includes/user_lib.php");
LangUtil::setPageId("results_entry");
include("../includes/page_elems.php");
LangUtil::setPageId("results_entry");
$page_elems = new PageElems();

$test_id = $_REQUEST['tid'];
$test = Test::getById($test_id);
$test_type_id  = $test->testTypeId;
$specimen_id = $test->specimenId;
$test_name = get_test_name_by_id($test_type_id);

?>
<div class="modal-header">
	<a href="javascript:remove('<?php echo $test_id; ?>');" class="close"></a>
	<h4><i class="icon-pencil"></i> Test Result: <?php echo $test_name; ?></h4>
</div>
<div class="modal-body">
<div class="portlet box grey">
<div class="portlet-title">
<h4>Results</h4>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-advance">
<thead>
<th>
Specimen Id
</th>
<th>
Test Name
</th>
<th>
Results
</th>
<th>
Remarks
</th>
<th>
Entered by
</th>
<th>
Specimen TT
</th>
<th>
Test TT
</th>
<th>
Status
</th>
<th>
Action
</th>
</thead>
<tbody>
 <?php $page_elems->getTestInfoRow($test, true, true);
 
 $child_tests = get_child_tests($test_type_id);
 if (count($child_tests)>0){
 	foreach($child_tests as $child_test)
 	{
 		$child_test_entry = get_test_entry($specimen_id, $child_test['test_type_id']);
 			
 		$page_elems->getTestInfoRow($child_test_entry, true, true);
 		$child_tests = get_child_tests($child_test['test_type_id']);
 		if (count($child_tests)>0){
 			foreach($child_tests as $child_test)
 			{
 				$child_test_entry = get_test_entry($specimen_id, $child_test['test_type_id']);
 				$page_elems->getTestInfoRow($child_test_entry, true, true);
 			}
 		}
 	}
 }
 
 
 ?>
 
 
 </tbody>
 </table>

</div>
</div>
</div>
<div class="modal-footer">
<a href='javascript:hide_test_result_form_confirmed(<?php echo $test_id ?>);' class='btn success'>Close</a>
</div>
<script>
function verify_result(test_id, result, comments){
	var el = jQuery('.portlet .tools a.reload').parents(".portlet");
	App.blockUI(el);
	//Mark test as cancelled
		var url = 'ajax/result_entry_tests.php';
		$.post(url, 
		{a: test_id, t: 13, res: result, new_res: $('#test_result_'+test_id).val().trim(), comm: comments, new_comm: $('#test_comments_'+test_id).val().trim()}, 
		function(result) 
		{
			$('#verifydby'+test_id).removeClass('label-warning');
			$('#verifydby'+test_id).addClass('label-success');
			$('#verifybtn'+test_id).addClass('disabled');
			$('#verifydby'+test_id).html(result);
			alert('Results verified!');
			$('#span'+test_id).removeClass('label-info');
			$('#span'+test_id).text('Verified');
			$('#span'+test_id).addClass('label-success');
			$('#Link_'+test_id).removeClass('blue mini');
			$('#Link_'+test_id).attr("href", "javascript:view_test_result(<?php echo $quote.$test->testId.$quote.','.Specimen::$STATUS_VERIFIED; ?>)");
			$('#Link_'+test_id).html('<i class="icon-edit"></i> View Results');
			$('#Link_'+test_id).addClass('green mini');
			hide_test_result_form_confirmed(test_id);
			//$("tr#"+test_id).remove();
			App.unblockUI(el);
		}
		);
	
}

</script>
