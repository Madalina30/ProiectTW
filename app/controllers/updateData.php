<?php
// DE REFACUT CAND O SA FIE PUSE PE GIT SI FISIERELE SCHIMBATE
require '../views/db_conf.php';
session_start();
if(isset($_GET['key']) && $_SESSION['secret_code'] == htmlspecialchars($_GET['key'])){
    if($_SESSION['is_logged'] == 1){
        $category = htmlspecialchars($_GET['category']);
        // where category in db, +1 la levele done
        //aici se updateaza datele
    
        $points = htmlspecialchars($_GET['ppl']);
        $level =  htmlspecialchars($_GET['lvl']);
        $userData = $_SESSION['userData'];
        $username = $userData['username'];
        $userDbData = $conn->query('SELECT * FROM users WHERE username = \'' . $username . '\'');
        $rows = $userDbData->fetch_all(MYSQLI_ASSOC)[0];
        echo $rows['iCSS_lvl'];
        if (strpos($category, "h") !== false) {
            $isGood = false;
            if (strpos($category, "hb") !== false) {
                if((int)$rows['bHTML_lvl'] < (int)$level){
                    $sql = 'UPDATE users SET bHTML_lvl = bHTML_lvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            } else if (strpos($category, "hi") !== false) {
                if((int)$rows['iHTML_lvl'] < (int)$level){
                    $sql = 'UPDATE users SET iHTML_lvl = iHTML_lvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            } else if (strpos($category, "he") !== false) {
                if((int)$rows['eHTMLlvl'] < (int)$level){
                    $sql = 'UPDATE users SET eHTMLlvl = eHTMLlvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            }
            if($isGood){
                $sql = 'UPDATE users SET HTML_points = HTML_points + '.$points.' WHERE username=\'' . $username . '\'';
                $con = $conn->query($sql) or die($conn->error);
                $date  = date("y.m.d");
                $userDbData = $conn->query('SELECT * FROM statistics WHERE username = \'' . $username . '\' and date=\'' . $date . '\' ');
                $rows = $userDbData->fetch_all(MYSQLI_ASSOC);
                echo var_dump($rows). '- - '.isset($rows[0]);
                if(isset($rows[0])){
                    echo var_dump($rows);
                    $sql = 'UPDATE statistics SET levels = levels + 1, points=points + '.$points.'  WHERE username = \'' . $username . '\' and date=\''.$date.'\' ';
                    $con = $conn->query($sql) or die($conn->error);
                }else{
                    echo 'ceva';
                    $sql = 'INSERT INTO statistics (username, date, levels, points) VALUES (\''.$username.'\', \''.$date.'\', 1, '.$points.')';
                    $con = $conn->query($sql) or die($conn->error);
                }
            }
        } else if (strpos($category, "c") !== false) {
            $isGood = false;
            if (strpos($category, "cb") !== false) {
                if((int)$rows['bCSS_lvl'] < (int)$level){
                    $sql = 'UPDATE users SET bCSS_lvl = bCSS_lvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            } else if (strpos($category, "ci") !== false) {
                if((int)$rows['iCSS_lvl'] < (int)$level){
                    $sql = 'UPDATE users SET iCSS_lvl = iCSS_lvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            } else if (strpos($category, "ce") !== false) {
                if((int)$rows['eCSS_lvl'] < (int)$level){
                    $sql = 'UPDATE users SET eCSS_lvl = eCSS_lvl + 1 WHERE username=\'' . $username . '\'';
                    $con = $conn->query($sql) or die($conn->error);
                    $isGood = true;
                }
            }
            if($isGood){
                $sql = 'UPDATE users SET CSS_points = CSS_points + '.$points.' WHERE username=\'' . $username . '\'';
                $con = $conn->query($sql) or die($conn->error);
                $date  = date("y.m.d");
                $userDbData = $conn->query('SELECT * FROM statistics WHERE username = \'' . $username . '\' and date=\'' . $date . '\' ');
                $rows = $userDbData->fetch_all(MYSQLI_ASSOC);
                echo var_dump($rows). '- - '.isset($rows[0]);
                if(isset($rows[0])){
                    echo var_dump($rows);
                    $sql = 'UPDATE statistics SET levels = levels + 1, points=points + '.$points.'  WHERE username = \'' . $username . '\' and date=\''.$date.'\' ';
                    $con = $conn->query($sql) or die($conn->error);
                }else{
                    echo 'ceva';
                    $sql = 'INSERT INTO statistics (username, date, levels, points) VALUES (\''.$username.'\', \''.$date.'\', 1, '.$points.')';
                    $con = $conn->query($sql) or die($conn->error);
                }
            }
        }
    // TODO: o sa se foloseasca si la allgames: levels done: x not completed/completed !!!!!!!
    }
}
?>