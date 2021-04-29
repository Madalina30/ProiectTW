<?php
// DE REFACUT CAND O SA FIE PUSE PE GIT SI FISIERELE SCHIMBATE
session_start();
if($_SESSION['is_logged'] == "1"){
    $category = htmlspecialchars($_GET['category']);
    // where category in db, +1 la levele done
    //aici se updateaza datele
    $points = htmlspecialchars($_GET['ppl']);
    $username = $_SESSION['username'];
    if (str_contains($category, "h")) {
        $sql = 'UPDATE users SET HTML_points = HTML_points + '.$points.' WHERE username=\'' . $username . '\'';

        if (str_contains($category, "hb")) {
            $sql = 'UPDATE users SET bHTML_lvl = bHTML_lvl + 1 WHERE username=\'' . $username . '\'';
        } else if (str_contains($category, "hi")) {
            $sql = 'UPDATE users SET iHTML_lvl = iHTML_lvl + 1 WHERE username=\'' . $username . '\'';
        } else if (str_contains($category, "he")) {
            $sql = 'UPDATE users SET eHTML_lvl = eHTML_lvl + 1 WHERE username=\'' . $username . '\'';
        }
    } else if (str_contains($category, "c")) {
        $sql = 'UPDATE users SET CSS_points = CSS_points + '.$points.' WHERE username=\'' . $username . '\'';

        if (str_contains($category, "cb")) {
            $sql = 'UPDATE users SET bCSS_lvl = bCSS_lvl + 1 WHERE username=\'' . $username . '\'';
        } else if (str_contains($category, "ci")) {
            $sql = 'UPDATE users SET iCSS_lvl = iCSS_lvl + 1 WHERE username=\'' . $username . '\'';
        } else if (str_contains($category, "ce")) {
            $sql = 'UPDATE users SET eCSS_lvl = eCSS_lvl + 1 WHERE username=\'' . $username . '\'';
        }
    }
   // TODO: o sa se foloseasca si la allgames: levels done: x not completed/completed !!!!!!!
}
?>