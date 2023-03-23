<?php 
session_start();
if (isset($_SESSION['user'])) 
 { 
  
 }
else {
     header('location:index.php'); 
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Attedance Management</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
        <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-1.css">
        <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product.css">
    </head>
    <body style="font-family: Poppins, sans-serif">
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="
        font-family: Poppins, sans-serif;
        box-shadow: 5px 0px 20px var(--bs-gray-300);
        border-style: none;
      ">
            <div class="container container-sm">
                <a class="navbar-brand" href="#">
                    Attendance.io
                </a>
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                    <span class="visually-hidden">
                        Toggle navigation
                    </span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Need Help ?</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="dropdown-toggle nav-link"
                                aria-expanded="false"
                                data-bs-toggle="dropdown"
                                href="#"
                            >
                                Profile
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item"></li>
                    </ul>
                    <ul class="navbar-nav"></ul>
                </div>
            </div>
        </nav>
        <h2 class="container-sm" style="
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 0px;
        padding-right: 12px;
        padding-top: 30px;
        padding-bottom: 0;
        padding-left: 30px;
      ">
            Welcome Back, <?php if (isset($_SESSION['user'])) 
 { echo $_SESSION['user'];}?>
        </h2>
        <div class="d-flex flex-row flex-wrap container-sm" style="padding-top: 30px; padding-bottom: 30px; margin-top: 0px">
            <?php 
require 'addtodashboard.php';
?>
			<?php function disdash($result){?>
			<div class="card m-2" style="width: 300px">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $result; ?></h4>
                    <h6 class="text-muted card-subtitle mb-2">Classname - year</h6>
                    
                        <button class="btn btn-primary" type="button" style="width: 100%; margin-top: 6px">
						<a style="text-decoration:none; color:white;" href="take-attendance.php?clnm=<?php echo $result;?>">
                                                    Take Attendance
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-primary" type="button" style="width: 100%; margin-top: 6px">
						 <a style="text-decoration:none; color:white;" href="Review.php?clnm=<?php echo $result;?>">                         
                                                     Review Attendance
						   </a>
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-primary" type="button" style="width: 100%; margin-top: 6px">
						 <a style="text-decoration:none; color:white;" href="print.php?clnm=<?php echo $result;?>">
						  Print Attendance 
						  </a>
                        </button>
                    </a>
                    <a href="">
                        <button class="btn btn-danger" type="Print Detention Sheet" style="width: 100%; margin-top: 6px">
                           	<a style="text-decoration:none; color:white;" href="detention.php?clnm=<?php echo $result;?>">
								Print Detention Sheet
							</a>
                        </button>
                    </a>
                </div>
            </div>
			<?php } ?>
            <div class="card m-2" style="width: 300px">
                <a href="takeData.php" style="text-decoration:none;"><div class="card-body d-flex flex-column justify-content-center align-items-center btn">
                    <img
                        class="img-fluid"
                        loading="lazy"
                        src="assets/img/add--alt.svg"
                        style="width: 100px; margin-bottom: 20px"
                    >
                    <h4 class="card-title" >Add Class</h4>
                </div>
				</a>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
    </body>
</html>
