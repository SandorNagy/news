<?php
require 'header.php';
require 'connection.php';

if(!isset($_SESSION['username']) ){
    header("location: /news/index.php");
    exit();
}
?>

<div class="container">
	<div class='input-group mb-3'>
        <div class='input-group-prepend'>
            <span class='input-group-text'>Search:</span>
        </div>
    	<input class='form-control' type='text' id='search' name='search' maxlength='120' />
	</div>
	<table class="table table-hover news-list">
		<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Date</th>
			<th>IsActive?</th>
			<th></th>
			<th></th>
		</tr>
		</thead>
		<tbody>
			<?php 
			$conn = connect_db();
		
			$sql = "SELECT * FROM news ORDER BY num ASC";
			$sql = $conn->query($sql);
				
			if ($sql) {
				while ($row = $sql->fetch_assoc()) {
					$checked = $row['isActive'] ? 'checked' : '';
					echo 
						'<tr data-id=' . $row['id'] . '>
							<td>' . $row['id'] . '</td>
							<td><a href="/news/edit.php?id=' . $row['id'] . '">' . $row['title'] . '</a></td>
							<td>' . $row['publishedAt'] . '</td>
							<td class="center">
								<input type="checkbox" id=' . $row['id'] . ' '.$checked.' value='. $row['isActive'] .' onclick="onStateChanged(this.id)"/>
							</td>
							<td class="arrow-icons">
								<i class="arrow up" onclick="onUpClicked(' . $row['id'] . ')"></i>
								<i class="arrow down" onclick="onDownClicked(' . $row['id'] . ')"></i>
							</td>
							<td class="action-buttons">
								<a class="btn btn-primary" href="/news/edit.php?id=' . $row['id'] . '">Edit</a>
								<a class="btn btn-danger" href="/news/delete_backend.php?id=' . $row['id'] . '">Delete</a>
							</td>
						</tr>';
				}
			}
			?>
		</tbody>
	</table>
</div>

</body>

</html>

<script>
	function onStateChanged(id) {
		$.ajax({
			url: "update_backend.php",
			type: "POST",
			data: {
				type: 'state',
				id : id,
			},
		});
	}

	function onUpClicked(id) {
		$.ajax({
			url: "update_backend.php",
			type: "POST",
			data: {
				type: 'order',
				direction: 'up',
				id : id,
			},
		});
	}

	function onDownClicked(id) {
		$.ajax({
			url: "update_backend.php",
			type: "POST",
			data: {
				type: 'order',
				direction: 'down',
				id : id,
			},
		});
	}

	$(function () {
		$("#search").on("input", function() {
    	var value = $(this).val();

			$("table tr").each(function(index) {
				if (index !== 0) {

					$row = $(this);

					var text = $row.find("td:nth-child(2)").text();

					if (text.search(value) < 0) {
						$row.hide();
					}
					else {
						$row.show();
					}
				}
			});
		});
	});
</script>