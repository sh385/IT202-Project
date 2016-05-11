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
$name = $_GET["name"];
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