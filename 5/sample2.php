<!DOCTYPE html>
<html>
<?php
    $a[0]['date']='2010/4/1';
    $a[0]['temperature']=20.3;
    $a[0]['pressure']=980;
    $a[0]['humidity']=60;

    $a[1]['date']='2010/4/2';
    $a[1]['temperature']=22.3;
    $a[1]['pressure']=970;
    $a[1]['humidity']=50;

    $a[2]['date']='2010/4/4';
    $a[2]['temperature']=18.3;
    $a[2]['pressure']=950;
    $a[2]['humidity']=70;
?>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <p>
<?php
    foreach ($a as $key => $b) {
        foreach ($a[$key] as $key => $b) {
        echo "$key : $b <br>";
        }
    }
?>
    </p>
    </body>
</html>