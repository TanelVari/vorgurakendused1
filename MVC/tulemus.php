<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
        <?php
            if (!empty($_POST)){
                if (!empty($_POST['pilt'])){
                    $index = intval($_POST['pilt']);

                    if (!empty($_SESSION['pilt'])){
                        echo "Oled juba korra hääletanud alloleva pildi poolt. Rohkem praegu ei saa!<br />";
                        echo "<img src=\"".($files[$_SESSION['pilt']-1])."\" alt=\"nimetu ".($_SESSION['pilt'])."\" />\n";

                    } else if ($index > 0 && $index <= $filecount){
                        $_SESSION['pilt'] = $index;
                        echo "<p>Valisid alljärgneva pildi</p>";
                        echo "<img src=\"".($files[$index-1])."\" alt=\"nimetu ".($_POST['pilt'])."\" />\n";
                    }
                }
            } else {
                echo "Mine tagasi <a href=\"?page=vote\">hääletuse lehele</a> ja proovi uuesti";
            }
        ?>
    </p>
    <p>
        <a href="?page=end_session">Lõpeta sesssioon</a>
    </p>

</div>