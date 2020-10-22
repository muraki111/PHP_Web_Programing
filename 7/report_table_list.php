<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <!-- vim: set sts sw=4 expandtab : -->
        <title>ページタイトル</title>
    </head>
    <body>
<?php
if((!isset($_POST['dbname']))||(!isset($_POST['tablename'])))
{
    echo <<<EOT
       <p>This script is NOT SECURE! Don't use this on your public servers!</p>
       <hr>
       <p>Input DATABASE NAME and TABLE NAME!</p>
       <form method="post" action="report_table_list.php">
            DATABASE NAME:  <input type="text" name="dbname" value="">
            <br>
            TABLE NAME: <input type="text" name="tablename" value="">
            <br>
            <button type="submit" name="Btn1" value="Btn1">Report</button>
        </form>
    
EOT;
}
else
{
    $dbname=$_POST['dbname'];
    $tablename=$_POST['tablename'];

    $link = mysqli_connect('127.0.0.1','root','dbpass');
    if(! $link){ exit("Connect error!"); }

    $result=mysqli_query($link,"use $dbname");
    if(!$result){ exit("Can't use database ($dbname)!"); } 


    echo "<pre>";
    // echo Env
    echo "This script is NOT SECURE! Don't use on your public servers!\n";
    echo "============================================================\n";
    echo "[Basic Info]\n";
    echo "database name: $dbname\n";
    echo "table name: $tablename\n";
    echo "============================================================\n";
    echo "[Fields Info]\n";

    $result=mysqli_query($link,"show columns from $tablename");
    if(!$result){ exit("Error on table ($tablename)!"); } 

    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    while($row = mysqli_fetch_row($result))
    {
        foreach($row as $key => $value)
        {
            echo ($key==0? '' : '    ')
                  .htmlspecialchars($ary_of_fieldinfo[$key]->name)."  : ";
            echo htmlspecialchars($value) . "\n";
        }
    }
    mysqli_free_result($result);

    echo "============================================================\n";
    echo "[Contents of Table]\n";

    $result=mysqli_query($link,"select * from $tablename");
    if(!$result){ exit("Select error on table ($tablename)!"); } 

    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    $record_no=1;
    while($row = mysqli_fetch_row($result))
    {
        echo "RECORD NO = $record_no\n";
        $record_no++;
        foreach($row as $key => $value)
        {
            echo '    '
                  .htmlspecialchars($ary_of_fieldinfo[$key]->name)."  : ";
            echo htmlspecialchars($value) . "\n";
        }
    }
    echo "(Total ".($record_no-1)." records)\n";

    mysqli_free_result($result);

    mysqli_close($link);

    echo "============================================================\n";

    echo "</pre>";
}
?>
    </body>
</html>

