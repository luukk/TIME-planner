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
            <div class="row">
              <div class="col-md-6">
                total moneyz
                <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
              </div>
              <div class="col-md-6">
                this month moneyz
                <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div id="carousel">
            <p>januari</p>
            <p>februari</p>
            <p>maart</p>
            <p>april</p>
            <p>mei</p>
            <p>juni</p>
            <p>juli</p>
            <p>augustus</p>

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
