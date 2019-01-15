<?php
include('session.php');
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);


include('connection.php');

$UserName=$_SESSION['username'];
if(empty($_POST["PostTopic"]))
{

		$errorMessage= "Please enter the topic";
    	echo("<script>alert('$errorMessage');</script>");
    	if($_SESSION['userType']=='admin')
			header("refresh:0;url=createPostPageAdmin.php");
		else
			header("refresh:0;url=createPostPage.php");
    	unset($errorMessage);
    	
}
else
{
	$PostTopic=$_POST["PostTopic"]; 
	$PostTopic=stripslashes($PostTopic);
	$PostTopic=mysqli_real_escape_string($connection,$PostTopic);
	if(empty($_POST["Description"]))
	{
			$errorMessage= "Please enter the description";
    		echo("<script>alert('$errorMessage');</script>");
    		if($_SESSION['userType']=='admin')
				header("refresh:0;url=createPostPageAdmin.php");
			else
				header("refresh:0;url=createPostPage.php");
    		unset($errorMessage);
    		
	}
	else
	{
			$PostDescription=$_POST["Description"];
			$PostDescription=stripslashes($PostDescription);
			$PostDescription=mysqli_real_escape_string($connection,$PostDescription);
			if(empty($_FILES["myimage"]["name"]))
			{
				$errorMessage= "Please enter an image";
    			echo("<script>alert('$errorMessage');</script>");
    			if($_SESSION['userType']=='admin')
						header("refresh:0;url=createPostPageAdmin.php");
					else
						header("refresh:0;url=createPostPage.php");
    					unset($errorMessage);
    			
			}
			else
			{
				$check=getimagesize($_FILES["myimage"]["tmp_name"]);
        		if($check==false)
        		{
            		echo "<script>alert('Please enter an image');</script>";
            		if($_SESSION['userType']=='admin')
						header("refresh:0;url=createPostPageAdmin.php");
					else
						header("refresh:0;url=createPostPage.php");
    					unset($errorMessage);
        		}
        		else
        		{
            		$imagename=$_FILES["myimage"]["name"]; 
					if(empty($_POST["latitude"]||empty($_POST["longitude"])))
					{
						$errorMessage= "Please select the location on the map";
    					echo("<script>alert('$errorMessage');</script>");
    					if($_SESSION['userType']=='admin')
							header("refresh:0;url=createPostPageAdmin.php");
						else
							header("refresh:0;url=createPostPage.php");
    					unset($errorMessage);
    				
					}
					else
					{
						$latitude=$_POST["latitude"];
						$longitude=$_POST["longitude"];
					
						//Get the content of the image and then add slashes to it 
						$ImageContent=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

						//Insert the image name and image content in image_table
						$insertQuery="INSERT INTO Posts(UserName,PostTopic,PostDescription,ImageContent,ImageName,Latitude,Longitude) VALUES('$UserName','$PostTopic','$PostDescription','$ImageContent','$imagename','$latitude','$longitude')";

						if(mysqli_query($connection,$insertQuery))
						{
							echo "<script>alert('Successfully Published');</script>";
							if($_SESSION['userType']=='admin')
								header("refresh:0;url=PostsPageAdmin.php");
							else
								header("refresh:0;url=PostsPage.php");
						}
						else
						{	
							echo "<script>alert('Failed');</script>";
							echo mysqli_error($connection);
							if($_SESSION['userType']=='admin')
								header("refresh:50;url=PostsPageAdmin.php");
							else
								header("refresh:50;url=PostsPage.php");
						}
						unset($latitude);
						unset($longitude);
						unset($ImageContent);
						unset($insertQuery);
					}
        		}
				
				unset($check);
			}
			unset($PostDescription);
	}
	unset($PostTopic);
}
mysqli_close($connection);
unset($connection);
unset($UserName);

?>