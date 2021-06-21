<?php
require '../views/db_conf.php';
require '../languages/languages.php';
if($_SESSION['is_logged'] == 1){
    $userData = $_SESSION['userData'];
    $username = $userData['username'];
}
$forAll = $conn->query('SELECT username, picture, HTML_points, CSS_points FROM users WHERE username = \'' . $username . '\'');
$rowsAll = $forAll->fetch_all(MYSQLI_ASSOC);

$forHTML =$conn->query('SELECT username, picture, HTML_points, CSS_points FROM users WHERE username = \'' . $username . '\'');
$rowsHTML = $forHTML->fetch_all(MYSQLI_ASSOC);

$forCSS = $conn->query('SELECT username, picture, HTML_points, CSS_points FROM users WHERE username = \'' . $username . '\'');
$rowsCSS = $forCSS->fetch_all(MYSQLI_ASSOC);

$totalUsers = $conn->query('SELECT count(username) as total FROM users WHERE username = \''. $username .'\'');
$nrUs = $totalUsers->fetch_all(MYSQLI_ASSOC)[0];
$nrLvl = (int)$nrUs['total'];
$totalLevels = 30*$nrLvl;

$forLevels = $conn->query('SELECT sum(levels) as levels FROM statistics WHERE username = \''. $username .'\'');
$rowsLevels = $forLevels->fetch_all(MYSQLI_ASSOC)[0];
$levelsDone =  $rowsLevels['levels'];
$completed = $levelsDone/$totalLevels*100;
$uncompleted = 100 - $completed;

// get levels for the date - sum levels where date - today/yesterday/last 7 days/last 30 days
$date  = date("y.m.d");
$forToday = $conn->query('SELECT sum(levels) as today FROM statistics WHERE DATE(date) = CURDATE() AND username = \''. $username .'\'');
$today = $forToday->fetch_assoc();

$forYesterday = $conn->query('SELECT sum(levels) as yesterday FROM statistics WHERE DATE(date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND username = \''. $username .'\'');
$yesterday = $forYesterday->fetch_assoc();

$for7 = $conn->query('SELECT sum(levels) as last7 FROM statistics WHERE DATE(date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND username = \''. $username .'\'');
$last7 = $for7->fetch_assoc();

$for30= $conn->query('SELECT sum(levels) as last30 FROM statistics WHERE DATE(date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() AND username = \''. $username .'\'');
$last30 = $for30->fetch_assoc();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang[$language]['menu_btn_mystatistics'] ?></title>
    <link rel="stylesheet" href="../../public/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', { 'packages': ['bar'] });
      google.charts.setOnLoadCallback(drawChart);
  
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['<?php echo $lang[$language]['stats_period'] ?>' , '<?php echo $lang[$language]['stats_levels'] ?>', { role: 'style'}],
          ['<?php echo $lang[$language]['stats_all_time'] ?>', <?php echo $levelsDone; ?>,'#b87333'],
          ['<?php echo $lang[$language]['stats_30_days'] ?>', <?php echo $last30['last30']; ?>, 'pink'],
          ['<?php echo $lang[$language]['stats_7_days'] ?>', <?php echo $last7['last7']; ?>, 'green'],
          ['<?php echo $lang[$language]['stats_yesterday'] ?>', <?php echo $yesterday['yesterday']; ?> ,'blue'],
          ['<?php echo $lang[$language]['stats_today'] ?>', <?php echo $today['today']; ?>, 'blue']
        ]);
  
        var options = {
          chart: {
            title: '<?php echo $lang[$language]['stats_everyone'] ?>'
          }
        };
  
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
  
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  
  
    <script type="text/javascript">
      google.charts.load('current', { 'packages': ['corechart'] });
      google.charts.setOnLoadCallback(drawChart);
  
      function drawChart() {
  
        var data = google.visualization.arrayToDataTable([
          ['<?php echo $lang[$language]['stats_levels_completed'] ?>', '<?php echo $lang[$language]['stats_number_of_levels'] ?>', {role: 'style'}],
          ['<?php echo $lang[$language]['stats_completed'] ?>', <?php echo $completed; ?>, 'purple'],
          ['<?php echo $lang[$language]['stats_incompleted'] ?>', <?php echo $uncompleted; ?>, 'green']
        ]);
  
        var options = {
          title:' <?php echo $lang[$language]['stats_progres'] ?>'
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  
        chart.draw(data, options);
      }
    </script>

</head>
<body style="background-color:rgb(175, 201, 251);">    
    <nav>
        <div class="nav__left">
            <!-- put btn on img -->
            <a href="index.php">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="allgames.php" class="btn-fill btn-games">
                 <?php echo $lang[$language]['menu_btn_games'] ?> 
            </a>
            <a href="statistics.php" class="btn-fill btn-games">
                <?php echo $lang[$language]['menu_btn_statistics'] ?>
            </a>
            <a href="personalstatistics.php" class="btn-fill btn-games"
                style="background-color: rgba(96, 199, 240, 0.644);">
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

    <main class="statistics-page pages">
        <?php echo "
        <div id='container' style='white-space:nowrap;'>
            <div id='image' style='display:inline-block;position: relative; top: 15px;'>
                <img src=".$userData['picture']." alt='U' width=50px style='border-radius:40px;margin-right: 2px;'>
            </div>
            
            <div id='texts' style='display:inline-block; white-space:nowrap;'> 
               <h1>".$username.$lang[$language]['my_stats_title']."</h1>
            </div>
        </div>
        "
        ?>
        <div class ="rows-for-leaderboards">
            <table class="table__all">
                <tr>
                    <th><?php echo $lang[$language]['my_stats_all_points'] ?></th>
                </tr>
                <?php
                    echo "<tr>
                                <td>".($rowsAll[0]['HTML_points'] + $rowsAll[0]['CSS_points'])."</td>
                    </tr>";
                ?>
                
            </table>
            <table class="table__html">

                <tr>
                    <th><?php echo $lang[$language]['my_stats_html_points'] ?></th>
                </tr>
                <?php
                    echo "<tr>
                        <td>".$rowsHTML[0]['HTML_points']."</td>
                    </tr>"?>
                
            </table>
            <table class="table__css">
                <tr>
                    <th><?php echo $lang[$language]['my_stats_css_points'] ?></th>
                </tr>
               <?php echo "<tr>
                                <td>".$rowsCSS[0]['CSS_points']."</td>
                            </tr>";
                ?>
            </table>
        </div>
    </main>
    
    <div class="graph-daily">
        <selection class="child">
            <div id="columnchart_material" style="width:500px; height: 400px;"></div>
        
        </selection>
        <selection class="child">
            <div id="piechart" style="width:500px; height: 400px;"></div>
        
        </selection>
    </div>
    <script src="../../public/assets/side-menu.js"></script>

</body>
</html>