<?php 
require 'header.php';
?>

<form method='POST' action='login_backend.php' >
    <div class="form-group">
      <label>Username : </label>
      <input class='form-control w-25' type="text" name="username">
      <label>Password :</label>
      <input class='form-control w-25' type="password" name="password" id="password" autocomplete="off">
    </div>
    <button class='btn btn-outline-info' type="submit" name="login" value='login' class="submit">Login</button>
</form>

</body>

</html>