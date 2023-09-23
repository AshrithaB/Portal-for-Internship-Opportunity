<?php
include 'app/connect.php';
if(isset($_POST['submit'])){
$COMPANY_ID = $_POST['COMPANY_ID'];  
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
      background-image: url("assets/p2.jpeg");
      background-color: transparent;
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: initial;
      background-attachment: fixed;
    }
    .content-table{
      margin:30px 200px;
    }
    .content-table tbody tr td{
      background-color: rgba(255,255,255,0.8);
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
          $sql="SELECT * FROM internship WHERE COMPANY_ID=?";
          $stmt=$conn->prepare($sql);
          $stmt->bind_param("i",$COMPANY_ID);
          $stmt->execute();
          $result=$stmt->get_result();
          if (mysqli_num_rows($result) == 0) 
             { 
              echo "<script type = \"text/javascript\">
                  alert(\"Not Records.................\");
                  window.location = (\"internship_details.php\")
                  </script>";
             } 
        ?>
    <table class="content-table">
        <thead>
        <tr>
            <th>INTERNSHIP_ID</th>
            <th>DESCRIPTION</th>
            <th>LOCATION</th>
            <th>START_DATE</th>
            <th>END_DATE</th>
            <th>SKILLS</th>
        </tr>
        </thead>

        <?php
          while ($row=$result->fetch_assoc()) {
        ?>
        <tbody>
            <tr>
                <td><?php echo $row['INTERNSHIP_ID']; ?></td>
                <td><?php echo $row['DESCRIPTION']; ?></td>
                <td><?php echo $row['LOCATION']; ?></td>
                <td><?php echo $row['START_DATE']; ?></td>
                <td><?php echo $row['END_DATE']; ?></td>
                <td><?php echo $row['SKILLS']; ?></td>
            </tr>
            </tbody>
        <?php
          }
        ?>  
        
    </table>