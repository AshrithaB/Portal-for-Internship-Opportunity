<?php 
include 'app/connect.php';

if(isset($_POST['submit'])){

	$company_id = $_POST['company_id'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Phone = $_POST['Phone'];
	
	
	$company_id_check = "SELECT * FROM company WHERE COMPANY_ID = ?";
	$company_id_stmt = $conn->prepare($company_id_check);
	$company_id_stmt->bind_param("i",$COMPANY_ID);
	$company_id_stmt->execute();

	$company_id_stmt->store_result();
	if($company_id_stmt->num_rows()>0){
		?>
		<script> alert("Company Already exist!");</script>
	<?php
	}else{
		//template for the sql query
		$sql = "INSERT INTO company(COMPANY_ID,NAME,EMAIL,PHONE) VALUES(?,?,?,?)";

	//preparing the statement
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("issi",$company_id,$Name,$Email,$Phone);
		$result = $stmt->execute();

			if($result){
            session_start();
      
            echo "<script type = \"text/javascript\">
                  alert(\"updated.................\");
                  window.location = (\"company.php\")
                  </script>";
          } else{
            echo "<script type = \"text/javascript\">
                  alert(\"Login Failed. Try Again................\");
                  window.location = (\"login.php\")
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
	</script>
	<style>
		body {
		background-image: url("assets/image3.jpeg");
		background-color: transparent;
		height: 100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: initial;
		background-attachment: fixed;
		}
		.fieldset{
		margin-top: 5%;
		margin-left: 10%;
		width: 25%;
		text-align: left;
		padding: 8px 8px;
		position: absolute;
		border: 1px solid;
		background:rgba(0,0,255,0.1);
		}
		img
		{
			position: absolute;
			border: 6px solid;
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
  	<img style="margin-top: 4%;margin-left: 24%;"; src="assets/p2.jpeg" alt="image" width="400" height="333">
  	<img style="margin-top: 2%;margin-left: 55%;"; src="assets/p4.jpeg" alt="image" width="300" height="240">
  	<img style="margin-top: 21%;margin-left: 55%;"; src="assets/p8.jpeg" alt="image" width="330" height="250">
  	<img style="margin-top: 30%;margin-left: 35%;"; src="assets/p1.jpeg" alt="image" width="250" height="160">
	<form method="post" action="company.php" class = "fieldset">
		<legend id="reg">COMPANY</legend>
		<label for="company_id"> Company ID </label>	
		<input type="text" name="company_id" placeholder="Enter company id"  >
		<label for="Name"> Name </label> 			
		<input type="text" name="Name" placeholder="Enter Name" pattern="[a-zA-Z]*" required="true">
		<label for="Email"> Email </label> 			
		<input type="text" name="Email" placeholder="Enter Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="true">
		<label for="Phone">Phone</label> 
		<input type="tel" name="Phone" placeholder="Enter valid Phone no." pattern="[789][0-9]{9}" required="true"><br>
		<button type="submit" name="submit"><b> SUBMIT </b> </button><br>
	</form>
</body>
</html>


