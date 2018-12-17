<?php
//connect to database
include('connection.php');

if(!empty( $_POST['userName']))
{
    $username=$_POST['userName'];
}
else
{
    echo "No data has been entered for username";
    exit();
}
if(!empty($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    echo "No data has been entered for email";
    exit();
}
if(!empty($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
    echo "No data has been entered for password";
    exit();
}
if(!empty($_POST['passwordConfirm']))
{
    $passwordConfirm=$_POST['passwordConfirm'];
}

$username=stripslashes($username);
$password=stripslashes($password);
$passwordConfirm=stripslashes($passwordConfirm);
$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);
$passwordConfirm=mysqli_escape_string($connection,$passwordConfirm);
$email=stripslashes($email);
$email=mysqli_real_escape_string($connection,$email);

if($password!=$passwordConfirm)
{
    echo "Passwords don't match";
    header("refresh:3;url=SignUpPage.php");
}
else
{
    //Encrypting Password
$passwordHash=password_hash($password,PASSWORD_DEFAULT);


// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validating the email address


if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $insertQuery="INSERT INTO UserDetails values('$username','$email','$passwordHash')";
    if($connection->query($insertQuery) === TRUE)
    {
        echo "Successfully Registered";
        header("refresh:3;url=LogInPage.php");
    }
    else
    {
        echo "Record Creating Failed";
    }
}
else
{
    echo "Invalid Email address";
    header("refresh:3;url=SignUpPage.php");
}
}




$connection->close();
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


