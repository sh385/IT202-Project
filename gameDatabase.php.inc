<?php
  session_start();
  class gameDB
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
    }
    
    public function __destruct()
    {
      $this->database->close();
    }
    
    public function addGame($name, $genre, $genre2="", $genre3="")
    {
      $username = $_SESSION['username'];
      $query = "insert into games(uploader, name, genre, genre2, genre3) values('$username', '$name', '$genre', '$genre2', '$genre3');";
      $results = $this->database->query($query);
      if ($results)
      {
	header("Location: homepage.html");
	exit(0);
      }
      echo "failed to add game".PHP_EOL;
    }
    
    public function findGame($name)
    {
      $counter = 0;
      $query = "select * from games where name like '%$name' or name like '$name%';";
      $results = $this->database->query($query);
      $searchResults = array();
      if ($results)
      {
	while ($games = $results->fetch_assoc())
	{
	  $searchResults[$counter] = $games['name'];
	  $counter++;
	}
      }
      return $searchResults;
    }
    
    public function findGameWithGenre($genre)
    {
      $counter = 0;
      $query = "select * from games where genre = '$genre' 
				      or genre2 = '$genre'
				      or genre3 = '$genre';";
      $results = $this->database->query($query);
      $searchResults = array();
      if ($results)
      {
	while ($games = $results->fetch_assoc())
	{
	  $searchResults[$counter] = $games['name'];
	  $counter++;
	}
      }
      return $searchResults;
    }
  }
?>