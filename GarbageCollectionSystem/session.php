<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('connection.php');
session_start();
if($_SESSION['username']==NULL)
{
	echo "<script>alert('Please log in');</script>";
	header("refresh:0;url=index.php");
	mysqli_close($connection);
	exit();
}
else if($_SESSION['timeout']+60*60<time())
{
	$message="Please Log In. Your session has timed out";
	echo("<script>alert('$message');</script>");
	header("refresh:0;url=LogOut.php");
	unset($message);
	mysqli_close($connection);
	exit();
}
unset($connection);
?>