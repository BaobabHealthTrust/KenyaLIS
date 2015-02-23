<?php
#
# Baobab Health Trust, Lilongwe, Dev: Kenneth Kapundi
# Updates goal Lifespan values for tests
# Called via Ajax from lab_config_home.php
#
include("../includes/db_lib.php");
$lab_config_id = $_REQUEST['lid'];

$lab_config = get_lab_config_by_id($lab_config_id);
$t_s = $_REQUEST['stype'];
$lsp_value_list = $_REQUEST['lsp'];
$lsp_unit_list = $_REQUEST['unit'];

$count = 0;
foreach($t_s as $key)
{	
	$t_id = explode('|', $key)[0];
	$s_id = explode('|', $key)[1];
	$curr_lsp_value = $lsp_value_list[$count];
	$curr_lsp_value = preg_replace("/[^0-9]/" ,"", $curr_lsp_value);
	if(trim($curr_lsp_value) == "")
	{
		# Empty lifespan entry
		$count++;
		continue;
	}
	if($lsp_unit_list[$count] == 2)
	{
		# Multiply by 24 to store in hours
		$curr_lsp_value *= 24;
	}
	
	echo $lab_config->updateGoalLifespanValue($t_id, $s_id, $curr_lsp_value).'<br />';
	$count++;
}

?>
