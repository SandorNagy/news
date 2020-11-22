<?php
if($_POST) {
  require 'connection.php';
  $conn = connect_db();
  
	if(isset($_POST['type'])) {
		$id = $_POST['id'];
		$type = $_POST['type'];

		$sql = "SELECT * FROM news WHERE id = $id";
		$sql = $conn->query($sql);
		$row = $sql->fetch_assoc();
		
		if($type == 'state') {
			$isActive = $row['isActive'] ? 0 : 1;

			$sql = "UPDATE news SET isActive = $isActive WHERE id = $id";
			$sql = $conn->query($sql);
		}

		if($type == 'order') {
			$direction = $_POST['direction'];	
			$num = $row['num'];

			if($direction == 'up') {
				$sql = "SELECT MAX(num) AS 'max' FROM news WHERE num < $num";
				$sql = $conn->query($sql);

				if($sql) {
					$row = $sql->fetch_assoc();
					$max = $row['max'];

					$sql = "UPDATE news SET num = $num WHERE num = $max";
					$sql = $conn->query($sql);

					$sql = "UPDATE news SET num = $max WHERE id = $id";
					$sql = $conn->query($sql);
				}
			} else {
				$sql = "SELECT MIN(num) AS 'min' FROM news WHERE num > $num";
				$sql = $conn->query($sql);

				if($sql) {
					$row = $sql->fetch_assoc();
					$min = $row['min'];

					$sql = "UPDATE news SET num = $num WHERE num = $min";
					$sql = $conn->query($sql);
		
					$sql = "UPDATE news SET num = $min WHERE id = $id";
					$sql = $conn->query($sql);
				}
			}

			header('location: /news/list.php');
			exit();
		}
	}
}
?>