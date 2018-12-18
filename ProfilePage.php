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
<form id="inputForm" method="post" action="deleteAccount.php">
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
    <input type="text" id="currentPassword" placeholder="Enter Current Password" name="currentPassword" required="" oninput="testInput()">
    <br/>
    <input type="password" placeholder="Enter a new password" name="password" required="">
    <br/>
    <input type="password" placeholder="Confirm password" name="confirmPassword" required="">
    <br/>
    <br/>
    <hr/>
    <br/>
    
    <input type="submit" name="change" value="Change Password" class="changePasswordButton" formaction="changePassword.php">
    <input type="button" id="delete" name="delete" value="Delete Account" class="deleteAccountButton" onclick="redirect()">
    

    <script type="text/javascript">
     
     function redirect()
      {
        var password=document.getElementById('currentPassword').value;
        var form = document.getElementById('inputForm');
        if(form['currentPassword'].value)
        {
          form.submit();
          //window.location.href = "deleteAccount.php?w1=" + encodeURIComponent(password);
          //location.href = "deleteAccount.php";
        }
        else{
        
          //alert("Please enter the currentPassword");
          form['currentPassword'].value="PLEASE ENTER THE CURRENT PASSWORD HERE!";
          form['currentPassword'].style.backgroundColor="yellow";
        }
      }
      
      function testInput(){
      var form = document.getElementById('inputForm');
      if (form['currentPassword'].value)
        {
              form['delete'].style.backgroundColor="#ff0000";
        }
      else
        {
              form['delete'].style.backgroundColor="#ba0000";
        }
      }


      </script>

</div>
</form>
</body>
</html>