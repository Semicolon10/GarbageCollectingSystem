<?php
include('session.php');
include('connection.php');
if(isset($_GET['id'])&&isset($_GET['username']))
{
	$id=$_GET['id'];
	$UserName=$_GET['username'];
	$id=stripslashes($id);
	$UserName=stripslashes($UserName);
	$id=mysqli_real_escape_string($connection,$id);
	$UserName=mysqli_real_escape_string($connection,$UserName);
	$deleteQuery="DELETE FROM PostComplaints WHERE UserName='$UserName' AND PostNumber='$id'";
	if(mysqli_query($connection,$deleteQuery))
	{
		header("location:ReportedPosts.php");
	}
	else
	{
		echo "<script>alert('Unable to remove the complaint');</script>";
		header("refresh:0;url=ReportedPosts.php");
	}
	unset($id);
	unset($UserName);
	unset($deleteQuery);
}
else
{
	echo "<script>alert('Unable to get inputs');</script>";
	header("refresh:0;url=ReportedPosts.php");
}
mysqli_close($connection);
?>