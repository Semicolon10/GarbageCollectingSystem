<?php
include('session.php');
include('connection.php');

if(!isset($_POST['currentPassword']))
{
	$errorMessage="Please enter the current password";
	echo "<script type='text/javascript'>alert('$errorMessage');</script>";
	header("refresh:0; url=ProfilePage.php");
}
else
{
	if(!isset($_SESSION['username']))
	{
		$errorMessage="Unable to obtain the username. Try re-logging";
		echo "<script type='text/javascript'>alert('$errorMessage');</script>";
		header("refresh:0; url=ProfilePage.php");
	}
	else
	{
		$user=$_SESSION['username'];
		$password=$_POST['currentPassword'];
		$password=stripslashes($password);
		$password=mysqli_real_escape_string($connection,$password);
		$selectQuery="SELECT password from UserDetails where UserName='$user'";
		$deleteQuery="DELETE from UserDetails where UserName='$user'";
		$result=mysqli_query($connection,$selectQuery);
		$encryptedPassword=mysqli_fetch_assoc($result);
		if(password_verify($password,$encryptedPassword['password']))
		{
			if(mysqli_query($connection,$deleteQuery))
			{
				$message= "Account Deleted Successfully";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("refresh:0; url=LogOut.php");
			}
		}
		else
		{
			$errorMessage="You have entered the wrong password";
			echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			header("refresh:0; url=ProfilePage.php");
		}
	}
}
?>
<!--<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<p>Redirecting..................<span id="counter">3</span> second(s).</p>
    <script type="text/javascript">
    function countdown() 
    {
        var i = document.getElementById('counter');
        i.innerHTML = parseInt(i.innerHTML)-1;
    }
        setInterval(function(){ countdown(); },1000);
    </script>
</body>
</html>-->