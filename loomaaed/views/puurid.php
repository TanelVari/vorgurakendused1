
<?php
    foreach ($puurid as $key => $puur):
?>
<div class="clear">
    <div class="puur">        
        <h5>Puur <?php=$key?></h5>

<?php
    foreach($puur as $loom){
        echo "<img src=\"{$loom['liik']}\" alt=\"{$loom['nimi']}\" />";
    }
?>

    </div>
</div>    

<?php
    endforeach;
?>