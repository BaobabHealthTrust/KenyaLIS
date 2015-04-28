<?php

require_once "authenticate.php";

$result = API::user_create_or_edit($_REQUEST);

if($result < 1)
    echo $result;
else	
	echo json_encode($result); 
?>
