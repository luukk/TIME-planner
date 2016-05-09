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
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
