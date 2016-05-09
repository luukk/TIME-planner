<?php
if(isset($_GET['username']) || isset($_GET['password'])){
  if (!empty($_GET['username']) && !empty($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query = "select * from user where username='$username' AND password='$password'";
    $check = $mysqli->query($query);
    $rowcount = mysqli_num_rows($check);
    $userid = $check->fetch_assoc();
    if($rowcount == 1){
      session_start();
      setcookie('user',$username.','.$userid['userid'],time() + (86400 *30), '/');
      header('Location:index.php');
    }else{
      echo 'de gebruikersnaam of wachtwoord komt niet overeen';
    }
  }else{
    echo 'vul beide velden in';
  }
}
?>
