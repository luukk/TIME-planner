<?php
require '../config/config.php';
require '../config/database.php';

$month = $_GET['date'];
$monthInInt = date("m", strtotime($month));
$userid = explode(",",$_COOKIE['user'])[1];
$hours_worked = 0;
$salary = 0;
$month_data = array();
$query = "SELECT user.userid, events.userid,events.date,events.hours_worked, user.salary
          FROM user
          INNER JOiN events
          ON  user.userid=events.userid
          WHERE events.userid LIKE '".$userid."' AND MONTH(events.date) = '".$monthInInt."'";
$result = $mysqli->query($query);

while($a = $result->fetch_assoc()){
  $hours_worked = $hours_worked + $a['hours_worked'];
  $salary = $a['salary'];
}
$earned = $salary * $hours_worked;
$month_data['hours_worked'] = $hours_worked;
$month_data['earned'] = $earned;
echo json_encode($month_data);
 ?>
