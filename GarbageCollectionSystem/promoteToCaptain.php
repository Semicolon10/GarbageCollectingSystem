<?php
include('session.php');
include('connection.php');
if(isset($_GET['UserName']))
{
  $UserName=$_GET['UserName'];
  $updateQuery="UPDATE UserDetails SET UserType='admin' where UserType='captain' AND NOT UserName='$UserName'";
  $changeQuery="UPDATE UserDetails SET UserType='captain' WHERE UserName='$UserName'";
  if(mysqli_query($connection,$updateQuery))
  {
    if(mysqli_query($connection,$changeQuery))
    {
      echo "<script>alert('User promoted to captain successfully');</script>";
      header("refresh:0;url=Admins.php");
    }
    else
    {
      echo "<script>alert('Unable to promote the user');</script>";
    
      header("refresh:0;url=Admins.php");
    }
    unset($UserName);
    unset($changeQuery);
  }
  else
  {
      echo "<script>alert('Unable to promote the user');</script>";
    
      header("refresh:0;url=Admins.php");
  }
  
}
else
{
  echo "<script>alert('Unable to obtain the username');</script>";
    header("refresh:0;url=Users.php");
}
mysqli_close($connection);
?>