<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'errors.log'); // Logging file path
// Include GitHub API config file
require_once 'gitConfig.php';
require_once 'db_conf.php';

// Include and initialize user class
require_once 'User_class.php';
$user = new User();

    // Generate a random hash and store in the session for security
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);

    // Remove access token from the session
    unset($_SESSION['access_token']);

    // Get the URL to authorize
    $loginURL = $gitClient->getAuthorizeURL($_SESSION['state']);

    // Render Github login button
     $output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/github-login.png"></a>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML&CSS</title>
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body class="body__index">
    <!-- aici sa fie o mica descriere + buton conectare git + 
        ceva design centrate -->
    <main class="center-section-start">
        <div class="box__start-page">
            <h2 style="font-size: 27px; margin:0;"> LEGO HTML & CSS</h2>
           <p>
               Discover web development with our lego friends and their kingdome!
               Join us on a big adventure and learn the art of HTML and CSS 
               while building their city!
            </p>
             <?php
                echo "<p>aici e output".$output."</p>"; ///????
                echo "<a href=".htmlspecialchars($loginURL).">
                <section class='btn-fill btn-github'>
                    Signup with 
                    <img src='../../public/images/github.svg' alt='Github'>

                </section>
                <!-- when pressed - open a login pop-up and then home -->
            </a> ";
            
            ?>
            
        </div>    
    </main>
</body>
</html>
