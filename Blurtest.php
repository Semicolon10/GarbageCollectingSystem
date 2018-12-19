<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
 
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
    border-radius: 25px;
}

.backgroundImage {
  /* The image used */
  background-image: url(colombo.jpg);
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.contentContainer {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  /*border: 3px solid #f1f1f1;*/
  position: absolute;
  top: 50%;
  left: 50%;
  
  transform: translate(-50%, -50%);
  z-index: 1;
  width: 80%;
  padding: 16px;
  text-align: center;
  overflow: auto;
  
  
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    
}
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
.logInButton {
    background-color: #242f34;
    color: white;
    font-size: 16pt; 
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 1;
    float: bottom;
}

.logInButton:hover {
    background-color: #111;
}

label{
    color: #242f34;
}
p{
    color: #242f34;
}
/*
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #242f34;
  position: relative;
  float: right;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #ff0000;
}
#SignUpList{
    float: right;
}
#LogInList{
    float: right;
}
*/

.navigationbar {
  overflow: hidden;
  background-color: #242f34;
  font-family: Arial, Helvetica, sans-serif;
}

.navigationbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.profileMenu {
  float: right;
  overflow: hidden;

}

.profileMenu .profileButton {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navigationbar a:hover, .profileMenu:hover .profileButton {
  background-color: #111;
}

.profileMenu-content {
  display: none;
  position: absolute;
  right: 1%;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;

}

.profileMenu-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align:center;
}

.profileMenu-content a:hover {
  background-color: #ddd;
}

.profileMenu:hover .profileMenu-content {
  display: block;
}

#active {
  background-color: #ff0000;
}
#active:hover{
    background-color: #111;

}


</style>
</head>
<body>

<div class="backgroundImage"></div>

<div class="contentContainer">
 <!-- <h2>Blurred Background</h2>
  <h1 style="font-size:50px">I am John Doe</h1>
  <p>And I'm a Photographer</p>-->

<form action="LogIn.php" method="post"> 

  
    <h2 style="text-align: center; color: #242f34;">Login To Colombo Garbage Collection Service</h2>
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
    <input type="text" placeholder="Enter Username" name="userName" required="">
    <label for="password">Password</label>
    <input type="password" placeholder="Enter Password" name="password" required="">
    
    <br/><br/><br/><hr/>
    <p>Forgot password? <a href="PasswordRecoveryPage.php">Recover Password</a>.</p>
    <p>Don't have an account? <a href="SignUpPage.php">Register</a>.</p>
    <button type="submit" class="logInButton" id="logInButton" onclick="setColor();">Login</button>
    

</form>



</div>
<script type="text/javascript">
    var count = 1;
    function setColor() {
        var property = document.getElementById('logInButton');
        if (count == 0) {
            property.style.backgroundColor = "#242f34";
            property.style
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
