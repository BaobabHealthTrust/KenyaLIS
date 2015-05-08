<?php

require_once "authenticate.php";
include("../includes/page_elems.php");

$page_elems = new PageElems();

$result = ""; 

if ($_REQUEST['table_type'] == 'test_types') 
	$result = $page_elems->getTestTypeTable(127);

if ($_REQUEST['table_type'] == 'test_type_info'){
	$tid = $_REQUEST['tid'];
	$name_query = "SELECT name FROM test_type WHERE test_type_id = $tid";
	$name_obj = query_associative_one($name_query);
	if($name_obj){
		$result = $page_elems->getTestTypeInfo($name_obj['name']);
	}
}

if ($_REQUEST['table_type'] == 'test_type_input_info'){
	$tid = $_REQUEST['tid'];
	$name_query = "SELECT name FROM test_type WHERE test_type_id = $tid";
	$name_obj = query_associative_one($name_query);
	if($name_obj){
		$result = $page_elems->getTestTypeInputInfo($name_obj['name']);
	}else{
		$result = $page_elems->getTestTypeInputInfoGeneric();
	}
}

if ($_REQUEST['table_type'] == 'test_categories')
	$result = $page_elems->getTestCategorySelect();

if ($_REQUEST['table_type'] == 'disabled_status')
	$result = API::disabledStatus();

if ($_REQUEST['table_type'] == 'compatible_specimens'){
	$tid = $_REQUEST['tid'];
	$result = $page_elems->getSpecimenTypeCheckboxes(127, false, $tid);
}

if ($_REQUEST['table_type'] == 'measures_data'){
	$tid = (int)$_REQUEST['tid'];

	if ($tid && $tid > 0){
		$result = API::get_test_type_measures_all($tid);
	}else{
		$result = array();
	}
}

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
