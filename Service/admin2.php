<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/Service/file.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
</head>
<h1> ADMIN PANNEL E SERVICE SHIVAMOGGA</h1>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="images/logo.png" alt="">
            </div>

            <span class="logo_name">ADMIN E SERVICE SHIVAMOGGA</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <li><a href="https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/Service/agent3.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">PAN CARD NUMBER FINDER</span>
                </a></li>
                <li><a href="https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/Service/agent2.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">PAN CARDPDF</span>
                </a></li>
                <li><a href="https://0c0c-2401-4900-369f-aa78-65e3-1a39-56f2-25df.ngrok-free.app/Service/agent1.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">GRUHALSHMI STATUS</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
                <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="http://localhost/Service/min.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text"></span>
                        <span class="number">0</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text"></span>
                        <span class="number"></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text"></span>
                        <span class="number"></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                <div class="activity-data">
                    <div class="data names">
                       
                    </div>
                    <div class="data email">
                       
                    </div>
                    <div class="data joined">
                       
                    </div>
                    <div>
                    </div>
                    <div class="data status">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="http://localhost/Service/script"></script>
</body>
</html>