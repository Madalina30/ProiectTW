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
$clientSecret     = '4d0d2c7291960a9a3d4dcc1a500b3c150fdc7332';
$redirectURL     = 'http://www.htmlcss.com/github-login/';

$gitClient = new Github_OAuth_Client(array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectURL,
));


// Try to get the access token
if(isset($_SESSION['access_token'])){
    $accessToken = $_SESSION['access_token'];
}