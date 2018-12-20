<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="icon" type="image/jpg" href="Images/CMC_Logo.jpg" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="containerContentSpecial">
		<h2 style="text-align: center;">Welcome To Colombo Garbage Collection Service</h2>

		
		
<!--	
<ul>
  <li><a class="active" href="Welcome.html">Welcome</a></li>
  <li><a href="#news">Posts</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li id="LogInList"><a href="LogIn.html">Log In</a></li>
  <li id="SignUpList"><a href="SignUp.html">SignUp</a></li>
  </ul>
-->

<!--<div class="navigation">
 <div class="dropdown">
  <button class="dropbtn">Profile</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
</div>
-->
  
<div class="navigationbar">
  <a class="active" href="WelcomePage.php">Welcome</a>
  <a href="PostsPage.php">Posts</a>
  <a href="ContactPage.php">Contact Us</a>
  <a href="#about">About Us</a>
  <div class="profileMenu">
    <button class="profileButton">Profile</button>
    <div class="profileMenu-content">
      <a href="ProfilePage.php">Account</a>
      <a href="index.php">Log In</a>
      <a href="LogOut.php">Log Out</a>
      <a href="SignUpPage.php">Sign Up</a>
    </div>
  </div> 
</div>
		

			
	<!--<ul>
  		<li><a class="active" href="Welcome.html">Welcome</a></li>
  		<li><a href="#news">Posts</a></li>
  		<li><a href="Contact.html">Contact</a></li>
  		<li><a href="#about">About</a></li>
  		<li id="LogInList"><a href="LogIn.html">Log In</a></li>
  		<li id="SignUpList"><a href="SignUp.html">SignUp</a></li>
	</ul>
-->

<!--**********************SLIDE SHOW*******************-->
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="Images/CMC_Logo.jpg" style="width:400px">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="Images/Map.GIF" style="width:300px">
    <div class="text" style="left: 70%">Caption Two cbftcbfebcerf<br>hhc hjbjbc vjbvjhrehbcbivb gcgrurcybrgu<br></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="Images/CMC.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>

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
</div>

		
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
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>


</body>
</html>
