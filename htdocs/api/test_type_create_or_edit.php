<?php

require_once "authenticate.php";

$rcd = array();

$rcd['tid'] = $_REQUEST['tid'];
$rcd['t_name'] = $_REQUEST['t_name'];
$rcd['cat_code'] = $_REQUEST['cat_code'];
$rcd['loinc_code'] = $_REQUEST['loinc_code'];
$rcd['qty'] = $_REQUEST['qty'];
$rcd['s_unit'] = $_REQUEST['s_unit'];
$rcd['desc'] = $_REQUEST['desc'];
$rcd['hide_name'] = $_REQUEST['hide_name'];
$rcd['specimen_types'] = $_REQUEST['specimen_types'];
$rcd['measures'] = $_REQUEST['measures'];

$result = API::test_type_create_or_edit($rcd);

if($result < 1)
	echo $result;
else
	echo json_encode($result);
?>
