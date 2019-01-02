<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<form action="SignUp.php" method="post" id="inputForm">
  <div class="containerContent">
    <h2 style="text-align: center;">Sign Up For Colombo Garbage Collection Service</h2>

<div class="navigationbar" id="navbar">
  <a class="active" href="WelcomePageGuest.php"><i class="fa fa-home"></i> Home</a>
  
  <a href="ContactPageGuest.php"><i class="fa fa-phone-square"></i> Contact Us</a>
  <a href="aboutGuest.php"><i class="fa fa-question-circle"></i> About Us</a>
  <a href="index.php" style="float: right;">Log In</a>
</div>


    <p>Please fill the form below to create an account.</p>
    <hr/>
    <label for="userName"><b>User Name</b></label>
    <input type="text" placeholder="Enter Username" name="userName" id="userName" required=""  />

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required="" />

    <label for="contactNumber"><b>Contact Number</b></label>
    <input type="text" placeholder="Enter contact number" name="contactNumber" id="contactNumber" required="" placeholder="Enter Contact Number"/>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password"  required="" />

    <label for="passwordConfirm"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="passwordConfirm" id="passwordConfirm" onChange="checkPassword();"  required="" />
   
    <hr/>
    <p>By creating an account you agree to our <a href="TermsAndConditions.php">Terms & Conditions</a>.</p>

    <button type="button" class="executeButton" id="signUpButton" onclick="formValidation();">Sign Up</button>
  
  </div>
</form>
<script type="text/javascript">
   
    function formValidation()
    {
      
      var form=document.getElementById('inputForm');
      if(form['userName'].value)
      {
        deHighlight("userName");
        if(form['email'].value)
        {
          if(emailValidation())
          {
            deHighlight("email");
            if(form['contactNumber'].value)
            {
              deHighlight("contactNumber");
              if(contactNumberValidation())
              {
                deHighlight("contactNumber");
                if(form['password'].value)
                {
                  deHighlight("password");
                  if(form['passwordConfirm'].value)
                  {
                    deHighlight("passwordConfirm");
                    if(form['password'].value==form['passwordConfirm'].value)
                    {
                      deHighlight("password");
                      deHighlight("passwordConfirm");
                      form.submit();
                    }
                    else
                    {
                      highlight("password");
                      highlight("passwordConfirm");
                      alert("Passwords do not match");
                    }
                  }
                  else
                  {
                    highlight("passwordConfirm");
                  }
                }
                else
                {
                  highlight("password");
                }
              }
              else
              {
                highlight("contactNumber");
                document.getElementById("contactNumber").value="Please enter a valid contact number";
              }
            }
            else
            {
              highlight("contactNumber");
              
            }
          }
          else
          {
            highlight("email");
            document.getElementById("email").value="Please enter a valid E-mail address";
          }
        }
        else
        {
          highlight("email");
        }
      }
      else
      {
        highlight("userName");
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
      var contactNumber=document.getElementById("contactNumber").value;
     
                if(contactNumber.match(format))
                {
                 
                  return true;
                }
                else
                {
                  
                  return false;
                }
   }
   function emailValidation()
   {
    var format=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var email=document.getElementById("email").value;
    if(email.match(format))
    {
      return true;
    }
    else
    {
      return false;
    }
   }



  window.onscroll = function() {myFunction()};

  var navigationbar = document.getElementById("navigationbar");
  var sticky = navigationbar.offsetTop;

  function myFunction() 
  {
    if (window.pageYOffset >= sticky) {
      navigationbar.classList.add("sticky")
    } 
    else 
    {
      navigationbar.classList.remove("sticky");
    }
  }


</script>

</body>
</html>


