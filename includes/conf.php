<?php
session_start();
ob_start(); 
require_once 'vendor/autoload.php';

// use Google\Client;


// initiate configuration
$clientID = '23450593650-pi823hv46lh8uchpdapq6ogjliev2i2o.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/SocialMe/home.php';


// create Client Request to access Google API
$client = new Google\Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


//Database Connection
$host = "localhost";
$user = "root";
$pass ="";
$db = "socialme";

$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    echo "something went wrong". $conn->connect_error;
}
?>