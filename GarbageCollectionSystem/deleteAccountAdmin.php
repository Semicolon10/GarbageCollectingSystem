<?php
include('session.php');
include('connection.php');
if(isset($_GET['UserName']))
{
		$user=$_GET['UserName'];

		$deleteQueryComplaints="DELETE FROM PostComplaints WHERE UserName='$user'";
		$deleteQueryPosts="DELETE from Posts where UserName='$user'";
		$deleteQuery="DELETE from UserDetails where UserName='$user'";
		$deleteQueryMessages="DELETE from UserMessages where UserName='$user'";
			if(mysqli_query($connection,$deleteQueryMessages))
			{
				if(mysqli_query($connection,$deleteQueryComplaints))
				{
					if(mysqli_query($connection,$deleteQueryPosts))
					{
						if(mysqli_query($connection,$deleteQuery))
						{
							$message= "Account Deleted Successfully";
							echo "<script type='text/javascript'>alert('$message');</script>";
							header("refresh:0; url=Users.php");
							unset($message);
						}
						else
						{
							$message= "Unable to delete the account.";
							echo "<script type='text/javascript'>alert('$message');</script>";

							header("refresh:0; url=Users.php");
							unset($message);
						}

					}
					else
					{
						$message= "Unable to delete the account.";
							echo "<script type='text/javascript'>alert('$message');</script>";

							header("refresh:0; url=Users.php");
							unset($message);
					}
				}
				else
				{
					$message= "Unable to delete the account.";
							echo "<script type='text/javascript'>alert('$message');</script>";

							header("refresh:0; url=Users.php");
							unset($message);
				}
			}
			else
			{
				$message= "Unable to delete the account.";
							echo "<script type='text/javascript'>alert('$message');</script>";

							header("refresh:0; url=Users.php");
							unset($message);
			}
			
}
else
{
	echo "<script>alert('Unable to obtain the user name');</script>";

							header("refresh:0; url=Users.php");
							unset($message);
}
mysqli_close($connection);
?>