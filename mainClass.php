<?php
  require_once('clientDatabase.php.inc');
  $database = new clientDatabase('connectInfo.ini');
  $request = $_POST['request'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  switch($request)
  {
    case "Login":
      $database->validateClient($username, $password);
      break;
    case "Register":
      $database->addClient($username, $password);
      break;
  }
?>