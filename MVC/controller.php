<?php
    $page = "";

    $folder = "pildid/";
    $filecount = 0;
    $files = glob($folder . "*.jpg");

    if ($files){
        $filecount = count($files);
    }


    if (!empty($_GET['page'])){
        $page = $_GET['page'];
    }
?>

<?php require_once("head.html"); ?>

<?php

    switch ($page) {
        case "home":
            include_once("pealeht.php");
            break;
        case "gallery":
            include_once("galerii.php");
            break;
        case "vote":
            include_once("vote.php");
            break;
        case "result":
            include_once("tulemus.php");
            break;
        default:
            include_once("pealeht.php");
    }
?>

<?php require_once "foot.html"; ?>