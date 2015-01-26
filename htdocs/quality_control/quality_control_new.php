<?php
#
# Main page for adding new test category
#
include("redirect.php");
include("includes/header.php");
require_once("includes/page_elems.php");
require_once("includes/script_elems.php");
LangUtil::setPageId("quality");
?>
<br>
<div class="portlet box green">
							<div class="portlet-title">
								<h4><i class="icon-reorder"></i><?php echo "New Quality Control"; ?></h4>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									<a href="javascript:;" class="reload"></a>
								</div>
							</div>
							<div class="portlet-body">
							<p style="text-align: right;"><a href='#' title='Tips'><?php echo "Use the wizard to define a quality control form"; ?></a>
		|<a href='quality.php?show_qc=1'><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></a></p>
<div class='pretty_box'>
<!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal" />
                        <fieldset>
    					<legend>Quality Control Properties</legend>
                           <div class="control-group">
                              <label class="control-label"><?php echo "Quality Control Name"; ?></label>
                              <div class="controls">
                                 <input type="text" name="qc_name" id="qc_name" class="span6 m-wrap" />
                              </div>
                           </div>
                           <div class="control-group">
                              <label class="control-label"><?php echo "Instrument or Reagent or Lot"; ?></label>
                              <div class="controls">
                                 <select name="qc_inst" id="qc_inst" data-placeholder="Instrument/Reagent/Lot" class="chosen span6" tabindex="-1"> <!-- id="selS0V"-->
                                    <option value="" />
                                    <optgroup label="CYTOMETRY">
                                       <option />BD FacsFlow
                                    </optgroup>
                                    <optgroup label="BIOCHEMISTRY">
                                       <option />Udichem
                                    </optgroup>
                                    <optgroup label="HAEMATOLOGY">
                                       <option />Celtac
                                    </optgroup>
                                 </select>
                              </div>
                           </div>
                           
                           <div class="control-group">
                              <label class="control-label"><?php echo "Quality Control Description"; ?></label>
                              <div class="controls">
                                 <textarea name="qc_desc" id="qc_desc" class="span6 m-wrap" rows="3"></textarea>
                              </div>
                           </div>
                           <div class="form-actions">
                              <button type="submit" onclick="check_input()" class="btn blue">Submit</button>
                              <button type="button" class="btn">Cancel</button>
                           </div>
                           </fieldset>
                        </form>
                        <!-- END FORM-->  
                        <fieldset>
    <!--legend>Quality Control Form Definition</legend>
    <br />
<div id="my_form_builder">
</div-->
<div id='quality_control_help' style='display:none'>
<small>
Use Ctrl+F to search easily through the list. Ctrl+F will prompt a box where you can enter the test category you are looking for.
</small>
</div>
</div>
<script type='text/javascript'>
function check_input()
{
	// Validate
	var qc_name = $('#qc_name').val();
	if(qc_name == "")
	{
		alert("<?php echo "Error: Missing quality control name"; ?>");
		return;
	}
	var qc_inst = $('#qc_inst').val();
	if(qc_inst == "")
	{
		alert("<?php echo "Error: Missing instrument/reagent/log"; ?>");
		return;
	}
	// All OK
	$('#new_quality_control_category_form').submit();
}

</script>

<?php
$script_elems->enableFormBuilder();
//$script_elems->enableFacebox();
//$script_elems->enableBootstrap();*/
include("includes/footer.php"); ?>