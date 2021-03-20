<?php
include_once('config.php');
$username = $POST['username'];
$password = $POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);



$result = mysql_query("select * from users where username = '$username' and password = '$password'") or die("Failed to query database ".mysql_error)
?>