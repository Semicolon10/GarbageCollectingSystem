<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('connection.php');
session_start();
$user=$_SESSION['username'];
$selectQuery="SELECT * from UserDetails where UserName='$user'";
$result=mysqli_query($connection,$selectQuery);
if (!(mysqli_num_rows($result) > 0))
{
    echo "Please Log In. Redirecting.....";
    header("refresh:1;url=index.php");
    mysqli_close($connection);
    exit();
}
mysqli_close($connection);
?>