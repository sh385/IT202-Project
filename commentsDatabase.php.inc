<?php
  session_start();
  class commentsDB
  {
    private $database;
    private $ini;
    
    public function __construct($iniFile)
    {
      $this->ini = parse_ini_file($iniFile, true);
      $this->database = new mysqli($this->ini['loginDB']['host'],
				   $this->ini['loginDB']['user'],
				   $this->ini['loginDB']['password'],
				   $this->ini['loginDB']['database']);
	
      if ($this->database->connect_errno > 0)
      {
	echo "Could not connect to database".PHP_EOL;
      }
      else
      {
	echo "Successfully connected to database".PHP_EOL;
      }
    }
    
    public function __destruct()
    {
      $this->database->close();
    }
    
    public function addComment($gameName, $text)
    {
      $username = $_SESSION["username"];
      $query = "insert into comments(gameName, username, text) values('$gameName','$username', '$text');";
      $results = $this->database->query($query);
      
    }
    
    public function getComments($gameName)
    {
      $counter = 0;
      $query = "select * from comments where gameName = '$gameName';";
      $results = $this->database->query($query);
      $allComments = array();
      if ($results)
      {
	while($comments = $results->fetch_assoc())
	{
	  $allComments[$counter] = array($comments["username"], $comments["text"]);
	  $counter++;
	}
      }
      return $allComments;
    }
  }
?>