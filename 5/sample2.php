<!DOCTYPE html>
<html>
<?php
    Array
    (
        [0] => Array
            (
                [date] => 2010/4/1
                [temperature] => 20.3
                [pressure] => 980
                [humidity] => 60
            )

        [1] => Array
            (
                [date] => 2010/4/2
                [temperature] => 22.3
                [pressure] => 970
                [humidity] => 50
            )

        [2] => Array
            (
                [date] => 2010/4/1
                [temperature] => 28.3
                [pressure] => 950
                [humidity] => 70
            )

    )
?>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <p>
<?php
    echo "<pre>" . htmlspecialchars(print_r($a,true)) . "</pre>";
?>
    </p>
    </body>
</html>