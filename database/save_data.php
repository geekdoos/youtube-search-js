<?php
/**
 * Created by PhpStorm.
 * User: GeeKDooS
 * Date: 3/3/2017
 * Time: 1:11 PM
 */

if (!isset($_POST['allData'])){
    die('Your not alowed to see this page');
}
include('Database.php'); // Include the class
$dataBase = new Database(); // Create new Database object
$video_list = $_POST['allData'];

$video = array(
    $video_list["id"],
    $video_list["snippet"]["title"],
    'https://www.youtube.com/watch?v='.$video_list["id"],
    $video_list["snippet"]["thumbnails"]["default"]["url"],
);

// Basic SQL INSERT statement
$sqlInsert = "INSERT INTO `resultas` (`video_id`, `title`, `link`, `thumbnail`) VALUES('".$video[0]."', '".$video[1]."', '".$video[2]."', '".$video[3]."')";

// This will run the SQL statement above and will throw an exception if the SQL statement is bad.
$dataBase->runQuery($sqlInsert); // This will run the SQL statement above and will throw an exception if the SQL statement is bad.
