<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/index_style.css">
  <link rel="stylesheet" href="assets/search_style.css">
  <link rel="stylesheet" type="text/css" href="assets/table_style.css">
  <link rel="stylesheet" type="text/css" href="assets/internship_style.css">
  <style type="text/css">
    body {
      background-image: url("assets/13.jpg");
      background-color: transparent;
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: initial;
      background-attachment: fixed;
    }
    .fieldset{
    margin-left: 15%; 
    margin-top:10%;
    width: 25%;
    text-align: left;
    padding: 8px 8px;
    position: absolute;
    }
    input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 18px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus {
  background-color: #ddd;
  outline: none;
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
  <form method="post" action="placed_display.php" class="fieldset"> 
    <label style="color:white"; for="USN">USN</label> 
    <input style="color:black"; type="text" name="USN" placeholder="Enter USN" required >
    <button type="submit" name="submit" class="submit" style="float: left";>SUBMIT</button><br/>
  </form>
</body>
</html>