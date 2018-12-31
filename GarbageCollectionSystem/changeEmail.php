<?php
include('session.php');
include('connection.php');

$user=$_SESSION['username'];
if(empty($_POST['Email']))
{
	$errorMessage="Please enter a new email address";
	echo("<script>alert('$errorMessage');</script>");
	if($_SESSION['userType']=='admin')
		header("refresh:0;url=ProfilePageAdmin.php");
	else
		header("refresh:0;url=ProfilePage.php");
	unset($errorMessage);

}
else if(empty($_POST['passwordForEmail']))
{
	$errorMessage="Please enter the password";
	echo("<script>alert('$errorMessage');</script>");
	if($_SESSION['userType']=='admin')
		header("refresh:0;url=ProfilePageAdmin.php");
	else
		header("refresh:0;url=ProfilePage.php");
	unset($errorMessage);
}
else
{
	$password=$_POST['passwordForEmail'];
	$email=$_POST['Email'];
	$password=stripslashes($password);
	$email=stripslashes($email);
	$password=mysqli_real_escape_string($connection,$password);
	$email=mysqli_real_escape_string($connection,$email);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	$selectQueryPassword="SELECT password from UserDetails where UserName='$user'";
	$result=mysqli_query($connection,$selectQueryPassword);
	$hashedPassword=mysqli_fetch_assoc($result);
	if(password_verify($password,$hashedPassword['password']))
	{

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$selectQuery="SELECT * FROM UserDetails where NOT UserName='$user' AND Email='$email'";
			$result=mysqli_query($connection,$selectQuery);
			unset($selectQuery);
			if(mysqli_num_rows($result)>0)
			{
				$errorMessage="There is another account associated with this E-mail address";
				echo "<script>alert('$errorMessage');</script>";
				if($_SESSION['userType']=='admin')
					header("refresh:0;url=ProfilePageAdmin.php");
				else
					header("refresh:0;url=ProfilePage.php");
				unset($errorMessage);
				
			}
			else
			{
				$updateQuery="UPDATE UserDetails SET Email='$email' WHERE UserName='$user'";
				if(mysqli_query($connection,$updateQuery))
				{
					$message="E-mail successfully updated";
					echo "<script>alert('$message');</script>";
					if($_SESSION['userType']=='admin')
						header("refresh:0;url=ProfilePageAdmin.php");
					else
						header("refresh:0;url=ProfilePage.php");
					unset($message);
					
				}
				else
				{
					$errorMessage="Sorry. Unable to update the E-mail";
					echo "<script>alert('$errorMessage');</script>";
					if($_SESSION['userType']=='admin')
						header("refresh:0;url=ProfilePageAdmin.php");
					else
						header("refresh:0;url=ProfilePage.php");
					unset($errorMessage);
					

				}
				unset($updateQuery);
			}
			unset($result);
			
		}
		else
		{
			$errorMessage="Please enter a valid E-mail address";
			echo("<script>alert('$errorMessage');</script>");
			if($_SESSION['userType']=='admin')
				header("refresh:0;url=ProfilePageAdmin.php");
			else
				header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
			
		}

	}
	else
	{
			$errorMessage="Incorrect Password";
			echo("<script>alert('$errorMessage');</script>");
			if($_SESSION['userType']=='admin')
				header("refresh:0;url=ProfilePageAdmin.php");
			else
				header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
			
	}

	unset($password);
	unset($result);
	unset($email);
	unset($selectQueryPassword);
	unset($hashedPassword);
}
mysqli_close($connection);
unset($connection);
unset($user);

?>