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
		<h2 style="text-align: center;">Admins</h2>

		
		

  
<div class="navigationbar" id="navbar">
  <a href="WelcomePageAdmin.php"><i class="fa fa-home"></i> Home</a>
  <a href="PostsPageAdmin.php"><i class="fa fa-pencil-square"></i> Posts</a>
  
  <div class="profileMenu">
    <button class="profileButton"  id="active"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
        <a href="ProfilePageAdmin.php">Account</a><br/>
      <a href="adminControlPage.php">Control Panel</a><br/>
      <a href="LogOut.php">Log Out</a>
   </div>
  </div> 
</div>

<?php

$result = mysqli_query($connection,"SELECT * FROM UserDetails WHERE UserType='admin' OR UserType='captain' ORDER BY UserName ASC");
echo "<br>";
echo "<div id='tablecontainer'>";
echo "<table id='table'>
<tr>
<th>User Name</th>
<th>Email</th>
<th>Contact Number</th>
<th>Level</th>
<th><i class='fa fa-question-circle'></i></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
 @$UserName=$row['UserName'];
echo "<tr>";
echo "<td>".$row['UserName']."</td>";
echo "<td id='pn'>" . $row['Email'] . "</td>";
echo "<td>" . $row['ContactNumber'] . "</td>";
echo "<td>" . $row['UserType'] . "</td>";

if($row['UserType']=='captain')
{
  echo "<td><a href='removeCaptain.php?UserName=$UserName' style='text-decoration: none;'>" . "Remove Captain" . "</td>";
}
else
{
  echo "<td><a href='promoteToCaptain.php?UserName=$UserName' style='text-decoration: none;'>" . "Promote to Captain" . "</td>";
}


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
