<?php
error_reporting(E_ALL); // Error/Exception engine, cate erori vreau sa vad

ini_set('ignore_repeated_errors', TRUE); 

ini_set('display_errors', FALSE); // suntem pe host si nu vrem sa apara erorile, de aia e false

ini_set('log_errors', TRUE); // folosesc un fisier pentru afisarea erorilor
ini_set('error_log', 'errors.log'); //fisierul in care se trec erorile

//Includ gitHub API-ul.
require_once 'gitConfig.php';
require_once 'db_conf.php';

// generez un nou utilizator cu o sesiune noua de date inregistrate
require_once 'User_class.php';
$user = new User();

    // Generez o valoare random pentru utilizatorul din sesiunea curenta si o salvez
    $_SESSION['state'] = hash('sha256', microtime(TRUE) . rand() . $_SERVER['REMOTE_ADDR']);

    // Sterg acces_token-ul
    unset($_SESSION['access_token']);

    // Iau din git URL-ul de autentificare pentru utilizatorul cu state-ul curent
    $loginURL = $gitClient->getAuthorizeURL($_SESSION['state']);

    // Aplic link-ul respectiv peste forma deja creata
     $output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/github-login.png"></a>';

require './app/languages/languages.php';


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
              <?php echo $lang[$language]['main_desciption'] ?> 
            </p>
             <?php
                
                echo "<a href=".htmlspecialchars($loginURL).">
                <section class='btn-fill btn-github'>
                    ".$lang[$language]['main_signup_buttpn']." 
                    <img src='../../public/images/github.svg' alt='Github'>

                </section>
                <!-- when pressed - open a login pop-up and then home -->
            </a> ";
            
            ?>
            
        </div>    
    </main>
</body>
</html>
