<?php
require_once("gameDatabase.php.inc");
include "header.php";
include "footer.php";
echo '	<head>
	  </head>
	  <body>
	    <a href="addGame.php"> Click Here to Upload a Game </a>
	  </body>';
      
$database = new gameDB("connectInfo.ini");
$type = $_GET["type"];

#Checks if game is being searched by genre or name
if ($type == "genre")
{
  $genre = $_GET["genre"];
  $results = $database->findGameWithGenre($genre);
}
else
{
  $name = $_POST["searchBox"];
  $results = $database->findGame($name);
}

#Prints out link for each game 
if (sizeof($results) == 0)
{
  echo "No games found".PHP_EOL;
}

else
{
  for ($i=0; $i<sizeof($results); $i++)
  {
    $game = $results[$i];
    echo "<br><a id='gameName' href='gamePage.php?q=0&game=$game'>".$game."</a>".PHP_EOL;
  }
}

?>