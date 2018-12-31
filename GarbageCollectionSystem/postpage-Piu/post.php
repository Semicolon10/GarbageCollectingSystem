<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="containerContentSpecial">
		<h2 style="text-align: center;">Posts</h2>

		
		
<!--	
<ul>
  <li><a class="active" href="Welcome.html">Welcome</a></li>
  <li><a href="#news">Posts</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li id="LogInList"><a href="LogIn.html">Log In</a></li>
  <li id="SignUpList"><a href="SignUp.html">SignUp</a></li>
  </ul>
-->

<!--<div class="navigation">
 <div class="dropdown">
  <button class="dropbtn">Profile</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
</div>
-->
  
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a class="active" href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="index.php">Log In</a>
      <a href="LogOut.php">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
		

			
	<!--<ul>
  		<li><a class="active" href="Welcome.html">Welcome</a></li>
  		<li><a href="#news">Posts</a></li>
  		<li><a href="Contact.html">Contact</a></li>
  		<li><a href="#about">About</a></li>
  		<li id="LogInList"><a href="LogIn.html">Log In</a></li>
  		<li id="SignUpList"><a href="SignUp.html">SignUp</a></li>
	</ul>
-->

		
<form class="uploadforam" action="insertImage.php" method="post" enctype="multipart/form-data">
  <div class="imageupload">
      <textarea class="status" name="status" placeholder="Write your post here!">
        
      </textarea>
      <br>
      <input type="file"  value="Browse" name="myimage" class="fileToUpload">
      <input type="submit" value="Post" name="submit_image" class="post">
  </div>
</form>
</body>
</html>
