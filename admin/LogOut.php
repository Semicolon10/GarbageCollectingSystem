<?php
session_start();

$_SESSION['username']=NULL;
header("Location: /GarbageCollectionSystem/index.php"); // Redirecting To Home Page

?>