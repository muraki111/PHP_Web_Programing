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

$dbname = 'sample8_db';
$tablename = 'sample8_1';

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

$result = mysqli_query($link,"CREATE DATABASE sample8_db CHARACTER SET utf8");
if(!$result) { echo "Create database sample8_db failed!\n"; }

$result = mysqli_query($link,"USE sample8_db");
if(!$result) { exit("USE failed!"); }

$result = mysqli_query($link,"CREATE TABLE sample8_1(Name INT, Day DATE, price INT, Weight INT) CHARACTER SET utf8");
if(!$result) { echo "Create database sample8_db failed!\n"; }

$result = mysqli_query($link,"INSERT INTO sample8_1 (Name,Day,Price,Weight) VALUES(3,'2020-10-01',210,15) ,(3,'2020-10-01',210,15) ,(4,'2020-10-01',110,10) ,(5,'2020-10-01',500,20),(4,'2020-10-01',110,10)");
if(!$result){ exit("INSERT error!"); }

echo "Create db and table and update succeeded!\n";

mysqli_close($link);
?>
</body>
</html>