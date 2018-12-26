<?php
include('session.php');
include('connection.php');

$user=$_SESSION['username'];
if(empty($_POST['Contact']))
{
	$errorMessage="Please enter the Contact number";
	echo("<script>alert('$errorMessage');</script>");
	header("refresh:0;url=ProfilePage.php");
	unset($errorMessage);

}
else if(empty($_POST['passwordForContact']))
{
	
		$errorMessage="Please enter the password";
		echo("<script>alert('$errorMessage');</script>");
		header("refresh:0;url=ProfilePage.php");
		unset($errorMessage);
		
	
}
else
{
	$password=$_POST['passwordForContact'];
	$contact=$_POST['Contact'];
	$password=stripslashes($password);
	$password=mysqli_real_escape_string($connection,$password);
	$contact=stripslashes($contact);
	$contact=mysqli_real_escape_string($connection,$contact);

	$selectQueryPassword="SELECT password from UserDetails where UserName='$user'";
	$result=mysqli_query($connection,$selectQueryPassword);
	$hashedPassword=mysqli_fetch_assoc($result);
	if(password_verify($password,$hashedPassword['password']))
	{
		$format = "/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/";
		if(preg_match($format, $contact))
		{
			$selectQuery="SELECT * FROM UserDetails where NOT UserName='$user' AND ContactNumber='$contact'";
			$result=mysqli_query($connection,$selectQuery);

			if(mysqli_num_rows($result)>0)
			{	
				$errorMessage="There is another account associated with this contact number";
				echo "<script>alert('$errorMessage');</script>";
				header("refresh:0;url=ProfilePage.php");
				unset($errorMessage);
			}
			else
			{
				$updateQuery="UPDATE UserDetails SET ContactNumber='$contact' WHERE UserName='$user'";
				if(mysqli_query($connection,$updateQuery))
				{
					$message="Contact number successfully updated";
					echo "<script>alert('$message');</script>";
					header("refresh:0;url=ProfilePage.php");
					unset($message);
				}
				else
				{
					$errorMessage="Sorry. Unable to update the contact number";
					echo "<script>alert('$errorMessage');</script>";
					header("refresh:0;url=ProfilePage.php");
					unset($errorMessage);

				}
				unset($updateQuery);
			}
			unset($selectQuery);
			unset($result);
		}
		else
		{
			$errorMessage="Please insert a valid contact number";
			echo "<script>alert('$errorMessage');</script>";
			header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
		}
		unset($format);
	}
	else
	{
			$errorMessage="Incorrect Password";
			echo("<script>alert('$errorMessage');</script>");
			header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
	}
	unset($password);
	unset($contact);
	unset($selectQueryPassword);
	unset($result);
	unset($hashedPassword);
	
}

unset($user);
mysqli_close($connection);
unset($connection);
?>
