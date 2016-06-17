<?php
require '../config/config.php';
require '../config/database.php';

$userid = $_COOKIE['userid'];
$username = $_COOKIE['user'];

$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$first_login = mysqli_num_rows($mysqli->query('SELECT * FROM user WHERE userid = "'.$userid.'" AND username = "'.$username.'" AND (first_login = 0 OR salary = 0)'));
if($first_login == 1){
  $test = $mysqli->query('UPDATE user SET first_login = 1 WHERE userid = "'.$userid.'"');
}
echo $first_login;
?>
