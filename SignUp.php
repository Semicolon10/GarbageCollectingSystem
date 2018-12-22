<?php
//connect to database
include('connection.php');

if(!empty( $_POST['userName']))
{
    $username=$_POST['userName'];
}
else
{
    $errorMessage= "Please enter the username";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
    mysqli_close($connection);
    exit();
}
if(!empty($_POST['email']))
{
    $email=$_POST['email'];
}
else
{
    $errorMessage= "Please enter the E-mail address";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
    mysqli_close($connection);
    exit();
}
if(!empty($_POST['contactNumber']))
{
    $contactNumber=$_POST['contactNumber'];   
    
}
else
{
    $errorMessage= "Please enter the contact number";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
    mysqli_close($connection);
    exit();
}
if(!empty($_POST['password']))
{
    $password=$_POST['password'];
}
else
{
    $errorMessage= "Please enter the password";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
    mysqli_close($connection);
    exit();
}
if(!empty($_POST['passwordConfirm']))
{
    $passwordConfirm=$_POST['passwordConfirm'];
}
else
{
    $errorMessage= "Please confirm the password";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
    mysqli_close($connection);
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
$contactNumber=stripslashes($contactNumber);
$contactNumber=mysqli_real_escape_string($connection,$contactNumber);

if($password!=$passwordConfirm)
{
    $errorMessage= "Passwords do not match";
    echo("<script>alert('$errorMessage');</script>");
    header("refresh:0; url=SignUpPage.php");
}
else
{
    //Encrypting Password
    $passwordHash=password_hash($password,PASSWORD_DEFAULT);


    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validating the email address


    
        $insertQuery="INSERT INTO UserDetails values('$username','$email','$contactNumber','$passwordHash')";
        $selectQuery="SELECT * from UserDetails where userName='$username'";
        $result=mysqli_query($connection,$selectQuery);
        if(mysqli_num_rows($result)>0)
        {
            $errorMessage="This username is taken. Please use a different username";
            echo("<script>alert('$errorMessage');</script>");
             header("refresh:0; url=SignUpPage.php");
        }
        else
        {
            $selectQuery="SELECT * from UserDetails where Email='$email'";
            $result=mysqli_query($connection,$selectQuery);
            if(mysqli_num_rows($result)>0)
            {
                $errorMessage="There is already an account associated with this E-mail address. Please use a different E-mail address";
                    echo("<script>alert('$errorMessage');</script>");
                header("refresh:0; url=SignUpPage.php");
            }
            else
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $selectQuery="SELECT * from UserDetails where ContactNumber='$contactNumber'";
                        $result=mysqli_query($connection,$selectQuery);
                        if(mysqli_num_rows($result)>0)
                        {
                            $errorMessage="There is already an account associated with this contact number";
                            echo("<script>alert('$errorMessage');</script>");
                            header("refresh:0; url=SignUpPage.php");
                        }
                        else
                        {

                            if(mysqli_query($connection,$insertQuery))
                            {
                                $message= "Successfully Registered";
                                echo("<script>alert('$message');</script>");
                                header("refresh:0; url=index.php");
                            }
                            else
                            {
                                $errorMessage= "Registration failed";
                                echo("<script>alert('$errorMessage');</script>");
                                header("refresh:0; url=SignUpPage.php");
                            }   
                        }
                        
                    }
                else
                    {
                        $errorMessage= "Invalid Email address";
                        echo("<script>alert('$errorMessage');</script>");
                        header("refresh:0; url=SignUpPage.php");
                    }
            }
            
        }

}
mysqli_close($connection);
?> 


