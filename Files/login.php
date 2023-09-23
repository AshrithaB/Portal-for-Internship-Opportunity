<?php
include 'app/connect.php';
session_start();
if(isset($_POST['submit'])){
	$USN = $_POST['USN'];
	$Password = $_POST['Password'];
	$sql = "SELECT USN,NAME,PASSWORD FROM student WHERE USN=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s",$USN);
	$stmt->execute();
	$stmt->bind_result($db_usn,$db_name,$db_pass);
	if($stmt->fetch()){	
		$_SESSION['NAME']=$db_name;
		echo $_SESSION['NAME'];		
		$pass_decode = password_verify($Password, $db_pass);
		echo $pass_decode;
		if($pass_decode){
			echo "Login successful";
			header("location:index.php");
		}else{
			echo "Incorrect Password";
		}
	}else{
		echo "Incorrect USN";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="assets/login_style.css">
	<style>
		body {
			  background-image: url("assets/3.jpeg");
			  background-color: #cccccc;
			  height: 100%;
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
			  position: initial;
			  background-attachment: fixed;
			}
			.container input
		    {
		      width: 90%;
		    }
	</style>
</head>
<body>
	<div>
		<form method="post" action="login.php" class="container">
			<legend id="reg" style="text-align: center;background-color: white; border:none;">LOGIN</legend><br/>
			<label for="USN"> USN </label> 
			<input type="text" name="USN" placeholder="Enter UserID" required /><br/>
			<label for="Password"> PASSWORD </label> 	
			<input type="password" name="Password" placeholder="Enter Password" />
			<button type="submit" name="submit" class="btn"><b> LOGIN </b> </button><br><br>
			<a href="registration.php"> Don't Have an Account? </a><br><br>
			<a href="admin.php"> Are You An Admin? </a><br/><br/>
			<a href="homepage.php">BACK</a><br/>
		</form>
	</div>
</body>
</html>