<?php
include('session.php');
include('connection.php');

if(!isset($_POST['currentPassword']))
{
	echo("Please enter the current password. Redirecting..........");
	header("refresh:3; url=ProfilePage.php");
}
else
{
	if(!isset($_SESSION['username']))
	{
		echo("Error obtaining user name. Try Relogging. Redirecting.......");
		header("refresh:3;url=ProfilePage.php");
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
				echo "Account Deleted Successfully.";
				header("refresh:3; url=LogOut.php");
			}
		}
		else
		{
			echo "You have entered the wrong password.";
			header("refresh:3; url=ProfilePage.php");
		}
	}
}
?>
<!DOCTYPE html>
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
</html>