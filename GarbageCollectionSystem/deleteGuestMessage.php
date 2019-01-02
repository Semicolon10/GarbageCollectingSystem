<?php
include('session.php');
include('connection.php');
if(isset($_GET['MessageNumber']))
{
	$MessageNumber=$_GET['MessageNumber'];
	$deleteQuery="DELETE FROM GuestMessages WHERE MessageNumber='$MessageNumber'";
	if(mysqli_query($connection,$deleteQuery))
	{
		header("location:GuestMessages.php");
	}
	else
	{
		echo "<script>alert('Unable to delete the message');</script>";
		header("refresh:0;url=GuestMessages.php");
	}
}
else
{
	echo "<script>alert('Unable to obtain details');</script>";
	header("refresh:0;url=GuestMessages.php");
}
?>