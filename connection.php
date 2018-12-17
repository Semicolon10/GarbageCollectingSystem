<?php
$serverName = "localhost";
$lhUserName = "root";
$lhPassword = "Asiri#Iroshan#1996";
$database = "GarbageCollectionSystem";

// Create connection
$connection = new mysqli($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";
?>