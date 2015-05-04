<?php

    require_once "authenticate.php";

    $params = array();

    $params['type'] =  $_REQUEST['type'];

    $params['location'] = $_REQUEST['department'];

    $status = API::get_worklist($params);

    echo json_encode($status);
?>