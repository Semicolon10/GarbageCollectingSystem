<?php
include('session.php');
include('connection.php');
if(isset($_GET['UserName']))
{
	$UserName=$_GET['UserName'];
	$changeQuery="UPDATE UserDetails SET UserType='admin' WHERE UserName='$UserName'";
	if(mysqli_query($connection,$changeQuery))
	{
		echo "<script>alert('User promoted to admin successfully');</script>";
		header("refresh:0;url=Users.php");
	}
	else
	{
		echo "<script>alert('Unable to promote the user');</script>";
		
		header("refresh:0;url=Users.php");
	}
	unset($UserName);
	unset($changeQuery);
}
else
{
	echo "<script>alert('Unable to obtain the username');</script>";
		header("refresh:0;url=Users.php");
}
mysqli_close($connection);
?>