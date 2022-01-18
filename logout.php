<?php
  session_start();
  if($_SESSION['name']==true){
    session_destroy();

  }
  else{
    
    header("location:loginsign.php");
  }
?>