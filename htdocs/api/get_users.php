<?php

require_once "authenticate.php";

$result = API::get_users();

if($result < 1)
    echo $result;
else
    echo json_encode($result); 
?>
