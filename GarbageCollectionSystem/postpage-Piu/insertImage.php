<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$serverName = "localhost";
$lhUserName = "root";
$lhPassword = "Asiri#Iroshan#1996";
$database = "GarbageCollectionSystem";

// Create connection
$connection = mysqli_connect($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} 
//echo "Connected successfully";
$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO Images VALUES('$imagename','$imagetmp')";

if(mysqli_query($connection,$insert_image))
{
	echo "Success";
}
else
{	
	
	echo "failed".mysqli_error($connection);
}
mysqli_close($connection);
?>