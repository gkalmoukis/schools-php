<?php
    ob_start();
    session_start();
    if(empty($_SESSION["id"]))
    {
      header("Location: login.php");
    }
    if($_SESSION["role"] == 2)
    {
      echo "403";
    }
?>