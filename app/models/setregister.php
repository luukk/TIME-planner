<?php
if(isset($_GET['username']) || isset($_GET['password'])){
  if (!empty($_GET['username']) && !empty($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query = "select * from user where username='$username'";
    $check = $mysqli->query($query);
    $rowcount = mysqli_num_rows($check);

    if($rowcount == 0){
      session_start();
       $result = $mysqli->query('INSERT INTO user (username,password) VALUES ("'.$username.'","'.$password.'")');
       $uservar = $mysqli->query("select * from user where username='$username' AND password='$password'");

       $userid = $uservar->fetch_assoc();
       require_once 'cookie.php';
      header('Location: index.php');
    }else{
      echo 'this username already exists';
    }
  }else{
    echo 'fill both fields';
  }
}
 ?>
