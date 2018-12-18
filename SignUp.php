<?php
//connect to database
include('connection.php');

if(!empty( $_POST['userName']))
{
    $username=$_POST['userName'];
}
else
{
    echo "No data has been entered for username. Redirecting.....";
    header("refresh:3;url=SignUpPage.php");
    exit();
}
if(!empty($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    echo "No data has been entered for email. Redirecting.......";
    header("refresh:3;url=SignUpPage.php");
    exit();
}
if(!empty($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
    echo "No data has been entered for password. Redirecting........";
    header("refresh:3;url=SignUpPage.php");
    exit();
}
if(!empty($_POST['passwordConfirm']))
{
    $passwordConfirm=$_POST['passwordConfirm'];
}
else
{
    echo "No data has been entered for password confirmation. Redirecting........";
    header("refresh:3;url=SignUpPage.php");
    exit();
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


    
        $insertQuery="INSERT INTO UserDetails values('$username','$email','$passwordHash')";
        $selectQuery="SELECT * from UserDetails where userName='$username'";
        $result=mysqli_query($connection,$selectQuery);
        if(mysqli_num_rows($result)>0)
        {
            echo("This username is taken. Please use a different username.");
             header("refresh:3;url=SignUpPage.php");
        }
        else
        {
            $selectQuery="SELECT * from UserDetails where Email='$email'";
            $result=mysqli_query($connection,$selectQuery);
            if(mysqli_num_rows($result)>0)
            {
                echo("There is already an account associated with this E-mail address.
                    Please use a different E-mail address.");
                header("refresh:3;url=SignUpPage.php");
            }
            else
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if(mysqli_query($connection,$insertQuery))
                        {
                            echo "Successfully Registered";
                            header("refresh:3;url=index.php");
                        }
                        else
                        {
                            echo "Registration failed :(";
                            header("refresh:3;url=SignUpPage.php");
                        }
                    }
                else
                    {
                        echo "Invalid Email address";
                        header("refresh:3;url=SignUpPage.php");
                    }
            }
            
        }

}
mysqli_close($connection);
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


