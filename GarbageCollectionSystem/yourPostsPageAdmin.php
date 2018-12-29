<?php
include('session.php');
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="containerContent">
		<h2 style="text-align: center;">Posts</h2>

		
		

  
<div class="navigationbar">
  <a href="WelcomePageAdmin.php">Welcome</a>
  <a class="active" href="PostsPageAdmin.php">Posts</a>
  
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
      <a href="ProfilePageAdmin.php">Account</a>
      <a href="adminControlPage.php">Admin Controls</a>
      <a href="LogOut.php">Log Out</a>
      
      
    </div>
  </div> 
</div>

<?php
$user=$_SESSION['username'];
$result = mysqli_query($connection,"SELECT * FROM Posts WHERE UserName='$user' ORDER BY PostNumber DESC");
echo "<br>";
echo "<div id='tablecontainer'>";
echo "<table id='table'>
<tr>
<th>Post no</th>
<th>User</th>
<th>Post Topic</th>
<th>Image</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  @$id = $row['PostNumber'];
echo "<tr>";
echo "<td>".$row['PostNumber']."</td>";
echo "<td id='pn'>" . $row['UserName'] . "</td>";


echo "<td><a href='postAdmin.php?id=$id'>" . $row['PostTopic'] . "</td>";

$ImageContent=$row['ImageContent'];
$ImageContent=base64_encode($ImageContent);
echo "<td>".'<img src="data:image/jpeg;base64,'.$ImageContent.'" width="50%"/>'."</td>";



//echo "<td><img src='images/".$row['ImageContent']."'></td>";
echo "</tr>";
}
echo "</table>";
echo "</div>";

?>


</div>

			
	
		
</div>

</body>
</html>