<?php
ini_set('display_errors', 1);

include('connection.php');

if(!empty($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    echo "No data has been entered for email";
    exit();
}
$email=stripslashes($email); //SQL injection protection by removing slashes
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "An email has been sent to your submitted email.";
	header("refresh:3;url=LogInPage.php");

}
else
{
	echo "Invalid e-mail address. Please enter a valid email address.";

	header("refresh:3;url=PasswordRecoveryPage.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>You will be redirected in <span id="counter">3</span> second(s).</p>
	<script type="text/javascript">
	function countdown() 
	{
    	var i = document.getElementById('counter');
    	if (parseInt(i.innerHTML)<=0) 
    	{
        	//location.href = 'LogInPage.php';
    	}
    		i.innerHTML = parseInt(i.innerHTML)-1;
	}
		setInterval(function(){ countdown(); },1000);
	</script>
</body>
</html>