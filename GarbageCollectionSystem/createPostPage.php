<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Post</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="containerContentSpecial">
    <h2 style="text-align: center; color: white;"><i class="fa fa-pencil-square"></i> Create post</h2>

    
    

  
<div class="navigationbar" id="navbar">
  <a href="WelcomePage.php"><i class="fa fa-home"></i> Home</a>
  <a href="PostsPage.php"><i class="fa fa-pencil-square"></i> Posts</a>
  <a href="ContactPage.php"><i class="fa fa-phone-square"></i> Contact Us</a>
  <a href="about.php"><i class="fa fa-question-circle"></i> About Us</a>
  <div class="profileMenu" id="active">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a><br/>
      <a href="LogOut.php">Log Out</a>
    </div>
  </div> 
</div>
    

  <form id="inputFormPost" class="uploadforam" action="insertPost.php" method="post" enctype="multipart/form-data">
  
  <input type="text" id="PostTopic" class="PostTopic" name="PostTopic" placeholder="Enter a subject"/>
    </input>
    
   <textarea id="Description" class="Description" name="Description" placeholder="Please enter your description">
</textarea>

  <br/>
  <p id="PostImageParagraph">Please Make sure that the format is JPG/JPEG/PNG OR GIF</p>
      <input id="Image" type="file"  value="Browse" name="myimage" class="fileToUpload"/>
    <br/>
     
      <p id="PostLocationParagraph">Please click on the location on the map to obtain the coordinates</p>
      <input id="latitude" type="text" name="latitude"  placeholder="latitude" readonly="" />
      <input id="longitude" type="text" name="longitude"  placeholder="longitude" readonly="" />
       <input type="button" value="Post" name="submit_image" class="post" onclick="formValidation()" />
      <br/>

  
  
</form>

<div id="map" ></div>
</div>


 

<script>

      /*.................Map Integration................*/
      var mapProperty={
          center: {lat: 6.923542, lng: 79.854588},  
          zoom: 10
            
        }

        function mapper() {
    
        var map = new google.maps.Map(document.getElementById('map'),mapProperty);
        var infoWindow = new google.maps.InfoWindow;
            
        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) 
          {
            var myCurrentLocation = 
            {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

           var myCenter = new google.maps.LatLng(myCurrentLocation);

           var markerImage = {
            url: 'IconsAndPics/homeIcon.png',
            scaledSize : new google.maps.Size(25, 25)
           };
          
           var marker = new google.maps.Marker
           ({
            position: myCenter,
            icon:markerImage,
            animation: google.maps.Animation.BOUNCE

            });
            marker.setMap(map);
          document.getElementById('latitude').value=myCenter.lat();
          document.getElementById('longitude').value=myCenter.lng();

            infoWindow.setPosition(myCurrentLocation);
            infoWindow.setContent('Your Location');
            infoWindow.open(map);
            map.setCenter(myCurrentLocation);
            
          }, 
          function() {
            errorHandling(true, infoWindow, map.getCenter());
          });
          
          google.maps.event.addListener(map, 'click', function(event) {
          locationMarker(map, event.latLng);
          });

          function locationMarker(map, location) {
          var marker2 = new google.maps.Marker({
          position: location,
          animation: google.maps.Animation.DROP,
          icon:'IconsAndPics/markerIcon.png'
          });
          marker2.setMap(map);
          document.getElementById('latitude').value=location.lat();
          document.getElementById('longitude').value=location.lng();


          }

         

        } else {
          // If the browser doesn't support Geolocation functionality
          errorHandling(false, infoWindow, map.getCenter());
        }
      }
      

      function errorHandling(geolocation_Working, infoWindow, myCurrentLocation) {
        infoWindow.setPosition(myCurrentLocation);
        infoWindow.setContent(geolocation_Working ?
                              'Sorry. The Geolocation service failed.' :
                              'Sorry. Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }


   /*...............End Of Map Integration..........................*/

   /*................Form Validation.........................*/
   function formValidation()
   {
      var form=document.getElementById('inputFormPost');
      if(form['PostTopic'].value)
      {
        deHighlight('PostTopic');
        if(form['Description'].value)
        {
          deHighlight('Description');
          if(form['Image'].value)
          {
            deHighlight('Image');
            form.submit();
          }
          else
          {
            highlight('Image');
          }
        }
        else
        {
          highlight('Description');
        }
      }
      else
      {
        highlight('PostTopic');
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH1G1I7QDPfCPTJ-R6rgfFvo3e4cXQtf0&callback=mapper"></script>

</body>
</html>