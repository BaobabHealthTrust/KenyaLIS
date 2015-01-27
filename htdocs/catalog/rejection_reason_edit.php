<?php
#
# Main page for modifying an existing rejection reason
#
include("redirect.php");
include("includes/header.php");
include("includes/ajax_lib.php");
include("includes/scripts.php");
require_once("includes/script_elems.php");
LangUtil::setPageId("catalog");

$reasonid = $_REQUEST['rr'];
$rejection_reason = get_rejection_reason_by_id($reasonid);
?>
<?php 
$script_elems->enableDatePicker();
$script_elems->enableJQuery();
$script_elems->enableJQueryForm();
$script_elems->enableTokenInput();
//$script_elems->enableFacebox();
?>
<br>
<b><?php echo "Edit Specimen Rejection Reason"; ?></b>
| <a href="catalog.php?show_rp=1"><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
<br><br>
<?php
if($rejection_reason == null)
{
?>
	<div class='sidetip_nopos'>
	<?php echo LangUtil::$generalTerms['MSG_NOTFOUND']; ?>
	</div>
<?php
	include("includes/footer.php");
	return;
}
//$page_elems->getRejectionPhaseInfo($rejection_reason->name, true);
?>

<div class='pretty_box'>
<form name='edit_rejection_reason_form' id='edit_rejection_reason_form' action='ajax/rejection_reason_update.php' method='post'>
<input type='hidden' name='tcid' id='tcid' value='<?php echo $reasonid; ?>'></input>
	<table cellspacing='4px'>
		<tbody>
			<tr valign='top'>
				<td><?php echo LangUtil::$generalTerms['DESCRIPTION']; ?><?php $page_elems->getAsterisk(); ?></td>
				<td><textarea type='text' name='description' id='description' class='span12 m-wrap'><?php echo trim($rejection_reason->description); ?></textarea></td>
			</tr>
			<tr valign='top'>
				<td style='width:150px;'>Rejection Phase<?php $page_elems->getAsterisk(); ?></td>
				<td><select name="phase" id="phase"><?php $page_elems->getRejectionPhasesSelect(null, $reasonid); ?></select></td>
			</tr>

			<tr>
				<td></td>
				<td>
                
                <div class="form-actions">

					  <input class='btn yellow' type='button' value='<?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?>' onclick='javascript:update_rejection_reason_category();'></input>
                      <a href='catalog.php?show_tc=1' class='btn'> <?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
                </div>
               	<span id='update_rejection_reason_progress' style='display:none;'>
						<?php $page_elems->getProgressSpinner(LangUtil::$generalTerms['CMD_SUBMITTING']); ?>
					</span>
				</td>
			</tr>
		</tbody>
	</table>
    
</form>
</div>
<div id='test_help' style='display:none'>
<small>
Use Ctrl+F to search easily through the list. Ctrl+F will prompt a box where you can enter the reason you are looking for.
</small>
</div>
<script type='text/javascript'>
function update_rejection_reason_category()
{
	if($('#description').attr("value").trim() == "")
	{
		alert("<?php echo LangUtil::$pageTerms['TIPS_MISSING_CATNAME']; ?>");
		return;
	}
	$('#update_rejection_reason_progress').show();
	$('#edit_rejection_reason_form').ajaxSubmit({
		success: function(msg) {
			$('#update_rejection_reason_progress').hide();
			window.location="rejection_reason_updated.php?rr=<?php echo $reasonid; ?>";
		}
	});
}
</script>
<?php 
include("includes/footer.php");
?>
