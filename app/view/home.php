<script src="app/js/monthCarousel.js"></script>
</head>
<body>
  <?php
  include 'app/util/operators.php';
  include 'app/view/navigation_bar.php';

  $total_hours = stripstring($overviewData['total_hours']);
  $salary = stripstring($_COOKIE['salary']);
  $total = stripstring($overviewData['total_earnings']);
  ?>
  <div class="container-fluid">
    <?php include 'app/view/sidebar.php'; ?>
<div class="col-md-9" id="dashboard">Dashboard</div>
          <div class="col-xs-12 col-sm-12 col-md-6 monthOverviewSection">
          <div class="col-xs-12 col-md-12">
            <h3>maandoverzicht</h3>
          </div>
          <div id="carousel"></div>
            <div class="col-sm-6 col-xs-6">
              <h3>Verdient</h3>
              <div class="earnings"></div>
            </div>
            <div class="col-sm-6 col-xs-6">
              <h3>uren gewerkt</h3>
              <div class="hours"></div>
            </div>
        </div>
          <div class="col-xs-12 col-sm-6 col-md-4 yearOverviewSection">
            <div class="col-md-12">
              <h3>overzicht van dit jaar</h3>
            </div>
            <div class="col-md-12">
              <div class="characteristic">
                <ul>
              <?php
               echo '<li>'.$total_hours[0].'</li>';
                echo '<li>'.$salary[0].'</li>';
                echo '<li>'.$total[0].'</li>';
               ?>
              </div>
              <div class="mantissa">
              <?php
                echo '<li>,'.$total_hours[1].'</li>';
                echo '<li>,'.$salary[1].'</li>';
                echo '<li>,'.$total[1].'</li>';
               ?>
              </div>
              <div class="exple">
                <li> uur gewerkt</li>
                <li> uurloon</li>
                <li> totaal</li>
              </div>
            </ul>
              </div>
            </div>
      </div>
  </div>
  </body>
</html>
