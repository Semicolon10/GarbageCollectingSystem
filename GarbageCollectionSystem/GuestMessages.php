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

		
		

  
<div class="navigationbar" id="navbar">
  <a class="active" href="WelcomePageAdmin.php"><i class="fa fa-home"></i> Home</a>
  <a href="PostsPageAdmin.php"><i class="fa fa-pencil-square"></i> Posts</a>
 
  <div class="profileMenu">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
        <a href="ProfilePageAdmin.php">Account</a><br/>
      <a href="adminControlPage.php">Control Panel</a><br/>
      <a href="LogOut.php">Log Out</a>
   </div>
  </div> 
</div>

<?php

$result = mysqli_query($connection,"SELECT * FROM GuestMessages ORDER BY MessageNumber DESC");
echo "<br>";
echo "<div id='tablecontainer'>";
echo "<table id='table'>
<tr>
<th>Message no</th>
<th>Guest Name</th>
<th>Email Address</th>
<th>Message</th>
<th><i class='fa fa-question-circle'></i></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  @$id = $row['PostNumber'];
  @$MessageNumber=$row['MessageNumber'];
echo "<tr>";
echo "<td>".$row['MessageNumber']."</td>";
echo "<td id='pn'>" . $row['GuestName'] . "</td>";


echo "<td>" . $row['Email'] . "</td>";
echo "<td>".$row['Message']."</td>";
echo "<td><a href='deleteGuestMessage.php?MessageNumber=$MessageNumber' style='text-decoration: none;'>" . "Delete" . "</td>";
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
