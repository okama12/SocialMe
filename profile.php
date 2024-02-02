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
                                <a href="prifile.php" class="text-white  btn m-2">Profile</a>
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

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1" style="margin-top: 120px;">
            <div class="container">
                <div class="row">
                    <!-- Single Black Card -->
                    <div class="col-md-8 mx-auto">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h5 class="card-title">Profile Details</h5>
                                <!-- Profile Form -->
                                <form>
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nationality" class="form-label">Nationality</label>
                                        <input type="text" class="form-control" id="nationality" placeholder="Enter your nationality">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" rows="3" placeholder="Enter a brief description about yourself"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Age</label>
                                        <input type="number" class="form-control" id="age" placeholder="Enter your age">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="profilePicture" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" id="profilePicture">
                                    </div>
                                    <div class="mb-3">
                                        <label for="newProfilePicture" class="form-label">Add New Profile Picture</label>
                                        <input type="file" class="form-control" id="newProfilePicture">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
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
