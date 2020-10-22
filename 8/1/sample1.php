<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>8-1</title>
    </head>
    <body>
<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';

$dbname = 'kadai8-1';
$tablename = 'kadai8tb-1';

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

$result = mysqli_query($link,"CREATE DATABASE $dbname CHARACTER SET utf8");
if(!$result) { echo "Create database $dbname failed!\n"; }

$result = mysqli_query($link,"USE $dbname");
if(!$result) { exit("USE failed!"); }

$result = mysqli_query($link,"INSERT datetime day=19991118235924, int price=2500, blob deposit='YES', blob withdraw='NO'");
if(! $result){ exit("INSERT error!"); }
$result = mysqli_query($link,"INSERT datetime day=20000304151617, int price=90000, blob deposit='NO', blob withdraw='YES'");
if(! $result){ exit("INSERT error!"); }
$result = mysqli_query($link,"INSERT datetime day=20000506172832, int price=12000, blob deposit='NO', blob withdraw='YES'");
if(! $result){ exit("INSERT error!"); }
$result = mysqli_query($link,"INSERT datetime day=20011118192523, int price=100000, blob deposit='YES', blob withdraw='NO'");
if(! $result){ exit("INSERT error!"); }

echo "Create db and table and update succeeded!\n";

mysqli_close($link);
?>
 </body>
</html>
