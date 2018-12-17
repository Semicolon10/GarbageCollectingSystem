<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>
<div class="containerProfile">
  <h1 id="profilePageHeading">Hi There</h1>
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a href="#posts">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div id="active" class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="LogInPage.php">Log In</a>
      <a href="#">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
</div>
</body>
</html>