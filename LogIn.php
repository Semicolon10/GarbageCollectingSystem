<?php
session_start();
include('connection.php');

if(!empty( $_POST['userName'] ) )
    {
        $userName = $_POST['userName'];
        if(!empty($_POST['password']))
        {
            $password=$_POST['password'];
            //Anti SQL injection
            $userName=stripslashes($userName);
            $password=stripslashes($password);
            $userName=mysqli_real_escape_string($connection,$userName);
            $password=mysqli_real_escape_string($connection,$password);
            //Compare the hashes of the passwords(entered and what's in the database)

            $selectQuery="SELECT password from UserDetails where UserName='$userName'";
            $result=mysqli_query($connection,$selectQuery);
            if(mysqli_num_rows($result)>0)
            {
                $hashedPassword=mysqli_fetch_assoc($result);

                if(password_verify($password, $hashedPassword['password']))
                { 
                    $selectQuery="SELECT * from UserDetails where UserName='$userName' AND UserType='admin'";
                    $result=mysqli_query($connection,$selectQuery);
                    unset($selectQuery);
                    if(mysqli_num_rows($result)>0)
                    {
                        $_SESSION['username']=$userName;
                        $_SESSION['timeout'] = time();
                        header("refresh:0;url=admin/WelcomePage.php");
                    }
                    else
                    {
                        $_SESSION['username']=$userName;
                        $_SESSION['timeout'] = time();
                        header("refresh:0; url=WelcomePage.php");
                    }
                    
                }
                else
                {
                    $errorMessage="Your username or password is incorrect. Please try again";
                    echo "<script type='text/javascript'>alert('$errorMessage');</script>";
                    header("refresh:0; url=index.php");
                    unset($errorMessage);
                }
                unset($hashedPassword);
            }
            else
            {
                echo("<script>alert('There is no account with this username');</script>");
                header("refresh:0;url=index.php");
            }
            
            unset($password);
            unset($userName);
            unset($selectQuery);
            unset($result);
        }
        
        else 
        {
            $errorMessage="Please enter the password";
            echo "<script type='text/javascript'>alert('$errorMessage');</script>";
            header("refresh:0; url=index.php");
            unset($errorMessage);
            
        }
        unset($userName);
    } 
    else 
    {
        $errorMessage="Please enter the username";
        echo "<script type='text/javascript'>alert('$errorMessage');</script>";
        header("refresh:0; url=index.php");
        unset($errorMessage);
    }

mysqli_close($connection);
unset($connection);
?>
