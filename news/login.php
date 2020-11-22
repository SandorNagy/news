<?php 
require 'header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-body">
          <form method='POST' action='login_backend.php'>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Username:</span>
                </div>
                <input class='form-control' type="text" name="username">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Password:</span>
                </div>
                <input class='form-control' type="password" name="password" id="password" autocomplete="off">
              </div>
            <button class='btn btn-outline-info' type="submit" name="login" value='login' class="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>