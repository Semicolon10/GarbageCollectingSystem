

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

$selectImage="SELECT * from Posts";
$result=mysqli_query($connection,$selectImage);
if($row=mysqli_fetch_assoc($result))
{
	$image_name=$row['ImageName'];
	$image_content=$row['ImageContent'];
	$image=base64_encode($image_content);
	
}
 
  echo '<img src="data:image/jpeg;base64,'.$image.'" width="50%"/>';

?>
