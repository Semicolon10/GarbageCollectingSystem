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
		<h2 style="text-align: center;"><i class="fa fa-pencil-square"></i> Posts</h2>

<div class="navigationbar" id="navbar">
  <a href="WelcomePage.php"><i class="fa fa-home"></i> Home</a>
  <a class="active" href="PostsPage.php"><i class="fa fa-pencil-square"></i> Posts</a>
  <a href="ContactPage.php"><i class="fa fa-phone-square"></i> Contact Us</a>
  <a href="#about"><i class="fa fa-question-circle"></i> About Us</a>
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
<form method="post" action="yourPostsPage.php">
<input type="submit" name="YourPosts" value="Your Posts" class="yourPostsBtn"/> 
</form>
<form method="post" action="createPostPage.php">
<input type="submit" name="createPost" value="Create a post" class="createPostBtn" />
</form> 
<br/><br/><br/><br/>
<?php
$user=$_SESSION['username'];
$result = mysqli_query($connection,"SELECT * FROM Posts ORDER BY PostNumber DESC");
echo "<br>";
echo "<div id='tablecontainer'>";
echo "<table id='table'>
<tr style='color:white; border-radius: 15px 50px;'>
<th>Post no</th>
<th>User</th>
<th>Topic</th>
<th>Image</th>
<th><i class='fa fa-question-circle'></i></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  @$id = $row['PostNumber'];
echo "<tr>";
echo "<td>".$row['PostNumber']."</td>";
echo "<td id='pn'>" . $row['UserName'] . "</td>";


echo "<td><a href='post.php?id=$id' style='text-decoration: none; font-weight: bold;'>" . $row['PostTopic'] . "</td>";

$ImageContent=$row['ImageContent'];
$ImageContent=base64_encode($ImageContent);
echo "<td><a href='post.php?id=$id'>".'<img  src="data:image/jpeg;base64,'.$ImageContent.'" height="100px"/>'."</td>";
echo "<td><a href='reportPostPage.php?id=$id' style='text-decoration: none;'>" . "Report" . "</td>";

//echo "<td><img src='images/".$row['ImageContent']."'></td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";

?>

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

include('navscript.php');

 ?>