<?php
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendemail_verify($fullname, $email, $verify_token){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                    
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'socialme835@gmail.com';                     
        $mail->Password   = 'oqjl hmbp uvbj elle';                               
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587;                                    

        //Recipients
        $mail->setFrom('socialme835@gmail.com', $fullname);
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Email verification from SocialMe';
        $email_template = "
        <h1> You have Registered with SocialMe </h1>
        <h5> Verify your email address to Login with the below given link </h5>
        <a href='http://localhost/SocialMe/verify_email.php?token=$verify_token'> Click me </a>
        ";
        $mail->Body = $email_template;
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Error sending email: " . $e->getMessage();
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

 

function validateFullName($fullname) {
    if (empty($fullname)) {
        return "Fullname is required.";
    }
    return "";
}

function validateEmail($email) {
    if (empty($email)) {
        return "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email address.";
    }
    return "";
}

function validateDateOfBirth($dob) {
    if (empty($dob)) {
        return "Date of Birth is required.";
    }
    return "";
}

function validatePassword($password) {
    if (empty($password)) {
        return "Password is required.";
    } elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        return "Password must be at least 8 characters long and include a capital letter, a small letter, a special symbol, and a number.";
    }
    return "";
}

function validatePasswordConfirmation($password, $password2) {
    if (empty($password2)) {
        return "Please confirm your password.";
    } elseif ($password !== $password2) {
        return "Passwords do not match.";
    }
    return "";
}

function validateExistingEmail($conn, $email) {
    $checkExistingEmail = "SELECT COUNT(*) FROM users WHERE email=?";
    $stmtCheck = $conn->prepare($checkExistingEmail);
    $stmtCheck->bind_param("s", $email);
    $stmtCheck->execute();
    $stmtCheck->bind_result($existingEmailCount);
    $stmtCheck->fetch();
    $stmtCheck->close();

    if ($existingEmailCount > 0) {
        return "An account already exists.";
    }

    return "";

}

