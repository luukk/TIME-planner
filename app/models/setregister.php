<?php
if(isset($_GET['username']) || isset($_GET['password'])){
  if (!empty($_GET['username']) && !empty($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query = "select * from user where username='$username' AND password='$password'";
    $check = $mysqli->query($query);
    $rowcount = mysqli_num_rows($check);
    if($rowcount == 0){
      session_start();
       $result = $mysqli->query('INSERT INTO user (username,password) VALUES ("'.$username.'","'.$password.'")');
       setcookie('user',$username.','.$id,time() + (86400 *30), '/');
       header('Location: index.php');
    }else{
      echo 'deze ding is al in gebruik';
    }
  }else{
    echo 'vul beide velden in';
  }
}
 ?>
