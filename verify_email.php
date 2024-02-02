<?php
include "includes/conf.php";

$htmlMessage = ""; 

if (isset($_GET['token'])){
    $token = $_GET['token'];

    $sql = "SELECT id, is_verified FROM users WHERE verify_token = ? LIMIT 1";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        $htmlMessage = "<h2 style='color: red;'>Token not found</h2>";
        header("location: success_signup.php");
        exit;
    } else {
        if ($user['is_verified'] == 0) { // Check if not already verified
            // Update the is_verified column to indicate email verification
            $sqlUpdate = "UPDATE users SET is_verified = 1 WHERE id = ?";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("i", $user["id"]);

            if ($stmtUpdate->execute()) {
                $htmlMessage = "<h2 style='color: green;'>Verified successfully</h2>";
                
            } else {
                $htmlMessage = "<h2 style='color: red;'>Verification failed: " . $stmtUpdate->error . "</h2>";
            }
        } else {
            $htmlMessage = "<h2 style='color: blue;'>Email already verified. Please continue to login.</h2>";
            
        }
    }
}
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Kool Form Pack | Login page</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/tooplate-kool-form-pack.css" rel="stylesheet">
<!--

Tooplate 2136 Kool Form Pack

https://www.tooplate.com/view/2136-kool-form-pack

Bootstrap 5 Form Pack Template

-->
    </head>
    
    <body>

        <main>

            
            <header class="site-header">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-lg-12 col-12 d-flex align-items-center">
                            <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="index.html">
                                

                                <span class="display-6">
                                    SocialMe❤️
                                </span>
                            </a>

                            <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                                <div>
                                    <a href="login.html" class="custom-btn custom-border-btn btn m-5">Log In
                                    </a>
                                </div>

                                <div>
                                    <a href="register.php" class="custom-btn custom-border-btn btn m-1">Create An Account
                                    </a>
                                </div>
                            </ul>

                            

                            <a class="bi-list offcanvas-icon" data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasMenu"></a>

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
                                <a href="login.html">Login</a>
                            </li>

                            <li>
                                <a href="register.html">Create an account</a>
                            </li>


                        
                        </ul>
                    </nav>
                </div>
            </div>


            <section class="hero-section d-flex justify-content-center align-items-center" style="margin-top: -140px;">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 mx-auto">
                        <?php echo $htmlMessage; ?>
                            
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


