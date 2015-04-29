<?php

    require_once "authenticate.php";

    $params = array();

    $params['location'] =  $_REQUEST['type'];

    $status = API::get_worklist($params);

    echo json_encode($status);
?>