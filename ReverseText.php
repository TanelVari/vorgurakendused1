<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Kodune töö PHP</title>
</head>
<body>
<?php
    $my_string = "Seitsmendas loengus tutvusime PHPga.";

    echo "<div><p>";

    for ($i = strlen($my_string); $i >= 0; $i--){
        echo substr($my_string,$i,1);
    }

    echo "</p></div>";
?>
</body>
</html>
