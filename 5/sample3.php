<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>


<?php
if(isset($_GET['n1'])){
   $n1=$_GET['n1'];
}else{
   $n1=1;
}
if(isset($_GET['name1'])){
   $name1=$_GET['name1'];
}else{
   $name1="りんご";
}

    echo "<p> $name1 : $n1</p>";

echo '<a href="http://127.0.0.1:10800/~sspuser/5/sample3.php?n1='. ($n1+1) . '&name1=' . $name1 . '">リンゴを1個追加</a> ';
?>
        <a href="http://127.0.0.1:10800/~sspuser/5/sample3.php">戻る</a>


    </body>
</html>