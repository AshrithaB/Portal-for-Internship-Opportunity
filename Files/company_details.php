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
      background-image: url("assets/pic6.jpg");
      background-position: left;
      background-size:700px 350px;
      height: 100%;
      background-color: transparent;
      background-repeat: no-repeat;
      position: initial;
      background-attachment: fixed;
    }
    .content-table{
      margin:30px 600px;
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
            <th>COMPANY_ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
        </tr>
        </thead>
        <?php
          $sql="SELECT C.COMPANY_ID,C.NAME,C.EMAIL,C.PHONE FROM internship I,company C WHERE C.COMPANY_ID=I.COMPANY_ID";
          $stmt=$conn->prepare($sql);
          $stmt->execute();
          $result=$stmt->get_result();
          while ($row=$result->fetch_assoc()) {
        ?>
        <tbody>
            <tr>
                <td><?php echo $row['COMPANY_ID']; ?></td>
                <td><?php echo $row['NAME']; ?></td>
                <td><?php echo $row['EMAIL']; ?></td>
                <td><?php echo $row['PHONE']; ?></td>
            </tr>
            </tbody>
        <?php
          }
        ?>  
  </table>   
</body>
</html>
