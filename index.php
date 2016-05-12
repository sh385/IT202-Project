<?php

echo '
<head>
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="menuStyle.css">
  <h1> Login </h1>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <div class="col-lg-2">
  <form class="form-group" action="mainClass.php" method="post">
    Username<br> <input type="text" name="username"><br>
    Password<br> <input type="password" name="password"><br>
    <input id="log" type="submit" class="form-control" name="request" value="Login">
    <input id="reg" type="submit" class="form-control" name="request" value="Register"><br>
  </form>
  </div>
</body>'
?>