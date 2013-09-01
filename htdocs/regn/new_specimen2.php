<?php
#
# Main page for registering new specimen(s) in a single session/accession
#

include("redirect.php");
require_once("includes/db_lib.php");
require_once("includes/page_elems.php");
require_once("includes/script_elems.php");
require_once("includes/user_lib.php");
$page_elems = new PageElems();
$script_elems = new ScriptElems();

LangUtil::setPageId("new_specimen");

$script_elems->enableDatePicker();
$script_elems->enableLatencyRecord();
$script_elems->enableJQueryForm();
$script_elems->enableAutocomplete();
$pid = $_REQUEST['pid'];

if(isset($_REQUEST['dnum']))
	$dnum = (string)$_REQUEST['dnum'];
else
	$dnum = get_daily_number();

if(isset($_REQUEST['session_num']))
	$session_num = $_REQUEST['session_num'];
else
	$session_num = get_session_number();
	
/* check discrepancy between dnum and session number and correct 
if ( substr($session_num,strpos($session_num, "-")+1 ) )
	$session_num = substr($session_num,0,strpos($session_num, "-"))."-".$dnum;
*/
	
$doc_array= getDoctorList();
$php_array= addslashes(implode("%", $doc_array));
	
$uiinfo = "pid=".$_REQUEST['pid']."&dnum=".$_REQUEST['dnum'];
putUILog('new_specimen', $uiinfo, basename($_SERVER['REQUEST_URI'], ".php"), 'X', 'X', 'X');
?>
	<script>
  $(document).ready(function(){
//var data = "Core Selectors Attributes Traversing Manipulation CSS Events Effects Ajax Utilities".split(" ");
var data_string="<?php echo $php_array;?>";
var data=data_string.split("%"); 
$("#doc_row_1_input").autocomplete(data);
  });
  </script>
  <script>
	App.init(); // init the rest of plugins and elements
</script>
<script>
// <!-- <![CDATA[
specimen_count = 1;
patient_exists = false;
$(document).ready(function(){
	$('#specimen_id').focus();
	$('a[rel*=facebox]').facebox()
	<?php
	if(isset($_REQUEST['pid']))
	{
		echo "; get_patient_info('".$pid."');";
		echo " patient_exists = true;";
	}
	?>
});

function get_patient_info()
{
	var patient_id = <?php echo $_REQUEST['pid']; ?>;//$("#card_num").val();
	if(patient_id == "")
	{
		$('#specimen_patient').html("");
		return;
	}
	$('#specimen_patient').load(
		"ajax/patient_info.php", 
		{
			pid: patient_id
		}, 
		function(){
			var return_html = $('#specimen_patient').html();
			if(return_html.indexOf("<?php echo LangUtil::$generalTerms['PATIENT']." ".LangUtil::$generalTerms['MSG_NOTFOUND']; ?>") == -1)
				patient_exists = true;
			else
				patient_exists = false;
		}
	);
}

function check_specimen_id(specimen_div_id, err_div_id)
{
	var specimen_id = $('#'+specimen_div_id).val();
	if(specimen_id == "")
	{	
		$('#'+err_div_id).html("");
		return;
	}
	if(isNaN(specimen_id))
	{
		var msg_string = "<small><font color='red'>"+"Invalid ID. Only numbers allowed.</font></small>";
		$('#'+err_div_id).html(msg_string);
		return;
	}
	$('#'+err_div_id).load(
		"ajax/specimen_check_id.php", 
		{ 
			sid: specimen_id
		}
	);
}

function contains(a, obj){
  for(var i = 0; i < a.length; i++) {
    if(a[i] === obj){
      return true;
    }
  }
  return false;
}

function set_compatible_tests()
{
	var specimen_type_id = $("#s_type").val();
	if(specimen_type_id == "")
	{	
		$('#test_type_box').html("Select specimen type to view compatible tests");
		return;
	}
	$('#test_type_box').load(
		"ajax/test_type_options.php", 
		{
			stype: specimen_type_id
		}
	);
}

function add_specimens()
{
	for(var j = 1; j <= specimen_count; j++)
	{
		// Validate each form
		var form_id = 'specimenform_'+j;
		var form_elem = $('#'+form_id);
		if(	form_elem == undefined || 
			form_elem == null )
			continue;
		if(	$("#"+form_id+" [name='stype']").val() == null || 
			$("#"+form_id+" [name='stype']").val() == undefined )
			continue;
		var stype = $("#"+form_id+" [name='stype']").val();
		if(stype.trim() == "")
		{
			alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_STYPE_MISSING']; ?>");
			return;
		}
		var ttype_list = $("#"+form_id+" [name='t_type_list[]']");
		var ttype_notselected = true;
		for(var i = 0; i < ttype_list.length; i++)
		{
			if(ttype_list[i].checked)
			{
				ttype_notselected = false;
				break;
			}
		}
		if(ttype_notselected == true)
		{
			alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_NOTESTS_SELECTED']; ?>");
			return;
		}
		var sid = $("#"+form_id+" [name='specimen_id']").val();
		if(sid.trim() == "")
		{
			alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_SID_MISSING']; ?>");
			return;
		}
		var specimen_valid = $("#specimen_msg_"+j).html();
		if(specimen_valid != "")
		{
			alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_SID_INVALID']; ?>");
			return;
		}
		var ry = $("#"+form_id+" [name='receipt_yyyy']").val();
		ry = ry.replace(/[^0-9]/gi,'');
		var rm = $("#"+form_id+" [name='receipt_mm']").val();
		rm = rm.replace(/[^0-9]/gi,'');
		var rd = $("#"+form_id+" [name='receipt_dd']").val();
		rd = rd.replace(/[^0-9]/gi,'');
		var cy = $("#"+form_id+" [name='collect_yyyy']").val();
		cy = cy.replace(/[^0-9]/gi,'');
		var cm = $("#"+form_id+" [name='collect_mm']").val();
		cm = cm.replace(/[^0-9]/gi,'');
		var cd = $("#"+form_id+" [name='collect_dd']").val();
		cd = cd.replace(/[^0-9]/gi,'');
		var ch = $("#"+form_id+" [name='ctime_hh']").val();
		ch = ch.replace(/[^0-9]/gi,'');
		var cmm = $("#"+form_id+" [name='ctime_mm']").val();
		cmm = cmm.replace(/[^0-9]/gi,'');
		if(checkDate(ry, rm, rd) == false)
		{
			var answer = confirm("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_RDATE_INVALID']; ?> . Are you sure you want to continue?");
			if (answer == false)
				return;
		}
		if(cy.trim() == ""  && cm.trim() == "" && cd.trim() == "")
		{
			//Collection date not entered (optional field)
			//Do nothing
		}
		else
		{
			//Collection date entered. Check date string
			if(checkDate(cy, cm, cd) == false)
			{
				alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$pageTerms['MSG_CDATE_INVALID']; ?>");
				return;
			}
		}
		//All okay
	}
	$('#progress_spinner').show();
	
	for(var j = 1; j <= specimen_count; j++)
	{
		// Submit each form
		var form_id = 'specimenform_'+j;
		
		$('#'+form_id).ajaxSubmit({async: false});
		//$('#'+form_id).submit();
	}
	var dnum_val = $('#dnum').val();
	<?php
	$today = date("Ymd");
	switch($_SESSION['dnum_reset'])
	{
		case LabConfig::$RESET_DAILY:
			$today = date("Ymd");
			break;
		case LabConfig::$RESET_WEEKLY:
			$today = date("Y_W");
			break;
		case LabConfig::$RESET_MONTHLY:
			$today = date("Ym");
			break;
		case LabConfig::$RESET_YEARLY:
			$today = date("Y");
			break;
	}
	?>
	/*
	var dnum_string= "<?php echo $today; ?>";
	var url_string = "ajax/daily_num_update.php?dnum="+dnum_string+"&dval="+dnum_val;
	$.ajax({ url: url_string, async: false, success: function() {}}); 
	
	var url_string = "ajax/session_num_update.php?snum=<?php echo date("Ymd"); ?>";
	$.ajax({ url: url_string, async: false, success: function() {
		$('#progress_spinner').hide();
		window.location="specimen_added.php?snum=<?php echo $session_num; ?>";
	}});
	*/
	window.location="specimen_added.php?snum=<?php echo $session_num; ?>";
}

function add_specimenbox()
{
	specimen_count++;
	var doc = $('#doc_row_1_input').val();
	var title= $('#doc_row_1_title').val();
	var dnumInit = "<?php echo $dnum; ?>";
	dnum = dnumInit.toString();
	var url_string = "ajax/specimenbox_add.php?num="+specimen_count+"&pid=<?php echo $pid; ?>"+"&dnum="+dnum+"&doc="+doc+"&title="+title+"&session_num=<?php echo $session_num; ?>";
	$('#sbox_progress_spinner').show();
	$.ajax({ 
		url: url_string, 
		success: function(msg){
			$('#specimenboxes').append(msg);
			$('#sbox_progress_spinner').hide();
		}
	});
}

function get_testbox(testbox_id, stype_id)
{
	var stype_val = $('#'+stype_id).val();
	if(stype_val == "")
	{
		$('#'+testbox_id).html("-<?php echo LangUtil::$pageTerms['MSG_SELECT_STYPE']; ?>-");
		return;
	}
	
	$('#'+testbox_id).html("<?php $page_elems->getProgressSpinner(LangUtil::$generalTerms['CMD_FETCHING']); ?>");
	$('#'+testbox_id).load(
		"ajax/test_type_options.php", 
		{
			stype: stype_val
		}
	);
}

function show_dialog_box(div_id)
{
	var dialog_id = div_id+"_dialog";
	$('#'+dialog_id).show();
}

function hide_dialog_box(div_id)
{
	var dialog_id = div_id+"_dialog";
	$('#'+dialog_id).hide();
}

function remove_specimenbox(box_id)
{
	hide_dialog_box(box_id);
	specimen_count--;
	$('#'+box_id).remove();
}

function askandback()
{
	var todo = confirm("<?php echo LangUtil::$pageTerms['TIPS_SURETOABORT']; ?>");
	if(todo == true)
		history.go(-1);
}

function checkandtoggle(select_elem, div_id)
{
	var input_id = div_id+"_input";
	var report_to_val = select_elem.value;
	if(report_to_val == 1)
	{
		$('#'+div_id).hide();
	}
	else if(report_to_val == 2)
	{
		$('#'+div_id).show();
	}
	
}

function checkandtoggle_ref(ref_check_id, ref_row_id)
{
	if($('#'+ref_check_id).attr("checked") == true)
	{
		$('#'+ref_row_id).show();
	}
	else
	{
		$('#'+ref_row_id).hide();
	}
}
// And here is the end.

// ]]> -->
</script>
<p style="text-align: right;"><a rel='facebox' href='#NEW_SPECIMEN'>Page Help</a></p>
<span class='page_title'><?php echo LangUtil::getTitle(); ?></span>
 | <?php echo LangUtil::$generalTerms['ACCESSION_NUM']; ?> <?php echo $session_num; ?>
 | <a href='javascript:history.go(-1);'><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
<br>
<br>
<?php
# Check if Patient ID is valid
$patient = get_patient_by_id($pid);
if($patient == null)
{
	?>
	<div class='sidetip_nopos'>
	<?php
	echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$generalTerms['PATIENT_ID']." ".$pid." ".LangUtil::$generalTerms['MSG_NOTFOUND']; ?>.
	<br><br>
	<a href='find_patient.php'>&laquo; <?php echo LangUtil::$generalTerms['CMD_BACK']; ?></a>
	</div>
	<?php
	include("includes/footer.php");
	return;
}
?>
<table cellpadding='5px'>
	<tbody>
		<tr valign='top'>
			<td>
				<span id='specimenboxes'>
				<?php echo $page_elems->getNewSpecimenForm(1, $pid, $dnum, $session_num); ?>
				</span>
				<br>
				<a href='javascript:add_specimenbox();'><?php echo LangUtil::$pageTerms['ADD_ANOTHER_SPECIMEN']; ?> &raquo;</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span id='sbox_progress_spinner' style='display:none;'>
					<?php $page_elems->getProgressSpinner(LangUtil::$generalTerms['CMD_FETCHING']); ?>
				</span>
			</td>
			<td>
				<div>
					<u><b>Patient details</b></u>
					<?php echo $page_elems->getPatientInfo($pid, 400); ?>
				</div>
			</td>
		</tr>
	</tbody>
</table>
<br>
&nbsp;&nbsp;
<input type="button" name="add_sched" class="btn green" id="add_button" onclick="add_specimens();" value="<?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?>" size="20" />
&nbsp;&nbsp;&nbsp;&nbsp;
<small><a href='javascript:askandback();' class="btn red icn-only"><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a></small>
<hr />
<u><b><?php echo LangUtil::$generalTerms['CMD_THISTORY']; ?></b></u>
<?php $page_elems->getPatientHistory($pid); ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<div id='NEW_SPECIMEN' class='right_pane' style='display:none;margin-left:10px;'>
	<ul>
		<?php
		if(LangUtil::$pageTerms['TIPS_REGISTRATION_SPECIMEN']!="-") {
			echo "<li>";
			echo LangUtil::$pageTerms['TIPS_REGISTRATION_SPECIMEN'];
			echo "</li>";
		}	
		if(LangUtil::$pageTerms['TIPS_REGISTRATION_SPECIMEN_1']!="-") {
			echo "<li>";
			echo LangUtil::$pageTerms['TIPS_REGISTRATION_SPECIMEN_1'];
			echo "</li>";
		}	
		?>
	</ul>
</div>
<span id='progress_spinner' style='display:none;'>
	<?php $page_elems->getProgressSpinner(LangUtil::$generalTerms['CMD_SUBMITTING']); ?>
</span>
<br>