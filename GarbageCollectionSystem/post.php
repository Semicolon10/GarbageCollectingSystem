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
<br>
<br>
<br>

<div id="postmap" style="width:25%; height:300px; position: absolute; top: 42%; right: 20%;"></div>

<?php

if (isset($_GET['id'])) 
{
	
	if ($_GET["id"]) 
	{
		$result = mysqli_query($connection,"SELECT * FROM Posts WHERE PostNumber='".$_GET['id']."'");
		$id=$_GET['id'];
		if (mysqli_num_rows($result)) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$lat = $row['Latitude'];
				$long = $row['Longitude'];
			}
		}
			else
			{
				echo "topic not found";
			}
	}
}

?>

<!-- <div id="postmap" style="width:50%;height:400px;"></div> -->

<script>
var myHome = { "lat" : "<?php echo $lat ?>" , "long" : "<?php echo $long ?>" };

function myMap() {

var myLatLng = new google.maps.LatLng( myHome.lat, myHome.long );

        var map = new google.maps.Map(document.getElementById('postmap'), {
          zoom: 12,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1G1I7QDPfCPTJ-R6rgfFvo3e4cXQtf0&callback=myMap"></script>

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
		$id=$_GET['id'];

		if (mysqli_num_rows($result)) 
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				echo "<div id='postcontainer'>";
				echo "<br>";
				echo "<a href='PostsPage.php' style='text-decoration: none; font-weight: bold;'><i class='fa fa-arrow-left'></i> Back to Posts</a>";
				echo "<h1>".$row['PostNumber'].". ".$row['PostTopic']."</h1>";
				echo "<h2 style='color:red;'>".$row['PriorityLevel']." priority"."</h2>";
				echo "<hr>";

				//echo "<div id='postmap' style='width:50%;height:400px;'></div>";

				$ImageContent=$row['ImageContent'];
				$ImageContent=base64_encode($ImageContent);
				echo '<img src="data:image/jpeg;base64,'.$ImageContent.'" height="250px"/>';
				echo "<h2>".$row['PostDescription']."</h2>";
				
				echo "<right><h5>by ".$row['UserName']."</h5></right>";
				echo "<hr>";
				echo "<h6 style='text-align:right;'>Is there a problem with this? <a href='reportPostPage.php?id=$id'>" . "Report" . "</h6>";

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

<?php 

include('navscript.php');

 ?>