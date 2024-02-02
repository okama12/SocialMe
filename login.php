<?php
//  session_start();
include "includes/conf.php";
include "includes/validations_functions.php";

?>


<?php
if (isset($_POST['signin'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $sql = "SELECT * FROM `users` WHERE `email` = ?;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Check if the user is verified and verify the password
            if ($row['is_verified'] == 1 && password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['email'] = $row['email'];

                header("location: home.php");
                exit;
            }
        }
    }
}
// echo "Before the Google OAuth block";
$login_url = $client->createAuthUrl();

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])):

    var_dump($_GET['code']);
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(isset($token['error'])){
    //   header('Location: login.php');
    //   exit;
    }
    $_SESSION['token'] = $token;
    var_dump($token);
    /* -- Inserting the user data into the database -- */
  
    # Fetching the user data from the google account
    $client->setAccessToken($token);
    $google_oauth = new Google_Service_Oauth2($client);
    $user_info = $google_oauth->userinfo->get();
  
    $fullname = trim($user_info['name']);
    $email = trim($user_info['email']);
    $gender = trim($user_info['gender']);
    $picture = trim($user_info['picture']);
    $verify_token = trim($user_info['id']);
    $is_verified = trim($user_info['verifiedEmail']);
  
   
  
    # Checking whether the email already exists in our database.
    $check_email = $conn->prepare("SELECT `email` FROM `users` WHERE `email`=?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();
    var_dump($check_email);
  
    if($check_email->num_rows === 0){
      # Inserting the new user into the database
      $query_template = "INSERT INTO `users` (`fullname`, `email`, `gender`, `picture`, `verify_token`, `is_verified`) VALUES (?,?,?,?,?,?)";
      $insert_stmt = $conn->prepare($query_template);
      $insert_stmt->bind_param("ssssss", $fullname, $email, $gender, $picture, $verify_token, $is_verified);
      var_dump($insert_stmt);
      if(!$insert_stmt->execute()){
        echo "Failed to insert user.";
        exit;
      }
    }
    echo "Google OAuth";
    header('Location: home.php');
    exit;
  
endif;
// echo "After the Google OAuth block";
//     // get profile info
//     $google_oauth = new Google_Service_Oauth2($client);
//     $google_account_info = $google_oauth->userinfo->get();
//     $userinfo = [
//       'fullname' => $google_account_info['name'],
//       'email' => $google_account_info['email'],
//       'gender' => $google_account_info['gender'],
//       'picture' => $google_account_info['picture'],
//       'verify_token' => $google_account_info['id'],
//       'is_verified' => $google_account_info['verifiedEmail'],
//     ];

//     if ($userinfo) {
//         // Check if the user already exists in the database
//         $selectQuery = "SELECT * FROM users WHERE email = ?";
//         $selectStatement = $conn->prepare($selectQuery);
//         $selectStatement->bind_param("s", $userinfo['email']);
//         $selectStatement->execute();
//         $result = $selectStatement->get_result();
    
//         if ($result->num_rows > 0) {
//             // User already exists in the database
//             $userinfo = $result->fetch_assoc();
//             $_SESSION['user_token'] = $userinfo['token'];  // Set the user token from the existing user
//         } else {
//             // User does not exist, insert into the database
//             $insertQuery = "INSERT INTO `users` (`fullname`, `email`, `gender`,`picture`,`verify_token`,`is_verified`) VALUES (?, ?, ?, ?, ?,?)";
//             $insertStatement = $conn->prepare($insertQuery);
//             $insertStatement->bind_param("ssssss", $userinfo['fullname'], $userinfo['email'], $userinfo['gender'], $userinfo['picture'], $userinfo['verify_token'], $userinfo['is_verified']);
    
//             if ($insertStatement->execute()) {
//                 // User inserted successfully
//                 $_SESSION['user_token'] = $userinfo['verify_token'];  // Set the user token from the newly inserted user
//             } else {
//                 // Error inserting user
//                 echo "User is not created";
//                 die();
//             }
//         }
//     } else {
//         // Redirect to index.php if user_token is not set in the session
//         if (!isset($_SESSION['user_token'])) {
//             header("Location: index.php");
//             die();
//         }
    
//         // Check if the user exists in the database using the session user_token
//         $selectQuery = "SELECT * FROM users WHERE verify_token = ?";
//         $selectStatement = $conn->prepare($selectQuery);
//         $selectStatement->bind_param("s", $_SESSION['user_token']);
//         $selectStatement->execute();
//         $result = $selectStatement->get_result();
    
//         if ($result->num_rows > 0) {
//             // User exists in the database
//             $userinfo = $result->fetch_assoc();
//         }
//     }
// }
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

<!-- 
                            <li>
                                <a href="404.html">404 Page</a>
                            </li>

                            <li>
                                <a href="contact.html">Contact Form</a>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>


            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 mx-auto">
                            <form class="custom-form login-form" role="form" method="post">
                                <h2 class="hero-title text-center mb-4 pb-2">Log In</h2>
                                <?php
            // Display error messages if there are any
            if (!empty($errors)) {
                echo '<div class="alert alert-danger" role="alert">';
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo '</div>';
            }
            ?>
                                <div class="form-floating mb-4 p-0">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="">

                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating p-0">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

                                    <label for="password">Password</label>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>

                                <div class="row">

</div>

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-5 col-12">
                                        <button type="submit" name="signin" class="form-control">Login</button>
                                    </div>

                                    <div class="col-lg-8 col-12 mt-2">
                                    <?php

// if (isset($_SESSION['user_token'])) {
//     header("Location: welcome.php");
//   } else {
//     echo "<a href='" . $client->createAuthUrl() . "' class='btn custom-btn'><img src='img/google.png' width='30px' height='30px' alt=''>Login with Google</a>";
//   }
  
echo "<a href='$login_url' class='btn custom-btn'><img src='img/google.png' width='30px' height='30px' alt=''>Login with Google</a>";

?>

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
