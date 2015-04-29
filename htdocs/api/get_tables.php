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
	}
}

if ($_REQUEST['table_type'] == 'test_categories')
	$result = $page_elems->getTestCategorySelect();

if ($_REQUEST['table_type'] == 'compatible_specimens'){
	$tid = $_REQUEST['tid'];
	$result = $page_elems->getSpecimenTypeCheckboxes(127, false, $tid);
}

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
