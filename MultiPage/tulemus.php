<?php require_once("head.php"); ?>

<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
        <?php
            if (!empty($_GET)){
                if (!empty($_GET['pilt'])){
                    $index = intval($_GET['pilt']);
                    if ($index > 0 && $index <= $filecount){
                        echo "<p>Valisid alljärgneva pildi</p>";
                        echo "<img src=\"".($files[$index-1])."\" alt=\"nimetu ".($_GET['pilt'])."\" />\n";
                    }
                }
            } else {
                echo "Mine tagasi <a href=\"vote.php\">hääletuse lehele</a> ja proovi uuesti";
            }
        ?>
    </p>

</div>

<?php require_once("foot.html"); ?>