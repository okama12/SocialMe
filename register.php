<?php
include "includes/conf.php";
include "includes/validations_functions.php";

$fullnameErr = $emailErr = $dobErr = $passwordErr = $password2Err = "";

if (isset($_POST['signup'])){

    
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $dateOfBirth = trim($_POST['dob']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);
    $verify_token = bin2hex(random_bytes(32)); // Generate a 64-character (32-byte) hex token


    
    // Validation using validations_functions.php file
    $fullnameErr = validateFullName($fullname);
    $emailErr = validateEmail($email);
    $dobErr = validateDateOfBirth($dateOfBirth);
    $passwordErr = validatePassword($password);
    $password2Err = validatePasswordConfirmation($password, $password2);

    // Check if an account with the same email already exists
    $emailErr .= validateExistingEmail($conn, $email);

    // If no errors, proceed with data insertion
    if (empty($fullnameErr) && empty($emailErr) && empty($dobErr) && empty($passwordErr) && empty($password2Err)) {
        // Password hashing
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO `users` (`fullname`, `email`, `dob`, `password`,`verify_token`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $fullname, $email, $dateOfBirth, $passwordHash,$verify_token);

        if ($stmt->execute()) {
            sendemail_verify("$fullname", "$email", "$verify_token");

            header("Location: success_signup.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
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

        <title>Kool Form Pack | Register or Create an account</title>

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
                            <a class="site-header-text d-flex justify-content-center align-items-center me-auto" href="index.php">
                                

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
                
                <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center ">
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

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mx-auto">
                            <form class="custom-form" role="form" method="post">
                                <h2 class="hero-title text-center mt-3 pt-3 ">Create An Account</h2>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
                                            <span class="error text-danger"><?php echo $fullnameErr; ?></span>

                                            <label for="floatingInput">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                            <span class="error text-danger"><?php echo $emailErr; ?></span>

                                            <label for="email">Email address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating p-0">
                                            <input type="date" name="dob" id="dob" class="form-control" placeholder="dob" value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>">
                                            <span class="error text-danger"><?php echo $dobErr; ?></span>
                                            <label for="dob">Date Of Birth</label>
                                        </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                            <span class="error text-danger"><?php echo $passwordErr; ?></span>
                                            <label for="password">Password</label>
                                        </div>

                                        <div class="col-lg-12 col-12">
                                            <div class="form-floating p-0">
                                                <input type="password" name="password2" id="password2" class="form-control" placeholder="Password">
                                                <span class="error text-danger"><?php echo $password2Err; ?></span>
                                                <label for="password2">Verify Password</label>
                                            </div>

                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                          
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree to the Terms of Service and Privacy Policy.
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-5 col-md-5 col-5 ms-auto">
                                            <button type="submit" class="form-control" name="signup">Submit</button>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-7">
                                            <p class="mb-0">Already have an account? <a href="login.php" class="ms-2">Login</a></p>
                                        </div>
                                    </div>
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
