<?php
$serverName = "localhost";
$lhUserName = "root";
$lhPassword = "Asiri#Iroshan#1996";
$database = "GarbageCollectionSystem";
// Create connection
$connection = new mysqli($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

if( isset( $_POST['userName'] ) && !empty( $_POST['userName'] ) )
    {
        $userName = $_POST['userName'];
    } else {
        echo "No data";
        exit();
    }
 if( isset( $_POST['email'] ) && !empty( $_POST['email'] ) )
    {
        $email = $_POST['email'];
    } else {
        echo "No data";
        exit();
    }
if(isset($_POST['password'])&&!empty($_POST['password']))
{
	$password=$_POST['password'];
}
else {
        echo "No data";
        exit();
    }
$selectQuery="SELECT* from UserDetails where email='$email'";
if ($connection->query($selectQuery)->num_rows>0) {
    echo "This email is already in use. Please use a different email";
    
    exit();
    }

$insertQuery="INSERT INTO UserDetails VALUES('$userName','$email','$password')";

if ($connection->query($insertQuery) == TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $connection->error;
}

$connection->close();
?>
