<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body class="body__category">
    <nav>
        <div class="nav__left">
            <a href="home.html">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="allgames.html" class="btn-fill btn-games">
                Games 
            </a>
            <a href="statistics.html" class="btn-fill btn-statistics">
                    Statistics
            </a>
        </div>
        <div class="icons-right">
            <a class="btn-profile" href="profile.html">
                <img class="profile-button" src="../../public/images/profile.png" alt="">
            </a>
            <img class="insta-button" src="../../public/images/instagram.svg" alt="In">
        </div>
        <nav class="nav__appear">
            <img class="exit" src="../../public/images/menu.svg" alt="m">
            <div class="nav__items">
                <div class="all-elements">
                    <a href="#"> Home </a> 
                    <a href="allgames.html"> Games </a> 
                    <a href="statistics.html"> Statistics </a> 
                    <a class="btn-profile" href="profile.html">
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
                }catch(Exception){
                    $category = "hb";
                }
                
                
                switch($category){
                    case "hb":
                        $selected_category = "htmlBeginner";
                        break;
                    case "hi":
                        $selected_category = "htmlIntermediate";
                        break;
                    case "he":
                        $selected_category = "htmlExpert";
                        break;
                    case "cb":
                        $selected_category = "cssBeginner";
                        break;
                    case "ci":
                        $selected_category = "cssIntermediate";
                        break;
                    case "ce":
                        $selected_category = "cssExpert";
                        break;
                    default:
                        $selected_category = "htmlBeginner";
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
                    <!-- <img src="../../public/images/leftarrow.svg" alt="A"> -->
                    <span class="level-at"> Level 
                        <span class="lvlName">
                        <?php echo ($level + 1) ?> 
                        </span> 
                        <?php
                        $levels = '';
                        echo "<br>";
                        for($i=1;$i<=$maxLevel;$i++){
                            echo "<center> Level ".$i.'</center><br>';
                        }
                        echo $levels;
                        ?>
                    </span>
                    <!-- <img src="../../public/images/rightarrow.svg" alt="A"> -->
                </div>
                <div>
                    <p class="lvlDescription">
                    <?php echo $levelDescription ?>  
                    </p>
                    <form class="where-you-write">
                        <?php 
                        $template = '<input type="text" name="html" id="level'.($level+1).'-html" class="input-zone" style="color:white;">'; 
                        echo str_replace("[cod]", $template, $levelTemplate);
                         
                        
                        ?>
                   
                        <br>
                        Attempts: 
                        <span class="attempts"> 
                            0 
                        </span>

                        <button level="<?php echo $level+1;?>" max-level="<?php echo $maxLevel;?>" class="next-level" type="button" style="cursor:pointer;"> 
                            Next level 
                        </button> 
                    </form>  
                        
                </div>
            </aside>
            <div class="what-you-see">
                <?php
                    echo '<img src="../../public/images/'.$levelImage.'" alt="">';
                ?>
                
            </div>
        </main>
    </div>

    <script src="../../public/assets/category.js"></script>
    <script src="../../public/assets/side-menu.js"></script>


</body>

</html>