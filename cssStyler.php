<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Kodune ülesanne - 8. nädal</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="bgrins-spectrum-98454b5/spectrum.js"></script>
    <link rel="stylesheet" href="bgrins-spectrum-98454b5/spectrum.css" />

    <?php
    // Variables

    $myText = @$_POST['myText'] or $myText = "Default text";

    $foregroundColor = @htmlspecialchars($_POST['foregroundColor']) or $foregroundColor = "#000000";
    $backgroundColor = @htmlspecialchars($_POST['backgroundColor']) or $backgroundColor = "transparent";

    $borderStyle = @htmlspecialchars($_POST['borderStyle']) or $borderStyle = "none";
    $borderColor = @htmlspecialchars($_POST['borderColor']) or $borderColor = "transparent";

    if (empty($_POST['borderWidth'])) {
        $borderWidth = 0;
    }
    else if (intval($_POST['borderWidth']) < 0) {
        $borderWidth = 0;
    } else {
        $borderWidth = intval(htmlspecialchars($_POST['borderWidth']));
    }

    ?>

    <script>
        window.onload = function(){

            var borderStyles = ["none", "hidden", "dotted", "dashed", "solid", "double", "groove", "ridge", "inset", "outset"];
            var select = document.getElementById("borderStyle");

            for (var i=0; i < borderStyles.length; i++){
                var option = document.createElement("option");
                option.text = borderStyles[i];
                option.value = borderStyles[i];
                if (borderStyles[i] == "<?php echo $borderStyle; ?>") {
                    option.selected = true;
                }
                select.appendChild(option);
            }
        }
    </script>

    <style>
        body {
            background: #EEE;
            padding: 20px;
        }

        input, select, textarea {
            clear: both;
            float: left;
            margin-top: 0px;
            margin-bottom: 10px;
        }

        label {
            clear: both;
            float: left;
            margin-top: 10px;
            margin-bottom: 0px;
        }

        div.colorPicker {
            float: left;
            clear: both;
        }

        #myTextDiv {
            color: <?php echo $foregroundColor; ?>;
            background: <?php echo $backgroundColor; ?>;
            border-width: <?php echo $borderWidth; ?>px;
            border-style: <?php echo $borderStyle; ?>;
            border-color: <?php echo $borderColor; ?>;
        }


    </style>
</head>
<body>

<div>
    <div id="myTextDiv">
        <p>
            <?php echo $myText; ?>
        </p>
    </div>

    <div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="myText">Enter your text:</label>
            <textarea name="myText" id="myText" cols="60" rows="3"><?php echo $myText; ?></textarea>

            <label for="foregroundColor">Text foreground color:</label>
            <div class="colorPicker">
                <input name="foregroundColor" id="foregroundColor" value="<?php echo $foregroundColor; ?>">
                <script>
                    $("#foregroundColor").spectrum({
                        color: "<?php echo $foregroundColor; ?>",
                        preferredFormat: "hex"
                    });
                </script>
            </div>

            <label for="backgroundColor">Text background color:</label>
            <div class="colorPicker">
                <input name="backgroundColor" id="backgroundColor" class="colorPicker" value="<?php echo $backgroundColor; ?>">
                <script>
                    $("#backgroundColor").spectrum({
                        color: "<?php echo $backgroundColor; ?>",
                        preferredFormat: "hex",
                        allowEmpty: true

                    });
                </script>
            </div>

            <label for="borderWidth">Border width:</label>
            <input name ="borderWidth" id="borderWidth" type="text" value="<?php echo $borderWidth; ?>">

            <label for="borderStyle">Border style:</label>
            <select name="borderStyle" id="borderStyle" ></select>

            <label for="borderColor">Border color:</label>
            <div class="colorPicker">
                <input name="borderColor" id="borderColor" value="<?php echo $borderColor; ?>">
                <script>
                    $("#borderColor").spectrum({
                        color: "<?php echo $borderColor; ?>",
                        preferredFormat: "hex",
                        allowEmpty: true
                    });
                </script>
            </div>

            <input type="submit" value="Change" style="margin-top: 20px">

        </form>
    </div>
</div>
</body>
</html>