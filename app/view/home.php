  <script src="app/js/monthCarousel.js"></script>
</head>
<body>
    <div id="loading"><img src='app/img/progress-bar.gif'/></div>
  <?php
  include 'app/view/navigation_bar.php';
  ?>
  <div class="container-fluid">
    <?php include 'app/view/sidebar.php'; ?>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-9" id="dashboard">Dashboard</div>
          <div class="col-md-3">
          </div>
          <div class="col-md-4 col-sm-4">
          <div id="carousel">
              <span>January</span>
              <span>February</span>
              <span>March</span>
              <span>April</span>
              <span>May</span>
              <span>June</span>
              <span>July</span>
              <span>August</span>
              <span>September</span>
              <span>Oktober</span>
              <span>November</span>
              <span>December</span>
          </div>
          <div class="col-md-6">
            <h3>Verdient</h3>
            <div class="earnings"></div>
          </div>
          <div class="col-md-6">
            <h3>uren gewerkt</h3>
            <div class="hours"></div>
          </div>
        </div>
          <div class="col-md-4">
            <div class="col-md-12"></div>
            <div class="col-md-12"></div>
          </div>
          <div class="col-md-4">
            <div class="col-md-12"></div>
            <div class="col-md-12"></div>
          </div>
          <div class="col-md-4">
            <div class="col-md-12"></div>
            <div class="col-md-12"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
