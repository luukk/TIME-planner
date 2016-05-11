    <div class="row">
      <div id="loading"><img src='app/img/progress-bar.gif'/></div>
      <div class="col-md-12">
        <?php
        for ($d=0; $d < 7 ; $d++) {
          $day =  strftime('%a ', mktime(0, 0, 0, 6, $d+2, 2013));

          echo '<li>'.$day.'</li>';
        }
        ?>
      </div>
    </div>

  <?php
  if(isset($_GET['month'])){
    include '..\config\config.php';
    include '..\config\database.php';
  }
  if (!function_exists('cal_days_in_month'))
  {
    function cal_days_in_month($calendar, $month, $year)
    {
        return date('t', mktime(0, 0, 0, $month, 1, $year));
    }
  }
  if (!defined('CAL_GREGORIAN'))
      define('CAL_GREGORIAN', 1); 
  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  $userid = explode(",",$_COOKIE['user'])[1];
  $year = '';
  $month = isset($_GET['month']) ? $_GET['month'] : date('m');
  $dateYear = ($year != '')?$year:date("Y");
  $dateMonth = ($month != '')?$month:date("m");
  $date = $dateYear.'-'.$dateMonth.'-01';
  $currentMonthFirstDay = date("N",strtotime($date));
  $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
  $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)? ($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
  $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;

 $dayCount = 1;
 for($cb=1;$cb<=$boxDisplay;$cb++){
     if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
         $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
         $eventNum = 0;
         $query = "
         SELECT user.userid, events.userid, user.username, events.hours_worked
         FROM user
         INNER JOIN events
         ON user.userid=events.userid
         WHERE events.userid LIKE '".$userid."' AND events.date = '".$currentDate."'";
         $result = $mysqli->query($query);
         $eventNum = $result->num_rows;
         $worked = $result->fetch_assoc();
         if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
             echo '<li date="'.$currentDate.'" class="day_worked date_cell">';
         }elseif($eventNum > 0){
             echo '<li date="'.$currentDate.'" class="grey date_cell">';
         }else{
             echo '<li date="'.$currentDate.'" class="date_cell">';
         }
         echo '<span>';
         echo $dayCount;
         echo '</span>';
         echo '<div class="popup_event">'.$worked['hours_worked'].'</div>';
         echo '</li>';
         $dayCount++;
  ?>
  <?php }else{ ?>
 <li class="last-month"><span>&nbsp;</span></li>
  <?php } } ?>
<div id="selectCalander">
<form method="post" action="index.php?action=manager" id="selectCalanderForm">
  <select name="month" onchange="getCalendar(this.value)">
    <?php
    for($m = 1;$m <= 12; $m++){
        $datemonth =  date("F", mktime(0, 0, 0, $m));
        echo "<option value='$m' ";
        if($month == $m){echo 'selected';}
        echo ">$datemonth</option>";
    }
    echo "</select>";
    ?>
  </select>
</form>
</div>
