<?php 
require 'header.php';
require 'connection.php';

  $conn = connect_db();
 
  $sql = "Select * From news";
  $sql = $conn->query($sql);
	
  if($sql){
		while($row = $sql->fetch_assoc()) {
			$isActive = $row['isActive'];
			$checked = $isActive ? ' checked="checked"' : '';
			echo '<img src=' . $row['image'] . '>
				 <p> Title: ' . $row['title'] . '</p>
				 <input type="checkbox" id=' . $row['id'] . ' '.$checked.' value='.$isActive.' onclick="onStateChanged(this.id)"/>
				 <a href="/news/edit.php?id=' . $row['id'] . '">Edit</a>
				 <a href="/news/delete_backend.php?id=' . $row['id'] . '">Delete</a>';
	}
  }
?>
<script>
function onStateChanged(id) {
	$.ajax({
        url: "update_backend.php",
        type: "POST",
        data:{
			type: 'state',
			id : id },
    });
}
</script>

</body>

</html>