<?php
#
# Main page for modifying an existing specimen type
#
include("redirect.php");
include("includes/header.php");
include("includes/ajax_lib.php");
LangUtil::setPageId("catalog");


$test_type = get_test_type_by_id($_REQUEST['tid']);
?>

<!-- BEGIN PAGE TITLE & BREADCRUMB-->       
                        <h3>
                        </h3>
                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-download-alt"></i>
                                <a href="index.php">Home</a> 
                            </li>
                        </ul>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN REGISTRATION PORTLETS-->   
                <div class="row-fluid">
                <div class="span12 sortable">
                
    <div class="portlet box blue">
        <div class="portlet-title">
            <h4><i class="icon-reorder"></i><?php echo "Edit Test Panel"; ?></h4>
        </div>
        <div class="portlet-body form">

            <a href="catalog.php?show_tp=1"><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a>
            <br><br>
            <?php
            if($test_type == null)
            {
            ?>
            	<div class='sidetip_nopos'>
            	<?php echo LangUtil::$generalTerms['MSG_NOTFOUND']; ?>
            	</div>
            <?php
            	include("includes/footer.php");
            	return;
            }
				//$page_elems->getTestTypeInfo($test_type->name, true);
            ?>
            <br>
            <br>
            <div class='pretty_box'>
            <form name='edit_tptype_form' id='edit_tptype_form' action='ajax/test_panels_update.php' method='post'>
            <input type='hidden' name='tid' id='tid' value='<?php echo $_REQUEST['tid']; ?>'></input>
            	<table cellspacing='4px'>
            		<tbody>
            			<tr valign='top'>
            				<td style='width:150px;'><?php echo LangUtil::$generalTerms['NAME']; ?><?php $page_elems->getAsterisk(); ?></td>
            				<td><label name='name' id='name' ><?php echo $test_type->getName(); ?></label></td>
            			</tr>
            			<tr valign='top'>
            				<td><?php echo LangUtil::$generalTerms['DESCRIPTION']; ?></td>
            				<td><label  name='description' id='description' class='uniform_width'><?php echo trim($test_type->description); ?></label><br /><br /></td>
            			</tr>
            			<tr valign='top'>
            				<td><?php echo "Select Panel Test Types"; ?><?php $page_elems->getAsterisk(); ?> [<a href='#test_help' rel='facebox'>?</a>] </td>
            				<td>
            					<?php
									$page_elems->getTestPanelCheckboxes($test_type->testTypeId, $_SESSION['lab_config_id']);
								?>
            					<br>
            				</td>
            			</tr>
            			<tr>
            				<td></td>
            				<td>
            					<input type='button' class="btn green" value='<?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?>' onclick='javascript:update_tptype();'></input>
            					&nbsp;&nbsp;&nbsp;
            					<a class="btn" href='catalog.php?show_tp=1'>Cancel</a>
            					&nbsp;&nbsp;&nbsp;
            					<span id='update_tptype_progress' style='display:none;'>
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
            Use Ctrl+F to search easily through the list. Ctrl+F will prompt a box where you can enter the test name you are looking for.
            </small>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
include("includes/scripts.php");
$script_elems->enableDatePicker();
$script_elems->enableJQuery();
$script_elems->enableFacebox();
$script_elems->enableJQueryForm();
$script_elems->enableTokenInput();
?>
<script type='text/javascript'>


function update_tptype()
{

	var ttype_entries = $('.tptype_entry');
	var ttype_selected = false;
	for(var i = 0; i < ttype_entries.length; i++)
	{
		if(ttype_entries[i].checked)
		{
			ttype_selected = true;
			break;
		}
	}

	$('#update_tptype_progress').show();
	$('#edit_tptype_form').ajaxSubmit({
		success: function(msg) {

			$('#update_tptype_progress').hide();
			window.location="test_panel_updated.php?tid=<?php echo $_REQUEST['tid']; ?>";
		}
	});
}
</script>
<?php include("includes/footer.php"); ?>