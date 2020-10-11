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
    </body>
</html>