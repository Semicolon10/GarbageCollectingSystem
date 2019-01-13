<?php
include('session.php');
include('connection.php');

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
 
  <div class="profileMenu">
    <button class="profileButton" id="active"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
        <a href="ProfilePageAdmin.php">Account</a><br/>
      
      <a href="LogOut.php">Log Out</a>
   </div>
  </div> 
</div>
<div id="adminControlButtonsContainer">
<form method="post" action="ReportedPosts.php">
  <button class="reportedPostsBtn" onclick="submit()">Reported Posts</button>
</form>

<form action="LeaveCaptainship.php" id="leaveCaptainForm">
  <button class="leaveAdminBtn" onclick="leaveCaptainship()">Leave Captainship</button>
</form>
</div>
			
	
		
</div>

</body>
<script type="text/javascript">
function leaveCaptainship()
{
  var form=document.getElementById("leaveCaptainForm");
  if(confirm("Are you sure?"))
  {
    form.submit();
  }
}
</script>
</html>
