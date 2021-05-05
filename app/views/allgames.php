<?php
require '../views/db_conf.php';
session_start();
if($_SESSION['is_logged'] == 1){
    $userData = $_SESSION['userData'];
    $username = $userData['username'];
    $userDbData = $conn->query('SELECT * FROM users WHERE username = \'' . $username . '\'');
    $rows = $userDbData->fetch_all(MYSQLI_ASSOC)[0];
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body class="body__games">
    <div class="config" style="display:none">
        <div class="htmlBeginner">
            <div class="level"><?php echo $rows['bHTML_lvl']; ?></div>
        </div>
        <div class="htmlIntermediate">
            <div class="level"><?php echo $rows['iHTML_lvl']; ?></div>
        </div>
        <div class="htmlExpert">
            <div class="level"><?php echo $rows['eHTMLlvl']; ?></div>
        </div>
        <div class="cssBeginner">
            <div class="level"><?php echo $rows['bCSS_lvl']; ?></div>
        </div>
        <div class="cssIntermediate">
            <div class="level"><?php echo $rows['iCSS_lvl']; ?></div>
        </div>
        <div class="cssExpert">
            <div class="level"><?php echo $rows['eCSS_lvl']; ?></div>
        </div>
    </div>
    <nav>
        <div class="nav__left">
            <a href="index.php">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="#" class="btn-fill btn-games" 
            style="background-color: rgba(76, 182, 72, 0.644);">
                Games 
            </a>
            <a href="statistics.php" class="btn-fill btn-statistics">
                    Statistics
            </a>
        </div>
        <div class="icons-right">
            <a class="btn-profile" href="profile.php">
                <img class="profile-button" src="../../public/images/profile.png" alt="">
            </a>
            <img class="insta-button" src="../../public/images/instagram.svg" alt="In">
        </div>
        <nav class="nav__appear">
            <img class="exit" src="../../public/images/menu.svg" alt="m">
            <div class="nav__items">
                <div class="all-elements">
                    <a href="#"> Home </a> 
                    <a href="allgames.php"> Games </a> 
                    <a href="statistics.php"> Statistics </a> 
                    <a class="btn-profile" href="profile.php">
                        <img class="profile-button" src="../../public/images/profile.png" alt="">
                    </a>
                    <img class="insta-button" src="../../public/images/instagram.svg" alt="In">
                    
                </div>
            
            </div>
         </nav>
        <img id="menuButton" src="../../public/images/menu.svg" alt="=">
    </nav>

    <div class="games-page pages">
        <h1> Games </h1>
        <section class="learn-html learn-section">
            <h2> HTML </h2>
            <!-- 3 images with progress on top with the categories -->
            <div class="games-categories categories-html">

            </div>
        </section>
        <section class="learn-css learn-section">
            <h2> CSS </h2>
            <div class="games-categories categories-css">

            </div>
        </section>
        
    </div>
    <script src="../../public/assets/games.js" ></script>
    <script src="../../public/assets/side-menu.js" ></script>

</body>
</html>
<?php
}else{
    Header('Location:../../index.php');
}