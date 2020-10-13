<!DOCTYPE html>
<html>
<?php
    $price['apple'] = 150;
    $price['orange'] = 120;
    $price['pinapple'] = 300;
?>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <p>
<?php
    foreach($price as $a => $b)
    {
        echo "$a : $b <br>";
    }
?>
    </p>
    </body>
</html>