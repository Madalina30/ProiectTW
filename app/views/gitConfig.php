<?php
// Start session
if(!session_id()){
    session_start();
}

// Include Github client library 
require_once 'src/Github_OAuth_Client.php';


/*
 * Configuration and setup GitHub API
 */
$clientID         = '0f60001fb8544c07c505';
$clientSecret     = '174232c146c84086cc99cfef080533f1c5162e0e';
$redirectURL     = 'https://lego-hmlcss.000webhostapp.com/app/views/index.php';

$gitClient = new Github_OAuth_Client(array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectURL,
));


// Try to get the access token
if(isset($_SESSION['access_token'])){
    $accessToken = $_SESSION['access_token'];
}