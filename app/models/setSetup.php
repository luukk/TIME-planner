<?php
require '../config/config.php';
require '../config/database.php';

$salary = $_GET['salary'];
$userid = explode(",",$_COOKIE['user'])[1];
$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$check = $mysqli->query('UPDATE user SET salary = "'.$salary.'" WHERE userid = '.$userid);
if($check >=1){
  echo 'succes';
}else{
  echo 'error';
}
?>
