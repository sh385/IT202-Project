<?php
require_once("commentsDatabase.php.inc");
require_once("gameDatabase.php.inc");
include "header.php";
include "footer.php";

$gamedb = new gameDB("connectInfo.ini");
$database = new commentsDB("connectInfo.ini");
$game = $_GET["game"];
$url = $gamedb->getUrl($game);
$comments = $database->getComments($game);
$arr = Array();

echo '
<head>
  <h2><a id="gameTitle" href="">'.$game.'</a></h2>
</head>
<body>
  <h3>Write a Comment</h3>
   <script>
      function createStuff() {
	var xhttp = new XMLHttpRequest();
	var gameName = document.getElementById("gameTitle");
	div = document.getElementById("comments");
	var com = document.getElementById("commentArea").value;
	var params = "game="+gameName+"&comment="+com;
	xhttp.onreadystatechange = function() {
	if (xhttp.readyState == 4 && xhttp.status == 200) {
	  var comments = JSON.parse(xhttp.responseText);
	  var user = comments[comments.length-1][0];
	  var comment = comments[comments.length-1][1];
	 
	  var userText = document.createElement("li");
	  userText.innerHTML = user;
	  var commentText = document.createElement("li");
	  commentText.innerHTML = comment;
	  div.appendChild(userText);
	  div.appendChild(commentText);
    }
  };
  xhttp.open("POST", "gameInfo.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.setRequestHeader("Content-length", params.length);
xhttp.setRequestHeader("Connection", "close");
  xhttp.send(params);
  }
    </script>
  <div class="row">
    <div class="col-lg-4">
      <form role="form">
	<div class="form-group">
	  <textarea id="commentArea" class="form-control" type="text" rows="5" cols="50" name="comment"></textarea></br>
	  <button class="form-control" type="button" onclick="createStuff()" name="submit" value="Add Comment">Submit Comment</button>
	</div>
      </form>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-4>
     <ul class="list-group" id="comments">';
for ($i = 0; $i < sizeof($comments); $i++)
{
	 $user = $comments[$i][0];
	 $comment = $comments[$i][1];
	 $timeStamp = $comments[$i][2];
	echo '
	     <li class="list-group-item">
	      '.$user.'<br>'.$comment.'
	     </li>';
}
echo '
    </div>
    </div>
    </div>'

?>