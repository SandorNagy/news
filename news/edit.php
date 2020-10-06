<?php 
require 'header.php';
?>

<form method='POST' action='edit_backend.php' >
    <div class="form-group">
      <label>Title : </label>
      <input class='form-control w-25' type="text" name="title">
      <label>Url :</label>
      <input class='form-control w-25' type="text" name="url">
	  <label>Start date:</label>
	  <input class='form-control w-25' type="date" name="publishedAt">
	  <label>Image : </label>
	  <input class='form-control w-25' type="file" name="image" accept="image/*" />
	  <label>Intro text :</label>
      <input class='form-control w-25' type="text" name="introText">
	  <label>Main text :</label>
      <textarea class='form-control w-25' name="mainText" rows="4" cols="50"></textarea>
	  <label>IsActive?</label><br>
	  <input type="checkbox" name="isActive" value="true">
    </div>
    <button class='btn btn-outline-info' type="submit" name="edit" value='edit' class="submit">Submit</button>
</form>

</body>

</html>