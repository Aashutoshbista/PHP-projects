<?php
session_start();
if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status']="Please login to Acess user Dashboard";
    header("location:login.php");
    exit(0);
}
?>