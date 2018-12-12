<?php
$serverName = "localhost";
$lhUserName = "<localhostUserName>";
$lhPassword = "<localhostPassord>";
$database = "GarbageCollectionSystem";

// Create connection
$connection = new mysqli($serverName, $lhUserName, $lhPassword, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 
//echo "Connected successfully";

if( /*isset( $_POST['userName'] ) && */!empty( $_POST['userName'] ) )
    {
        $userName = $_POST['userName'];
    } else {
        echo "No data";
        exit();
    }
if(/*isset($_POST['password'])&&*/!empty($_POST['password']))
{
	$password=$_POST['password'];
}
else {
        echo "No data";
        exit();
    }

 $selectQuery="SELECT * FROM UserDetails where UserName='$userName' AND password='$password'";
 if ($connection->query($selectQuery)->num_rows>0) {
    echo "Login Successful";
} else {
    //echo "Error: " . $insertQuery . "<br>" . $connection->error;
   echo "Username or Password is incorrect. Please try again.";

}

$connection->close();
?>

