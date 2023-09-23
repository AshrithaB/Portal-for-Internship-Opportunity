<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/login_style.css">
  <style>
    body {
    background-image: url("assets/1.gif");
    background-color: #ffffff;
    height: 100%;
    background-position: left;
    background-repeat: no-repeat;
    background-size: 1000px 500px;
    position: initial;
    background-attachment: fixed;
    }
    .container {
    top: 5%;
    position: absolute;
    right: 0;
    margin: 50px;
    max-width: 300px;
    padding: 16px;
    background-color: #cccccc;  
    }
    .container input
    {
      width: 90%;
    }
  </style>
</head>
<body> 
  <form method="post" action="admin.php" class="container">
    <legend id="reg" style="text-align: center; background-color: #cccccc; border:none;">ADMIN LOGIN</legend><br/>
    <label for="PERSON_ID">PERSON ID</label>
    <input type="text" placeholder="Enter Person Id" name="PERSON_ID" required /><br/>
    <label for="NAME">NAME</label>
    <input type="text" placeholder="Enter Name" name="NAME">
    <label for="psw">PASSWORD</label>
    <input type="password" placeholder="Enter Password" name="psw" required /><br/>
    <button type="submit" name="login" class="btn"> LOGIN </button><br /><br />
    <a href="login.php"> Are You An User? </a><br/><br/>
    <a href="homepage.php">BACK</a><br/>
  </form>
  <?php
    include 'app/connect.php';
    session_start();
    if(isset($_POST['login'])){
      include '../includes/create.php';
      $uname = $_POST['PERSON_ID'];
      $name=$_POST['NAME'];
      $pass = $_POST['psw'];
      global $uname;
      $qy = "SELECT * FROM admin WHERE PERSON_ID = '$uname'AND NAME='$name' AND PASSWORD = '$pass'";
      $log = $conn->query($qy);
      $num = $log->num_rows;
      $row = $log->fetch_assoc();
      if($num > 0){
        session_start();
        $_SESSION['PERSON_ID'] = $row['PERSON_ID'];
        $_SESSION['psw'] = $row['PASSWORD'];
        echo "<script type = \"text/javascript\">
              alert(\"Login Successful.................\");
              window.location = (\"create.php\")
              </script>";
      } else{
        echo "<script type = \"text/javascript\">
              alert(\"Login Failed. Try Again................\");
              window.location = (\"admin.php\")
              </script>";
      }
    }
  ?>
</body>
</html>
