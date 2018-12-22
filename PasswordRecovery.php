<?php
ini_set('display_errors', 1);

include('connection.php');

if(!empty($_POST['email']))
{
    $email=$_POST['email'];
    $email=stripslashes($email); //SQL injection protection by removing slashes
    $email=mysqli_real_escape_string($connection,$email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$newTempPassword=rand();
		$newTempPasswordHash=password_hash($newTempPassword,PASSWORD_DEFAULT);
		$queryUpdate="UPDATE UserDetails SET password='$newTempPasswordHash' where Email='$email'";
		$querySelect="SELECT * from UserDetails where Email='$email'";
		$result=mysqli_query($connection,$querySelect);
		if(mysqli_num_rows($result)>0)
		{
			if(mysqli_query($connection,$queryUpdate))
			{
				$message="Password Resetted Successfully";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("refresh:0; url=LogOut.php");
			}
			else
			{
				$errorMessage= "Couldn't update the password ".mysqli_error($connection);
				echo "<script type='text/javascript'>alert('$errorMessage');</script>";
				header("refresh:0; url=PasswordRecoveryPage.php");
			}
		}
		else
		{
			$errorMessage="There is no account associated with this email. Please enter the correct email";
				echo "<script type='text/javascript'>alert('$errorMessage');</script>";
				header("refresh:0; url=PasswordRecoveryPage.php");
		}
		
		
		

	}
	else
	{
		$errorMessage= "Invalid e-mail address. Please enter a valid email address";
		echo "<script type='text/javascript'>alert('$errorMessage');</script>";
		header("refresh:0; url=PasswordRecoveryPage.php");
	}
}
else
{
    $errorMessage= "No data has been entered for email";
    echo "<script type='text/javascript'>alert('$errorMessage');</script>";
    header("refresh:0; url=PasswordRecoveryPage.php");
    
}

mysqli_close($connection);
?>
