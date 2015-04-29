<?php

require_once "authenticate.php";

$rcd = array();

$rcd['date'] = date('Y-m-d H:i:s');

$result = API::get_lab_status($rcd);

if($result < 1)
    echo $result;
else
    echo json_encode($result);
?>
