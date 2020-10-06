<!DOCTYPE html>
<html>

<head>
<title>News</title>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

<div>
 <ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="/news/index.php">Home</a>
  </li>
  <?php
  session_start();
  if(isset($_SESSION['username']) ){
	echo '<li class="nav-item">';
    echo '<a class="nav-link" href="/news/list.php">List news</a>';
	echo '</li>';
    echo '<li class="nav-item">';
    echo '<a class="nav-link" href="/news/edit.php">Create news</a>';
	echo '</li>';
	echo '<li class="nav-item">';
    echo '<a class="nav-link" href="/news/logout.php">Logout</a>';
	echo '</li>';
  } else {
	echo '<li class="nav-item">';
    echo '<a class="nav-link" href="/news/login.php">Login</a>';
	echo '</li>';
  }
  ?>
 </ul>
</div>