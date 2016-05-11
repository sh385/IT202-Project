<?php
require_once("commentsDatabase.php.inc");
require_once("gameDatabase.php.inc");
include "header.php";
include "footer.php";
$gamedb = new gameDB("connectInfo.ini");
$database = new commentsDB("connectInfo.ini");
$status = $_GET["q"];
$game = $_GET["game"];
$url = $gamedb->getUrl($game);
if ($status == "1")
{
  $comment = $_POST["comment"];
  $database->addComment($game, $comment);
}
$comments = $database->getComments($game);
echo ' <head>
      </head>
      <body>
	<h2><a href='.$url.'>'.$game.'</a></h2>
      </body>
      <h3>Write a Comment</h3>
      <div class="row">
	<div class="col-lg-4">
	  <form action="gamePage.php?q=1&game='.$game.'" method="post">
	    <div class="form-group">
	      <textarea class="form-control" type="text" rows="5" cols="50" name="comment"></textarea></br>
	      <input class="form-control" type="submit" name="submit" value="Add Comment">
	    </div>
	  </form>
	</div>
      </div>';
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