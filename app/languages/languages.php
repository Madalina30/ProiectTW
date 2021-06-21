<?php
session_start();
require 'english.php';
require 'romanian.php';

$lang = [
    'en' => $english,
    'ro' => $romanian,
];


$language = 'ro';
if(isset($_SESSION['lang'])){
    $language = $_SESSION['lang'];
}