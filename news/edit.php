<?php
	require 'header.php';
	require 'connection.php';
	 
	if(!isset($_SESSION['username']) ){
		header("location: /news/index.php");
		exit();
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-body">
<?php 
	$id = 0;
	$title = '';
	$url = '';
	$publishedAt = null;
	$image = null;
	$introText = '';
	$mainText = ''; 
	$isActive = 1;

	if ($_GET && isset($_GET['id'])) {
		$conn = connect_db();
		$id = $_GET['id'];
		$sql = "SELECT * FROM news WHERE id = $id";
		$sql = $conn->query($sql);

		if ($sql)
		{
			$row = $sql->fetch_assoc();

			$title = $row['title'];
			$url = $row['url'];
			$publishedAt = $row['publishedAt'];
			$image = $row['image'];
			$introText = $row['introText'];
			$mainText = $row['mainText'];
			$isActive = $row['isActive'];
		}
	}

	$checked = $isActive ? ' checked="checked"' : '';
	$isImageRequired = $id == 0 ? ' required="required"' : '';

	echo "<form method='POST' action='edit_backend.php' enctype='multipart/form-data'>
			<input type='hidden' name='id' value='$id' />
			<div class='input-group mb-3'>
                <div class='input-group-prepend'>
                	<span class='input-group-text'>Title:</span>
                </div>
                <input class='form-control' type='text' id='title' name='title' maxlength='120' required value='$title' />
			</div>
			<div class='input-group mb-3'>
				<div class='input-group-prepend'>
			  		<span class='input-group-text'>Url:</span>
				</div>
				<input readonly  class='form-control' type='text' id='url' name='url' value='$url' />
			</div>
			<div class='input-group mb-3'>
				<div class='input-group-prepend'>
				  <span class='input-group-text'>Date:</span>
				</div>
				<input class='form-control' type='date' name='publishedAt' value='$publishedAt' />
			</div>
			<div class='input-group mb-3'>
				<div class='input-group-prepend'>
				  <span class='input-group-text'>Image:</span>
				</div>
				<input class='form-control' type='file' name='file' '.$isImageRequired.' size='2048' accept='image/*' />
			</div>
			<div class='input-group mb-3'>
				<div class='input-group-prepend'>
				  <span class='input-group-text'>Intro:</span>
				</div>
				<input class='form-control' type='text' required maxlength='250' name='introText' value='$introText' />
			</div>			
			<div class='form-group'>
				<textarea class='form-control' name='mainText' id='editor'>$mainText</textarea>
					<script>
						ClassicEditor
							.create( document.querySelector( '#editor' ) )
							.catch( error => {
								console.error( error );
							} );
					</script>
			</div>
			<div class='form-group'>
				<label>IsActive?</label><br>
				<input type='checkbox' name='isActive''.$checked.' value='$isActive' />
			</div>
			<button class='btn btn-outline-info' type='submit' name='edit' value='edit' class='submit'>Submit</button>
		</form>";
?>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>

<script>
	$(function () {
		var $src = $('#title'),
			$dst = $('#url');
		$src.on('input', function () {
			$dst.val(encodeURIComponent($src.val()));
		});
	});
</script>