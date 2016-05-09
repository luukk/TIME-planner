<?php
require 'app/config/config.php';
require 'app/config/database.php';
require 'app/view/head.php';
if(!isset($_COOKIE['user'])){
  $action = isset($_GET['action']) ? $_GET['action'] : 'login';
  if($action != 'register'){
    $action = 'login';
  }
}else{
  $action = isset($_GET['action']) ? $_GET['action'] : 'home';
}
switch ($action) {
  case 'home':
  default:
    require 'app/view/home.php';
    break;
  case 'register':
    include 'app/view/register.php';
    include 'app/models/setregister.php';
    break;
  case 'login':
    include 'app/models/setlogin.php';
    include 'app/view/login.php';
    break;
  case 'manager':
    include 'app/view/manager.php';
    break;
}



 ?>
