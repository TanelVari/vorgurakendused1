<?php
$folder = "pildid/";
$filecount = 0;
$files = glob($folder . "*.jpg");

if ($files){
    $filecount = count($files);
}
?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
		<title>Praktikum - Ülesanne</title>

		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

		<div id="header">
			<ul>
				<li><a href="pealeht.php">Pealeht</a></li>
				<li><a href="galerii.php">Galerii</a></li>
				<li><a href="vote.php">Hääletamine</a></li>
			</ul>
		</div>
		<div id="banner">
			<img src="banner1.jpg" alt="banner">
		</div>