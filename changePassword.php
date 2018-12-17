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
	echo("Passwords don't match. Redirecting........");
	header("refresh:3;url=ProfilePage.php");
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
			echo "Password Updated Successfully. Redirecting...........";
			header("refresh:3; url=ProfilePage.php");
		}
		else
		{
			echo "Couldn't update the password. ".mysqli_error($connection);
			echo "Redirecting............";
			header("refresh:3; url=ProfilePage.php");
		}
	}
	else
	{
		echo("You entered the wrong password. Redirecting........");
		header("refresh:3;url=ProfilePage.php");
	}

	
}

mysqli_close($connection);
?>