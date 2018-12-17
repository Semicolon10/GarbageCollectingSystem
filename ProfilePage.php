<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="ProfilePage.css">
</head>
<body>
<form method="post">
<div class="containerProfile">
  <h2 id="profilePageHeading">Hi There <?php echo $_SESSION['username']; ?></h2>
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div id="active" class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="index.php">Log In</a>
      <a href="LogOut.php">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
<br/> <br/>
<p>Change Password</p>
   
    <hr/>
    <br/>
    <input type="text" placeholder="Enter Current Password" name="currentPassword" required="">
    <br/>
    <input type="password" placeholder="Enter a new password" name="password" required="">
    <br/>
    <input type="password" placeholder="Confirm password" name="confirmPassword" required="">
    <br/>
    <br/>
    <hr/>
    <br/>
    <button type="submit" name="change" class="changePasswordButton" formaction="changePassword.php">Change Password</button>
    <button type="submit" name="delete" class="deleteAccountButton">Delete Account</button>

</div>
</form>
</body>
</html>