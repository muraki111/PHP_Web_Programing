<!DOCTYPE html>
<html>
<?php
    $box[0]="apple";
    $box[1]="orange";
    $box[2]="pinapple";
    $box[3]=150;
    $box[4]=120;
    $box[5]=300;
?>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <p>
<?php
    echo '$box[0] は「'.$box[0].'」です<br>';
    echo '$box[1] は「'.$box[1].'」です<br>';
    echo "\$box[2] は「 {$box[2]} 」です<br>";
    echo '$box[3] は「'.$box[3].'」です';
?>
    </p>
    </body>
</html>