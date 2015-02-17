<?php

require_once "authenticate.php";

// include "../includes/db_lib.php";


//$specimen_id = $_REQUEST['specimen_id'];
$result = API::get_test_catalog_with_panels();

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
