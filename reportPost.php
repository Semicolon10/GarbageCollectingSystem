<?php
include('session.php');
include('connection.php');
if(empty($_POST['postNumber']))
{
	echo "<script>echo('Please enter the post number');</script>";
	header("refresh:0;url=reportPostPage.php");
}
else if(empty($_POST['reason']))
{
	echo "<script>echo('Please select a reason');</script>";
	header("refresh:0;url=reportPostPage.php");
}
else
{
	$postNumber=$_POST['postNumber'];
	$postNumber=stripslashes($postNumber);
	$postNumber=mysqli_real_escape_string($connection,$postNumber);
	$postNumber=(int)$postNumber;
	$reason=$_POST['reason'];
	$reason=stripslashes($reason);
	$reason=mysqli_real_escape_string($connection,$reason);
	if(empty($_POST['complaintDescription']))
	{
		$complaintDescription="No description available";
	}
	else
	{
		$complaintDescription=$_POST['complaintDescription'];
		$complaintDescription=stripslashes($complaintDescription);
		$complaintDescription=mysqli_real_escape_string($connection,$complaintDescription);
	}
	$userName=$_SESSION['username'];
	$selectQuery="SELECT * FROM PostComplaints WHERE UserName='$userName' AND PostNumber='$postNumber'";
	$result=mysqli_query($connection,$selectQuery);
	if(mysqli_num_rows($result)>0)
	{
		echo "<script>alert('Sorry. You have already complained about this post');</script>";
		header("refresh:0;url=PostsPage.php");
	}
	else
	{
		$insertComplaintQuery="INSERT INTO PostComplaints VALUES ('$userName','$postNumber','$reason','$complaintDescription')";
		if(mysqli_query($connection,$insertComplaintQuery))
		{
			echo "<script>alert('Complaint submitted');</script>";
			header("refresh:0;url=PostsPage.php");
		}
		else
		{
			echo "<script>alert('Unable to submit the error');</script>";
			echo(mysqli_error($connection));
			header("refresh:50;url=PostsPage.php");
		}
	}
	
	unset($userName);
	unset($insertComplaintQuery);
	unset($postNumber);
	unset($reason);
	unset($complaintDescription);
	unset($selectQuery);
}
mysqli_close($connection);
unset($connection);
?>