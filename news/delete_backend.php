<?php

if($_GET){

  require 'connection.php';
  $conn = connect_db();
  
  if(isset($_GET['id']) ){
	$id = $_GET['id'];
	$sql = "DELETE FROM news WHERE id='$id'";
	$sql = $conn->query($sql);
  }
  
  header('location: /news/list.php');
  exit();
}
?>