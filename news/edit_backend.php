<?php

if($_POST){

  require 'connection.php';
  $conn = connect_db();
 
  if(isset($_POST['edit']) ){
    $title = $_POST['title'];
    $url = $_POST['url'];    
	$publishedAt = $_POST['publishedAt'];
    $image = $_POST['image'];
	$introText = $_POST['introText'];
    $mainText = $_POST['mainText'];
	$isActive = $_POST['isActive'];

    $sql = "INSERT INTO news(title, url, image, publishedAt, introText, mainText, isActive) VALUES ('$title', '$url', '$image', '$publishedAt', '$introText', '$mainText', '$isActive')";
	
    $sql = $conn->query($sql);
	
    if($sql){
      header('location: /news/edit.php');
      exit();
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