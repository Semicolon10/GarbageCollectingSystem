<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
session_start();
include('connection.php');
$username=$_SESSION['username'];
if($username==NULL)
{
	if(empty($_POST['yourName']))
	{
		$errorMessage="Please enter your name";
		echo("<script>alert('$errorMessage');</script>");
		header("refresh:50;url=ContactPageGuest.php");
		unset($errorMessage);
						
	}
	else
	{
		$GuestName=$_POST['yourName'];
		if(empty($_POST['yourEmail']))
		{
			$errorMessage="Please enter your E-mail";
			echo("<script>alert('$errorMessage');</script>");
			header("refresh:0;url=ContactPageGuest.php");
			unset($errorMessage);
		}
		else
		{
			$Email=$_POST['yourEmail'];
			if(empty($_POST['Description']))
			{
				$errorMessage="Please enter your message";
				echo("<script>alert('$errorMessage');</script>");
				header("refresh:0;url=ContactPageGuest.php");
				unset($errorMessage);
			}
			else
			{
				$message=$_POST['Description'];

				/*.....SQL Injection Protection..........*/
				$GuestName=stripslashes($GuestName);
				$GuestName=mysqli_real_escape_string($connection,$GuestName);

				$Email=stripslashes($Email);
				$Email=mysqli_real_escape_string($connection,$Email);

				$message=stripslashes($message);
				$message=mysqli_real_escape_string($connection,$message);
				/*..................................................*/
				/*.........Email address validation................*/
				$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);
				if(filter_var($Email, FILTER_VALIDATE_EMAIL))
				{
					$insertQuery="INSERT INTO GuestMessages(GuestName,Email,Message) VALUES('$GuestName','$Email','$message')";
					if(mysqli_query($connection,$insertQuery))
					{
						$message="Message Sent";
						echo "<script>alert('$message');</script>";
						header("refresh:0;url=ContactPageGuest.php");
						unset($message);
					}
					else
					{
						$errorMessage="Unable to send the message";
						echo "<script>alert('$errorMessage');</script>";
						header("refresh:0;url=ContactPageGuest.php");
						unset($errorMessage);
					}
					unset($insertQuery);
				}
				else
				{
						$errorMessage="Please enter a valid email";
						echo "<script>alert('$errorMessage');</script>";
						header("refresh:0;url=ContactPageGuest.php");
						unset($errorMessage);
				}
				unset($GuestName);
				unset($Email);
				unset($message);
			}
		}
	}
}
else
{
	if(empty($_POST['subject']))
	{
		echo "<script>alert('Please enter a subject');</script>";
		header("refresh:0;url=ContactPage.php");
	}
	else if(empty($_POST['Description']))
	{
		echo "<script>alert('Please enter the description');</script>";
		header("refresh:0;url=ContactPage.php");
	}
	else
	{	
		$subject=$_POST['subject'];
		$subject=stripslashes($subject);
		$subject=mysqli_real_escape_string($connection,$subject);

		$message=$_POST['Description'];
		$message=stripslashes($message);
		$message=mysqli_real_escape_string($connection,$message);

		$insertQuery="INSERT INTO UserMessages(UserName,Subject,Message) VALUES('$username','$subject','$message')";
		if(mysqli_query($connection,$insertQuery))
		{
			$message="Message Sent";
			echo "<script>alert('$message');</script>";
			header("refresh:0;url=ContactPage.php");
			unset($message);
		}
		else
		{
			$errorMessage="Unable to send the message";
			echo "<script>alert('$errorMessage');</script>";
			header("refresh:0;url=ContactPage.php");
			unset($errorMessage);
		}
		unset($subject);
		unset($message);
		unset($insertQuery);
		
	}

}

mysqli_close($connection);
unset($connection);
?>