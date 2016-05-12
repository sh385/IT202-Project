<?php
require_once("gameDatabase.php.inc");
include "header.php";
include "footer.php";
      
$database = new gameDB("connectInfo.ini");
$type = $_GET["type"];
$game = "";
if ($type == "genre")
{
  $genre = $_GET["genre"];
  $results = $database->findGameWithGenre($genre);
}
else
{
  $game = $_POST["searchBox"];
  $results = $database->findGame($game);
}

#Prints out link for each game 
if (sizeof($results) == 0)
{
  echo "No games found".PHP_EOL;
}

else
{
    for ($i = 0; $i < sizeof($results); $i++)
    {
      $gameName = $results[$i];
      echo '<a href="gamePage.php?game='.$gameName.'">'.$gameName.'</a><br>';
    }
}

?>