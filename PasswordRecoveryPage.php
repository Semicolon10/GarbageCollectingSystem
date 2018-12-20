<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
  <link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="PasswordRecovery.php" method="post" id="inputForm">
	<div class="containerContent">
		<h2 style="text-align: center;">Password Recovery</h2>
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
 <br/><br/>

		<label for="email">Email</label>
		<input type="text" placeholder="Enter Email" name="email" id="email" required>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<hr/>
		<p>An email with the username and password will be sent to your email if you have an account with the submitted email. Thank you.</p>
		<button type="button" class="executeButton" id="RecoverButton" onclick="setColor(); formValidation();">Recover</button>
		
	</div>
</form>
<script type="text/javascript">
	var count = 1;
    function setColor() {
        
        if (count == 1) {
            document.getElementById("RecoverButton").className="executeButtonClicked";
            count = 0;        
        }
        else {
            document.getElementById("RecoverButton").className="executeButton";
            count = 1;
        }
    }
    function formValidation()
    {
      var form=document.getElementById("inputForm");
      if(form['email'].value)
      {
        deHighlight("email");
        emailValidation();
        
      }
      else
      {
        highlight("email","your email");
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

    function emailValidation()
    {
      var format=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var email=document.getElementById("email").value;
      var form=document.getElementById("inputForm");
      if(email.match(format))
        {
          deHighlight("email");
          form.submit();
        }
      else
        {
          highlight("email","a valid email address");
        }
   }
</script>
</body>
</html>