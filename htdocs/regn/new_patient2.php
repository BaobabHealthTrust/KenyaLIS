<?php 
include("redirect.php");
require_once("includes/db_lib.php");
require_once("includes/page_elems.php");
require_once("includes/script_elems.php");
require_once("includes/user_lib.php");
$page_elems = new PageElems();
$script_elems = new ScriptElems();

LangUtil::setPageId("new_patient");

$script_elems->enableDatePicker();
$script_elems->enableLatencyRecord();
$script_elems->enableJQueryForm();
$script_elems->enableAutocomplete();
?>
<script>
	App.init(); // init the rest of plugins and elements
</script>
<table>
  	<tr valign='top'>
		<div id='patient_new'>
		<div class='pretty_box' style='width:500px'>
		<form name="new_record" action="add_patient.php" method="post" id="new_record" class="form-horizontal" role="form">
			<?php # Hidden field for db key ?>
			<input type='hidden' name='card_num' id='card_num' value="<?php echo get_max_patient_id()+1; ?>" ></input>
			<table cellpadding="2" class='regn_form_table' >	

			<tr<?php
			if($_SESSION['pname'] == 0)
				echo " style='display:none;' ";
			?>>	
				<td><?php echo LangUtil::$generalTerms['PATIENT_NAME']; ?><?php $page_elems->getAsterisk(); ?> </td>
				<td><input type="text" name="name" id="name" value="" size="20" class='uniform_width m-wrap tooltips' data-trigger="hover" data-original-title="Please enter patient's full name." /></td>
			</tr>

			<tr <?php
			//if($_SESSION['p_addl'] == 0)
				//echo " style='display:none;' ";
			?>>
				<td>
					<?php echo LangUtil::$generalTerms['ADDL_ID'];
					if($_SESSION['p_addl'] == 2)
						$page_elems->getAsterisk();
					?>
				</td>
				<td><input type="text" name="addl_id" id="addl_id" value="" size="20" class='uniform_width' /></td>
			</tr>
			<tr>
				<td>  Date of Registration </td>
				<td>
					<div class="input-append date date-picker" data-date="<?php echo date("Y-m-d"); ?>" data-date-format="yyyy-mm-dd"> 
					<input class="m-wrap m-ctrl-medium" size="16" name="patient_reg_date" id="patient_regist_date" type="text" value="<?php echo date("Y-m-d"); ?>" ><span class="add-on"><i class="icon-calendar"></i></span>
					</div>
				</td>			
			</tr>
			<tr style='display:none;'> <!-- Hidden as we are doing away with this -->
				<td><?php echo LangUtil::$generalTerms['PATIENT_DAILYNUM']; ?>
				<?php
					if($_SESSION['dnum'] == 2)
						$page_elems->getAsterisk();
					?>
				</td>
				<td><input type="text" name="dnum" id="dnum" value="<?php echo $daily_num; ?>" size="20" class='uniform_width m-wrap tooltips' /></td>
			</tr>
			<tr style='display:none;'>	
			<div class="control-group" <?php if($_SESSION['pid'] == 0) echo " style='display:none;' ";?> >
			 <td width="200">
				   <?php echo "Registration Number"; ?>
					
					<?php
					if($_SESSION['pid'] == 2)
						$page_elems->getAsterisk();
					?>
				</td>
				<td>
					<input type="text" name="pid" id="pid" value="" size="20" class='uniform_width form-control' style='background-color:#FFC' disabled>
				</td>
			 </div>
			</tr>
			
			<tr<?php
			if($_SESSION['sex'] == 0)
				echo " style='display:none;' ";
			?>>
				<td><?php echo LangUtil::$generalTerms['GENDER']; ?><?php $page_elems->getAsterisk();?> </td>
				<td>
					<div class="controls">
						<label class="radio">
							<span><input type="radio"  name="sex" value="M" > <?php echo LangUtil::$generalTerms['MALE']; ?></span>
							</label>
					</div>
					<div class="controls">
						<label class="radio">
							<span>
								<input type="radio" name="sex" value="F"><?php echo LangUtil::$generalTerms['FEMALE']; ?>
							</span>
						</label>
					</div>
				<br>
					
				</td>
			</tr>

			<tr valign='top'<?php
		//	if($_SESSION['dob'] != 0)
		//		echo " style='display:none;' ";
			?>>	
				<td>
					<?php echo LangUtil::$generalTerms['DOB']; ?> 
					<?php
		//			if($_SESSION['dob'] == 2)
						$page_elems->getAsterisk();
					?>
				</td>
				<td>				  
                  <div class="input-append date date-picker" data-date="" data-date-format="yyyy-mm-dd"> 
					<input class="m-wrap m-ctrl-medium" size="16" name="patient_birth_date" id="patient_b_day" type="text" value="" readonly><span class="add-on" id="span_dob"><i class="icon-calendar"></i></span>
					</div>
                </td>
                <td>				  
                  <a href="" class="btn-default btn " data-toggle="modal" data-target=".bs-example-modal-sm"><span class="add-on" id="span_calcdob"><i class="icon-calendar"></i> From Age</span></a>
			 <!--pop up for dob calc begin-->
  <div class="modal fade bs-example-modal-sm" id="dobcal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
     
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id="myModalLabel">Calculate Date of Birth</h4>
      </div>
      <div class="modal-body">
       <div class="form-group">
              <label class="col-md-2 control-label" for="body">Age in Years</label>  
              <input id="age" name="age" type="text" maxlength="3" class="form-control input-md">
              
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label" for="by_date">On Date</label>  
              <style>
              .datepicker{
              z-index:1151 !important;
              }
              </style>
              <div class="input-append date date-picker" data-date="" data-date-format="yyyy-mm-dd"> 
					<input class="m-wrap m-ctrl-medium" size="16" name="by_date" id="by_date" type="text" readonly><span class="add-on" id="span_dob"><i class="icon-calendar"></i></span>
					</div>
                 
            </div>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" name="submit_iss" class="btn btn-primary" onclick="javascript:calc_dob();">Submit</button>
      </div>
    
  </div>
  <!--pop up end-->		
                </td>
			</tr>
			
			
		<form id='custom_field_form' name='custom_field_form' action='ajax/patient_add_custom.php' method='get'>
		<input type='hidden' name='pid2' id='pid2' value=''></input>
			<?php
			$custom_field_list = get_custom_fields_patient();
			foreach($custom_field_list as $custom_field)
			{
				if(($custom_field->flag)==NULL)
				{
				?>
				<tr valign='top'>
					<td><?php echo $custom_field->fieldName; ?></td>
					<td><?php $page_elems->getCustomFormField($custom_field); ?></td>
				</tr>
				<?php
				}
			}
			?>
		</form>
			
			<tr>
				<td></td>
				<td>
					<input class="btn green button-submit" type="button" id='submit_button' onclick="add_patient();" value="<?php echo LangUtil::$generalTerms['CMD_SUBMIT']; ?> " />
					&nbsp;&nbsp;
					<a class="btn red icn-only" href='find_patient.php?div=reception'><?php echo LangUtil::$generalTerms['CMD_CANCEL']; ?></i></a>
					&nbsp;&nbsp;
					<span id='progress_spinner' style='display:none'>
						<?php $page_elems->getProgressSpinner(LangUtil::$generalTerms['CMD_SUBMITTING']); ?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<small>
						<span style='float:left'>
							<?php $page_elems->getAsteriskMessage(); ?>
						</span>
					</small>
				</td>
				<td>				
				</td>	
			</tr>
			<tr>
				<td>
				</td>
			</tr>
		</table>
		<!--</form>-->
		</div>
		</div>
		</td>
		</tr>
</table>
<script type="text/javascript" src="js/check_date_format.js"></script>
<script type='text/javascript'>
$(document).ready(function(){
	//SelectDOBAge(1);
	$('#progress_spinner').hide();
	<?php
	if(isset($_REQUEST['n']))
	{
		# Prefill patient name field
		?>
		$('#name').attr("value", "<?php echo $_REQUEST['n']; ?>");
		<?php
	}
	if(isset($_REQUEST['jmp']))
	{
		?>
		$('#new_patient_msg').html("<center>'<?php echo $_REQUEST['n']."' - ".LangUtil::$generalTerms['PATIENT_NAME']." ".LangUtil::$generalTerms['MSG_NOTFOUND'].". ".LangUtil::$pageTerms['MSG_ADDNEWENTRY']; ?></center>");
		$('#new_patient_msg').show();
		<?php
	}
	?>
	
	
	$('#custom_field_form').submit(function() { 
		// submit the form 
		$(this).ajaxSubmit({async:false}); 
		// return false to prevent normal browser submit and page navigation 
		return false; 
	});
});

function calc_dob(){
var age=$('#age').val();
var curr_date=new Date($('#by_date').val());
if(age.trim() == "" || $('#by_date').val()== ""){
alert("Empty field!");
return;
}
if(isNaN(age)){
alert("Error: Numeric input required for age");
return;
}
console.log(curr_date);
curr_date.setMonth(curr_date.getMonth() -12*age);
curr_date=$.datepicker.formatDate('yy-mm-dd',new Date(curr_date));
$('#patient_b_day').attr('value',curr_date);
$('#dobcal').modal('hide');
}
function add_patient()
{
	var card_num = $("#card_num").val();
	$('#pid2').attr("value", card_num);
	var addl_id = $("#addl_id").val();
	var name = $("#name").val();
	name = name.replace(/[^a-z ]/gi,'');
	var pat_reg_date = $('#patient_regist_date').val();
	//var age = $("#age").val();
	//age = age.replace(/[^0-9]/gi,'');
	//var age_param = $('#age_param').val();
	//age_param = age_param.replace(/[^0-9]/gi,'');
	var patient_birth_date = $('#patient_b_day').val();
	var sex = "";
	var pid = $('#pid').val();
	var radio_sex = document.getElementsByName("sex");
	for(i = 0; i < radio_sex.length; i++)
	{
		if(radio_sex[i].checked)
			sex = radio_sex[i].value;
	}
	var email = $("#email").val();
	var phone = $("#phone").val();
	var error_message = "";
	var error_flag = 0;
	var curr_date = new Date();
	var patient_birth_date = $('#patient_b_day').val();
	if (patient_birth_date!=""){
           /*
            * Call a  function to validate the format of the keyed in format
            */             
            if (dt_format_check(patient_birth_date, "Date of Birth") == false)
            {return;}
            /* execute if the date is ok echiteri*/
		var pt_dob_y = patient_birth_date.slice(0, 4);
		var pt_dob_m = parseInt(patient_birth_date.slice(5, 7));
		var pt_dob_d = patient_birth_date.slice(-2);
		if (parseInt(pt_dob_y)==0){
			error_message += "The year of birth must be greater than zero\n";
			error_flag = 1;
			alert("Error: The year of birth must be greater than zero");
			return;
		}
		if (parseInt(pt_dob_m)==0){
			error_message += "The month of birth must be greater than zero\n";
			error_flag = 1;
			alert("Error: The month of birth must be greater than zero");
			return;
		}
		if (parseInt(pt_dob_d)==0){
			error_message += "The day of birth must be greater than zero\n";
			error_flag = 1;
			alert("Error: The day of birth must be greater than zero");
			return;
		}
		var pt_dob = new Date(pt_dob_y, pt_dob_m-1, pt_dob_d);		
		if (curr_date<pt_dob){
			error_message += "The date of birth cannot be after today\n";
			error_flag = 1;
			alert("Error: The date of birth cannot be after today");
			return;
		}
	}
	if (pat_reg_date!=""){
            /*
            * Call a  function to validate the format of the keyed in format
            */             
            if (dt_format_check(pat_reg_date, "Registration Date") == false)
            {return;}
            /* execute if the date is ok echiteri*/
		var pt_regdate = new Date(pat_reg_date.slice(0, 4), parseInt(pat_reg_date.slice(5, 7))-1, pat_reg_date.slice(-2));
		if (curr_date<pt_regdate){
			error_message += "The registration date cannot be after today\n";
			error_flag = 1;
			alert("Error: The registration date cannot be after today");
			return;
		}
	}
	for(i = 0; i < radio_sex.length; i++)
	{
		if(radio_sex[i].checked)
		{
			error_flag = 2;
			break;
		}
	}
	if(error_flag == 2)
	{
		error_flag = 0;
	}
	else
	{
		//sex not checked
		error_flag = 1;
		error_message += "<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$generalTerms['GENDER']; ?>\n";
	}
	
	if(card_num == "" || !card_num)
	{
		error_message += "<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$generalTerms['PATIENT_ID']; ?>\n";
		error_flag = 1;
	}
	if(name.trim() == "" || !name)
	{
		alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$generalTerms['PATIENT_NAME']; ?>");
		return;
	}
	
	
		
		if(patient_birth_date.trim() == "")
		{
			error_message += "Please enter either Age or Date of Birth\n";//<br>";
			error_flag = 1;
			alert("Error: Please enter either Age or Date of Birth");
			return;
		}
	
	
	
	
	if(sex == "" || !sex)
	{
		alert("<?php echo LangUtil::$generalTerms['ERROR'].": ".LangUtil::$generalTerms['GENDER']; ?>");
		return;
	}
	
	var data_string = "card_num="+card_num+"&addl_id="+addl_id
	+"&name="+name+"&dob="+patient_birth_date+"&sex="+sex
	+"&pid="+pid+"&receipt_date="+pat_reg_date;
	
	if(error_flag == 0)
	{
		//alert(data_string);
		$("#progress_spinner").show();
		//Submit form by ajax
		$.ajax({  
			type: "POST",  
			url: "ajax/patient_add.php", 
			data: data_string,
			success: function(data) { 
				//Add custom fields
				//$('#custom_field_form').ajaxSubmit();
					
				$('#custom_field_form').submit();
				$("#progress_spinner").hide();
				
				/* Retrieve actual DB Key used */
				var pidStart = data.indexOf("VALUES") + 8;
				var pidEnd = data.indexOf(",",pidStart);
				var new_card_num = data.substring(pidStart,pidEnd);
				
				card_num = new_card_num;	
				var url = 'regn/new_specimen2.php';
                $('.reg_subdiv').hide();     
                $('#specimen_reg').show();
                $('#specimen_reg_body').load(url, {pid: card_num });  
			}
		});
		//Patient added
	}
	else
	{
		alert(error_message);
	}
}

function reset_new_patient()
{
	$('#new_record').resetForm();
}

// function SelectDOBAge(optionval){
// 	if (optionval==1){
// 		$('#patient_b_day').show();
// 		$('#span_dob').show();
// 		$('#age').hide();
// 		$('#age_param').hide();
// 		$('#age').val('');
// 	} else {
// 		$('#patient_b_day').hide();
// 		$('#span_dob').hide();
// 		$('#age').show();
// 		$('#age_param').show();
// 		$('#patient_b_day').val('');
// 	}
// }

</script>
