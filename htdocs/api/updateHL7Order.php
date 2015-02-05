<?php

require_once "authenticate.php";

require_once "../includes/db_lib.php";

$debug = false;

$request =  '';

$result = API::update_order("", "20150205-1", "Pleural fluid");

echo json_encode($result);
?>

