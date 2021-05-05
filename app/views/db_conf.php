<?php
// error_reporting(0);
// ini_set('display_errors', 0);
$dbHost     = "localhost";
$dbUsername = "id16594300_htmlcss";
$dbPassword = "Htmlcsslehs2021!";
$dbName     = "id16594300_lehs";


$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if($conn->connect_error){
    die("Failed to connect with MySQL: " . $conn->connect_error);
}
?>