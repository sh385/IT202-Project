<?php
require_once("commentsDatabase.php.inc");
$database = new commentsDB("connectInfo.ini");
$status = $_GET["q"];
$game = $_GET["game"];
if ($status == "1")
{
  $comment = $_POST["comment"];
  $database->addComment($game, $comment);
}
$comments = $database->getComments($game);
echo ' <head>
	<title>Homepage</title>
	<link rel="stylesheet" href="menuStyle.css">
	<h1><a id="websiteName" href="homepage.html">WEBSITE</a></h1>
	<ul id="menu">
	  <li><a href="search.php?type=genre&genre=action">Action</a></li>
	  <li><a href="search.php?type=genre&genre=adventure">Adventure</a></li>
	  <li><a href="search.php?type=genre&genre=racing">Racing</a></li>
	  <li><a href="search.php?type=genre&genre=shooter">Shooting</a></li>
	  <li><a href="search.php?type=genre&genre=puzzle">Puzzle</a></li>
	  <li><a href="search.php?type=genre&genre=platformer">Platformer</a></li>
	  <li><form action="search.php?type=name" method="post">
	  <input id="searchBox" type="text" name="searchBox" placeholder="Search">
	  <input id="searchButton" type="submit" name="search" value="Search">
	  </form></li>
	</ul>
      </head>
      <body>
	<h2>'.$game.'</h2>
      </body>
      <h3>Write a Comment</h3>
      <form action="gamePage.php?q=1&game='.$game.'" method="post">
	<textarea rows="5" cols="50" name="comment"></textarea></br>
	<input type="submit" name="submit" value="Add Comment">
      </form>';
for($i=0; $i<sizeof($comments); $i++)
{
  echo "<div id='comment'>";
  $user = $comments[$i][0];
  $text = $comments[$i][1];
  $timeStamp = $comments[$i][2];
  if ($user == $_SESSION['username'])
  {
    echo "<p><b>You</b><i>$timeStamp</i></p>";
  }
  else
  {
    echo "<p><b>$user</b><i>$timeStamp</i></p>";
  }
  echo "<p>$text</p>";
  echo "</div>";
}
?>