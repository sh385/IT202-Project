<?php
require_once("gameDatabase.php.inc");

echo '<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="menuStyle.css">
	<h1><a id="websiteName" href="homepage.html">WEBSITE</a></h1>
	<ul id="menu">
	  <li><a href="search.php?type=genre&genre=action">Action</a><li>
	  <li><a href="search.php?type=genre&genre=adventure">Adventure</a><li>
	  <li><a href="search.php?type=genre&genre=racing">Racing</a><li>
	  <li><a href="search.php?type=genre&genre=shooter">Shooting</a><li>
	  <li><a href="search.php?type=genre&genre=puzzle">Puzzle</a><li>
	  <li><a href="search.php?type=genre&genre=platformer">Platformer</a><li>
	  <li><form action="search.php?type=name" method="post">
	    <input id="searchBox"type="text" name="searchBox" placeholder="Search...">
	    <input id="searchButton" type="submit" name="search" value="Search">
	  </form></li>
	</ul>
      </head>
      <body>
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
    echo "<a id='gameName' href='gamePage.php?q=0&game=$game'>".$game."</a>".PHP_EOL;
  }
}

?>