<?php 
// session_start();
// $_SESSION['session_username'] = "";
// $_SESSION['session_password'] = "";
// session_destroy();

// $cookie_name = "cookie_username";
// $cookie_value = "";
// $time = time() - (60 * 60);
// setcookie($cookie_name,$cookie_value,$time,"/");

// $cookie_name = "cookie_password";
// $cookie_value = "";
// $time = time() - (60 * 60);
// setcookie($cookie_name,$cookie_value,$time,"/");

session_start();
$_SESSION = [];
session_unset();
session_destroy();
setcookie('cookie_email', '', time() - 3600);
setcookie('cookie_password', '', time() - 3600);

header("location:login.php");
exit();