

<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="containerContent">
    <h2 style="text-align: center;">Contact Us</h2>
    
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a href="PostsPage.php">Posts</a>
  <a class="active" href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="adminControlPage.php">Admin Controls</a>
      <a href="LogOut.php">Log Out</a>
    </div>
  </div> 
</div>
<form action="Contact.php" method="post" id="inputFormContactUs">
<label for="yourName"><b>Your Name</b></label>
<input type="text" name="yourName" id="yourName" placeholder="Please enter your name"/>
<label for="yourEmail"><b>Your Email</b></label>
<input type="text" name="yourEmail" id="yourEmail" placeholder="Please enter your E-mail"/>
<label for="yourEmail"><b>Your Message</b></label>
<textarea class="Description" id="yourMessage" name="Description" placeholder="Please enter your message">
</textarea>
<input type="button" name="executeButton" class="executeButton" value="Send" onclick="formValidation()" />

</form>
</div>
</body>
<script type="text/javascript">
  function formValidation()
  {
    var form=document.getElementById('inputFormContactUs');
    if(form['yourName'].value)
    {
      deHighlight('yourName');
      if(form['yourEmail'].value)
      {
        deHighlight('yourEmail');
        if(emailValidation())
        {
          deHighlight('yourEmail');
          if(form['yourMessage'].value)
          {
            deHighlight('yourMessage');
            form.submit();
          }
          else
          {
            highlight('yourMessage');
          }
        }
        else
        {
          highlight('yourEmail');
          form['yourEmail'].value="Please enter a valid E-Mail address";
        }
      }
      else
      {
        highlight('yourEmail');
      }
    }
    else
    {
      highlight('yourName');
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
  
  function emailValidation()
   {
      var format=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var email=document.getElementById("yourEmail").value;
      if(email.match(format))
      {
        return true;
      }
      else
      {
        return false;
      }
   }
</script>
</html>


