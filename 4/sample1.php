<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <title>ページタイトル</title>
    </head>
    <body>
<?php
    $a='<p>red</p>';
    $b='Can\'t';
    $c='it is $a';
    $d="it is $a";
    $e="it is \$a";
    $f='it is '.$a;
    $g=  $a.$b ;
    $h= '$a.$b';
    $i= "$a.$b";
    $j='\\';
    $k="a=\"hogehoge\"";
    $l="hogehoge='$a';";
    $m='hogehoge="$a";';
    $n='hogehoge='.';';
    $o="\".".".\"";
    $p="hogehoge='.';";
    $q='hogehoge=\'.\';';
    $r= <<< EOT
    <p> hogehoge </p>
    $a
    <p> hogehoge </p>
    EOT;
?>
        <p> $a は 「<?php echo $a ?>」です。 </p>
        <p> $b は 「<?php echo $b ?>」です。 </p>
        <p> $c は 「<?php echo $c ?>」です。 </p>
        <p> $d は 「<?php echo $d ?>」です。 </p>
        <p> $e は 「<?php echo $e ?>」です。 </p>
        <p> $f は 「<?php echo $f ?>」です。 </p>
        <p> $g は 「<?php echo $g ?>」です。 </p>
        <p> $h は 「<?php echo $h ?>」です。 </p>
        <p> $i は 「<?php echo $i ?>」です。 </p>
        <p> $j は 「<?php echo $j ?>」です。 </p>
        <p> $k は 「<?php echo $k ?>」です。 </p>
        <p> $l は 「<?php echo $l ?>」です。 </p>
        <p> $m は 「<?php echo $m ?>」です。 </p>
        <p> $n は 「<?php echo $n ?>」です。 </p>
        <p> $o は 「<?php echo $o ?>」です。 </p>
        <p> $p は 「<?php echo $p ?>」です。 </p>
        <p> $q は 「<?php echo $q ?>」です。 </p>
        <p> $r は 「<?php echo $r ?>」です。 </p>
    </body>
</html>