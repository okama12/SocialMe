<?php
 session_start();
include "includes/conf.php";

if(!isset($_SESSION['token'])){
    header('Location: login.php');
    exit;
  }
  
  
  $client->setAccessToken($_SESSION['token']);
  
  if($client->isAccessTokenExpired()){
    header('Location: logout.php');
    exit;
  }
  $google_oauth = new Google_Service_Oauth2($client);
  $user_info = $google_oauth->userinfo->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SocialMe❤️</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/tooplate-kool-form-pack.css" rel="stylesheet">
</head>

<body>

    <main>

        <header class="site-header">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-lg-12 col-12 d-flex align-items-center">
                        <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="home.php">
                            <span class="display-6">SocialMe❤️</span>
                        </a>

                        <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                            <div>
                            <!-- <?php

// Check if the user is logged in
if (isset($_SESSION['fullname'])) {
    $fullname = $_SESSION['fullname'];
    echo "<p class='text-white'>Welcome, $fullname!</p>";
} else {
    // Redirect to the login page if the user is not logged in
    header("location: login.php");
    exit;
}
?> -->


                                <a href="profile.php" class="text-white  btn m-2">Profile</a>
                            </div>
                            <div>
                                <a href="charts.php" class="text-white  btn m-2">Charts💬</a>
                            </div>

                        </ul>

                        <button class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" type="button" aria-controls="offcanvasMenu"></button>
                    </div>
                </div>
            </div>
        </header>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">                
            <div class="offcanvas-header">                    
                <button type="button" class="btn-close ms-auto bi-list offcanvas-icon" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
            </div>
            
            <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
                <nav>
                    <ul>
                    <li>
                            <a href="Profile.php">Profile</a>
                        </li>
                        <li>
                            <a href="charts.php">Charts</a>
                        </li>
                        <li>
                            <a href="logout.php" class="text-danger">Log Out</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1" style="margin-top: 20px;">
            <div class="container">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="card" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/p1.jpg" class="card-img img-fluid mt-2" alt="Person 1's Photo" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">Person 1</h5>
                                        <p class="card-text mb-2">A brief and captivating description of Person 1 goes here.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person"></i> Age: 25</li>
                                            <li class="list-inline-item"><i class="bi bi-gender-male"></i> Gender: Male</li>
                                            <li class="list-inline-item"><i class="bi bi-flag"></i> Country: USA</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 mb-4">
                        <div class="card" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/p1.jpg" class="card-img img-fluid mt-2" alt="Person 2's Photo" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">Person 2</h5>
                                        <p class="card-text mb-2">A brief and captivating description of Person 2 goes here.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person"></i> Age: 28</li>
                                            <li class="list-inline-item"><i class="bi bi-gender-female"></i> Gender: Female</li>
                                            <li class="list-inline-item"><i class="bi bi-flag"></i> Country: Canada</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6 mb-4">
                        <div class="card" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="img/p1.jpg" class="card-img img-fluid mt-2" alt="Person 3's Photo" style="max-width: 100px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">Person 3</h5>
                                        <p class="card-text mb-2">A brief and captivating description of Person 3 goes here.</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person"></i> Age: 22</li>
                                            <li class="list-inline-item"><i class="bi bi-gender-male"></i> Gender: Male</li>
                                            <li class="list-inline-item"><i class="bi bi-flag"></i> Country: Australia</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/init.js"></script>
</body>
</html>
