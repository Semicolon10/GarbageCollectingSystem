<?php
include('connection.php');
$username="Asiri";
$password="bla";
$email="a@a.com";
$contactNo="0768386669";
$query="INSERT INTO UserDetails values('$username','$email','$contactNo','$password')";
mysqli_query($connection,$query);

?>