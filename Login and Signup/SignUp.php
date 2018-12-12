<?php
$serverName = "localhost";
$lhUserName = "<localhostUserName>";
$lhPassword = "<localhostPassword>";
$database = "GarbageCollectionSystem";
// Create connection
$connection = new mysqli($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

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




// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validating the email address


if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $insertQuery="INSERT INTO UserDetails values('$username','$email','$password')";
    if($connection->query($insertQuery) === TRUE)
    {
        echo "New Record created";
    }
    else
    {
        echo "Record Creating Failed";
    }
}
else
{
    echo "Invalid Email address";
}
$connection->close();
?> 


