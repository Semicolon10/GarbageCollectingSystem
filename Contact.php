<?php
include('connection.php');
if(empty($_POST['yourName']))
{
	$errorMessage="Please enter your name";
	echo("<script>alert('$errorMessage');</script>");
	header("refresh:0;url=ContactPage.php");
	
	
}
else
{
	$GuestName=$_POST['yourName'];
	if(empty($_POST['yourEmail']))
	{
		$errorMessage="Please enter your E-mail";
		echo("<script>alert('$errorMessage');</script>");
		header("refresh:0;url=ContactPage.php");
		
		
	}
	else
	{
		$Email=$_POST['yourEmail'];
		if(empty($_POST['Description']))
		{
			$errorMessage="Please enter your message";
			echo("<script>alert('$errorMessage');</script>");
			header("refresh:0;url=ContactPage.php");
			
			
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
					header("refresh:0;url=ContactPage.php");
					
					

				}
				else
				{
					$errorMessage="Unable to send the message";
					echo "<script>alert('$errorMessage');</script>";
					header("refresh:0;url=ContactPage.php");
					
					
				}
			}
		}
	}
}

mysqli_close($connection);
unsetAllVariables();
function unsetAllVariables()
{
    unset($GuestName);
    unset($Email);
    unset($message);
    unset($errorMessage);
    unset($insertQuery);
    unset($connection);
}
?>