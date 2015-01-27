<?php
#
# Changes password for the user
# Called from edit_profile.php
#
include("redirect.php");
session_start(); 
include("includes/db_lib.php");
$username = $_SESSION['username'];
$old_password = $_REQUEST['old_password'];
$new_password = $_REQUEST['new_password'];
# Check if old password matches
confirm_and_change_password($username,$old_password,$new_password);
?>
