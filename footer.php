<?php
   echo '  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
function showResults() {
  var xhttp = new XMLHttpRequest();
  var div = document.getElementById("results");
  var text = document.getElementById("searchBox").value;
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var arr = JSON.parse(xhttp.responseText);
      for (var i = 0; i < arr.length; i++)
      {
	var par = document.createElement("p");
	var tag = document.createElement("a");
	tag.setAttribute("href", "gamePage.php?q=0&game="+arr[i]);
	tag.innerHTML = arr[i];
	par.appendChild(tag);
	div.appendChild(par);
      }
    }
  };
  xhttp.open("GET", "search.php?name="+text, true);
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
      <form class="form-inline">
	<div class="form-group">
	  <input id="searchBox" class="form-control" type="text" name="searchBox" placeholder="Search...">
	  <button id="searchButton" class="form-control" onclick="showResults()" type="button" name="search" > Search </button>
	</div>
      </form>
    </div>
  </div>
  <div id="results">
      <a href="addGame.php"> Click Here to Upload a Game </a>
    </div>';
?>