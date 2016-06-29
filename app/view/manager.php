<script src="app/js/workedData.js"></script>
</head>
<body>

  <?php include 'app/view/navigation_bar.php'; ?>
  <div class="container-fluid">
    <?php include 'app/view/sidebar.php'; ?>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-12" id="dashboard">uren manager</div>
        </div>
        <div class="row">
          <div class="col-xs-12">
          <div id="calander" data-columns="3">
          <?php
            include ('calendar.php');
          ?>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="col-md-10 col-xs-10" id="setHoursVenster">
        <div class="row" id="topHourVenster">
          <div class="col-md-10 col-xs-10">
            <div id="hourVensterDate"></div>
          </div>
          <div class="col-md-2 col-xs-2">
            <div id="closeVenster">x</div>
          </div>
        </div>
      <form method="get" action='index.php?action=manager' id="sethoursform" >
      <input type="hidden" name="action" value="manager" />
      <input type="text" name="sethours" id="sethours" placeholder="gewerkte uren" />
      <input type="submit" id="submitworkedhours" />
      </form>
    </div>
  </div>
<script type="text/javascript">
var httpRequest = new HttpRequest();
function getCalendar(month){
  httpRequest.load("app/view/calendar.php?month="+month,'#calander',function(data){
    document.getElementById('calander').innerHTML = data;
  });
}
</script>
</body>
</html>
