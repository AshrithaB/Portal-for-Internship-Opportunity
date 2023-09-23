<?php 
include 'app/connect.php';
if(isset($_POST['submit'])){
	$USN = $_POST['USN'];
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Confirm = $_POST['ConfirmPassword'];
	$Phone = $_POST['Phone'];
	$Department = $_POST['Department'];
	$GraduationYear = $_POST['Year'];
	$pass = password_hash($Password, PASSWORD_DEFAULT);
	$usn_check = "SELECT * FROM student WHERE USN = ?";
	$usn_stmt = $conn->prepare($usn_check);
	$usn_stmt->bind_param("s",$USN);
	$usn_stmt->execute();
	$usn_stmt->store_result();
	if($usn_stmt->num_rows()>0){
		?>
		<script> alert("User Already Registered!");</script>
	<?php
	}else{
		$sql = "INSERT INTO student(USN,NAME,EMAIL,PASSWORD,PHONE,DEPARTMENT,GRADUATION_YEAR) VALUES(?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssisi",$USN,$Name,$Email,$pass,$Phone,$Department,$GraduationYear);
		$result = $stmt->execute();
			if($result){
				header("location:login.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/internship_style.css">
	<script type="text/javascript">
		function validate(){
			var pwd1 = document.getElementById("password");
			var pwd2 = document.getElementById("confirmPassword");
			if(pwd1.value.length < 6){
				alert("Password must have more than Six characters.");
				return false;
			}
			else{
				if(pwd1.value != pwd2.value){
					alert("Passwords do not match. Re-Enter it.");
					return false;
				}
				else{
					return true;
				}
			}
		}
	</script>
	<style type="text/css">
		body {
			  background-image: url("assets/pic3.jpg");
			  background-color: #ffffff;
			  height: 100%;
			  background-position: left;
			  background-repeat: no-repeat;
			  background-size: 900px 700px;
			  position: initial;
			  background-attachment: fixed;
			}
		.fieldset{
		margin-top: 1%;
		margin-left: 68%;
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
	<form onsubmit="return validate()" method="post" action="registration.php" class="fieldset">
		<legend id="reg">REGISTER</legend><br>
		<label for="USN"> USN </label> 
		<input type="text" name="USN" placeholder="Enter UserID" required >
		<label for="Name"> NAME </label> 			
		<input type="text" name="Name" placeholder="Enter Name" pattern="[a-zA-Z]*" required="true" >
		<label for="Email"> EMAIL </label> 			
		<input type="email" name="Email" placeholder="Enter Email-Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required="true">
		<label for="Password"> PASSWORD </label> 	
		<input type="password" name="Password" id="password" placeholder="Enter Password" >
		<label for="Password"> CONFIRM PASSWORD </label> 
		<input type="password" name="ConfirmPassword" id="confirmPassword" placeholder="Re-Enter Password" >
		<label for="mobile"> MOBILE NUMBER </label> 
		<input type="tel" name="Phone" id="pno" placeholder="Enter valid mobile no." pattern="[789][0-9]{9}" required="true">
		<label for="Department"> DEPARTMENT </label> 			
			<select name="Department">
				<option value="">Select...</option>
				<option value="CSE">Computer Science Engineering</option>
					<option value="MECH">Mechanical Engineering</option>
					<option value="IEM">Industrial Engineering and Management</option>
					<option value="CIVIL">Civil Engineering</option>
					<option value="ISE">Information Science Engineering</option>
					<option value="ECE">Electronics and Communication Engineering </option>
					<option value="EIE">Electronics and Instrumentation Engineering </option>
				</select> 
		<label for="GraduationYear"> GRADUATION YEAR </label>
		<input type="number" name="Year" min="2021" max="2099" step="1" value="2021" /><br/>
		<button type="submit" name="submit" class="btn"><b> SUBMIT </b> </button><br/>
		<a href="login.php" style="color: blue";> Already Have an Account? </a><br><br/>
		<a href="admin.php" style="color: blue";> Are You An Admin? </a><br/><br/>
		<a href="homepage.php" style="color: blue";>BACK</a><br/>
	</form>
</body>
</html>