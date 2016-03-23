<?php
  require_once("gameDatabase.php.inc");
  $gamedb = new gameDB("connectInfo.ini");
  
  $gameName = $_POST["gameName"];
  $genre1 = $_POST["genre1"];
  $genre2 = $_POST["genre2"];
  $genre3 = $_POST["genre3"];
  $gamedb->addGame($gameName, $genre1, $genre2, $genre3);
?>