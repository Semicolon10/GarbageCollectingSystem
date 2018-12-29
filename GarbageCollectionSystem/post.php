<?php
include('session.php');
include('connection.php');
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
<br>
<br>
<br>

</body>

<script type="text/javascript">
  function redirect()
  {
    window.open("reportPostPage.php");
  }
</script>
</html>
<?php
if (isset($_GET['id'])) 
{
	
	if ($_GET["id"]) 
	{
		$result = mysqli_query($connection,"SELECT * FROM Posts WHERE PostNumber='".$_GET['id']."'");

		if (mysqli_num_rows($result)) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				echo "<div id='postcontainer'>";
				echo "<h1>".$row['PostTopic']."</h1>";
				echo "<hr>";
				$ImageContent=$row['ImageContent'];
				$ImageContent=base64_encode($ImageContent);
				echo '<img src="data:image/jpeg;base64,'.$ImageContent.'" width="50%"/>';
				echo "<h2>".$row['PostDescription']."</h2>";
				
				echo "<right><h5>by ".$row['UserName']."</h5></right>";

				echo "<hr>";

				//echo "<h3> on ".$row['date']."</h3>";

				//".$row['username']."</a>
				echo "</div>";
			}
		}
			else
			{
				echo "topic not found";
			}
	}
	
}
?>