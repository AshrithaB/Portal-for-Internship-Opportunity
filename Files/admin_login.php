<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assests/login.css">
<link rel="stylesheet" type="text/css" href="assests/login.css">
<style>
body, html {
  height: 100%;
  background:linear-gradient(to right top, #050744, #004283, #007fb8, #00bee1, #5fffff); overflow: hidden;
  font-family: Arial, Helvetica, sans-serif;
}
legend{
  border:1.5px solid white;
  border-radius: 13px;
  padding:5px;
  text-align: center;
  background: rgba(0,0,0,0.6);
  width:55%;
  margin:0px auto;
  display: inline;

}
</style>
</head>
<body> 


  
 <!-- <ul class="menu">
    <li><a href="../INDEX.html">Home</a></li>
    <li style ="float:right"><a href="../user/login.php">User Login</a> </li>
    <li style ="float:right"><a href="login.php">Admin Login</a></li>
    <li><a href="../about/about.html">About</a></li>
  </ul>
-->

  <form method="post" class="lcontainer">

    <h1></h1>
    <fieldset>
        <legend id="reg">ADMIN LOGIN</legend>
    <label for="PERSONID"><b>PERONID</b></label>
    <input type="text" placeholder="Enter PERSONID" name="PERSONID" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" name="login"class="btn">Login</button>
    </fieldset>
  </form>

  <?php

        include 'app/connect.php';

        session_start();
        if(isset($_POST['login'])){
          include '../includes/config.php';
          
          $uname = $_POST['PERSONID'];
          $pass = $_POST['psw'];
          
          global $uname;
          
          $qy = "SELECT * FROM admin WHERE PERSONID = '$uname' AND PASSWORD = '$pass'";
          $log = $conn->query($qy);
          $num = $log->num_rows;
          $row = $log->fetch_assoc();
          if($num > 0){
            session_start();
            $_SESSION['PERSONID'] = $row['PERSONID'];
            $_SESSION['psw'] = $row['PASSWORD'];
            echo "<script type = \"text/javascript\">
                  alert(\"Login Successful.................\");
                  window.location = (\"admin_index.php\")
                  </script>";
          } else{
            echo "<script type = \"text/javascript\">
                  alert(\"Login Failed. Try Again................\");
                  window.location = (\"login.php\")
                  </script>";
          }

        }
      ?>



</body>
</html>
