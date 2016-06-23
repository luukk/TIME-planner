<?php
require '../config/config.php';
require '../config/database.php';
  $date = $_GET['date'];
  $hours = str_replace(',','.',$_GET['worked']);

  $userid = $_COOKIE['userid'];
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $ifexist = $mysqli->query("SELECT * FROM events WHERE userid = $userid AND date = '$date'");
  $check = mysqli_num_rows($ifexist);
  if($check != 0){
    $query = "UPDATE events SET hours_worked = $hours WHERE userid = $userid AND date = '$date' ";
    $result = $mysqli->query($query);
    echo ' '.$hours;

  }else{
    $query = 'INSERT INTO events (hours_worked,date,created,userid) VALUES ("'.$hours.'","'.$date.'","'.date('Y-m-d H:i').'","'.$userid.'")';
    $result = $mysqli->query($query);
    echo ' '.$hours;
  }
?>
