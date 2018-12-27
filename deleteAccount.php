<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include('session.php');
include('connection.php');

if(!isset($_POST['currentPasswordDelete']))
{
	$errorMessage="Please enter the current password";
	echo "<script type='text/javascript'>alert('$errorMessage');</script>";
	if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
	unset($errorMessage);
}
else
{
	if(!isset($_SESSION['username']))
	{
		$errorMessage="Unable to obtain the username. Try re-logging";
		echo "<script type='text/javascript'>alert('$errorMessage');</script>";
		if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
		unset($errorMessage);
	}
	else
	{
		$user=$_SESSION['username'];
		$password=$_POST['currentPasswordDelete'];
		$password=stripslashes($password);
		$password=mysqli_real_escape_string($connection,$password);
		$selectQuery="SELECT password from UserDetails where UserName='$user'";
		$deleteQueryComplaints="DELETE FROM PostComplaints WHERE UserName='$user'";
		$deleteQueryPosts="DELETE from Posts where UserName='$user'";
		$deleteQuery="DELETE from UserDetails where UserName='$user'";
		$result=mysqli_query($connection,$selectQuery);
		$encryptedPassword=mysqli_fetch_assoc($result);
		if(password_verify($password,$encryptedPassword['password']))
		{
			if(mysqli_query($connection,$deleteQueryComplaints))
			{
				if(mysqli_query($connection,$deleteQueryPosts))
				{
					if(mysqli_query($connection,$deleteQuery))
					{
						$message= "Account Deleted Successfully";
						echo "<script type='text/javascript'>alert('$message');</script>";
						header("refresh:0; url=LogOut.php");
						unset($message);
					}
					else
					{
						$message= "Unable to delete the account.";
						echo "<script type='text/javascript'>alert('$message');</script>";
						if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
						unset($message);
					}

				}
				else
				{
					$message= "Unable to delete the account.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
					unset($message);
				}
			}
			else
			{
					$message= "Unable to delete the account.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
					unset($message);
			}
			
			
		}
		else
		{
			$errorMessage="You have entered the wrong password";
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			
			if($_SESSION['userType']=='admin')
							header("refresh:0;url=ProfilePageAdmin.php");
						else
							header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
		}
		unset($user);
		unset($password);
		unset($selectQuery);
		unset($deleteQuery);
		unset($result);
		unset($encryptedPassword);
		unset($deleteQueryComplaints);
		unset($deleteQueryPosts);
	}
}
mysqli_close($connection);
unset($connection);

?>
