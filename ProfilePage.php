<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
  <link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="containerContent">

  <h2 style="text-align: center;">Hi There <?php echo $_SESSION['username']; ?></h2>
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
<div class="changeEmailBox">
  <hr/>
<form id="inputFormChangeEmail" method="post" action="changeEmail.php">
    <p>Change Email</p>
    <br/>
    <input type="text" id="Email" name="Email" placeholder="Enter a new email address">
    <br/>
    <input type="password" id="passwordForEmail" placeholder="Enter the password" name="passwordForEmail">
    <br/>
    <br/>
    <input type="button" name="changeEmail" value="Change Email" class="executeButton" onclick="redirectEmail()">
</form>

</div>

<div class="changeContactBox">
  <hr/>
<form id="inputFormChangeContact" method="post" action="changeContact.php">
    <p>Change Contact Number</p>
    <br/>
    <input type="text" id="Contact" name="Contact" placeholder="Enter a new contact number">
    <br/>
    <input type="password" id="passwordForContact" placeholder="Enter the password" name="passwordForContact">
    <br/>
    <br/>
    <input type="button" name="changeContact" value="Change Contact Number" class="executeButton" onclick="redirectContact()">
</form>

</div>

<div class="changePasswordBox">
<hr/>
<form id="inputFormChange" method="post" action="changePassword.php">
<p>Change Password</p>
<br/>
    <input type="text" id="currentPassword" placeholder="Enter Current Password" name="currentPassword">
    <br/>
    <input type="password" id="password" placeholder="Enter a new password" name="password">
    <br/>
    <input type="password" id="confirmPassword" placeholder="Confirm password" name="confirmPassword">
    <br/>
    <br/>
    <input type="button" name="change" value="Change Password" class="executeButton" onclick="redirectChange()">
</form>

</div>



<div class="deleteAccountBox">
  <hr/>
<form id="inputFormDelete" method="post" action="deleteAccount.php">
    <p>Delete Account</p>
    <br/>
    <input type="text" id="currentPasswordDelete" placeholder="Enter Current Password" name="currentPasswordDelete" oninput="testInput()">
    <br/>
    <br/>
    <input type="button" id="delete" name="delete" value="Delete Account" class="executeButtonDelete" onclick="redirectDelete()">
</form>
<hr/>
</div>


</div>
</body>
<script type="text/javascript">
      function redirectContact()
      {
        var form = document.getElementById('inputFormChangeContact');
        if(form['Contact'].value)
        {
          deHighlight("Contact");
          if(form['passwordForContact'].value)
          {
            deHighlight("passwordForContact");
            contactNumberValidation();
            
          }
          else
          {
            highlight("passwordForContact");
          }
        }
        else
        {
          highlight("Contact");
        }
      }

      function redirectEmail()
      {
        var form = document.getElementById('inputFormChangeEmail');
        if(form['Email'].value)
        {
          deHighlight("Email");
          if(form['passwordForEmail'].value)
          {
            deHighlight("Email");
            emailValidation();
          }
          else
          {
            highlight("passwordForEmail");
          }
        }
        else
        {
          highlight("Email");
        }
      }
     
     function redirectDelete()
      {
        
        var form = document.getElementById('inputFormDelete');
        if(form['currentPasswordDelete'].value)
        {
          deHighlight("currentPasswordDelete");
          form.submit(); 
         
        }
        else{
        
          highlight("currentPasswordDelete");

         
        }
      }

      function redirectChange()
      {
        var form = document.getElementById('inputFormChange');
        if(form['currentPassword'].value)
        {
          deHighlight("currentPassword");
          if(form['password'].value)
          {
            deHighlight("password");
            if(form['confirmPassword'].value)
            {
              deHighlight("confirmPassword");
              form.submit();
              
            }
            else
            {
              highlight("confirmPassword");
            }
          }
          else
          {
            highlight("password");
          }
        }
        else
        {
          highlight("currentPassword");
        }
      }
      
      function testInput(){
      var form = document.getElementById('inputFormDelete');
      if (form['currentPasswordDelete'].value)
        {
             
             document.getElementById("delete").className = "executeButtonDeleteLive";
        }
      else
        {
            
             document.getElementById("delete").className = "executeButtonDelete";
        }
      }
      function highlight(id)
      {
        
        document.getElementById(id).style.backgroundColor="Yellow";
        document.getElementById(id).style.color="black";
      }
    function deHighlight(id)
      {
        document.getElementById(id).style.backgroundColor="#222d32";
        document.getElementById(id).style.color="white";
      }

    function contactNumberValidation()
      {
        var format = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var form=document.getElementById('inputFormChangeContact');
        var contactNumber=form['Contact'].value;
     
                if(contactNumber.match(format))
                {
                  deHighlight("Contact");
                  form.submit();
                }
                else
                {
                  highlight("Contact");
                  form['Contact'].value="Please Enter a valid contact number";
                  
                }
      }
   function emailValidation()
      {
        var format=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var form=document.getElementById('inputFormChangeEmail');
        var email=form['Email'].value;
        if(email.match(format))
        {
          deHighlight("Email");
          form.submit();
        }
        else
        {
          highlight("Email");
          form['Email'].value="Please enter a valid E-Mail address";
        }
      }

      </script>
</html>