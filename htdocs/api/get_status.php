<?php

 require_once "authenticate.php";

 $params = array();

 $params['accession_num'] = $_REQUEST['accession_number'];

 if ($_REQUEST['test_name'])
     $params['test_name'] = $_REQUEST['test_name'];

 $status = API::getStatus($params);

 if (strlen($status) < 1 )
     echo "Unknown";
 else
    echo $status;
?>