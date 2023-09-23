<?php
session_start();
   if(isset($_POST['submit'])){
  header("location:admin.php");
}		
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/topnav.css">
  <link rel="stylesheet" type="text/css" href="assets/create_style.css">
</head>
<body>
  <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  		<a href="internship.php" >ADD INTERNSHIP </a>
  		<a href="student.php" >VIEW STUDENTS</a>
  		<a href="company.php" >ADD NEW COMPANY</a>
  		<a href="delete.php" >DELETE RECORDS</a>
  		<a href="logout.php" >LOG OUT</a>
  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; DASH BOARD</span>
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="assets/2021.jpeg" style="width:100%" style="height:30%">
      <div class="text"> </div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="assets/goal.jpeg" style="width:100%" style="height:30%">
      <div class="text"> </div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="assets/2022.jpg" style="width:100%" style="height:30%">
      <div class="text"> </div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div><br>
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
  <script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }
  </script>
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
</body>
</html>