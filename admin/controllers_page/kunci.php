<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_COOKIE['CookieUsername'])) {
    header("location:../index.php");
    exit();
}
?>