<?php

if($_POST){

  require 'connection.php';
  $conn = connect_db();
  
  if(isset($_POST['id']) ){
	$id = $_POST['id'];
	$type = $_POST['type'];
	
	$sql = "Select * From news WHERE id = $id";
	$sql = $conn->query($sql);
	$row = $sql->fetch_assoc();
	
	$isActive = $row['isActive'] ? 0 : 1;
	
	if($type == 'state')
	{
		
		$sql = "UPDATE news SET isActive='$isActive' WHERE id='$id'";
		$sql = $conn->query($sql);
	}
  }
}
?>