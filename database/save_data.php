<?php
/**
 * Created by PhpStorm.
 * User: GeeKDooS
 * Date: 3/3/2017
 * Time: 1:11 PM
 */

if (!isset($_POST['video_id'])){
    die('Your not alowed to see this page');
}
include('Database.php'); // Include the class
$dataBase = new Database(); // Create new Database object
$video_id = $_POST['video_id'];
$title = $_POST['title'];
$channel = $_POST['channel'];

$sqlInsert = "INSERT INTO `resultas` (`video_id`, `title`, `chaine`) VALUES('".$video_id."', '".$title."', '".$channel."')"; // Basic SQL INSERT statment
$dataBase->runQuery($sqlInsert); // This will run the SQL statement above and will throw an exception if the SQL statement is bad.


$sqlSelect = "SELECT * FROM resultas ORDERBY id 'DESC'"; // Basic SQL SELECT Statment
$data = $dataBase->getQuery($sqlSelect); // This will run the SQL statment and return and associative array.

foreach($data as $d)
{
    echo $d["video_id"]." ".$d["title"]." ".$d["chaine"]." <br />"; // This will output each video
}