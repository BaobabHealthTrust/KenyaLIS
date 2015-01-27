<?php
#
# Main page for showing disease report and options to export
# Called via POST from reports.php
#
include("redirect.php");
include("includes/db_lib.php");
include("includes/stats_lib.php");
include("includes/script_elems.php");
include("includes/page_elems.php");
LangUtil::setPageId("reports");

$script_elems = new ScriptElems();
$script_elems->enableJQuery();
$script_elems->enableTableSorter();

?>
<html>
<head>	
<script type="text/javascript" src="js/table2CSV.js"></script>

<script type='text/javascript'>
var curr_orientation = 0;
function export_as_word(div_id)
{
	var html_data = $('#'+div_id).html();
	$('#word_data').attr("value", html_data);
	//$('#export_word_form').submit();
	$('#word_format_form').submit();
}

function export_as_pdf(div_id)
{
	var content = $('#'+div_id).html();
	$('#pdf_data').attr("value", content);
	$('#pdf_format_form').submit();
}

function export_as_txt(div_id)
{
	var content = $('#'+div_id).html();
	$('#txt_data').attr("value", content);
	$('#txt_format_form').submit();
}

function export_as_csv(table_id, table_id2)
{
	var content = $('#'+table_id).table2CSV({delivery:'value'}) + '\n' + $('#'+table_id2).table2CSV({delivery:'value'});
	$("#csv_data").val(content);
	$('#csv_format_form').submit();
}

function print_content(div_id)
{
	var DocumentContainer = document.getElementById(div_id);
	var WindowObject = window.open("", "PrintWindow", "toolbars=no,scrollbars=yes,status=no,resizable=yes");
	WindowObject.document.writeln(DocumentContainer.innerHTML);
	WindowObject.document.close();
	WindowObject.focus();
	WindowObject.print();
	WindowObject.close();
	//javascript:window.print();
}


$(document).ready(function(){
	$('#report_content_table5').tablesorter();
	$('#report_content_table6').tablesorter();
	$("input[name='do_landscape']").click( function() {
		change_orientation();
	});
});

function change_orientation()
{
	var do_landscape = $("input[name='do_landscape']:checked").attr("value");
	if(do_landscape == "Y" && curr_orientation == 0)
	{
		$('#report_config_content').removeClass("portrait_content");
		$('#report_config_content').addClass("landscape_content");
		curr_orientation = 1;
	}
	if(do_landscape == "N" && curr_orientation == 1)
	{
		$('#report_config_content').removeClass("landscape_content");
		$('#report_config_content').addClass("portrait_content");
		curr_orientation = 0;
	}
}

</script>
</head>
<body>
<div id='report_content'>

<link rel='stylesheet' type='text/css' href='css/table_print.css' />

<style type='text/css'>

div.editable {

	/*padding: 2px 2px 2px 2px;*/

	margin-top: 2px;

	width:900px;

	height:20px;

}



div.editable input {

	width:700px;

}

div#printhead {

position: fixed; top: 0; left: 0; width: 100%; height: 100%;

padding-bottom: 5em;

margin-bottom: 100px;

display:none;

}



@media all

{

  .page-break { display:none; }

}

@media print

{

	#options_header { display:none; }

	/* div#printhead {	display: block;

  } */

  div#docbody {

  margin-top: 5em;

  }

}



.landscape_content {-moz-transform: rotate(90deg) translate(300px); }



.portrait_content {-moz-transform: translate(1px); rotate(-90deg) }

</style>
<form name='word_format_form' id='word_format_form' action='export_word.php' method='post' target='_blank'>
	<input type='hidden' name='data' value='' id='word_data' />
	<input type='hidden' name='lab_id' value='<?php echo $lab_config_id; ?>' id='lab_id'>
</form>
<form name='pdf_format_form' id='pdf_format_form' action='export_pdf.php' method='post' target='_blank'>
	<input type='hidden' name='data' value='' id='pdf_data' />
</form>
<form name='txt_format_form' id='txt_format_form' action='export_txt.php' method='post' target='_blank'>
	<input type='hidden' name='data' value='' id='txt_data' />
</form>
<form name='csv_format_form' id='csv_format_form' action='export_csv.php' method='post' target='_blank'> 
	<input type='hidden' name='csv_data' id='csv_data'>
</form>
<input type='radio' name='do_landscape' value='N' <?php
	//if($report_config->landscape == false) echo " checked ";
	echo " checked ";
?>>Portrait</input>
&nbsp;&nbsp;
<input type='radio' name='do_landscape' value='Y' <?php
	//if($report_config->landscape == true) echo " checked ";
?>>Landscape</input>&nbsp;&nbsp;

<input type='button' onclick="javascript:print_content('export_content');" value='<?php echo LangUtil::$generalTerms['CMD_PRINT']; ?>'></input>
&nbsp;&nbsp;
<!-- <input type='button' onclick="javascript:export_as_word('export_content');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTWORD']; ?>'></input> -->
&nbsp;&nbsp;
<input type='button' onclick="javascript:export_as_pdf('export_content');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTPDF']; ?>'></input>
&nbsp;&nbsp;
<!--input type='button' onclick="javascript:export_as_txt('export_content');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTTXT']; ?>'></input>
&nbsp;&nbsp;-->
<input type='button' onclick="javascript:export_as_csv('report_content_header', 'report_content_table1');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTCSV']; ?>'></input>
&nbsp;&nbsp;
<!-- <input type='button' onclick="javascript:window.close();" value='<?php echo LangUtil::$generalTerms['CMD_CLOSEPAGE']; ?>'></input> -->
<hr>
<?php /*
<form name='export_word_form' id='export_word_form' action='export_word.php' method='post' target='_blank'>
	<input type='hidden' value='' id='word_data' name='data'></input>
</form>
*/
?>
<div id='export_content'>
<link rel='stylesheet' type='text/css' href='css/table_print.css' />
<div id='report_config_content'>
<b><?php echo LangUtil::$pageTerms['MENU_INFECTIONREPORT']; ?></b>
<br><br>
<?php
$lab_config_id = $_REQUEST['location'];
$lab_config = LabConfig::getById($lab_config_id);
if($lab_config == null)
{
	echo LangUtil::$generalTerms['MSG_NOTFOUND'];
	return;
}
$date_from = $_REQUEST['from-report-date'];
$date_to = $_REQUEST['to-report-date'];
$cat_code = $_REQUEST['cat_code'];
$uiinfo = "from=".$date_from."&to=".$date_to."&ct=".$cat_code;
putUILog('reports_disease', $uiinfo, basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');
$selected_test_ids = $lab_config->getTestTypeIds();
if($cat_code != 0)
{
	# Fetch all tests belonging to this category (aka lab section)
	$cat_test_types = TestType::getByCategory($cat_code);
	$cat_test_ids = array();
	foreach($cat_test_types as $test_type)
	$cat_test_ids[] = $test_type->testTypeId;
	//echo 'Selected IDs: '; var_dump($selected_test_ids); //echo 'CAT Test IDs: '; var_dump($cat_test_ids);
	$matched_test_ids = array_intersect($cat_test_ids, $selected_test_ids);
	//echo 'Matched IDs: '; var_dump($matched_test_ids);
	$selected_test_ids = array_values($matched_test_ids);
}

# Fetch TestType objects using selected test_type_ids.
$selected_test_types = array();
foreach($selected_test_ids as $test_type_id)
{
	$test = TestType::getById($test_type_id);
	$selected_test_types[] = $test;
}
//echo 'Selected Tests: '; var_dump($selected_test_types);

# Fetch site-wide settings
$site_settings = DiseaseReport::getByKeys($lab_config->id, 0, 0);
if($site_settings == null)
{
	echo $lab_config->getSiteName()." - ".LangUtil::$pageTerms['TIPS_CONFIGINFECTION'];
	return;
}
//echo 'Site Settings: '; var_dump($site_settings);
$age_group_list = $site_settings->getAgeGroupAsList();
?>
<table id='report_content_header' class="print_entry_border draggable">
	<tbody>
		<tr>
			<td><?php echo LangUtil::$generalTerms['FACILITY']; ?>:</td>
			<td><?php echo $lab_config->getSiteName(); ?></td>
		</tr>
		<tr>
			<td><?php echo LangUtil::$pageTerms['REPORT_PERIOD']; ?>:</td>
			<td>
			<?php
			if($date_from == $date_to)
			{
				echo DateLib::mysqlToString($date_from);
			}
			else
			{	
				echo DateLib::mysqlToString($date_from)." to ".DateLib::mysqlToString($date_to);
			}
			?>
			</td>
		</tr>
		<?php
		if($cat_code != 0)
		{
		# Specific tets category selected: Show category name in report
		?>
		<tr>
			<td><?php echo LangUtil::$generalTerms['LAB_SECTION']; ?>:</td>
			<td><?php echo get_test_category_name_by_id($cat_code) ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<?php
if(count($selected_test_types) == 0)
{
	echo LangUtil::$pageTerms['TIPS_NOTATTESTS'];
	return;
}
$table_css = "style='padding: .3em; border: 1px black solid; font-size:14px;'";
?>
<br>
<table style='border-collapse: collapse;' id='report_content_table1' class="print_entry_border draggable">
	<thead>
		<tr>
			<th><?php echo LangUtil::$generalTerms['TEST']; ?></th>
			<th ><?php echo LangUtil::$generalTerms['RESULTS']; ?></th>
			<?php
			if($site_settings->groupByGender == 1)
			{
				echo "<th >".LangUtil::$generalTerms['GENDER']."</th>";
			}
			if($site_settings->groupByAge == 1)
			{
				echo "<th >".LangUtil::$pageTerms['RANGE_AGE']."</th>";
				for($i = 1; $i < count($age_group_list); $i++)
				{
					echo "<th >".LangUtil::$pageTerms['RANGE_AGE']."</th>";
				}
			}
			if($site_settings->groupByGender == 1)
			{
				echo "<th >".LangUtil::$pageTerms['TOTAL_MF']."</th>";
			}
			?>
			<th ><?php echo LangUtil::$pageTerms['TOTAL']; ?></th>
			<th ><?php echo LangUtil::$pageTerms['TOTAL_TESTS']; ?></th>
		</tr>
		<tr>
			<th ></th>
			<th ></th>
			<?php
			if($site_settings->groupByGender == 1)
			{
				echo "<th ></th>";
			}
			
			if($site_settings->groupByAge == 1)
			{
				foreach($age_group_list as $age_slot)
				{
					echo "<th>$age_slot[0]";
					if(trim($age_slot[1]) == "+")
						echo "+";
					else
						echo " - $age_slot[1]";
					echo "</th>";
				}
			}
			if($site_settings->groupByGender == 1)
			{
				echo "<th></th>"; //echo "<th >".LangUtil::$pageTerms['TOTAL_MF']."</th>";
			}
			echo "<th ></th>";
			echo "<th ></th>";
			?>
		<tr>
	</thead>
	<tbody>
	<?php
	foreach($selected_test_types as $test)
	{
		StatsLib::setDiseaseSetList($lab_config, $test, $date_from, $date_to);
		//if ($test->name=='G6PD') var_dump(StatsLib::$diseaseSetList);
		$measures = $test->getMeasures();
		//echo 'Test='; var_dump($test); echo 'Measure='; var_dump($measures);
		foreach($measures as $measure)
		{
			$male_total = array();
			$female_total = array();
			$cross_gender_total = array();
			$curr_male_total = 0;
			$curr_female_total = 0;
			$curr_cross_gender_total = 0;
			$disease_report = DiseaseReport::getByKeys($lab_config->id, $test->testTypeId, $measure->measureId);
			
			//echo 'Disease Report: '; var_dump($disease_report);
			if($disease_report == null)
			{
				# TODO: Check for error control
				# Alphanumeric values. Hence entry not found.
				//continue;
				break;
			}
			$is_range_options = true;
			if(strpos($measure->range, "/") === false)
			{
				$is_range_options = false;
			}
			$range_values = array();
			if($is_range_options)
			{
				# Alphanumeric options
				$range_values1 = explode("/", $measure->range);
				$range_values=str_replace("#","/",$range_values1);
				
			}
			else
			{
				# Numeric ranges: Fetch ranges configured for this test-type/measure from DB
				
				$range_values = $disease_report->getMeasureGroupAsList();
			}
			$row_id = "row_".$test->testTypeId."_".$measure->measureId;
			$grand_total = 0;
			?>
			<tr valign='top' id='<?php echo $row_id; ?>'>
				<td><?php echo $test->getName(); //$measure->getName(); ?></td>
				<td>
				<?php 
				foreach($range_values as $range_value)
				{
					if($is_range_options)
						echo "$range_value<br>";
					else
						echo "Not in Normal Range:$range_value[0]-$range_value[1]<br>";
					if($site_settings->groupByGender == 1)
					{
						echo "<br>";
					}
				}
				?>
				</td>
				<?php
				if($site_settings->groupByGender == 1)
				{
					# Group by gender set to true
					echo "<td>";
					for($i = 1; $i <= count($range_values); $i++)
					{
						echo "M<br>F<br>";
					}
				}
				if($site_settings->groupByAge == 1)
				{
					# Group by age set to true: Fetch age slots from DB
					$age_slot_list = $site_settings->getAgeGroupAsList();
					foreach($age_slot_list as $age_slot)
					{
						echo "<td>";
						$range_value_count = 0;
						//echo 'Range Values: '; var_dump($range_values);
						foreach($range_values as $range_value)
						{
							$range_value_count++;
							if(!isset($male_total[$range_value_count]))
							{
								$male_total[$range_value_count] = 0;
								$female_total[$range_value_count] = 0;
								$cross_gender_total[$range_value_count] = 0;
							}
							$curr_male_total = 0;
							$curr_female_total = 0;
							$curr_cross_gender_total = 0;
							$range_type = DiseaseSetFilter::$CONTINUOUS;
							if($is_range_options == true)
								$range_type = DiseaseSetFilter::$DISCRETE;
							if($site_settings->groupByGender == 0)
							{
								# No genderwise count required.
								# Create filter
								$disease_filter = new DiseaseSetFilter();
								$disease_filter->patientAgeRange = $age_slot;
								$disease_filter->patientGender = null;
								$disease_filter->measureId = $measure->measureId;
								$disease_filter->rangeType = $range_type;
								$disease_filter->rangeValues = $range_value;
								$curr_total = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_cross_gender_total += $curr_total;
								echo "$curr_total<br>";
							}
							else
							{
								# Genderwise count required.
								# Create filter
								$disease_filter = new DiseaseSetFilter();
								$disease_filter->patientAgeRange = $age_slot;
								$disease_filter->measureId = $measure->measureId;
								$disease_filter->rangeType = $range_type;
								$disease_filter->rangeValues = $range_value;
								## Count for males.
								$disease_filter->patientGender = 'M';
								$curr_total1 = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_male_total += $curr_total1;
								## Count for females.
								$disease_filter->patientGender = 'F';
								//if ($test->name=='G6PD') {echo 'DFC='; var_dump($disease_filter);}
								$curr_total2 = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_female_total += $curr_total2;
								echo "$curr_total1<br>$curr_total2<br>";
							}
							# Build assoc list to track genderwise totals
							$male_total[$range_value_count] += $curr_male_total;
							$female_total[$range_value_count] += $curr_female_total;
							$cross_gender_total[$range_value_count] += $curr_cross_gender_total;
						}
						echo "</td>";
					}
				}
				else
				{
					# Age slots not configured: Show cumulative count for all age values
					$range_value_count = 0;
						foreach($range_values as $range_value)
						{
							$range_value_count++;
							if(!isset($male_total[$range_value_count]))
							{
								$male_total[$range_value_count] = 0;
								$female_total[$range_value_count] = 0;
								$cross_gender_total[$range_value_count] = 0;
							}
							$curr_male_total = 0;
							$curr_female_total = 0;
							$curr_cross_gender_total = 0;
							$range_type = DiseaseSetFilter::$CONTINUOUS;
							if($is_range_options == true)
								$range_type = DiseaseSetFilter::$DISCRETE;
							if($site_settings->groupByGender == 0)
							{
								# No genderwise count required.
								# Create filter
								$disease_filter = new DiseaseSetFilter();
								$disease_filter->patientAgeRange = array(0, 200);
								$disease_filter->patientGender = null;
								$disease_filter->measureId = $measure->measureId;
								$disease_filter->rangeType = $range_type;
								$disease_filter->rangeValues = $range_value;
								$curr_total = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_cross_gender_total += $curr_total;
							}
							else
							{
								# Genderwise count required.
								# Create filter
								$disease_filter = new DiseaseSetFilter();
								$disease_filter->patientAgeRange = array(0, 200);
								$disease_filter->measureId = $measure->measureId;
								$disease_filter->rangeType = $range_type;
								$disease_filter->rangeValues = $range_value;
								## Count for males.
								$disease_filter->patientGender = 'M';
								$curr_total1 = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_male_total += $curr_total1;
								## Count for females.
								$disease_filter->patientGender = 'F';
								$curr_total2 = StatsLib::getDiseaseFilterCount($disease_filter);
								$curr_female_total += $curr_total2;
							}
							# Build assoc list to track genderwise totals
							$male_total[$range_value_count] += $curr_male_total;
							$female_total[$range_value_count] += $curr_female_total;
							$cross_gender_total[$range_value_count] += $curr_cross_gender_total;
						}
				}
				
				if($site_settings->groupByGender == 1)
				{
					echo "<td>";
					for($i = 1; $i <= count($range_values); $i++)
					{
						$this_male_total = $male_total[$i];
						$this_female_total = $female_total[$i];
						echo "$this_male_total<br>$this_female_total<br>";
						$this_cross_gender_total = $this_male_total + $this_female_total;
					}
					echo "</td>";
				}
				
				echo "<td>";
				for($i = 1; $i <= count($range_values); $i++)
				{
					if($site_settings->groupByGender == 1)
					{
						echo $male_total[$i] + $female_total[$i];
						echo "<br><br>";
					}
					else
					{
						echo $cross_gender_total[$i];
						echo "<br>";
					}				
				}
				echo "</td>";
				# Grand total:
				# TODO: Check the following function for off-by-one error
				//$disease_total = StatsLib::getDiseaseTotal($lab_config, $test, $date_from, $date_to);
				//echo "<td >$disease_total</td>";
				echo "<td>";
				if($site_settings->groupByGender == 1)
				{
					echo array_sum($male_total) + array_sum($female_total);
					$grand_total = array_sum($male_total) + array_sum($female_total);
				}
				else
				{
					echo array_sum($cross_gender_total);
					$grand_total = array_sum($cross_gender_total);
				}
				echo "</td>";
				?>
			</tr>
			<?php
			if($grand_total == 0)
			{
				# Hide current table row
				?>
				<!--script type='text/javascript'>
				$(document).ready(function(){
					//$('#<?php echo $row_id; ?>').remove();
				});
				</script-->
				<?php
			}
		}
	}
	?>
	</tbody>
</table>
<br><br><br>
............................................
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#report_content_table1').tablesorter();
});
</script>
</div>
</div>
</body>
</html>