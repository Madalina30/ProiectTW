<?php
session_start();

if(isset($_SESSION['lang'])){
    if($_SESSION['lang']=='ro'){
        $_SESSION['lang'] = 'en';
    }else{
        $_SESSION['lang'] = 'ro';
    }
}else{
    $_SESSION['lang'] = 'en';
}

header('Location: /app/views/profile.php');