<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="containerContent">
		<h2 style="text-align: center;">Report a post</h2>
		
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
      
    </div>
  </div> 
</div>
<form action="reportPost.php" method="post" id="inputFormContactUs">
<label for="postNumber"><b>Post Number</b></label>
<input type="text" name="postNumber" id="postNumber" placeholder="Please enter the post number"/>
<label for="reason"><b>Reason to complain</b></label>
<input type="text" list="reasons" name="reason" id="reason" placeholder="Please select a type of complaint"/>
<datalist id="reasons">
    <option value="Misinformation">
    <option value="Harassment">
    <option value="Spam">
    <option value="Impersonation">
    <option value="Private information">
    <option value="It is a BLATANT LIE! ">
    <option value="Profanity">
    <option value="I disagree with this post">
  </datalist>
<label for="yourEmail"><b>Description</b></label>
<textarea class="Description" id="complaintDescription" name="complaintDescription" placeholder="Please describe more about the situation">
</textarea>
<input type="button" name="executeButton" class="executeButton" value="Report" onclick="formValidation()" />

</form>
</div>
</body>
<script type="text/javascript">
  function formValidation()
  {
    var form=document.getElementById('inputFormContactUs');
    if(form['postNumber'].value)
    {
      deHighlight('postNumber');
      if(form['reason'].value)
      {
        deHighlight('reason');
        form.submit();
        
      }
      else
      {
        highlight('reason');
      }
    }
    else
    {
      highlight('postNumber');
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
  

</script>
</html>