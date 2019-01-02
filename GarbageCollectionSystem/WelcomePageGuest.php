
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
    <h2 style="text-align: center;">Welcome To Colombo Garbage Collection Service</h2>

    
    

  
<div class="navigationbar" id="navbar">
  <a class="active" href="WelcomePageGuest.php"><i class="fa fa-home"></i> Home</a>
  
  <a href="ContactPageGuest.php"><i class="fa fa-phone-square"></i> Contact Us</a>
  <a href="aboutGuest.php"><i class="fa fa-question-circle"></i> About Us</a>
  <div class="profileMenu">
    <button class="profileButton"><i class="fa fa-bars"></i></button>
    <div class="profileMenu-content">
        <a href="index.php">Log In</a><br/>
       <a href="SignUpPage.php">Sign Up</a>
   </div>
  </div> 
</div>
    

      
  
<!-- Slideshow................................-->
<!-- Slideshow container -->
<br>
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 4</div>
    <img src="Images/Picture5.jpg" style="width:100%">
   <!--  <div class="text">
      <p>
        Hey there!.
        Thank you for being interested on our latest
      </p>
  </div> -->
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 4</div>
    <img src="Images/Picture6.jpg" style="width:100%">
    <!-- <div class="text" style="left: 20%; top:80%; font-weight: bold; color: black;">Administrative Areas</div>
    <div class="text" style="left: 80%; font-weight: bold; color: red;">What's your Area?..</div> -->
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 4</div>
    <img src="Images/Picture7.jpg" style="width:100%">
    <!-- <div class="text" style="top: 70%; color: #FFD700; font-weight: bolder; font-size: 30px;">Join with us<br>&<br>Be a<br>Better Recycler</div> -->
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <img src="Images/Picture8.jpg" style="width:100%">
    <!-- <div class="text" style="top: 85%; font-weight: bolder; color: red; font-size: 30px;">Properly Dispose of Waste</div> -->
  </div>

<!--   <div class="mySlides fade">
    <div class="numbertext">4 / 6</div>
    <img src="Images/cleaning.jpg" style="width:100%">
    <div class="text" style="left: 20%; font-weight: bolder; color: green;">We'll Come & Clean It..</div>
  </div> -->

 <!--  <div class="mySlides fade">
    <div class="numbertext">6 /6</div>
    <img src="Images/Colombo_Municipal_Council.jpg" style="width:100%">
    <div class="text" style="top: 80%; color: white;">Another Proud Project Of The Colombo Municipal Council</div>
  </div> -->

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>

<!--End Of Slideshow..................................-->


    
</div>

<!--For slide show-->
<script type="text/javascript">

var slideIndex = 0;
showSlides();
var slides,dots;

function plusSlides(position) {
    slideIndex += position;
    if (slideIndex > slides.length) {slideIndex = 1}
    else if(slideIndex < 1){slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active_slides", "");

      }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active_slides";
    }

function currentSlide(index) {
    if (index > slides.length) {index = 1}
    else if(index < 1){index = slides.length}
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active_slides", "");
      }
        slides[index-1].style.display = "block";  
        dots[index-1].className += " active_slides";
    }

function showSlides() {
    var i;
    slides = document.getElementsByClassName("mySlides");
    dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active_slides", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active_slides";
    setTimeout(showSlides, 10000); // Change image every 5 seconds
}
</script>

</body>
</html>

<?php 

include('navscript.php');

 ?>