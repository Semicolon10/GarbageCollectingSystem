<?php
include('session.php');
include('connection.php');
$username=$_SESSION['username'];
$updateQuery="UPDATE UserDetails SET UserType='normal' WHERE UserName='$username'";
if(mysqli_query($connection,$updateQuery))
{
	header("location:LogOut.php");
}
else
{
	echo "<script>Unable to process the request</script>";
	header("refresh:0;url=adminControlPage.php");
}
mysqli_close($connection);
unset($connection);
?>