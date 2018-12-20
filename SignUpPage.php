<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form action="SignUp.php" method="post" id="inputForm">
  <div class="containerContent">
    <h2 style="text-align: center;">Sign Up For Colombo Garbage Collection Service</h2>
<!--
<ul>
  <li><a class="#welcome" href="Welcome.html">Welcome</a></li>
  <li><a href="#news">Posts</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li id="LogInList" ><a href="LogIn.html">Log In</a></li>
  <li id="SignUpList" class="active"><a href="SignUp.html">SignUp</a></li>
</ul>
<hr/>
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
    <p>Please fill the form below to create an account.</p>
    <hr/>
    <label for="userName"><b>User Name</b></label>
    <input type="text" placeholder="Enter Username" name="userName" required=""  />

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required="" />

    <label for="contactNumber"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter contact number" name="contactNumber" id="contactNumber" required=""/>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password"  required="" />

    <label for="passwordConfirm"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="passwordConfirm" id="passwordConfirm" onChange="checkPassword();"  required="" />
   
    <hr/>
    <p>By creating an account you agree to our <a href="TermsAndConditions.php">Terms & Conditions</a>.</p>

    <button type="button" class="executeButton" id="signUpButton" onclick="setColor(); contactNumberValidation();">Sign Up</button>
  </div>
</form>
<script type="text/javascript">
    var count = 1;
    function setColor() {
        
        if (count == 1) {
            document.getElementById("signUpButton").className="executeButtonClicked";
            count = 0;        
        }
        else {
            document.getElementById("signUpButton").className="executeButton";
            count = 1;
        }
    }
    function contactNumberValidation()
    {
      var contactNumber = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
      var number=document.getElementById("contactNumber").value;
      if(number.match(contactNumber))
        {
          var form = document.getElementById('inputForm');
          form.submit();
          
        }
        else
        {
          alert("Invalid Contact Number");
        }
    }

</script>

</body>
</html>
