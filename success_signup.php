<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>SocialMe - Find Your Soul Mate</title>

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
                        <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="index.php">
                            <span class="display-6">
                                SocialMe❤️
                            </span>
                        </a>
                        <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                            <div>
                                <a href="login.php" class="custom-btn custom-border-btn btn m-2">Log In</a>
                            </div>
                            <div>
                                <a href="register.php" class="custom-btn custom-border-btn btn m-2">Create An Account</a>
                            </div>
                        </ul>
                        <button class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" type="button" aria-controls="offcanvasMenu"></button>
                    </div>
                </div>
            </div>
        </header>

        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
                <nav>
                    <ul>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="register.php">Create an account</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <section class="hero-section d-flex justify-content-center align-items-center " id="section_1" style="margin-top: -83px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mx-auto">
                        <h1>You have successfully Signup</h1>
                        <p>To continue with Login please verify your Email first</p>
            
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
