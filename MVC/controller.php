<?php

    session_start();

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

    function end_my_session(){
        if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '',time()-42000, '/');
        }
        $_SESSION = array();
        session_destroy();
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
        case "end_session":
            end_my_session();
            include_once("pealeht.php");
            break;
        default:
            include_once("pealeht.php");
    }
?>

<?php require_once "foot.html"; ?>