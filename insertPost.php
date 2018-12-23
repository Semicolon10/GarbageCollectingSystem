<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('session.php');
include('connection.php');

$imagename=$_FILES["myimage"]["name"]; 
$UserName=$_SESSION['username'];
$PostTopic=$_POST["PostTopic"];
$PostDescription=$_POST["PostDescription"];
$latitude=$_POST["latitude"];
$longitude=$_POST["longitude"];



//Get the content of the image and then add slashes to it 
$ImageContent=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insertQuery="INSERT INTO Posts(UserName,PostTopic,PostDescription,ImageContent,ImageName,Latitude,Longitude) VALUES('$UserName','$PostTopic','$PostDescription','$ImageContent','$imagename','$latitude','$longitude')";

if(mysqli_query($connection,$insertQuery))
{
	echo "<script>alert('Success');</script>";
	header("refresh:0;url=PostsPage.php");
}
else
{
	echo "<script>alert('Failed');</script>";
	header("refresh:0;url=PostsPage.php");
}
mysqli_close($connection);
?>