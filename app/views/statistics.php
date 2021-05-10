<?php
require '../views/db_conf.php';
$forAll = $conn->query('SELECT username, picture, HTML_points, CSS_points FROM users ORDER BY (HTML_points + CSS_points) DESC LIMIT 10;');
$rowsAll = $forAll->fetch_all(MYSQLI_ASSOC);

$forHTML = $conn->query('SELECT username, picture, HTML_points FROM users ORDER BY HTML_points DESC LIMIT 10;');
$rowsHTML = $forHTML->fetch_all(MYSQLI_ASSOC);

$forCSS = $conn->query('SELECT username, picture, CSS_points FROM users ORDER BY CSS_points DESC LIMIT 10;');
$rowsCSS = $forCSS->fetch_all(MYSQLI_ASSOC);

$totalUsers = $conn->query('SELECT count(username) as total FROM users;');
$nrUs = $totalUsers->fetch_all(MYSQLI_ASSOC)[0];
$nrLvl = (int)$nrUs['total'];
$totalLevels = 30*$nrLvl;

$forLevels = $conn->query('SELECT sum(levels) as levels FROM statistics;');
$rowsLevels = $forLevels->fetch_all(MYSQLI_ASSOC)[0];
$levelsDone =  $rowsLevels['levels'];
$completed = $levelsDone/$totalLevels*100;
$uncompleted = 100 - $completed;

// get levels for the date - sum levels where date - today/yesterday/last 7 days/last 30 days
$date  = date("y.m.d");
$forToday = $conn->query('SELECT sum(levels) as today FROM statistics WHERE DATE(date) = CURDATE();');
$today = $forToday->fetch_assoc();

$forYesterday = $conn->query('SELECT sum(levels) as yesterday FROM statistics WHERE DATE(date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY);');
$yesterday = $forYesterday->fetch_assoc();

$for7 = $conn->query('SELECT sum(levels) as last7 FROM statistics WHERE DATE(date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE();');
$last7 = $for7->fetch_assoc();

$for30= $conn->query('SELECT sum(levels) as last30 FROM statistics WHERE DATE(date) BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE();');
$last30 = $for30->fetch_assoc();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link rel="stylesheet" href="../../public/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', { 'packages': ['bar'] });
      google.charts.setOnLoadCallback(drawChart);
  
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Period', 'Levels', { role: 'style'}],
          ['All time', <?php echo $levelsDone; ?>,'#b87333'],
          ['Last 30 days', <?php echo $last30['last30']; ?>, 'pink'],
          ['Last 7 days', <?php echo $last7['last7']; ?>, 'green'],
          ['Yesterday', <?php echo $yesterday['yesterday']; ?> ,'blue'],
          ['Today', <?php echo $today['today']; ?>, 'blue']
        ]);
  
        var options = {
          chart: {
            title: 'Everyone\'s progress'
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
          ['Levels completed', 'Number of levels', {role: 'style'}],
          ['Completed', <?php echo $completed; ?>, 'purple'],
          ['Incompleted', <?php echo $uncompleted; ?>, 'green']
        ]);
  
        var options = {
          title: 'Progress'
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  
        chart.draw(data, options);
      }
    </script>

</head>
<body class="body__stats">    
    <nav>
        <div class="nav__left">
            <!-- put btn on img -->
            <a href="index.php">
                <img class="logo" src="../../public/images/logo.svg" alt="LeHS">
            </a>
            <a href="allgames.php" class="btn-fill btn-games">
                    Games 
            </a>
            <a href="#" class="btn-fill btn-statistics" 
            style="background-color: rgba(96, 199, 240, 0.644);">
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

    <main class="statistics-page pages">
        <h1> Statistics </h1>
        <div class="rows-for-leaderboards">
            <table class="table__all">
                <caption> <h3> ALL </h3> </caption>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>points</th>
                </tr>
                <?php
                for ($i = 0; $i < count($rowsAll); $i++) {
                    if ($rowsAll[$i]['picture'])
                        echo "<tr>
                                <td>".($i+1)."</td>
                                <td><div style='display: flex; flex-direction:row; justify-content:center;'><img src=" . $rowsAll[$i]['picture'] ." alt='U' width=20px style='border-radius:10px; margin-right: 2px;'>".$rowsAll[$i]['username']."</div></td>
                                <td>".($rowsAll[$i]['HTML_points'] + $rowsAll[$i]['CSS_points'])."</td>
                            </tr>";
                    else echo "<tr>
                                <td>".($i+1)."</td>
                                <td>".$rowsAll[$i]['username']."</td>
                                <td>".($rowsAll[$i]['HTML_points'] + $rowsAll[$i]['CSS_points'])."</td>
                            </tr>";
                }
                ?>
                
            </table>
            <table class="table__html">
                <caption>  <h3> HTML </h3> </caption>

                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>points</th>
                </tr>
                <?php
                for ($i = 0; $i < count($rowsHTML); $i++) {
                    if ($rowsHTML[$i]['picture'])
                        echo "<tr>
                                <td>".($i+1)."</td>
                                <td><div style='display: flex; flex-direction:row; justify-content:center;'><img src=" . $rowsHTML[$i]['picture'] ." alt='U' width=20px style='border-radius:10px; margin-right: 2px;'>".$rowsHTML[$i]['username']."</div></td>
                                <td>".$rowsHTML[$i]['HTML_points']."</td>
                            </tr>";
                    else echo "<tr>
                                <td>".($i+1)."</td>
                                <td>".$rowsHTML[$i]['username']."</td>
                                <td>".$rowsHTML[$i]['HTML_points']."</td>
                            </tr>";
                }
                ?>
                
            </table>
            <table class="table__css">
                <caption>  <h3> CSS </h3> </caption>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>points</th>
                </tr>
               <?php
                for ($i = 0; $i < count($rowsCSS); $i++) {
                    if ($rowsCSS[$i]['picture'])
                        echo "<tr>
                                <td>".($i+1)."</td>
                                <td><div style='display: flex; flex-direction:row; justify-content:center;'><img src=" . $rowsCSS[$i]['picture'] ." alt='U' width=20px style='border-radius:10px; margin-right: 2px;'>".$rowsCSS[$i]['username']."</div></td>
                                <td>".$rowsCSS[$i]['CSS_points']."</td>
                            </tr>";
                    else echo "<tr>
                                <td>".($i+1)."</td>
                                <td>".$rowsCSS[$i]['username']."</td>
                                <td>".$rowsCSS[$i]['CSS_points']."</td>
                            </tr>";
                }
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