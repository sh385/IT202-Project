<?php
  session_start();
  class clientDatabase
  {
    private $database;
    private $ini;
    private $salt;
    
    public function __construct($iniFile)
    {
      $this->ini = parse_ini_file($iniFile, true);
      $this->salt = $this->ini['loginDB']['salt'];
      
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
    
    private function createSaltPassword($password)
    {
      return $this->database->real_escape_string(sha1($password.$this->salt));
    }
    
    public function getUser()
    {
      return $this->user;
    }
    
    public function verifyName($name)
    {
      $query = "select * from clients where clientName = '$name';";
      $result = $this->database->query($query);
      $client = $result->fetch_assoc();
      if (isset($client['clientName']))
      {
	return 1;
      }
      echo "<script language='JavaScript'>
	      alert('Username or Password was entered incorrectly')
	      location='index.html'
	    </script>";
	    
      return 0;
    }
    
    public function addClient($name, $password)
    {
      if ($this->verifyName($name) == 1)
      {
	echo "<script language='JavaScript'>
		alert('Username already exists')
		location='index.html'
	      </script>";
      }
      
      $password = $this->createSaltPassword($password);
      $query = "insert into clients(clientName, clientPassword) values('$name', '$password');";
		
      if ($this->database->query($query))
      {
	$_SESSION['username'] = $name;
	header("Location: homepage.html");
	exit(0);
      }
      
      echo "Failed to add client".PHP_EOL;
    }
    
    public function validateClient($name, $password)
    {
      $password = $this->createSaltPassword($password);
      
      if ($this->verifyName($name) == 0)
      {
	echo "Username: $name does not exist".PHP_EOL;
	exit(0);
      }
      
      $query = "select * from clients where clientName = '$name' and clientPassword = '$password';";
      $result = $this->database->query($query);
      $client = $result->fetch_assoc();
      
      if (isset($client['clientPassword']))
      {
	$_SESSION['username'] = $client['clientName'];
	header("Location: homepage.html");
	exit(0);
      }
      
      echo "<script language='JavaScript'>
	    alert('Username or Password was entered incorrectly')
	    location='index.html'
	    </script>";
    }
  }
?>