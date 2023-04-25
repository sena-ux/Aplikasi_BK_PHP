<?php 


//mengaktifkan session php
session_start();
$_SESSION['username'] = "";
$_SESSION['password'] = "";
// menghapus semua session
session_destroy();
 

// menghilangkan cookie
$cookie_name = "CookieUsername";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");


$cookie_name = "CookiePassword";
$cookie_value = "";
$cookie_time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $cookie_time, "/");


// mengalihkan halaman ke halaman login
header("location:index.php");


?>