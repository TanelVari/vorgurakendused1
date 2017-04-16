<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=result" method="POST">

        <?php
        if ($filecount != 0){
            for ($i = 0; $i < $filecount; $i++){
                echo "<p>\n";
                echo "<label for=\"p".($i+1)."\">\n";
                echo "<img src=\"".$files[$i]."\" alt=\"nimetu ".($i+1)."\" height=\"100\" />\n";
                echo "</label>\n";
                echo "<input type=\"radio\" value=\"".($i+1)."\" id=\"p".($i+1)."\" name=\"pilt\" />\n";
                echo "</p>\n";
            }
        }
        ?>

		<br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>