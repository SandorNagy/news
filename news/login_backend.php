<?php

if($_POST){

  require 'connection.php';
  $conn = connect_db();
 
  if(isset($_POST['login']) ){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "Select * From user Where username = '$username'";
    $sql = $conn->query($sql);
	
    if($sql){
      $sql = $sql->fetch_assoc();
      if(password_verify($password, $sql['password'])){
        session_start();
        $_SESSION['username'] = $username;
        echo 'You have successfully logged-in';
        header('location: /news/index.php');
      }
    }else{  
      header('location: /news/index.php');
      exit();
    }
  }
}else{
  header('location: /news/index.php');
  exit();
}

?>