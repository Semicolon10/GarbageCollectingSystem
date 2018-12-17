<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
  <link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="PasswordRecovery.css">
</head>
<body>
<form action="PasswordRecovery.php" method="post">
	<div class="containerRecover">
		<h1 id="recoverPageHeading">Password Recovery</h1>
<!--
		<ul>
  <li><a href="Welcome.html">Welcome</a></li>
  <li><a href="#news">Posts</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li id="LogInList"  class="active"><a href="LogIn.html" >Log In</a></li>
  <li id="SignUpList"><a href="SignUp.html">SignUp</a></li>
</ul>
		
  -->

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
 <br/><br/>

		<label for="email">Email</label>
		<input type="text" placeholder="Enter Email" name="email" required>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<hr/>
		<p>An email with the username and password will be sent to your email if you have an account with the submitted email. Thank you.</p>
		<button type="submit" class="RecoverButton" id="RecoverButton" onclick="setColor();">Recover</button>
		
	</div>
</form>
<script type="text/javascript">
	var count = 1;
    function setColor() {
        var property = document.getElementById('RecoverButton');
        if (count == 0) {
            property.style.backgroundColor = "#242f34";
            count = 1;        
        }
        else {
            property.style.backgroundColor = "#ff0000";
            count = 0;
        }
    }
</script>
</body>
</html>