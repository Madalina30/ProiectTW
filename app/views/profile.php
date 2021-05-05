<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../public/style.css">

</head>
<body class="profile__body">
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

    <main class="profile__container">
        <div class="profile__box">
            <img src="../../public/images/profile.png" alt="">
            <h2> Username </h2>
            
            <!-- to see how to put them -->
            <div class="user-profile">
                <section>
                    <span>
                        HTML points
                    </span>
                    <span>
                        x
                    </span>
                </section>
                <section>
                    <span>
                        CSS points
                    </span>
                    <span>
                        x
                    </span>
                </section>
                <section>
                    <span>
                        Total points
                    </span>
                    <span>
                        x
                    </span>
                </section>
                <section>
                    <span>
                        HTML levels
                    </span>
                    <span>
                        x
                    </span>
                </section>
                <section>
                    <span>
                        CSS levels
                    </span>
                    <span>
                        x
                    </span>
                </section>
            </div>
            <a class="btn__logout" href="../../index.php">
                <!-- aici sa se delogheze userul - sa apara delogat sau cv -->
                Logout
            </a>
        </div>

    </main>

    <script src="../../public/assets/side-menu.js"></script>

</body>
</html>