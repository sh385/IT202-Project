<?php
include 'header.php';
include 'footer.php';
  echo '
  <head>
  </head>
  <body>
  <form action="addNewGame.php" method="POST" class="form-group">
    <div class="col-lg-4">
    Game Title
    <br><input class="form-control" type="text" name="gameName"></br>
    Genre 1
    <br><input class="form-control" type="text" name="genre1"></br>
    Genre 2
    <br><input class="form-control" type="text" name="genre2"></br>
    Genre 3
    <br><input class="form-control" type="text" name="genre3"></br>
    URL
    <br><input class="form-control" type="text" name="url"></br>
    <input class="form-control" type="submit" name="submit" value="Upload Game">
    </div>
  </form>
  </body>'
?>