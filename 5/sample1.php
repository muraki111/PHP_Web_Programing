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
    echo '$price['.$box[0].'] = '.$box[3].';<br>';
    echo '$price['.$box[1].'] = '.$box[4].';<br>';
    echo '$price['.$box[2].'] = '.$box[5].';<br>';
?>
    </p>
    </body>
</html>