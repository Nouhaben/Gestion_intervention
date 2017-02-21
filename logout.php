<?php
ob_start();
session_start();
$_SESSION = array(); 


if (!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    echo'<meta http-equiv="refresh" content="0; url=index.php" />';
    exit();
}else {
  session_destroy();
  
  header("location: index.php");
  
}




ob_end_flush();
?>