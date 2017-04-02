<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PHP massiivid</title>

    <style>

        div {
            border: 1px solid black;
            border-radius: 10px;
            background: #afafaf;
            margin: 12px;
            float: left;
            padding: 12px;
        }

    </style>

</head>
<body>
    <?php

        $raamatud = array(
            array('pealkiri'=>'Kevade', 'autor' =>'Oskar Luts', 'lk'=>333),
            array('pealkiri'=>'Rehepapp', 'autor' =>'Andrus Kivirähk', 'lk'=>222),
            array('pealkiri'=>'Tervise teejuht', 'autor' =>'Bernhard Shaw', 'lk'=>111),
            array('pealkiri'=>'Mees kõrgel lossis', 'autor' =>'Philip K. Dick', 'lk'=>555),
            array('pealkiri'=>'Seitsmes sümfoonia', 'autor' =>'Beethoven', 'lk'=>444),
        );

    foreach ($raamatud as $raamat){
        include 'kiisu_lisa.html';
    }

    ?>
</body>
</html>