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
		<h2 style="text-align: center;">User Messages</h2>

		
		
<div class="navigationbar" id="navbar">
  <a href="WelcomePageAdmin.php"><i class="fa fa-home"></i> Home</a>
  <a href="PostsPageAdmin.php"><i class="fa fa-pencil-square"></i> Posts</a>
 
  <div class="profileMenu">
    <button class="profileButton" id="active"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
        <a href="ProfilePageAdmin.php">Account</a><br/>
      <a href="adminControlPage.php">Control Panel</a><br/>
      <a href="LogOut.php">Log Out</a>
   </div>
  </div> 
</div>

<?php

$result = mysqli_query($connection,"SELECT * FROM UserMessages ORDER BY MessageNo DESC");
echo "<br>";
echo "<div id='tablecontainer'>";
echo "<table id='table'>
<tr>
<th>Message no</th>
<th>User</th>
<th>Subject</th>
<th>Message</th>

<th><i class='fa fa-question-circle'></i></th>
</tr>";

while($row = mysqli_fetch_array($result))
{
  @$id = $row['PostNumber'];
  @$MessageNo=$row['MessageNo'];
echo "<tr>";
echo "<td>".$row['MessageNo']."</td>";
echo "<td id='pn'>" . $row['UserName'] . "</td>";


echo "<td>" . $row['Subject'] . "</td>";
echo "<td>".$row['Message']."</td>";
echo "<td><a href='deleteUserMessage.php?MessageNo=$MessageNo' style='text-decoration: none;'>" . "Delete" . "</td>";

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
