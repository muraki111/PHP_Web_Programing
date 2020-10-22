<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>8-2-3</title>
    </head>
    <body>
    <?php
        $a=$_POST["a[0]"];
        $b=$_POST["a[1]"];
        $c=$_POST["a[2]"];
        $d=$_POST["a[3]"];
        $hostname = '127.0.0.1';
        $username = 'root';
        $password = 'dbpass';
        $dbname = 'kadai7';
        $tablename = 'kadai7tb';
        $link = mysqli_connect($hostname,$username,$password);
       if(! $link){ exit("Connect error!"); }
       $result = mysqli_query($link,"USE $dbname");
       if(!$result) { exit("USE failed!"); }
       $result = mysqli_query($link,"INSERT INTO $tablename SET day=$a, price=$b, deposit=$c,withdraw=$d");
       if(! $result){ exit("INSERT error!"); }
       echo "Create db and table and update succeeded!\n";
       mysqli_close($link);
       ?>

        <?php
    $dbname = 'kadai7';
    $tablename = 'kadai7tb';

    $link = mysqli_connect('127.0.0.1','root','dbpass',$dbname);
    if(! $link){ exit("Connect error!"); }
    echo "<pre>";
    echo "============================================================\n";
    echo "[Contents of Table]\n";

    $result = mysqli_query($link,"select * from $tablename");
    if(!$result){ exit("Select error on table ($tablename)!"); } 

    $ary_of_fieldinfo = mysqli_fetch_fields($result);

    $record_no = 1;
    while($row = mysqli_fetch_row($result))
    {
        echo "RECORD NO = $record_no\n";
        $record_no++;
        foreach($row as $key => $value)
        {
            echo '    '
                  . htmlspecialchars($ary_of_fieldinfo[$key]->name) . "  : ";
            echo htmlspecialchars($value) . "\n";
        }
    }
    echo "(Total " . ($record_no-1) . " records)\n";

    mysqli_free_result($result);

    mysqli_close($link);

    echo "</pre>";    
    ?>
    </body>
</html>