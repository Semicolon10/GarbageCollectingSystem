<?php
include('session.php');
include('connection.php');

$user=$_SESSION['username'];

$currentPassword=$_POST['currentPassword'];
$newPassword=$_POST['password'];
$newPasswordConfirm=$_POST['confirmPassword'];

$currentPassword=stripslashes($currentPassword);
$newPassword=stripslashes($newPassword);
$newPasswordConfirm=stripslashes($newPasswordConfirm);

$currentPassword=mysqli_real_escape_string($connection,$currentPassword);
$newPassword=mysqli_real_escape_string($connection,$newPassword);
$newPasswordConfirm=mysqli_real_escape_string($connection,$newPasswordConfirm);

if($newPassword!=$newPasswordConfirm)
{
	
	$errorMessage="Passwords do not match";
	echo "<script type='text/javascript'>alert('$errorMessage');</script>";
	header("refresh:0;url=ProfilePage.php");
}
else
{
	$querySelect="SELECT password from UserDetails where UserName='$user'";
	$result=mysqli_query($connection,$querySelect);
	$existingPassword=mysqli_fetch_assoc($result);
	if(password_verify($currentPassword,$existingPassword['password']))
	{
		$passwordHash=password_hash($newPassword,PASSWORD_DEFAULT);
		$queryUpdate="UPDATE UserDetails SET password='$passwordHash' where UserName='$user'";
		if(mysqli_query($connection,$queryUpdate))
		{
			
			$errorMessage="Password Updated Successfully";
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			header("refresh:0;url=LogOut.php");
		}
		else
		{
			$errorMessage="Couldn't update the password ".mysqli_error($connection);
			
			header("refresh:0; url=ProfilePage.php");
		}
	}
	else
	{
		
		
		$errorMessage="You entered the wrong password";
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			header("refresh:0;url=ProfilePage.php");
	}

	
}

mysqli_close($connection);
?>
