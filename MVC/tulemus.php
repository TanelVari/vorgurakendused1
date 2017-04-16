<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
        <?php
            if (!empty($_POST)){
                if (!empty($_POST['pilt'])){
                    $index = intval($_POST['pilt']);
                    if ($index > 0 && $index <= $filecount){
                        echo "<p>Valisid alljärgneva pildi</p>";
                        echo "<img src=\"".($files[$index-1])."\" alt=\"nimetu ".($_POST['pilt'])."\" />\n";
                    }
                }
            } else {
                echo "Mine tagasi <a href=\"?page=vote\">hääletuse lehele</a> ja proovi uuesti";
            }
        ?>
    </p>

</div>