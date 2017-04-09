<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Kodune ülesanne - 8. nädal - file listing</title>
</head>
<body>

<div>
    <?php
        // open current folder
        $dir = ".";
        // creating array
        $failid = array();
        $kataloogid = array();

        if ($dh = opendir($dir)) {

            while (($file = readdir($dh)) !== false) {
                // of not folder then add to the array
                if(!is_dir($file)) {
                    $failid[] = $file;
                }
                else {
                    $kataloogid[] = $file;
                }
            }
            // close handle
            closedir($dh);
        }
        else {
            die("Can't open folder $dir");
        }
        // Prints human-readable information about a variable
        print_r($failid);
        echo "<br><br><br>";
        print_r($kataloogid);
    ?>
</div>
</body>
</html>