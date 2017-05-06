
<?php
    foreach ($puurid as $key => $puur){
        echo <<<END
<div class="clear">
    <div class="puur">        
END;
        echo "<h5>Puur $key</h5>";


        foreach($puur as $loom){
            echo "<img src=\"{$loom['liik']}\" alt=\"{$loom['nimi']}\" />";
        }

        echo <<<END
    </div>
</div>    
END;
    }
?>
