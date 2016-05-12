<?php
require_once("commentsDatabase.php.inc");
$game = $_REQUEST["game"];
$comment = $_REQUEST["comment"];
$database = new commentsDB("connectInfo.ini");
$database->addComment($game, $comment);
$comments = $database->getComments($game);
echo json_encode($comments);
?>