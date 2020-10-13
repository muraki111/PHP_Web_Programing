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


<?php
if(isset($_GET['n2'])){
   $n2=$_GET['n2'];
}else{
   $n2=1;
}
if(isset($_GET['name2'])){
   $name2=$_GET['name2'];
}else{
   $name2="バナナ";
}

    echo "<p> $name2 : $n2</p>";

echo '<a href="http://127.0.0.1:10800/~sspuser/5/sample3.php?n2='. ($n2+1) . '&name2=' . $name2 . '">リンゴを1個追加</a> ';
?>
        <a href="http://127.0.0.1:10800/~sspuser/5/sample3.php">戻る</a>

<?php


if(isset($_GET['n3'])){
   $n3=$_GET['n3'];
}else{
   $n3=1;
}
if(isset($_GET['name3'])){
   $name3=$_GET['name3'];
}else{
   $name3="パイナップル";
}

    echo "<p> $name3 : $n3</p>";

echo '<a href="http://127.0.0.1:10800/~sspuser/5/sample3.php?n3='. ($n3+1) . '&name3=' . $name3 . '">リンゴを1個追加</a> ';
?>
        <a href="http://127.0.0.1:10800/~sspuser/5/sample3.php">戻る</a>


    </body>
</html>