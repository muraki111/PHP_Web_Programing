<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
<?php
$n=$_GET['n'];
$name=$_GET['name'];
for($i=0;$i<$n;$i++)
{
    echo "<p> Hello $name san !</p>";
}
?>
    </body>
</html>