<?php
include('session.php');
include('connection.php');
if(isset($_GET['MessageNo']))
{
	$MessageNo=$_GET['MessageNo'];
	$deleteQuery="DELETE FROM UserMessages WHERE MessageNo='$MessageNo'";
	if(mysqli_query($connection,$deleteQuery))
	{
		header("location:UserMessages.php");
	}
	else
	{
		echo "<script>alert('Unable to delete the message');</script>";
		header("refresh:0;url=UserMessages.php");
	}
}
else
{
	echo "<script>alert('Unable to obtain details');</script>";
	header("refresh:0;url=UserMessages.php");
}
?>