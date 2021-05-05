<?php
require '../views/db_conf.php';
session_start();
if(isset($_SESSION['is_logged']) &&  $_SESSION['is_logged'] == 1){
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
    <title>Game</title>
    <link rel="stylesheet" href="../../public/style.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
</head>
<body class="body__category">
    <div class="style-css"></div>
    <nav>
        <div class="nav__left">
            <a href="index.php">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="allgames.php" class="btn-fill btn-games">
                Games 
            </a>
            <a href="statistics.html" class="btn-fill btn-statistics">
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
                    <a href="statistics.html"> Statistics </a> 
                    <a class="btn-profile" href="profile.php">
                        <img class="profile-button" src="../../public/images/profile.png" alt="">
                    </a>
                    <img class="insta-button" src="../../public/images/instagram.svg" alt="In">
                    
                </div>
            
            </div>
         </nav>
        <img id="menuButton" src="../../public/images/menu.svg" alt="=">
    </nav>
<!-- todo when you have enough data -->
    <div class="game-container-center">
        <main class="main__levels">
            <?php
                $level = isset($_GET['level'])?$_GET['level']:0;

                $category = "";
                try{
                    $category = $_GET['cat'];
                }catch(Exception $e){
                    $category = "hb";
                }
                
                
                switch($category){
                    case "hb":
                        $selected_category = "htmlBeginner";
                        $db_cat = "bHTML_lvl";
                        break;
                    case "hi":
                        $selected_category = "htmlIntermediate";
                        $db_cat = "iHTML_lvl";
                        break;
                    case "he":
                        $selected_category = "htmlExpert";
                        $db_cat = "eHTMLlvl";
                        break;
                    case "cb":
                        $selected_category = "cssBeginner";
                        $db_cat = "bCSS_lvl";
                        break;
                    case "ci":
                        $selected_category = "cssIntermediate";
                        $db_cat = "iCSS_lvl";
                        break;
                    case "ce":
                        $selected_category = "cssExpert";
                        $db_cat = "eCSS_lvl";
                        break;
                    default:
                        $selected_category = "htmlBeginner";
                        $db_cat = "bHTML_lvl";
                }
                if((int)$level > (int)$rows[$db_cat]){
                    echo "<script>window.location.href = 'templateCategory.php?cat=".$category."&level=".$rows[$db_cat]."'</script>";
                }
                $gameDataFile = file_get_contents("../models/game.json");
                $gameJson = json_decode($gameDataFile, true);
                $maxLevel = count($gameJson[$selected_category]);
                $gameData =  $gameJson[$selected_category][$level];
                $categoryName = $gameData["categoryName"];
                $levelDescription = $gameData["lvlDescription"];
                $levelTemplate = $gameData["lvlTemplate"];
                $levelImage = $gameData["lvlImg"];
                
              
            ?>
            <aside class="left-side-level">
                <h1 class="categoryName" style="padding: 0;"> 
                   <?php echo $categoryName ?> 
                </h1>
                <div class="see-levels">
                    <span onclick="myFunction()" class="level-at radius-bottom-on"> Level 
                        <span class="lvlName">
                        <?php echo "&nbsp;" . ($level + 1) ?> 
                        </span> 
                     
                    </span>
                    <div id="myDropdown" class="dropdown-content">
                        <?php
                            $levels = '';
                            echo "<br>";
                            for($i=1;$i<=$rows[$db_cat];$i++){
                                echo "<a onclick='' class='toLevel' level='".($i-1)."'><center> Level ".$i.'</center></a>';
                            }
                            echo $levels;
                        ?>
                    </div>
                </div>
                <div>
                    <p class="lvlDescription" style="padding: 10px">
                    <?php echo $levelDescription ?>  
                    </p>
                    <form class="where-you-write">
                        <?php 
                        $template = '<input type="text" name="html" id="level'.($level+1).'-html" class="input-zone">'; 
                        echo str_replace("[cod]", $template, $levelTemplate);
                        ?>
                   
                        <br>
                        Attempts: 
                        <span class="attempts"> 
                            0 
                        </span>
                        
                        <button level="<?php echo $level+1;?>"  max-level="<?php echo $maxLevel;?>" class="next-level" type="button" style="cursor:pointer;"> 
                            Next level 
                        </button> 
                    </form>  
                        
                </div>
            </aside>
            <div class="what-you-see">
                <?php
                    if (strpos($category, "h")) {
                        echo '<p class="where-you-see" style="z-index: 7;color:black; background:url(\'../../public/images/'.$levelImage.'\'); background-size: cover; padding: 10px; position: relative !important; height:auto !important; min-height: 250px;"></p>';
                        
                        if(isset($gameData["lvlHtml"])){
                        echo $gameData["lvlHtml"];
                    }
                    } else {
                        echo '<img class="img-level-here" src="../../public/images/'.$levelImage.'" alt="">';
                        echo '<p class="where-you-see" style="z-index: 7;color:black;"></p>';
                        if(isset($gameData["lvlHtml"])){
                            echo $gameData["lvlHtml"];
                        }
                    }
                ?>
                
            </div>
        </main>
    </div>

    <script src="../../public/assets/category.js"></script>
    <script src="../../public/assets/side-menu.js"></script>


</body>

</html>
<?php
}else{
    Header('Location:../../index.php');
}
?>