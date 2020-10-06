<?php 
require 'header.php';
require 'connection.php';

  $conn = connect_db();
 
  $sql = "Select * From news";
  $sql = $conn->query($sql);
	
  if($sql){
	while($row = $sql->fetch_assoc()) {
		echo '<p> Title: ' . $row['title'] . '</p>';
		echo '<a href="/news/edit.php?id=' . $row['id'] . '">Edit</a>';
		// TODO
	}
  }

?>

</body>

</html>