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

        <section class="hero-section d-flex justify-content-center align-items-center mt-5" id="section_1">
            <div class="container">
                <div class="row">
                    <!-- Conversation List -->
                    <div class="col-md-3 mx-auto">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                Person 1
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">Person 2</a>
                            <a href="#" class="list-group-item list-group-item-action">Person 3</a>
                            <!-- Add more people as needed -->
                        </div>
                    </div>

                    <!-- Display Chat -->
                    <div class="col-md-9 mx-auto">
                        <div class="card" style="height: 500px; overflow-y: auto;">
                            <div class="card-body">
                                <!-- Display chat messages here -->
                                <div class="incoming-msg">
                                    <p>Hello, how are you?</p>
                                    <span class="time">10:00 AM</span>
                                </div>
                                <div class="outgoing-msg">
                                    <p>I'm good, thank you!</p>
                                    <span class="time">10:05 AM</span>
                                </div>
                                <!-- Add more messages as needed -->
                            </div>
                        </div>
                        <!-- Message Input Form -->
                        <form class="mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message">
                                <button class="btn btn-primary" type="button">Send</button>
                            </div>
                        </form>
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
