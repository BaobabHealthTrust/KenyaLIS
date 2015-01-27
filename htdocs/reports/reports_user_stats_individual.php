<?php
#
# Main page for showing disease report and options to export
# Called via POST from reports.php
#
include("redirect.php");
include("includes/db_lib.php");
include("includes/stats_lib.php");
include("includes/script_elems.php");
LangUtil::setPageId("reports");

$script_elems = new ScriptElems();
$script_elems->enableJQuery();
$script_elems->enableFlotBasic();
$script_elems->enableFlipV();
$script_elems->enableTableSorter();
$script_elems->enableLatencyRecord();
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
	var content = $('#'+table_id).table2CSV({delivery:'value'}) + '\n\n' + $('#'+table_id2).table2CSV({delivery:'value'});
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
	$('#report_content_table').tablesorter();
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
<input type='button' onclick="javascript:export_as_csv('report_content_header', 'report_content_table');" value='<?php echo LangUtil::$generalTerms['CMD_EXPORTCSV']; ?>'></input>
&nbsp;&nbsp;
	<!-- <input type='button' onclick="javascript:window.close();" value='<?php echo LangUtil::$generalTerms['CMD_CLOSEPAGE']; ?>'></input> -->
</form>
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
<b><?php echo "User Log"; ?></b>
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
$ust = new UserStats();
//echo "<pre>";
//echo "</pre>";

$log_type = $_REQUEST['log_type'];
$user_id = $_REQUEST['user_id'];
$uiinfo = "from=".$date_from."&to=".$date_to."&ud=".$user_id."&ld=".$log_type;
putUILog('reports_user_stats_individual', $uiinfo, basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');
$user_obj = get_user_by_id($user_id);
?>
<table id='report_content_header' class="print_entry_border draggable">
	<tbody>
		<tr>
			<td><?php echo LangUtil::$generalTerms['FACILITY']; ?>:</td>
			<td><?php echo $lab_config->getSiteName(); ?></td>
		</tr>
                <tr>
			<td><?php echo "User"; ?>:</td>
			<td><b><?php echo $user_obj->actualName; ?></b></td>
		</tr>
                <tr>
			<td><?php echo "User ID"; ?>:</td>
			<td><?php echo $user_obj->username; ?></td>
		</tr>
                <tr>
			<td><?php echo "Designation"; ?>:</td>
			<td><?php  
                        if ($user_obj->level == 0 || $user_obj->level == 1 || $user_obj->level == 13)
                            echo "Technician";
                        else if ($user_obj->level == 2)
                            echo "Administrator";
                        else if ($user_obj->level == 5)
                            echo "Clerk";
                        ?></td>
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
                <tr>
			<td><?php echo "Log Type"; ?>:</td>
			<td>
			<?php
                            if($log_type == 1)
                                echo "Patients Registry Log";
                            else if($log_type == 2)
                                echo "Specimens Registry Log";
                            else if($log_type == 3)
                                echo "Tests Registry Log";
                            else if($log_type == 4)
                                echo "Results Entry Log";
                            else if($log_type == 5)
                                echo "Inventory Transaction Log";
			?>
			</td>
		</tr>
		
	</tbody>
</table>
<?php
$table_css = "style='padding: .3em; border: 1px black solid; font-size:14px;'";
?>
<br>
<?php if($log_type == 1) { ?> 
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Patient Name</th>
			<th>Patient ID</th>
                        <th>Patient Number</th>
                        <th>Patient Gender</th>
                        <th>Patient Age</th>
                        <th>Date of Registration</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = $ust->getPatientRegLog($user_id, $lab_config_id,$date_from, $date_to);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            if($entry->name != '')
                                echo $entry->name; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry->surrogateId != '')
                                echo $entry->surrogateId; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php
                            $entr = $entry->getDailyNum();
                            if($entr != '')
                               echo $entr;
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry->sex != '')
                                echo $entry->sex; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $entr = $entry->getAge();
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry->regDate != '')
                               echo $entry->regDate;
                            else
                                echo '-';
                        ?>
                    </td>
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>
<?php } ?>

<?php if($log_type == 2) { ?> 
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Specimen Name</th>
			<th>Specimen ID</th>
                        <th>Patient Name</th>
                        <th>Patient ID</th>
                        <th>Date of Registration</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = $ust->getSpecimenRegLog($user_id, $lab_config_id,$date_from, $date_to);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $tname = $entry->getTypeName();
                            if($tname != '')
                                echo $tname; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry->specimenId != '')
                               echo $entry->specimenId; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php
                            $entr2 = get_patient_by_sp_id($entry->specimenId);
                            $entr = $entr2[0]->name;
                            if($entr != '')
                               echo $entr;
                           else
                                echo '-';
                        ?>
                    </td>
                 
                    <td>
                        <?php 
                            $entr = $entry->patientId;
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $entr = $entry->dateCollected;
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>
<?php } ?>


<?php if($log_type == 3) { ?> 
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Test Name</th>
			<th>Test ID</th>
                        <th>Patient Name</th>
                        <th>Patient ID</th>
                        <th>Specimen ID</th>
                        <th>Date of Registration</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = $ust->getTestRegLog($user_id, $lab_config_id,$date_from, $date_to);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $tname = get_test_name_by_id($entry->testTypeId);
                            if($tname != '')
                                echo $tname; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry->testId != '')
                               echo $entry->testId; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php
                            $entr2 = get_patient_by_sp_id($entry->specimenId);
                            $entr = $entr2[0]->name;
                            if($entr != '')
                               echo $entr;
                           else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $entr = $entr2[0]->patientId;
                            if($entr != '')
                               echo $entr;
                           else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $entr = $entry->specimenId;
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $entr = $entry->getTestRegDate();
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>
<?php } ?>


<?php if($log_type == 4) { ?> 
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Test Name</th>
			<th>Test ID</th>
                        <th>Patient Name</th>
                        <th>Patient ID</th>
                        <th>Specimen ID</th>
                        <th>Date of Result Entry</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = $ust->getResultEntryLog($user_id, $lab_config_id,$date_from, $date_to);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $tname = get_test_name_by_id($entry->testTypeId);
                            if($tname != '')
                                echo $tname; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry->testId != '')
                               echo $entry->testId; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php
                            $entr2 = get_patient_by_sp_id($entry->specimenId);
                            $entr = $entr2[0]->name;
                            if($entr != '')
                               echo $entr;
                           else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $entr = $entr2[0]->patientId;
                            if($entr != '')
                               echo $entr;
                           else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            $entr = $entry->specimenId;
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $entr = $entry->timestamp;
                            if($entr != '')
                                echo $entr; 
                            else
                                echo '-';
                        ?>
                    </td>
                    
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>
<?php } ?>

<?php if($log_type == 5) { ?> 
<b>Inventory In-Flow</b>
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Reagent</th>
			<th>Lot</th>
                        <th>Expiry Date</th>
                        <th>Manufacturer</th>
                        <th>Supplier</th>
                        <th>Quantity Supplied</th>
                        <th>Cost Per Unit</th>
                        <th>Date of Supply</th>
                        <th>Remarks</th>
                        <th>Date of Transaction</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = Inventory::get_inv_supply_by_user($lab_config_id, $user_id);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $dat = Inventory::getReagentById($lab_config_id, $entry['reagent_id']);
                            if($dat[name] != '')
                                echo $dat[name]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry[lot] != '')
                                echo $entry[lot]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php
                            
                            if($entry[expiry_date] != '')
                               echo $entry[expiry_date];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry[manufacturer] != '')
                                echo $entry[manufacturer]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry[supplier] != '')
                                echo $entry[supplier]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            
                            if($entry[quantity_supplied] != '')
                                echo $entry[quantity_supplied]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[cost_per_unit] != '')
                               echo $entry[cost_per_unit];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[date_of_reception] != '')
                               echo $entry[date_of_reception];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[remarks] != '')
                               echo $entry[remarks];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[ts] != '')
                               echo $entry[ts];
                            else
                                echo '-';
                        ?>
                    </td>
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>
<br><br>
<b>Inventory Out-Flow</b>
<table id='report_content_table' class="print_entry_border draggable">
	<thead>
		<tr>
                    <th><?php 
                        $count = 0;
                        echo "S.No.";
                    ?></th>
			<th>Reagent</th>
			<th>Lot</th>
                        <th>Quantity Used</th>
                        <th>Date of Use</th>
                        <th>Remarks</th>
                        <th>Date of Transaction</th>
		</tr>
	</thead>
	<tbody>
	<?php
        $all_entries = Inventory::get_inv_usage_by_user($lab_config_id, $user_id);
	foreach($all_entries as $entry)
	{
            ?>
            <tr>
                    <td>
                        <?php 
                            $count++;
                            echo $count; 
                        ?>
                    </td>
                    
                    <td>
                        <?php 
                            $dat = Inventory::getReagentById($lab_config_id, $entry['reagent_id']);
                            if($dat[name] != '')
                                echo $dat[name]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            if($entry[lot] != '')
                                echo $entry[lot]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                            
                            if($entry[quantity_used] != '')
                                echo $entry[quantity_used]; 
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[date_of_use] != '' && $entry[date_of_use] != '0000-00-00')
                               echo $entry[date_of_use];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[remarks] != '')
                               echo $entry[remarks];
                            else
                                echo '-';
                        ?>
                    </td>
                    <td>
                        <?php 
                           if($entry[ts] != '')
                               echo $entry[ts];
                            else
                                echo '-';
                        ?>
                    </td>
                   
            </tr>
        <?php
        }
	?>
	</tbody>
</table>

<?php } ?>


<br><br><br>
............................................
</div>
</div>
</div>
</body>
</html>