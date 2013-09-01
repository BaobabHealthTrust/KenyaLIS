<?php
#
# Returns specimen result entry form
# Called via ajax from results_entry.php
#

include("../includes/db_lib.php");
include("../includes/page_elems.php");
include("../includes/ajax_lib.php");
include("../includes/user_lib.php");
LangUtil::setPageId("results_entry");
//$page_elems = new PageElems();

function get_result_form($test_type, $test_id, $num_tests, $patient)
{
	#Returns HTML form elements for given test type results
	global $form_id_list, $specimen_id, $page_elems;

	$curr_form_id = 'test_'.$test_type->testTypeId;
	$form_id_list[] = $curr_form_id;
	?>
	<form name='<?php echo $curr_form_id; ?>' id='<?php echo $curr_form_id; ?>' action='' method=''>
	<input type='hidden' name='test_id' value='<?php echo $test_id; ?>'></input>
	<input type='hidden' name='specimen_id' value='<?php echo $specimen_id; ?>'></input>
	<?php
	# Fetch all measures for this test
	$measure_list = $test_type->getMeasures();
    
	$submeasure_list = array();
    $comb_measure_list = array();

    foreach($measure_list as $measure)
    {	
    	$submeasure_list = $measure->getSubmeasuresAsObj();
    	
    	$submeasure_count = count($submeasure_list);
        if($measure->checkIfSubmeasure() == 1)
        {
        	continue;
        }
        if($submeasure_count == 0)
        {
        	array_push($comb_measure_list, $measure);
        }
        else
        {
        	array_push($comb_measure_list, $measure);
        	foreach($submeasure_list as $submeasure)
        		array_push($comb_measure_list, $submeasure); 
        }
    }
    $measure_list = $comb_measure_list;
    
    # Create form element for each measure
    $count = 0;
    foreach($measure_list as $measure)
	{
		$input_id = 'measure_'.$test_type->testTypeId."_".$count;
		$decName = "";
		if($measure->checkIfSubmeasure() == 1)
		{
			$decName = $measure->truncateSubmeasureTag();
			$decName.":";
		}
		else
		{
			$decName = $measure->getName().":";
		}
		?>
		<label for='<?php echo $input_id; ?>'><?php echo $decName; echo "\n"; ?></label>
		<?php
		$range = $measure->range;
		$range_type = $measure->getRangeType();
		$range_values = $measure->getRangeValues($patient);
		
		if($range_type == Measure::$RANGE_OPTIONS)
		{
		?>
			<select name='result[]' id='<?php echo $input_id; ?>' class='uniform_width' onchange="javascript:update_remarks(<?php echo $test_type->testTypeId; ?>, <?php echo count($measure_list); ?> ,<?php //echo $patient->getAgeNumber(); ?>, '<?php //echo $patient->sex;?>');">
			<option></option>
			<?php
			foreach($range_values as $option)
			{
				$option= str_replace('#', '/', $option);
				?>
				<option value='<?php echo $option; ?>'><?php echo str_replace('#', '/', $option); ?></option>
				<?php
			}
			?>
			</select>
		<?php
		}
		else if($range_type == Measure::$RANGE_NUMERIC)
		{
			# Continuous value range
			//$age=$patient->getAgeNumber();
			?>
			<input class='uniform_width' type='text' name='result[]' id='<?php echo $input_id; ?>' onchange="javascript:update_remarks1();"></input>
			<span id='<?php echo $input_id; ?>_range'>
			&nbsp;(<?php 
			$unit=$measure->unit;
			if(stripos($unit,",")!=false)
		{	
			$units=explode(",",$unit);
			$lower_parts=explode(".",$range_values[0]);
			$upper_parts=explode(".",$range_values[1]);
			if($lower_parts[0]!=0)
			{
			echo $lower_parts[0];
			echo $units[0];
			}
			if($lower_parts[1]!=0)
			{
			echo $lower_parts[1];
			echo $units[1];
			}
			?>-<?php
			if($upper_parts[0]!=0)
			{
			echo $upper_parts[0];
			echo $units[0];
			}
			if($upper_parts[1]!=0)
			{
			echo $upper_parts[1];
			echo $units[1];
			}
?>)<?php
		}else
		{	if(stripos($unit,":")!=false)
				{		
			$units=explode(":",$unit);
			echo $range_values[0]; ?><sup><?php echo $units[0] ?></sup>-<?php echo $range_values[1];?><sup><?php echo $units[0] ?></sup>)
		<?php 
	}
		else
		{
		echo $range_values[0]; ?>-<?php echo $range_values[1];?>)<?php } ?>
		</span>
			<?php
			}
		}
		else if($range_type == Measure::$RANGE_AUTOCOMPLETE)
		{
			# Autocomplete values
			# Use jquery.token-input plugin
			$url_string = "ajax/measure_autocomplete.php?id=".$measure->measureId;
			$hint_text = "Type to enter results";
			echo "<div>";
			$page_elems->getTokenList($count, $input_id, "result[]", $url_string, $hint_text,"");
			echo "</div>";
			
		}
                else if($range_type == Measure::$RANGE_FREETEXT)
		{
                        # Text box
                    echo "<div>";
                        echo "<textarea name='result[]' id='$input_id' class='uniform_width results_entry'></textarea>";
                    echo "</div>";
                                	
		}
		if(stripos($measure->unit,":")!=false)
		{
		$units=explode(":",$measure->unit);
		echo $units[1];
		}else
		if(stripos($measure->unit,",")===false)
		echo $measure->unit;
		
		if($num_tests > 1 && $count == 0)
		{
			# Checkbox to skip results for this test type
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<small>
			<input type='checkbox' id='<?php echo $curr_form_id; ?>_skip' title='Tick this box if results are not yet available and are to be entered later' onclick="javascript:toggle_form('<?php echo $curr_form_id; ?>', this);">
			<?php echo LangUtil::$generalTerms['CMD_SKIP']; ?>
			</input>
			</small>
			<?php
		}
		echo "<br>";
		$count++;
	}
	?>
	<table><tr><td>
	<label for='<?php echo $curr_form_id; ?>_comments'>
		Result Interpretation
	</label></td><td>
	<span id='<?php echo $curr_form_id; ?>_comments_span'>
		<textarea name='comments' id='<?php echo $curr_form_id; ?>_comments'  class='uniform_width'  onfocus="javascript:update_remarks(<?php echo $test_type->testTypeId; ?>, <?php echo count($measure_list); ?>, <?php // echo $patient->getAgeNumber(); ?>, '<?php // echo $patient->sex;?>');" ></textarea>
		<textarea name='comments' id='tester'  class='uniform_width'></textarea>
	</span></td><tr><td>
	<label for='<?php echo $curr_form_id; ?>_comments_1'>
		<?php echo LangUtil::$generalTerms['RESULT_COMMENTS']; ?> (<?php echo LangUtil::$generalTerms['OPTIONAL']; ?>)
	</label></td><td>
	<span id='<?php echo $curr_form_id; ?>_comments_span'>
		<textarea name='comments_1' id='<?php echo $curr_form_id; ?>_comments_1'  class='uniform_width'></textarea>
	</td></tr>
	<tr>
	<td>
	<label for='<?php echo $curr_form_id; ?>_date_1'>
		Date of Entry
	</label>
	</td>
	<td>
	
	</td>
	</tr>
	</table>
	</form>
	
	<?php
}

$form_id_list = array();
$test_id = $_REQUEST['tid'];

if($test_id == "")
{
	echo "<span class='error_string'>".LangUtil::$generalTerms['SPECIMEN_ID']."  ".$test_id." ".LangUtil::$generalTerms['MSG_NOTFOUND'].".</span>";
	return;
}
?>
<?php
//$specimen = get_specimen_by_id($specimen_id);
//$patient = Patient::getById($specimen->patientId);
$test_type_id = get_test_type_id_from_test_id($test_id);
if($test_id == null)
{
	echo "<span class='error_string'>".LangUtil::$generalTerms['SPECIMEN_ID']."  ".$test_id." ".LangUtil::$generalTerms['MSG_NOTFOUND'].".</span>";
	return;
}
// if($specimen->statusCodeId == Specimen::$STATUS_DONE)
// {
// 	?>
	<!-- <div class='sidetip_nopos' style='width:350px;'--> 
	<?php 
// 	echo LangUtil::$pageTerms['MSG_ALREADYENTERED']."- ";
// 	if($_SESSION['sid'] != 0)
// 	{
// 		echo "<br>";
// 		echo LangUtil::$generalTerms['SPECIMEN_ID'].": ";
// 		echo $specimen->getAuxId();
// 	}
// 	echo "<br>";
// 	echo LangUtil::$generalTerms['SPECIMEN_TYPE'].": ".get_specimen_name_by_id($specimen->specimenTypeId);
// 	echo "<br>";
// 	//if($_SESSION['pnamehide'] == 0)
// 	if($_SESSION['user_level'] == $LIS_TECH_SHOWPNAME)
// 	{
// 		echo LangUtil::$generalTerms['PATIENT'].": $patient->name ($patient->sex ".$patient->getAgeNumber().") <br>";
// 	}
// 	else
// 	{
// 		echo LangUtil::$generalTerms['GENDER']."/".LangUtil::$generalTerms['AGE'].": $patient->sex /".$patient->getAgeNumber()."<br>";
// 	}
// 	?>
<!--<br><a href='specimen_info.php?sid=<?php echo $specimen->specimenId; ?>'> <?php echo LangUtil::$generalTerms['DETAILS']; ?> &raquo;</a>
 	</div> -->
	<?php
// 	return;
// }

# Print HTML results form
//$test_list = get_tests_by_specimen_id($specimen->specimenId);
//$patient = get_patient_by_id($specimen->patientId);
?>
<?php 
$test_type = get_test_type_by_id($test_type_id);
?>	
<div class="modal-header">
	<a href="javascript:remove('<?php echo $test_id; ?>');" class="close"></a>
	<h4><i class="icon-pencil"></i> Results form - <?php echo $test_type->getName(); ?></h4>
</div>
<div class="modal-body">
	<?php 		
	get_result_form($test_type, $test->testId, 0, null);
	?>
</div>
<div class="modal-footer">
	<input type='button' class="btn" value='<?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?>' onclick='javascript:submit_forms(<?php echo $test_id ?>);'></input>
	<a href='javascript:hide_test_result_form(<?php echo $test_id ?>);' class='btn'><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
</div>
<input type='hidden' id='form_id_list' value='<?php echo implode(",", $form_id_list); ?>'></input>

<div id="stack2" class="modal hide fade" tabindex="-1" data-focus-on="input:first">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3>Stack Two</h3>
  </div>
  <div class="modal-body">
    <p>One fine body…</p>
    <p>One fine body…</p>
    <input type="text" data-tabindex="1">
    <input type="text" data-tabindex="2">
    <button class="btn" data-toggle="modal" href="#stack3">Launch modal</button>
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn">Close</button>
    <button type="button" class="btn btn-primary">Ok</button>
  </div>
</div>