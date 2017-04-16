<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
        <?php
            if ($filecount != 0){
                for ($i = 0; $i < $filecount; $i++){
                    echo "<img src=\"".$files[$i]."\" alt=\"nimetu ".($i+1)."\" />\n";
                }
            }
        ?>

	</div>
</div>