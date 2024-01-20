<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/Service/index.css">
</head>


</div>

</body>
</html>
<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> E-SERVICE SHIVAMOGGA | E-SERVICE </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">E-SERVICE</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">SERVICE STATUS </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Adhar Card Service</a></li>
          <li><a href="http://localhost/Service/ad.php">NADAKACHERI</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">BOOKING</a></li>
          <li><a href="http://localhost/Service/HSRP.php">HSRP</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="">
      <div class="">
        <img src="" alt="">
      </div>
      <div class="name-job">
        <div class="profile_name">Mohammed Riyaz S</div>
        <div class="job">Web Desginer</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
    <body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
        /* Your CSS styles here */

        body {
            margin: 0;
            padding: 0px;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-left: 100px;
            width: 1900px;
            margin-bottom: 0px;
        }

        .content {
            padding: 20px;
            width: 1900px;
            margin-left: 100px;
        }

        .error {
            background-color: #ffcccc;
            padding: 10px;
            margin-bottom: 15px;
        }

        .success {
            background-color: #ccffcc;
            padding: 10px;
            margin-bottom: 15px;
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info a {
            color: red;
            text-decoration: none;
            font-size: 25px;

        }

        .user-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>WELCOME TO E-SRVICE PORTAL SHIVAMOGGA</h2>
</div>

<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
        <div class="user-info">
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="http://localhost/Service/main.php">logout</a> </p>
        </div>
    <?php endif ?>
</div>

</body>
</html>
<!-- index.php -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add your existing head content here -->
</head>
<body>



<div class="content">
    <!-- Notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <!-- Logged-in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
        

        <!-- Add the iframe here -->
        <iframe src="https://beneficiary.nha.gov.in/" width="1500" height="600" frameborder="0"></iframe>
    <?php endif ?>
</div>

</body>
</html>



  </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>
