<?php
  
session_start();
if(isset($_SESSION['username']) ){
    session_destroy();
    header("location: /news/index.php");
    exit();
}else{
    echo "You are not authorized to view this page. Go back <a href= '/news/index.php'>home</a>";
}

?>