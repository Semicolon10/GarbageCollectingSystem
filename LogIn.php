<?php
session_start();
include('connection.php');

if( /*isset( $_POST['userName'] ) && */!empty( $_POST['userName'] ) )
    {
        $userName = $_POST['userName'];
    } else {
        $errorMessage="Please enter the username";
        echo "<script type='text/javascript'>alert('$errorMessage');</script>";
        header("refresh:0; url=index.php");
        mysqli_close($connection);
        exit();
    }
if(/*isset($_POST['password'])&&*/!empty($_POST['password']))
{
	$password=$_POST['password'];
}
else {
        $errorMessage="Please enter the password";
        echo "<script type='text/javascript'>alert('$errorMessage');</script>";
        header("refresh:0; url=index.php");
        mysqli_close($connection);
        exit();
    }
//Anti SQL injection
    $userName=stripslashes($userName);
    $password=stripslashes($password);
    $userName=mysqli_real_escape_string($connection,$userName);
    $password=mysqli_real_escape_string($connection,$password);
//Compare the hashes of the passwords(entered and what's in the database)

$selectQuery="SELECT password from UserDetails where UserName='$userName'";
$result=mysqli_query($connection,$selectQuery);
$hashedPassword=mysqli_fetch_assoc($result);
if(password_verify($password, $hashedPassword['password']))
    { 
      
        $_SESSION['username']=$userName;
        header("refresh:0; url=WelcomePage.php");

    }
else
    {
        $errorMessage="Your username or password is incorrect. Please try again";
        echo "<script type='text/javascript'>alert('$errorMessage');</script>";
        header("refresh:0; url=index.php");
    }


mysqli_close($connection);
?>
