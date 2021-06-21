<?php
require '../views/db_conf.php';
require '../languages/languages.php';
if($_SESSION['is_logged'] == 1){
    $userData = $_SESSION['userData'];
    $username = $userData['username'];
    $userDbData = $conn->query('SELECT * FROM users WHERE username = \'' . $username . '\'');
    $row = $userDbData->fetch_all(MYSQLI_ASSOC)[0];
    $username=$row["username"];
    $picture=$row["picture"];
    $htmlPoints=$row["HTML_points"];
    $cssPoints=$row["CSS_points"];
    $totalPoints=$htmlPoints+$cssPoints;
    $htmlLvl=$row["bHTML_lvl"]+$row["iHTML_lvl"]+$row["eHTMLlvl"];
    $cssLvl=$row["bCSS_lvl"]+$row["iCSS_lvl"]+$row["eCSS_lvl"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang[$language]['profile_title'] ?> </title>
    <link rel="stylesheet" href="../../public/style.css">

</head>
<body class="profile__body">
    <nav>
        <div class="nav__left">
            <a href="index.php">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="allgames.php" class="btn-fill btn-games">
                 <?php echo $lang[$language]['menu_btn_games'] ?> 
            </a>
            <a href="statistics.php" class="btn-fill btn-games">
                <?php echo $lang[$language]['menu_btn_statistics'] ?>
            </a>
            <a href="personalstatistics.php" class="btn-fill btn-games">
                <?php echo $lang[$language]['menu_btn_mystatistics'] ?> 
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
                <a href="index.php"> <?php echo $lang[$language]['menu_btn_home'] ?> </a> 
                    <a href="allgames.php"> <?php echo $lang[$language]['menu_btn_games'] ?> </a> 
                    <a href="statistics.php"> <?php echo $lang[$language]['menu_btn_statistics'] ?> </a> 
                    <a href="personalstatistics.php"><?php echo $lang[$language]['menu_btn_mystatistics'] ?></a>
                    <a class="btn-profile" href="profile.php">
                        <img class="profile-button" src="../../public/images/profile.png" alt="">
                    </a>
                    <img class="insta-button" src="../../public/images/instagram.svg" alt="In">
                    
                </div>
            
            </div>
         </nav>
        <img id="menuButton" src="../../public/images/menu.svg" alt="=">
    </nav>

    <main class="profile__container">
        <div class="profile__box">
            
            <?php 
            echo '<img src = "'.$picture.'" alt = \'user\' style=\' border-radius:70px;\'>';
            if($language=='ro'){
                echo '<a href="changeLang.php" style="height:20px;width:50px"><img style="height:20px;width:50px" width="50px" height="50px" src="../../public/images/flag_uk.svg"></a>';
            }else{
                echo '<a href="changeLang.php" style="height:20px;width:50px"><img style="height:20px;width:50px" width="50px" height="50px" src="../../public/images/flag_ro.svg"></a>';

            }


            echo '<h2 style=\'font-weight:0;\'>'.$username.'</h2> <br>';
            ?>
            
            <!-- to see how to put them -->
            <div class="user-profile">
                <section>
                    <span>
                    <?php echo $lang[$language]['profile_html_points'] ?>
                    </span>
                    <span>
                        <?php 
                        echo $htmlPoints;
                        ?>
                    </span>
                </section>
                <section>
                    <span>
                    <?php echo $lang[$language]['profile_css_points'] ?>
                    </span>
                    <span>
                         <?php 
                        echo $cssPoints;
                        ?>
                    </span>
                </section>
                <section>
                    <span>
                    <?php echo $lang[$language]['profile_total_points'] ?>
                    </span>
                    <span>
                         <?php 
                        echo $totalPoints;
                        ?>
                    </span>
                </section>
                <section>
                    <span>
                    <?php echo $lang[$language]['profile_html_levels'] ?>
                    </span>
                    <span>
                         <?php 
                        echo $htmlLvl;
                        ?>
                    </span>
                </section>
                <section>
                    <span>
                    <?php echo $lang[$language]['profile_css_levels'] ?>
                    </span>
                    <span>
                         <?php 
                        echo $cssLvl;
                        ?>
                    </span>
                </section>
            </div>
            <a class="btn__logout" href="../../logout.php">
            <?php echo $lang[$language]['profile_btn_logout'] ?>
            </a>
        </div>

    </main>

    <script src="../../public/assets/side-menu.js"></script>

</body>
</html>