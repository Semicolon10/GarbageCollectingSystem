<?php
include('session.php');
include('connection.php');

if($_SESSION['userType']=='captain')
{
  header("location:captainControlPage.php");
  mysqli_close($connection);
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Control Panel</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="containerContent">
		<h2 style="text-align: center;">Control Panel</h2>

		
		

  
<div class="navigationbar" id="navbar">
  <a href="WelcomePageAdmin.php"><i class="fa fa-home"></i> Home</a>
  <a href="PostsPageAdmin.php"><i class="fa fa-pencil-square"></i> Posts</a>
  
  <div class="profileMenu" id="active">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content"><br/>
        <a href="ProfilePageAdmin.php">Account</a><br/>
      
      <a href="LogOut.php">Log Out</a>
   </div>
  </div> 
</div>
<div id="adminControlButtonsContainer">
<!--<form method="post" action="ReportedPosts.php">
  <button class="reportedPostsBtn" onclick="submit()">Reported Posts</button>
</form>-->

<form method="post" action="Users.php">
  <button class="usersBtn" onclick="submit()">Users</button>
</form>
<form method="post" action="Admins.php">
  <button class="adminsBtn" onclick="submit()">Admins</button>
</form>
<form method="post" action="UserMessages.php">
  <button class="userMessagesBtn" onclick="submit()">User messages</button>
</form>
<form method="post" action="GuestMessages.php">
  <button class="guestsMessagesBtn" onclick="submit()">Guests messages</button>
</form>
<form action="leaveAdminship.php" id="leaveAdminForm">
  <button class="leaveAdminBtn" onclick="leaveAdmin()">Leave adminship</button>
</form>
</div>
			
	
		
</div>

</body>
<script type="text/javascript">
function leaveAdmin()
{
  var form=document.getElementById("leaveAdminForm");
  if(confirm("Are you sure?"))
  {
    form.submit();
  }
}
</script>
</html>
