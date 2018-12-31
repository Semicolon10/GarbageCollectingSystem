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
	if($_SESSION['userType']=='admin')
		header("refresh:0;url=ProfilePageAdmin.php");
	else
		header("refresh:0;url=ProfilePage.php");
	unset($errorMessage);
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
			
			$message="Password Updated Successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("refresh:0;url=LogOut.php");
			unset($message);
		}
		else
		{
			$errorMessage="Couldn't update the password ".mysqli_error($connection);
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			if($_SESSION['userType']=='admin')
				header("refresh:0;url=ProfilePageAdmin.php");
			else
				header("refresh:0;url=ProfilePage.php");
			unset($errorMessage);
		}
		unset($passwordHash);
		unset($queryUpdate);
	}
	else
	{
		
		
		$errorMessage="You entered the wrong password";
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			if($_SESSION['userType']=='admin')
				header("refresh:0;url=ProfilePageAdmin.php");
			else
				header("refresh:0;url=ProfilePage.php");
		unset($errorMessage);
	}
	unset($querySelect);
	unset($result);
	unset($existingPassword);
	
}

mysqli_close($connection);

unset($user);
unset($currentPassword);
unset($newPassword);
unset($newPasswordConfirm);
unset($connection);

?>
