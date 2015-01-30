<?php

include "../includes/db_lib.php";

$username = null;
$password = null;

// mod_php
if (isset($_SERVER['PHP_AUTH_USER'])) {
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];

// most other servers
} elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {

        if (strpos(strtolower($_SERVER['HTTP_AUTHORIZATION']),'basic')===0)
          list($username,$password) = explode(':',base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));

}

$error_msg = array("ERROR"=>"Authentication failed!");

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
    
    }
}

?>
