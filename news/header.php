<!DOCTYPE html>
<html>

<head>
  <title>News</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity=
"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>

<body>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" href="/news/index.php">Home</a>
    </li>

    <?php
    session_start();
    if (isset($_SESSION['username']) ) {
      echo 
      '<li class="nav-item">
        <a class="nav-link" href="/news/list.php">List news</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/news/edit.php">Create news</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/news/logout.php">Logout</a>
      </li>';} 
    else {
      echo 
      '<li class="nav-item">
        <a class="nav-link" href="/news/login.php">Login</a>
      </li>';
    }
    ?>
   </ul>