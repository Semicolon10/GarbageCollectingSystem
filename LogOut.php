<?php
session_start();

$_SESSION['username']=NULL;
header("Location: WelcomePage.php"); // Redirecting To Home Page

?>