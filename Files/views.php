<?php
include 'app/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/index_style.css">
  <link rel="stylesheet" href="assets/search_style.css">
  <link rel="stylesheet" type="text/css" href="assets/table_style.css">
  <style type="text/css">
    body {
      background-image: url("assets/pic7.jpg");
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
  <table class="content-table">
    <thead>
    <tr>
      <th>INTERNSHIP_ID</th>
      <th style="width: 400px";>DESCRIPTION</th>
      <th style="width: 400px";>SKILLS REQUIRED</th>
    </tr>
    </thead>
    <?php
      $sql = "SELECT * FROM intern";
      $stmt=$conn->prepare($sql);
      $stmt->execute();
      $result=$stmt->get_result();
      while($row=$result->fetch_assoc()){
    ?>
    <tbody>
      <tr>
        <td><?php echo $row['INTERNSHIP_ID']; ?>  </td> 
        <td><?php echo $row['DESCRIPTION']; ?> </td> 
        <td><?php echo $row['SKILLS']; ?> </td>  
      </tr>
    </tbody>
     <?php } ?>
   </table>
  </body>
  </html>