<?php
   echo '  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <nav class="navbar navbar-inverse">
  <div class="nav nav-bar">
      <ul id="menu" class="nav navbar-nav">
	<h1><a id="websiteName" href="homepage.php">Game Website</a></h1>
	<li><a href="search.php?type=genre&genre=action">Action</a></li>
	<li><a href="search.php?type=genre&genre=adventure">Adventure</a></li>
	<li><a href="search.php?type=genre&genre=racing">Racing</a></li>
	<li><a href="search.php?type=genre&genre=shooter">Shooting</a></li>
	<li><a href="search.php?type=genre&genre=puzzle">Puzzle</a></li>
	<li><a href="search.php?type=genre&genre=platformer">Platformer</a></li>
	<li><form action="search.php?type=name" method="POST" class="form-inline">
	<div class="form-group">
	  <input id="searchBox" class="form-control" type="text" name="searchBox" placeholder="Search...">
	  <input id="searchButton" class="form-control" type="submit" name="search" value="Search"></input>
	</div>
      </form></li>
      </ul>
    </div>
  </div>
  </nav>
  <div id="results">
      <a id="upload" href="addGame.php"> Click Here to Upload a Game </a>
    </div>';
?>