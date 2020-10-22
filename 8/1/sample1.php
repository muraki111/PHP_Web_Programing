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

$dbname = 'kadai8kadai';
$tablename = 'kadai8kadaitb';

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

$result = mysqli_query($link,"CREATE DATABASE kadai8kadai CHARACTER SET utf8");
if(!$result) { echo "Create database kadai8kadai failed!\n"; }

$result = mysqli_query($link,"USE kadai8kadai");
if(!$result) { exit("USE failed!"); }

$result = mysqli_query($link,"CREATE TABLE kadai8kadaitb(day DATETIME, price INT(11), deposit BLOB,withdraw BLOB) CHARACTER SET utf8");
if(!$result) { echo "Create database kadai8kadaitb failed!\n"; }

$result = mysqli_query($link,"INSERT INTO kadai8kadaitb (day,price,deposit,withdraw) VALUES('1999-11-18 23:59:24',2500,'YES','NO') ,('2000-03-04 15:16:17',90000,'NO','YES') ,('2000-05-06 17:28:32', 12000,'NO','YES') ,('2000-05-06 17:28:32', 12000,'NO','YES')");
if(!$result){ exit("INSERT error!"); }

echo "Create db and table and update succeeded!\n";

mysqli_close($link);
?>
</body>
</html>
