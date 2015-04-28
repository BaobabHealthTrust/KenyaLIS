<?php

 require_once "authenticate.php";

 $result = array();
 $result['token'] = session_id();
 $result['name'] = $_SESSION['user_actualname'];
 $result['username'] = $_SESSION['username'];
 
 echo json_encode($result);
?>
