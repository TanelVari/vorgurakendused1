<?php
  $host = "localhost";
  $user = "test";
  $pass = "t3st3r123";
  $db = "test";

  $l = mysqli_connect($host, $user, $pass, $db);
  mysqli_query($l, "SET CHARACTER SET UTF8") or
          die("Error, ei saa andmebaasi charsetti seatud");
  mysqli_close($l);
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Võrgurakendused I, praktikum</title>
  <meta name="description" content="Võrgurakendused I, praktikum">
  <meta name="author" content="Tanel Vari">

  <!-- <link rel="stylesheet" href="css/styles.css?v=1.0"> -->
</head>

<body>
  <!-- <script src="js/scripts.js"></script> -->
  <?php phpinfo(); ?>
</body>
</html>
