<?php 
require 'header.php';

$id = 0;
$title = '';
$url = '';
$publishedAt = null;
$image = null;
$introText = '';
$mainText = ''; 
$isActive = 1;

if($_GET && isset($_GET['id'])){
  require 'connection.php';
  $conn = connect_db();
  $id = $_GET['id'];
  $sql = "Select * From news WHERE id = $id";
  $sql = $conn->query($sql);
  if($sql)
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
		<div class='form-group'>
		  <input type='hidden' name='id' value='$id' />
		  <label>Title : </label>
		  <input class='form-control w-25' type='text' name='title' maxlength='120' required value='$title' />
		  <label>Url :</label>
		  <input class='form-control w-25' type='text' name='url' value='$url' />
		  <label>Date:</label>
		  <input class='form-control w-25' type='date' name='publishedAt' value='$publishedAt' />
		  <label>Image : </label>
		  <input class='form-control w-25' type='file' name='file' '.$isImageRequired.' size='2048' accept='image/*' />
		  <label>Intro text :</label>
		  <input class='form-control w-25' type='text' required maxlength='250' name='introText' value='$introText' />
		  <label>Main text :</label>
		  <textarea class='form-control w-25' name='mainText' rows='4' cols='50' id='editor'>$mainText</textarea>
			<script>
				ClassicEditor
					.create( document.querySelector( '#editor' ) )
					.catch( error => {
						console.error( error );
					} );
			</script>
		  <label>IsActive?</label><br>
		  <input type='checkbox' name='isActive''.$checked.' value='$isActive' />
		</div>
		<button class='btn btn-outline-info' type='submit' name='edit' value='edit' class='submit'>Submit</button>
	</form>";
?>

</body>

</html>