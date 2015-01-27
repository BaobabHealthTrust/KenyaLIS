<?php
#
# Main page for printing daily patient records
#
include("redirect.php");
include("includes/db_lib.php");
include("includes/script_elems.php");
include("includes/page_elems.php");
LangUtil::setPageId("reports");

?>
<html>
<head>
<?php
$page_elems = new PageElems();
$script_elems = new ScriptElems();
$script_elems->enableJQuery();
//$script_elems->enableTableSorter();
$script_elems->enableDragTable();

$date_from = $_REQUEST['yf']."-".$_REQUEST['mf']."-".$_REQUEST['df'];
$date_to = $_REQUEST['yt']."-".$_REQUEST['mt']."-".$_REQUEST['dt'];
$lab_config_id = $_REQUEST['l'];

$uiinfo = "from=".$date_from."&to=".$date_to;
putUILog('daily_log_patients', $uiinfo, basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');

$lab_config = get_lab_config_by_id($lab_config_id);
$saved_db = DbUtil::switchToLabConfig($lab_config_id);
//$patient_list = Patient::getByAddDate($date_from);
//$patient_list = Patient::getByAddDateRange($date_from, $date_to);
$patient_list = Patient::getReportedByRegDateRange($date_from, $date_to);
$patient_list_U=Patient::getUnReportedByRegDateRange($date_from, $date_to);
//$patient_list = Patient::getByRegDateRange($date_from, $date_to);
DbUtil::switchRestore($saved_db);
$report_id = $REPORT_ID_ARRAY['reports_dailypatients.php'];
$report_config = $lab_config->getReportConfig($report_id);

$margin_list = $report_config->margins;
for($i = 0; $i < count($margin_list); $i++)
{
	$margin_list[$i] = ($SCREEN_WIDTH * $margin_list[$i] / 100);
}
?>
<script type="text/javascript" src="js/table2CSV.js"></script>
<script type='text/javascript'>
var curr_orientation = 0;
function export_as_word(div_id)
{
	var content = $('#'+div_id).html();
	$('#word_data').attr("value", content);
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
	var content = 'Reported\n' + $('#'+table_id).table2CSV({delivery:'value'}) + '\nUnreported\n' + $('#'+table_id2).table2CSV({delivery:'value'});
	$("#csv_data").val(content);
	$('#csv_format_form').submit();
}

function print_content(div_id)
{
	var DocumentContainer = document.getElementById(div_id);
	var WindowObject = window.open("", "PrintWindow", "toolbars=no,scrollbars=yes,status=no,resizable=yes");
	var html_code = DocumentContainer.innerHTML;
	var do_landscape = $("input[name='do_landscape']:checked").attr("value");
	if(do_landscape == "Y")
		html_code += "<style type='text/css'> #report_config_content {-moz-transform: rotate(-90deg) translate(-300px); } </style>";
	WindowObject.document.writeln(html_code);
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
<input type='button' onclick="javascript:export_as_csv('report_content_table5', 'report_content_table6');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTCSV']; ?>'></input>
&nbsp;&nbsp;
<!-- <input type='button' onclick="javascript:window.close();" value='<?php echo LangUtil::$generalTerms['CMD_CLOSEPAGE']; ?>'></input> -->
&nbsp;&nbsp;
<?php $page_elems->getTableSortTip(); ?>
<hr>
<div id='export_content'>
<link rel='stylesheet' type='text/css' href='css/table_print.css' />
<style type='text/css'>
	<?php $page_elems->getReportConfigCss($margin_list, false); ?>
</style>
<div id='report_config_content'>
<h3><?php echo $report_config->headerText; ?></h3>
<b><?php echo $report_config->titleText; ?></b>
<br>
<!--<?php echo LangUtil::$generalTerms['FACILITY']; ?>: <?php echo $lab_config->getSiteName(); ?>
 | -->
 <?php
 if($date_from == $date_to)
 {
	echo LangUtil::$generalTerms['DATE'].": ".DateLib::mysqlToString($date_from);
 }
 else
 {
	echo LangUtil::$generalTerms['FROM_DATE'].": ".DateLib::mysqlToString($date_from);
	echo " | ";
	echo LangUtil::$generalTerms['TO_DATE'].": ".DateLib::mysqlToString($date_to);
 }
 ?>
  
<?php
if( (count($patient_list) == 0 || $patient_list == null) && (count($patient_list_U) == 0 || $patient_list_U == null) )
{
	echo LangUtil::$pageTerms['TIPS_NONEWPATIENTS'];
	return;
}

?>
<br>
<b>Reported</b>
<?php if(count($patient_list) > 0 ) { ?>
<table class='print_entry_border' id='report_content_table5'>
<thead>
	<tr valign='top'>
		
		<?php
		if($report_config->usePatientAddlId == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['ADDL_ID']; ?></th>
		<?php
		}
		if($report_config->useDailyNum == 1)
		{
		?>
			<th><?php echo "Visit No."; ?></th>
		<?php
		}
		if($report_config->usePatientName == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['NAME']; ?></th>
		<?php
		}
		if($report_config->useAge == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['AGE']; ?></th>
		<?php
		}
		if($report_config->useGender == 1)
		{
		?>			
			<th><?php echo LangUtil::$generalTerms['GENDER']; ?></th>
		<?php
		}
		if($report_config->useDob == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['DOB']; ?></th>
		<?php 
		}
		if($report_config->useTest == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['TESTS']; ?></th>
		<?php
		}
		# Patient Custom fields here
		$custom_field_list = $lab_config->getPatientCustomFields();
		foreach($custom_field_list as $custom_field)
		{
			if(in_array($custom_field->id, $report_config->patientCustomFields))
			{	
				$field_name = $custom_field->fieldName;				
				echo "<th>";
				echo $field_name;
				echo "</th>";
			}
		}
		?>
	</tr>
</thead>
<tbody>
	<?php
	$count = 0;
	foreach($patient_list as $patient)
	{
		$count++;
		?>
		<tr>
		<?php
		if($report_config->usePatientAddlId == 1)
		{
		?>
			<td><?php echo $patient->getAddlId(); ?></td>
		<?php
		}
		if($report_config->useDailyNum == 1)
		{
		?>
			<td><?php echo $patient->getDailyNum();?></td>
		<?php
		}
		if($report_config->usePatientName == 1)
		{
		?>
			<td><?php echo $patient->name; ?></td>
		<?php
		}
		if($report_config->useAge == 1)
		{
		?>
			<td><?php echo $patient->getAge(); ?></td>
		<?php
		}
		if($report_config->useGender == 1)
		{
		?>			
			<td><?php echo $patient->sex; ?></td>
		<?php
		}
		if($report_config->useDob == 1)
		{
		?>
			<td><?php echo $patient->getDob(); ?></td>
		<?php 
		}
		if($report_config->useTest == 1)
		{
		?>
			<td><?php echo $patient->getAssociatedTests(); ?></td>
		<?php
		}
		# Patient Custom fields here
		$custom_field_list = $lab_config->getPatientCustomFields();
		foreach($custom_field_list as $custom_field)
		{
			if(in_array($custom_field->id, $report_config->patientCustomFields))
			{	
				$field_name = $custom_field->fieldName;				
				$custom_data = get_custom_data_patient_bytype($patient->patientId, $custom_field->id);
				echo "<td>";
				if($custom_data == null)
				{
					echo "-";
				}
				else
				{
					$field_value = $custom_data->getFieldValueString($lab_config->id, 2);
					if(trim($field_value) == "")
						$field_value = "-";
					echo $field_value;
				}
				echo "</td>";					
			}
		}
		?>
		</tr>
		<?php
	}
}
?>
<b><?php echo LangUtil::$pageTerms['TOTAL_PATIENTS']; ?>: <?php echo count($patient_list); ?></b>
	</tbody>
</table>
<br><br><br><br>
<b>Unreported</b>
<table class='print_entry_border draggable' id='report_content_table6'>
<?php if( count($patient_list_U) > 0 ) { ?>
<thead>
	<tr valign='top'>
		<?php
		if($report_config->usePatientAddlId == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['ADDL_ID']; ?></th>
		<?php
		}
		if($report_config->useDailyNum == 1)
		{
		?>
			<th><?php echo  "Visit No.";?></th>
		<?php
		}
		if($report_config->usePatientName == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['NAME']; ?></th>
		<?php
		}
		if($report_config->useAge == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['AGE']; ?></th>
		<?php
		}
		if($report_config->useGender == 1)
		{
		?>			
			<th><?php echo LangUtil::$generalTerms['GENDER']; ?></th>
		<?php
		}
		if($report_config->useDob == 1)
		{
		?>
			<th><?php echo LangUtil::$generalTerms['DOB']; ?></th>
		<?php 
		}
		# Patient Custom fields here
		$custom_field_list = $lab_config->getPatientCustomFields();
		foreach($custom_field_list as $custom_field)
		{
			if(in_array($custom_field->id, $report_config->patientCustomFields))
			{	
				$field_name = $custom_field->fieldName;				
				echo "<th>";
				echo $field_name;
				echo "</th>";
			}
		}
		?>
	</tr>
</thead>
<?php } ?>
<tbody>
	<?php
	$count = 0;
	foreach($patient_list_U as $patient)
	{
		$count++;
		?>
		<tr>
		
		<?php
		
		if($report_config->usePatientAddlId == 1)
		{
		?>
			<td><?php echo $patient->getAddlId(); ?></td>
		<?php
		}
		if($report_config->useDailyNum == 1)
		{
		?>
			<td><?php echo $patient->getDailyNum(); ?></td>
		<?php
		}
		if($report_config->usePatientName == 1)
		{
		?>
			<td><?php echo $patient->name; ?></td>
		<?php
		}
		if($report_config->useAge == 1)
		{
		?>
			<td><?php echo $patient->getAge(); ?></td>
		<?php
		}
		if($report_config->useGender == 1)
		{
		?>			
			<td><?php echo $patient->sex; ?></td>
		<?php
		}
		if($report_config->useDob == 1)
		{
		?>
			<td><?php echo $patient->getDob(); ?></td>
		<?php 
		}
		# Patient Custom fields here
		$custom_field_list = $lab_config->getPatientCustomFields();
		foreach($custom_field_list as $custom_field)
		{
			if(in_array($custom_field->id, $report_config->patientCustomFields))
			{	
				$field_name = $custom_field->fieldName;				
				$custom_data = get_custom_data_patient_bytype($patient->patientId, $custom_field->id);
				echo "<td>";
				if($custom_data == null)
				{
					echo "-";
				}
				else
				{
					$field_value = $custom_data->getFieldValueString($lab_config->id, 2);
					if(trim($field_value) == "")
						$field_value = "-";
					echo $field_value;
				}
				echo "</td>";					
			}
		}
		?>
		</tr>
		<?php
	}
	?><b><?php echo LangUtil::$pageTerms['TOTAL_PATIENTS']; ?>: <?php echo count($patient_list_U); ?></b>
	</tbody>
</table>

<br>
<?php # Line for Signature ?>
.............................
<h4><?php echo $report_config->footerText; ?></h4>
</div>
</div>
</div>
</body>
</html>