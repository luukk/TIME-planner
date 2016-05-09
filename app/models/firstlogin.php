<?php
require '../config/config.php';
require '../config/database.php';

$userid = explode(",",$_COOKIE['user'])[1];
$username = explode(",",$_COOKIE['user'])[0];

$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$first_login = mysqli_num_rows($mysqli->query('SELECT * FROM user WHERE userid = "'.$userid.'" AND username = "'.$username.'" AND first_login = 0'));
if($first_login == 1){
  $mysqli->query('UPDATE user SET first_login = 1 WHERE userid = "'.$userid.'"');
}
echo $first_login;
?>
