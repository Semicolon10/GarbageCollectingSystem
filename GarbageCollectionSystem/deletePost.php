<?php
include('session.php');
include('connection.php');
if(isset($_GET['id']))
{
	$postNumber=$_GET['id'];
	$deleteQueryPost="DELETE FROM Posts WHERE PostNumber='$postNumber'";
	$deleteQueryPostComplaints="DELETE FROM PostComplaints WHERE PostNumber='$postNumber'";
	if(mysqli_query($connection,$deleteQueryPostComplaints))
	{
		if(mysqli_query($connection,$deleteQueryPost))
		{
			if($_SESSION['userType']=='admin')
							header("refresh:0;url=PostsPageAdmin.php");
						else if($_SESSION['userType']=='captain')
							header("refresh:0;url=PostsPageCaptain.php");
						else
							header("refresh:0;url=PostsPage.php");
		}
		else
		{
			echo "<script>alert('Unable to delete');</script>";
			if($_SESSION['userType']=='admin')
							header("refresh:0;url=PostsPageAdmin.php");
						else if($_SESSION['userType']=='captain')
							header("refresh:0;url=PostsPageCaptain.php");
						else
							header("refresh:0;url=PostsPage.php");
		}
	}
	else
	{
			echo "<script>alert('Unable to delete');</script>";
			if($_SESSION['userType']=='admin')
							header("refresh:0;url=PostsPageAdmin.php");
						else if($_SESSION['userType']=='captain')
							header("refresh:0;url=PostsPageCaptain.php");
						else
							header("refresh:0;url=PostsPage.php");
	}
	unset($postNumber);
	unset($deleteQuery);
}

mysqli_close($connection);
unset($connection);
?>


