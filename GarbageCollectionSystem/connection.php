<?php
$serverName = "localhost";
$lhUserName = "root";
$lhPassword = "ayeshdulanja";
$database = "GarbageCollectionSystem";

// Create connection
$connection = mysqli_connect($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
//echo "Connected successfully";
unset($serverName);
unset($lhUserName);
unset($lhPassword);
unset($database);
?>