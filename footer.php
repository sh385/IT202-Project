<?php
   echo '  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
function showResults(text) {
  var xhttp = new XMLHttpRequest();
  var gameName = text; 
  var theDiv = document.getElementById("results");
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var arr = JSON.parse(xhttp.responseText);
      document.getElementById("results").innerHTML = arr[0];
    }
  };
  xhttp.open("GET", "search.php?type=name=", true);
  xhttp.send();
}
</script>
  <div class="row">
    <div class="col-lg-8">
      <div id="menu" class="list-group inline-block">
	<a href="search.php?type=genre&genre=action" class="list-group-item">Action</a>
	<a href="search.php?type=genre&genre=adventure" class="list-group-item">Adventure</a>
	<a href="search.php?type=genre&genre=racing" class="list-group-item">Racing</a>
	<a href="search.php?type=genre&genre=shooter" class="list-group-item">Shooting</a>
	<a href="search.php?type=genre&genre=puzzle" class="list-group-item">Puzzle</a>
	<a href="search.php?type=genre&genre=platformer" class="list-group-item">Platformer</a>
      </div>
    </div>
    <div class="col-lg-4">
      <form action="search.php?type=name" method="POST" class="form-inline">
	<div class="form-group">
	  <input id="searchBox" onkeyup="showResults(this.value)"class="form-control" type="text" name="searchBox" placeholder="Search...">
	  <input id="searchButton" class="form-control" type="submit" name="search" value="Search">
	</div>
      </form>
    </div>
    <div id="results" class="col-lg-4">
      
    </div>
  </div>';
?>