<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
	$GRADUATION_YEAR = $_POST['GRADUATION_YEAR'];
	$sql = "DELETE FROM student WHERE GRADUATION_YEAR = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i",$GRADUATION_YEAR);
	$result=$stmt->execute();
	if (mysqli_num_rows($result) == 0) 
    { 
        echo "<script type = \"text/javascript\">
              alert(\"The delete Operation was Unsuccessful......\");
              window.location = (\"delete.php\")
              </script>";
        } 
	if($result){
		?> <script> alert("Record Successfully Deleted from the Database."); </script>
	<?php
	}else{ ?>
		<script> alert("The delete Operation was Unsuccessful"); </script>
	<?php
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
	</script>
	<style>
		body {
		background-image: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1)),url("assets/12.jpg");
		background-color: transparent;
		height: 100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: initial;
		background-attachment: fixed;
		}
		.fieldset{
		margin-left: 37%; 
		margin-top:15%;
		width: 25%;
		text-align: left;
		padding: 8px 8px;
		position: absolute;
		background:rgba(50,200,255,0.9);
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
  	<form method="post" action="delete.php" class="fieldset">
  	   	<label for="GRADUATION_YEAR" style="color: black";> Graduation Year</label> 
    	<input type="text" name="GRADUATION_YEAR" placeholder="Enter year" pattern="[2][0][2-9][0-9]" required="true"><br/>
    	<button type="submit" name="submit">SUBMIT</button><br>
  	</form>
</body>
</html>