<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=result" method="POST">

        <?php
        if (!empty($_SESSION['pilt'])) {
            echo "Oled juba korra hääletanud alloleva pildi poolt. Rohkem praegu ei saa!<br /><br />";
            echo "<img src=\"" . ($files[$_SESSION['pilt'] - 1]) . "\" alt=\"nimetu " . ($_SESSION['pilt']) . "\" />\n<br />";

            echo "<a href=\"?page=end_session\">Lõpeta sesssioon</a>";
        }
        else if ($filecount != 0){
            for ($i = 0; $i < $filecount; $i++){
                echo "<p>\n";
                echo "<label for=\"p".($i+1)."\">\n";
                echo "<img src=\"".$files[$i]."\" alt=\"nimetu ".($i+1)."\" height=\"100\" />\n";
                echo "</label>\n";
                echo "<input type=\"radio\" value=\"".($i+1)."\" id=\"p".($i+1)."\" name=\"pilt\" />\n";
                echo "</p>\n";
            }
            echo "<br/><input type=\"submit\" value=\"Valin!\"/>";
        }
        ?>


	</form>

</div>