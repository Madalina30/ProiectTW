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
          ['Period', 'Minutes', { role: 'style'}],
          ['all time', 2,'#b87333'],
          ['last week', 4, 'pink'],
          ['this week', 10, 'green'],
          ['yesterday', 4 ,'blue'],
          ['today', 5, 'blue']
        ]);
  
        var options = {
          chart: {
            title: 'Time spent learning'
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
          ['Completed', 30, 'purple'],
          ['Incompleted', 70, 'green']
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
                <tr>
                    <td>1</td>
                    <td>user1</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>user2</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>user3</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>user4</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>user5</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>user6</td>
                    <td>80</td>
                </tr>
            </table>
            <table class="table__html">
                <caption>  <h3> HTML </h3> </caption>

                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>points</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>user1</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>user2</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>user3</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>user4</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>user5</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>user6</td>
                    <td>80</td>
                </tr>
            </table>
            <table class="table__css">
                <caption>  <h3> CSS </h3> </caption>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>points</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>user1</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>user2</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>user3</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>user4</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>user5</td>
                    <td>80</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>user6</td>
                    <td>80</td>
                </tr>
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