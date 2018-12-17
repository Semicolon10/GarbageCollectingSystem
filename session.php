<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('connection.php');
session_start();
$user=$_SESSION['username'];
$selectQuery="SELECT UserName from UserDetails where UserName='$user'";
$result=mysqli_query($connection,$selectQuery);
$userName=mysqli_fetch_assoc($result);

if(!isset($userName['UserName'])){
$connection->close(); // Closing Connection
header("location:LogInPage.php"); 
}
?>