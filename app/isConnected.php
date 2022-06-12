<?php
  function isConnected(){
    return isset($_SESSION['identitee']) && !empty($_SESSION['identitee']) && session_status() != PHP_SESSION_NONE;
  }
 ?>
