<?php
ini_set('display_errors', 1);
include('PHPMailerAutoload.php');
include('connection.php');
//$user = new user();
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
				/*
				PASSWORD RECOVERY EMAIL SENDO
				*/
				//get user details
               /* $connection['where'] = array('email'=>$_POST['email']);
                $connection['return_type'] = 'single';*/
                $selectQuery="SELECT * FROM UserDetails WHERE Email='$email'";
                $result=mysqli_query($connection,$selectQuery);
                $array=mysqli_fetch_assoc($result);

                //send reset password email
                $to = $array['Email'];
                $subject = "Password Update Request";
                $mailContent = 'Dear '.$array['UserName'].' 
                <br/>Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
                <br/>your password is'. $newTempPassword.' 
                <br/><br/>Regards,
                <br/>Indrajith';
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: <ekanayakeindrajith@gmail.com>' . "\r\n";
                //send email
                mail($to,$subject,$mailContent,$headers);

                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Please check your e-mail.';
				$message="Password Resetted Successfully";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("refresh:0; url=LogOut.php");
				unset($message);
			}
			else
			{
				$errorMessage= "Couldn't update the password ".mysqli_error($connection);
				echo "<script type='text/javascript'>alert('$errorMessage');</script>";
				header("refresh:0; url=PasswordRecoveryPage.php");
				unset($errorMessage);
			}
		}
		else
		{
			$errorMessage="There is no account associated with this email. Please enter the correct email";
				echo "<script type='text/javascript'>alert('$errorMessage');</script>";
				header("refresh:0; url=PasswordRecoveryPage.php");
				unset($errorMessage);
		}
		
		unset($newTempPassword);
		unset($newTempPasswordHash);
		unset($queryUpdate);
		unset($querySelect);
		unset($result);
		

	}
	else
	{
		$errorMessage= "Invalid e-mail address. Please enter a valid email address";
		echo "<script type='text/javascript'>alert('$errorMessage');</script>";
		header("refresh:0; url=PasswordRecoveryPage.php");
		unset($errorMessage);
	}
	unset($email);
}
else
{
    $errorMessage= "No data has been entered for email";
    echo "<script type='text/javascript'>alert('$errorMessage');</script>";
    header("refresh:0; url=PasswordRecoveryPage.php");
    unset($errorMessage);
    
}

mysqli_close($connection);
unset($connection);
?>
