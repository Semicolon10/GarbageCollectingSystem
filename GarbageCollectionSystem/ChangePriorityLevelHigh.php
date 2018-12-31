<?php
include('session.php');
include('connection.php');
if(isset($_GET['id']))
{
	$postNumber=$_GET['id'];
	$updateQuery="UPDATE Posts SET PriorityLevel='HIGH' WHERE PostNumber='$postNumber'";
	if(mysqli_query($connection,$updateQuery))
	{
		header("location:PostsPageCaptain.php");
	}
	else
	{
			echo "<script>alert('Unable to change');</script>";
			header("refresh:0;url=PostsPageCaptain.php");
			
	}
	unset($postNumber);
	unset($updateQuery);
}

mysqli_close($connection);
unset($connection);
?>


