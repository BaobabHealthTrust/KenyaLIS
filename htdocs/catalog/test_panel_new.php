<?php
#
# Main page for adding new test panel
#
include("redirect.php");
include("../includes/page_elems.php");
require_once("includes/script_elems.php");
$script_elems = new ScriptElems();
$page_elems = new PageElems();

LangUtil::setPageId("catalog");
?>
<script type='text/javascript'>
function check_input()
{
	// Validate
	var panel_name = $('#panel_name').val();
	if(panel_name == "")
	{
		alert("<?php echo LangUtil::$pageTerms['TIPS_MISSING_CATNAME']; ?>");
		return;
	}
	// All OK
	$('#new_test_panel_form').submit();
}

</script>
<br>
<b style="margin-left:50px;"><?php echo "New Test Panel"; ?></b>
| <a href='catalog.php?show_tp=1'><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
<br><br>
<div class='pretty_box' style='margin-left:50px;' >
<form name='new_test_panel_form' id='new_test_panel_form' action='test_panel_add.php' method='post'>
<table class='smaller_font' style="width:100%;">
	<tr>
		<td style='width:150px;'><?php echo "Select Parent Test Type"; ?><?php $page_elems->getAsterisk(); ?></td>
		<td>
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php
			$page_elems->getTestPanelCheckBoxes($_SESSION['lab_config_id'], false); ?>
		</td>
	</tr>
</table>
<br><br>
<div class="form-actions">
                              <button type="submit" onclick='check_input();' class="btn blue"><?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?></button>
                              <a href='catalog.php?show_tp=1' class='btn'> <?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
                              </div>
</form>
</div>
<div id='test_panel_help' style='display:none'>
<small>
Use Ctrl+F to search easily through the list. Ctrl+F will prompt a box where you can enter the test panel you are looking for.
</small>
</div>
<?php //include("includes/footer.php"); ?>

