<?php
define('APP_NAME','legohtml_css');
error_reporting(E_ALL);

ini_set('ignore_repeated_errors', TRUE);

ini_set('display_errors', FALSE);

ini_set('log_errors', TRUE); 
ini_set('error_log', 'errors.log'); 
require_once 'db_conf.php';
require_once 'User_class.php';
$user = new User();

if(!session_id()){
    session_start();
}

require_once 'src/Github_OAuth_Client.php';

$clientID         = '0f60001fb8544c07c505';
$clientSecret     = '174232c146c84086cc99cfef080533f1c5162e0e';
$redirectURL     = 'https://lego-hmlcss.000webhostapp.com/app/views/index.php';

$authorizeURL = 'https://github.com/login/oauth/authorize';
$tokenURL = 'https://github.com/login/oauth/access_token';
$apiURLBase = 'https://api.github.com/';

$gitClient = new Github_OAuth_Client(array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirectURL,
));

if(get('code')) {
  if(!get('state') || $_SESSION['state'] != get('state')) {
    header('Location: ' . $_SERVER['PHP_SELF']);
    die();
  }

  $token = apiRequest($tokenURL, array(
    'client_id' => $clientID,
    'client_secret' => $clientSecret,
    'redirect_uri' => 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],
    'state' => $_SESSION['state'],
    'code' => get('code')
  ));
  $_SESSION['access_token'] = $token->access_token;
error_log("am obtinut tokenul" . $token->access_token);
 header('Location: ' . $_SERVER['PHP_SELF']);
}

if(session('access_token')) {
  $gitUser  = apiRequest($apiURLBase . 'user');

 if(!empty($gitUser)){
     error_log("avem userul de git");
        // User profile data
        $gitUserData = array();
        $gitUserData['oauth_provider'] = 'github';
        $gitUserData['oauth_uid'] = !empty($gitUser->id)?$gitUser->id:'';
        $gitUserData['name'] = !empty($gitUser->name)?$gitUser->name:'';
        $gitUserData['username'] = !empty($gitUser->login)?$gitUser->login:'';
        $gitUserData['email'] = !empty($gitUser->email)?$gitUser->email:'';
        $gitUserData['location'] = !empty($gitUser->location)?$gitUser->location:'';
        $gitUserData['picture'] = !empty($gitUser->avatar_url)?$gitUser->avatar_url:'';
        $gitUserData['link'] = !empty($gitUser->html_url)?$gitUser->html_url:'';
        
        // Insert or update user data to the database
        $userData = $user->checkUser($gitUserData);
        
        // Put user data into the session
        $_SESSION['userData'] = $userData;

        $_SESSION['is_logged'] = 1;
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }

} else {
  echo '<h3>Not logged in</h3>';
  echo '<p><a href="?action=login">Log In</a></p>';
}


function apiRequest($url, $post=FALSE, $headers=array())
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  $headers[] = 'Accept: application/json';
  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');
    $headers[] = 'User-Agent:' . APP_NAME;
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  return json_decode($response);
}

function var_error_log( $object=null ){
    ob_start();                    // start buffer capture
    var_dump( $object );           // dump the values
    $contents = ob_get_contents(); // put the buffer into a variable
    ob_end_clean();                // end capture
    error_log( $contents );        // log contents of the result of var_dump( $object )
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="nav__left">
                <!-- put btn on img -->
                <a href="#">
                    <img class="logo" src="../../public/images/logo.svg" alt="LeHS" height=70px width=70px>
                </a>
                <a href="allgames.php" class="btn-fill btn-games">
                    Games 
                </a>
                <a href="statistics.php" class="btn-fill btn-statistics">
                        Statistics
                </a>
                <a href="personalstatistics.php" class="btn-fill btn-games">
                    My statistics 
                </a>
            </div>
            <div class="icons-right">
                <a class="btn-profile" href="profile.php">
                    <img class="profile-button" src="../../public/images/profile.png" alt="" height=35px width=35px>
                </a>
                <img class="insta-button" src="../../public/images/instagram.svg" alt="In" height=35px width=35px>
            </div>
            <img id="menuButton" src="../../public/images/menu.svg" alt="=">
            <nav class="nav__appear">
                <img class="exit" src="../../public/images/menu.svg" alt="m">
                <div class="nav__items">
                    <div class="all-elements">
                        <a href="#"> Home </a> 
                        <a href="allgames.php"> Games </a> 
                        <a href="statistics.php"> Statistics </a> 
                        <a href="personalstatistics.php">My Statistisc</a>
                        <a class="btn-profile" href="profile.php">
                            <img class="profile-button" src="../../public/images/profile.png" alt="" height=35px width=35px>
                        </a>
                        <img class="insta-button" src="../../public/images/instagram.svg" alt="In" height=35px width=35px>
                        
                    </div>
                
                </div>
             </nav>
        </nav>

        <div class="presentation">
            <p class="description-site">
                Come and join us into the beauty of Lego pieces and help
                 us color them, build castles and other amazing things during our adventure!
            </p>
        </div>
        
    </header>

    <div class="learn-presentation main-sections">
        <h1>
            Learn HTML and CSS like a PRO
        </h1>
        <div class="div__presentation div__learn-presentation">
            <div class="div__bullet">
                <img src="../../public/images/levels.svg" alt="Levels" height=auto width=auto>
                <h4>Levels</h4>
                <p>
                    Lots of challenging levels to go for you to master HTML and CSS!
                </p>
            </div>
            <div class="div__bullet">
                <img src="../../public/images/statictics.svg" alt="Statistics" height=auto width=auto>
                <h4>Statistics</h4>
                <p>
                    See the top players and try to beat them!
                </p>
            </div>
        </div>
    </div>
<!-- presentation -->
    <div class="games-presentation main-sections">
        <h1>
            Play our games! HTML and CSS only!
        </h1>
        <div class="div__presentation div__games-presentation">
            <a href="templateCategory.php?cat=hb&level=0">
                <img class="to-html to-page" src="../../public/images/htmlLevels.svg" alt="HTML" height=auto width=auto>
            </a>
            <a href="templateCategory.php?cat=cb&level=0">
                <img class="to-css to-page" src="../../public/images/cssLevels.svg" alt="CSS" height=auto width=auto>  
            </a>
        </div>
        
    </div>

    <!-- FAQ -->
    <div class="faq main-sections" id="faq">
        <h1> FAQ </h1>
        <div class="three-on-row div__presentation">
            <!-- 3 questions and their answers -->
            <section class="div__bullet q-a">
                <h4> Why would you use our site? </h4>
                <p> Because you will learn the basics and advanced 
                    notions about CSS and HTML in a relaxing, 
                    funny, and interactive way. </p>
            </section>
            <section class="div__bullet q-a">
                <h4> How are the points distributed? </h4>
                <p> Every level has 20 points and every time you submit 
                    a wrong answer you will get -1 point from the total left for that level. </p>
            </section>
            <section class="div__bullet q-a">
                <h4> Why did we chose the lego theme? </h4>
                <p> Because programming can be compared with playing lego. It is an entire universe of creativity. </p>
            </section>
        </div>
    </div>

    <!-- team -->

    <div class="meet-our-team main-sections">
        <h1> Meet our team </h1>
        <div class="three-on-row div__presentation">
            <section class="mada">
                <img src="../../public/images/mada.svg" alt="Mada" height=auto width=auto>
                <h4> Madalina-Elena Banica </h4>
                <p> "The secret to creativity is knowing how to hide your sources" </p>
            </section>
            <section class="ioan">
                <img src="../../public/images/ioan.svg" alt="Ioan" height=auto width=auto>
                <h4> Ioan Puiu </h4>
                <p> "Your passion is waiting for your courage to catch up." </p>
            </section>
            <section class="emi">
                <img src="../../public/images/emi.svg" alt="Emi" height=auto width=auto>
                <h4> George-Emanuel Hurmuz </h4>
                <p> "An enthusiastic heart finds opportunities everywhere." </p>
            </section>
        </div>
    </div>

    <!-- about us -->
    <div class="about-us main-sections" id="about">
        <h1> About us </h1>
        <p class="about__description"> 
            We are some young people from Computer Science 
            faculty from Iasi and this is our web project for 
            the 2nd year of faculty.
        </p>
        <p>Here is our documentation for this amazing project: 
            <!-- link catre html documentatie -->
            <a href="documentatie.html" style="color:blueviolet">Documentatie</a>
        </p>
        <button type='button' class='btn__show'> Show more </button>
    </div>

    <!-- contact us -->
    <div class="contact-us main-sections" id="contact">
        <h1> Contact us </h1>
        <div class="div__presentation">
            <p> Phone: +04 744 LEGO45 </p>
            <p> Email: lego_enthusiasts@gmail.com </p>
        </div>
    </div>
    <script src="../../public/assets/side-menu.js"></script>
    <script src="../../public/assets/showMore.js"></script>
</body>


</html>