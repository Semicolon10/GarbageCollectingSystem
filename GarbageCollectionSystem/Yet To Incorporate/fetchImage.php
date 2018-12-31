<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('session.php');
include('connection.php');

$selectImage="SELECT * from Images where ImageName='fedora.jpg'";
$result=mysqli_query($connection,$selectImage);
if($row=mysqli_fetch_assoc($result))
{
	
	$image_name=$row['ImageName'];
	$image_content=$row['Image'];
	$image=base64_encode($image_content);
	
}
 
  echo '<img src="data:image/jpeg;base64,'.$image.'" width="50%"/>';
  mysqli_close($connection);
?>
