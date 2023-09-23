<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/index_style.css">
    <link rel="stylesheet" href="assets/search_style.css">
    <style type="text/css">
      body {
        background-image: url("assets/pic5.jpg");
        background-position: top;
        background-repeat: no-repeat;
        background-size:900px 500px;
        height: 100%;
        background-color: transparent;
        position: initial;
        background-attachment: fixed;
      }
      .input-field {
        margin-top: 32%;
        margin-left: 23%;
        height:7%;
        width: 50%;
        text-align: center;
        padding:10px 10px;
        text-decoration: none;
        font-size: 17px;
        border-radius: 10px;
        background: #2929a8;
        align-content: center;
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
  <div class="input-field">
    <div class="search-container">
      <form action="internship_display.php"  method="post" >
        <label for="COMPANY_ID">COMPANY ID</label>
        <input type="text" placeholder="Enter your Company ID" name="COMPANY_ID" required>
        <button type="submit" name="submit" class="btn">Submit</button>
      </form>
    </div>
  </div>  
</body>
</html>


