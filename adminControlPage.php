<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin control page</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="containerContent" style="position: absolute;">
		<h2 style="text-align: center;">Admin Controls</h2>

		
		

  
<div class="navigationbar">
  <a href="WelcomePageAdmin.php">Welcome</a>
  <a href="PostsPage.php">Posts</a>
  <a href="ContactPageAdmin.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button id="active" class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
      <a href="ProfilePageAdmin.php">Account</a>
      
      <a href="LogOut.php">Log Out</a>
      
      
    </div>
  </div> 
</div>

			
	
		
</div>

</body>
</html>
