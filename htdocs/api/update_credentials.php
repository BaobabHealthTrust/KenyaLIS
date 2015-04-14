<?php

include "../includes/db_lib.php";

$username = null;
$password = null;
$new_password = null;
$rnew_password = null;

// mod_php
if (isset($_SERVER['PHP_AUTH_USER'])) {
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];    

// most other servers
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {

        if (strpos(strtolower($_SERVER['HTTP_AUTHORIZATION']),'basic')===0)
          list($username,$password) = explode(':',base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));

}

if (isset($_REQUEST['new_password']))

	$new_password = $_REQUEST['new_password'];

if (isset($_REQUEST['repeated_password']))

	$rnew_password = $_REQUEST['repeated_password'];


$error_msg = array("ERROR"=>"Error: Invalid credentials!");

if (is_null($username)) {

    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo json_encode($error_msg);

    die();

} else {

    $tok = API::login($username, $password);
    
    if($tok < 0){
    
      echo json_encode($error_msg);
      
      die();
    
    }else{
	
	$user_exists = check_user_exists($username);
		
	if($user_exists == false){
		
		$error_msg = array("ERROR"=>"Error: User does not exist!");
		
		echo json_encode($error_msg);
		
		die();
		
	}else if($new_password != $rnew_password){
		
		$error_msg = array("ERROR"=>"Error: Repeat password mismatch!");
		
		echo json_encode($error_msg);
		
		die();
		
	}else{
		
			change_user_password($username, $new_password);

			echo json_encode(array("MSG"=>"Update successful"));
			
		}

	}
}

?>
