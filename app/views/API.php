<?php 
header('Content-Type: text/plain');
error_reporting(0);
ini_set('display_errors', 0);
$level = isset($_GET['lvl'])?$_GET['lvl']:0;

$category = "";
try{
    $category = $_GET['cat'];
}catch(Exception $e){
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
if($gameData['lvlAnswers'] == null){
    echo json_encode(array("status"=>'ok', "message"=>'no data to show'));
}else{
    $levelDescription = $gameData["lvlDescription"];
    $levelAnswers = $gameData["lvlAnswers"];
    $levelTemplate = $gameData["lvlTemplate"];
    echo json_encode(array("status"=>'ok', "description"=>$levelDescription, "answers"=>$levelAnswers, "template"=>$levelTemplate));
}
?>