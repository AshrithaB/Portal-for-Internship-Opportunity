<?php
session_start();
   if(isset($_POST['submit'])){
  header("location:login.php");
}	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="assets/index_style.css">
</head>
  <body>
  <div class="nav">
  	<ul>
  		<li><a href="internship_details.php">INTERNSHIP DETAILS</a></li>
  		<li ><a href="company_details.php" >COMPANIES OFFERING INTERNSHIPS </a></li>
  		<li ><a href="views.php" >VIEWS</a></li>
  		<li ><a href="placed_in.php" >PLACED IN</a></li>
  		<li><a href="logout.php" >LOG OUT </a></li>
  	</ul>
  </div>
  <div class="h2">
	<h2> <br>WELCOME! 
  	<?php
  		echo $_SESSION['NAME'];
  	?>
  	</h2>
	</div>
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="assets/picc.jpg" style="width:100%">
      <div class="text"></div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="assets/9.jpg" style="width:100%" "height: 70%">
      <div class="text"></div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="assets/6.jpg" style="width:100%">
      <div class="text"></div>
    </div>
  </div><br>
  <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>
  <script>
  var slideIndex = 0;
  showSlides();
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
  </script>
</body>
</html>