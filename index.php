<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="LogIn.php" method="post" id="inputForm">	

	<div class="containerContent">
		<h2 style="text-align: center; color: white/*#242f34*/;">Login To Colombo Garbage Collection Service</h2>
	<!--
		<ul>
  <li><a href="Welcome.html">Welcome</a></li>
  <li><a href="#news">Posts</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li id="LogInList" class="active"><a href="LogIn.html">Log In</a></li>
  <li id="SignUpList" ><a href="SignUp.html">SignUp</a></li>
</ul>
-->
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

		
		<p>Please enter your username and password</p>
		<hr/>
		<br/><br/>
		<label for="userName">User Name</label>
		<input type="text" placeholder="Enter Username" name="userName" required="" id="userName">
		<label for="password">Password</label>
		<input type="password" placeholder="Enter Password" name="password" required="" id="password">
		
		<br/><br/><br/><hr/>
		<p>Forgot password? <a href="PasswordRecoveryPage.php">Recover Password</a>.</p>
    <p>Don't have an account? <a href="SignUpPage.php">Register</a>.</p>

     <button type="button" class="executeButton" id="logInButton" onclick="setColor(); formValidation();">Login</button>
		
	</div>
</form>

<script type="text/javascript">
function formValidation()
    {
      
      if(document.getElementById("userName").value)
      {
        deHighlight("userName");
        if(document.getElementById("password").value)
        {
          deHighlight("password");
          var form = document.getElementById('inputForm');
          form.submit();
        }
        else
        {
          highlight("password","the password");
        }
      }
      else
      {
        highlight("userName","the username!");
      }

 
    }
    function highlight(id,word)
    {
        alert("Please enter "+word);
        document.getElementById(id).style.backgroundColor="Yellow";
        document.getElementById(id).style.color="black";
    }
    function deHighlight(id)
    {
      document.getElementById(id).style.backgroundColor="#222d32";
      document.getElementById(id).style.color="white";
    }

    var count = 1;
    function setColor() {
        
        if (count == 1) {
            document.getElementById("logInButton").className="executeButtonClicked";
            count = 0;        
        }
        else {
            document.getElementById("logInButton").className="executeButton";
            count = 1;
        }
    }
</script>

</body>
</html>