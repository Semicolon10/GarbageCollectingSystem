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
//Anti SQL injection
    $userName=stripslashes($userName);
    $password=stripslashes($password);
    $userName=mysqli_real_escape_string($connection,$userName);
    $password=mysqli_real_escape_string($connection,$password);
//Compare the hashes of the passwords(entered and what's in the database)

$selectQuery="SELECT password from UserDetails where UserName='$userName'";
$result=mysqli_query($connection,$selectQuery);
$encryptedPassword=mysqli_fetch_assoc($result);
if(password_verify($password, $encryptedPassword['password']))
    { 
        echo "Login Successful";
        header("Location: /home/airoshan/Docum…tory/WebFinalProject/Welcome.html");
    }
else
    echo "Your username or password is incorrect. Please try again";


/*$selectQuery="SELECT password from UserDetails where UserName='$userName'";
$result=mysqli_query($connection,$selectQuery);
$encryptedPassword=mysqli_fetch_assoc($result);
$textToDecrypt=$encryptedPassword["password"];
$encryptionMethod = "AES-256-CBC";
$secretHash = "encryptionhash";
$iv = mcrypt_create_iv(16, MCRYPT_RAND);
$decryptedPassword= openssl_decrypt($textToDecrypt, $encryptionMethod, $secretHash, 0, $iv);
echo $decryptedPassword;*/
/*
 $selectQuery="SELECT * FROM UserDetails where UserName='$userName' AND password='$password'";
 if ($connection->query($selectQuery)->num_rows>0) {
    echo "Login Successful";
} else {
    //echo "Error: " . $insertQuery . "<br>" . $connection->error;
   echo "Username or Password is incorrect. Please try again.";

}
*/
$connection->close();
?>

