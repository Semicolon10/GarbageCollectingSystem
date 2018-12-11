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
echo "Connected successfully";

if( isset( $_POST['userName'] ) && !empty( $_POST['userName'] ) )
    {
        $userName = $_POST['userName'];
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

$insertQuery="INSERT INTO LoginCredentials VALUES('$userName','$password')";

if ($connection->query($insertQuery) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $insertQuery . "<br>" . $connection->error;
}

$connection->close();
?>
