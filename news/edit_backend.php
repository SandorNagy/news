<?php

if($_POST){

  require 'connection.php';
  $conn = connect_db();
 
  if(isset($_POST['edit']) ){
	$id = $_POST['id'];
    $title = $_POST['title'];
    $url = $_POST['url'];    
	$publishedAt = $_POST['publishedAt'];
	$introText = $_POST['introText'];
    $mainText = $_POST['mainText'];
	$isActive = $_POST['isActive'];
	
	// image
	$name = $_FILES['file']['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
	$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
 
	if($id > 0) {	
		if($name) {
			$sql = "UPDATE news SET title='$title', url='$url', publishedAt='$publishedAt', image='".$image."', introText='$introText', mainText='$mainText', isActive='$isActive' WHERE id='$id'";
		} else {
			$sql = "UPDATE news SET title='$title', url='$url', publishedAt='$publishedAt', introText='$introText', mainText='$mainText', isActive='$isActive' WHERE id='$id'";
		}
	}
	else
	{
	    $sql = "INSERT INTO news(title, url, image, publishedAt, introText, mainText, isActive) VALUES ('$title', '$url', '".$image."', '$publishedAt', '$introText', '$mainText', '$isActive')";	
	}
	
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