<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
 $DEPARTMENT = $_POST['DEPARTMENT'];  
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/create_style.css">
  <link rel="stylesheet" type="text/css" href="assets/internship_style.css">
  <script type="text/javascript">
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
  </script>
  <style>
    body {
    background-image: url("assets/7.jpg");
    background-color: transparent;
    height: 100%;
    background-position: right;
    background-repeat: no-repeat;
    background-size: 800px 500px;
    position: initial;
    background-attachment: fixed;
    }
    .fieldset{
    margin-left: 10%; 
    margin-top:15%;
    width: 25%;
    text-align: left;
    padding: 8px 8px;
    position: absolute;
    background:rgba(255,0,0,0.3);
    }
  </style>
</head>
<body>
  <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="create.php" >DASHBOARD </a>
      <a href="internship.php" >ADD INTERNSHIP </a>
      <a href="student.php" >VIEW STUDENTS</a>
      <a href="company.php" >ADD NEW COMPANY</a>
      <a href="delete.php" >DELETE RECORDS</a>
      <a href="logout.php" >LOG OUT </a>
  </div>
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; DASHBOARD</span>
  <form method="post" action="student_display.php" class="fieldset">
        <label for="DEPARTMENT">DEPARTMENT</label> 
        <input style="color: black;" type="text" name="DEPARTMENT" placeholder="Enter Department" pattern="[a-zA-Z]*" required="true"><br/>
        <button type="submit" name="submit" class="button">SUBMIT</button><br/> 
    </form>
</body>
</html>


