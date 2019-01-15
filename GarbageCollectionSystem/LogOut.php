<?php
session_start();

$_SESSION['username']=NULL;
$_SESSION['userType']=NULL;
$_SESSION['timeout']=NULL;
header("Location: index.php"); // Redirecting To Home Page

?>