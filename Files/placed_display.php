<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
 $USN = $_POST['USN'];  
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/index_style.css">
  <link rel="stylesheet" href="assets/search_style.css">
  <link rel="stylesheet" type="text/css" href="assets/table_style.css">
  <style type="text/css">
    body {
      background-image: url("assets/14.jpg");
      background-color: transparent;
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: initial;
      background-attachment: fixed;
    }
    .content-table{
      margin:30px 300px;
      width: 800px;
    }
  </style>
</head>
<body>
  <div class="nav">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="internship_details.php">INTERNSHIP DETAILS</a></li>
      <li ><a href="company_details.php" >COMPANIES OFFERING INTERNSHIPS </a></li>
      <li ><a href="views.php" >VIEWS</a></li>
      <li ><a href="placed_in.php" >PLACED IN</a></li>
      <li><a href="logout.php" >LOG OUT </a></li>
    </ul>
  </div>
  <?php
          
             $sql="SELECT company.COMPANY_ID ,company.NAME ,company.EMAIL
                FROM company
                INNER JOIN placements 
                ON placements.COMPANY_ID= company.COMPANY_ID AND USN=?";
             $stmt=$conn->prepare($sql);
             $stmt->bind_param("s",$USN);
             $stmt->execute();
             $result=$stmt->get_result();
             if (mysqli_num_rows($result) == 0) 
             { 
              echo "<script type = \"text/javascript\">
                  alert(\"Not Placed.................\");
                  window.location = (\"placed_in.php\")
                  </script>";
             } 
    ?>
    <table class="content-table">
      <thead>
      <tr>
         <th>COMPANY_ID</th>
           <th> NAME</th>
           <th> EMAIL</th> 
      </tr>
      </thead>
      <?php
             while($row=$result->fetch_assoc()){
           ?>
             
             <tbody>
             <tr>
                
                  <td><?php echo $row['COMPANY_ID']; ?> </td>
                   <td><?php echo $row['NAME']; ?> </td> 
                   <td><?php echo $row['EMAIL']; ?> </td>  
                  
            </tr>
            </tbody>
           <?php

             }

           ?>
    </table>
</body>
</html>


