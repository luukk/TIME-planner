<?php
$userid = $_COOKIE['userid'];
$query = "SELECT hours_worked FROM events WHERE userid = '".$userid."'";
$data = $mysqli->query($query);
$total_hours = 0;
$overviewData = array();
while($a = $data->fetch_assoc()){
  $total_hours += $a['hours_worked'];
}
$overviewData['total_hours'] = $total_hours;
$overviewData['salary'] = $_COOKIE['salary'];
$overviewData['total_earnings'] = $_COOKIE['salary'] * $total_hours;





























 ?>
