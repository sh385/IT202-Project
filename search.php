<?php
require_once("gameDatabase.php.inc");
      
$database = new gameDB("connectInfo.ini");
$name = $_REQUEST["name"];

$results = $database->findGame($name);

#Prints out link for each game 
if (sizeof($results) == 0)
{
  echo "No games found".PHP_EOL;
}

else
{
    echo json_encode($results);
}

?>