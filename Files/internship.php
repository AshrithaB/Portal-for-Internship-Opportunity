<?php 
include 'app/connect.php';
if(isset($_POST['submit'])){
	$company_id = $_POST['company_id'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$skills = $_POST['skills'];
	$internship_id_check = "SELECT * FROM internship WHERE INTERNSHIP_ID = ?";
	$internship_id_stmt = $conn->prepare($internship_id_check);
	$internship_id_stmt->bind_param("s",$INTERNSHIP_ID);
	$internship_id_stmt->execute();
	$internship_id_stmt->store_result();
	  if($internship_id_stmt->num_rows()>0){
	?>
	<script> alert("Internship Already assigned!");</script>
	<?php
	}
	else{
		$sql = "INSERT INTO internship(COMPANY_ID,DESCRIPTION,LOCATION,START_DATE,END_DATE,SKILLS) VALUES(?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		echo "$sql";
		$stmt->bind_param("isssss",$company_id,$description,$location,$start_date,$end_date,$skills);
		$result = $stmt->execute();
			if($result){
            session_start();
            echo "<script type = \"text/javascript\">
                  alert(\"updated.................\");
                  window.location = (\"internship.php\")
                  </script>";
          } else{
            echo "<script type = \"text/javascript\">
                  alert(\"Failed. Try Again................\");
                  window.location = (\"internship.php\")
                  </script>";
          }
		}
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
  		function validate() {
  			var stdate = document.getElementById("sdate");
  			var endate = document.getElementById("edate");
  			if(stdate.value > endate.value)
  			{
  				alert("Enter valid date");
  				return false;
  			}
  		}
	</script>
	<style>
		body {
		background-image: url("assets/internship.jpg");
		background-color: transparent;
		height: 100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: initial;
		background-attachment: fixed;
		}
		.fieldset{
		margin-top: 1%;
		margin-left: 20%;
		width: 25%;
		text-align: left;
		padding: 8px 8px;
		position: absolute;
		border: 1px solid;
		background:rgba(0,0,255,0.1);
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
  	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; DASH BOARD</span>
	<form onsubmit="return validate()" method="post" action="internship.php" class = "fieldset">
	 	<legend id="reg">INTERSHIP</legend>
		<label for="company_id"> Company ID </label> 			
		<input type="text" name="company_id" placeholder="Enter company id" required="true">			
		<label for="description"> Description </label> 			
		<input type="text" name="description" placeholder="Enter description" pattern="[a-zA-Z]*" required="true">
		<label for="location"> Location </label> 			
		<input type="text" name="location" placeholder="Enter location" pattern="[a-zA-Z]*" required="true">
		<label for="start_date">Start Date</label> 
		<input type="date" name="start_date" id="sdate" placeholder="yyyy/mm/dd" min="2021-01-28" required="true">
		<label for="end_date">End Date</label> 
		<input type="date" onClick="setdate" name="end_date" id="edate" min="2021-02-28" placeholder="yyyy/mm/dd" required="true">	 
		<label for="skills"> Skills Reqiured </label> 			
		<input type="text" name="skills" placeholder="Enter skills" required="true"><br>
		<button type="submit" name="submit"><b> SUBMIT </b> </button><br>
	</form>
</body>
</html>
<!-- <input type="text" class="form-control" id="name" placeholder="Name" name="name" pattern="[a-zA-Z].+" required="true"> 
<input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="appointment_email" placeholder="Email" name="email" required="true">
					            
<input type="text" class="form-control" id="phone" name="phone" pattern="[789][0-9]{9}" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
-->