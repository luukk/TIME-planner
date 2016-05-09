<?php $page = isset($_GET['action']) ? $_GET['action'] : 'home'; ?>
<div class="row">
  <div class="col-md-2 sidebar">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
        </div>
        <div id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <span class="glyphicon-text"><?php echo ' '.explode(",",$_COOKIE['user'])[0] ?></span>
              </a>
            </li>
            <li>
              <a href="?action=home" <?php if ($page != 'settings' AND $page != 'manager'){echo 'class="selected"';} ?>>
                <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                <span class="glyphicon-text">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="?action=manager" <?php if ($page == 'manager'){echo 'class="selected"';} ?>>
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <span class="glyphicon-text">uren manager</span>
              </a>
            </li>
            <li>
              <a href="?action=settings" <?php if ($page == 'settings'){echo 'class="selected"';} ?>>
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <span class="glyphicon-text">settings</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
