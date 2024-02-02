<?php
session_start();
ob_start(); 
require_once 'vendor/autoload.php';

// use Google\Client;


// initiate configuration
$clientID = 'YOUR-CLIENT-ID';
$clientSecret = 'YOUR-CLIENT-SECTRET';
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
