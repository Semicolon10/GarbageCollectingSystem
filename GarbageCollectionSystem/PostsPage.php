<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Posts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="containerContent">
		<h2 style="text-align: center;">Posts</h2>

		
		

  
<div class="navigationbar">
  <a href="WelcomePage.php">Welcome</a>
  <a class="active" href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="LogOut.php">Log Out</a>
      <a href="" onclick="redirect()">Report</a>
    </div>
  </div> 
</div>
<div id="postPageBtnContainer">
<form>
<input type="button" name="YourPosts" value="Your Posts" class="yourPostsBtn"/> 
</form>
<form method="post" action="createPostPageAdmin.php">
<input type="submit" name="createPost" value="Create a post" class="createPostBtn" />
</form> 
</div>

			
	
		
</div>

</body>
<script type="text/javascript">
  function redirect()
  {
    window.open("reportPostPage.php");
  }
</script>
</html>