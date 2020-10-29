<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>なんちゃって掲示板システム</title>
    </head>
    <body>
        <h1 align="center"> なんちゃって掲示板 </h1>
        <form method="post" action="sample2_2.php">
        <button type="submit" name="Btn1" value="Btn1"style="width:100%;height:50px">新規投稿</button>
        </form>
        <?php
            $dbname = 'sample9_db';
            $tablename = 'sample9_1';

            $link = mysqli_connect('127.0.0.1','root','dbpass',$dbname);
            if(! $link){ exit("Connect error!"); }
            echo "<pre>";

            $result = mysqli_query($link,"select * from $tablename");
            if(!$result){ exit("Select error on table ($tablename)!"); }

            $ary_of_fieldinfo = mysqli_fetch_fields($result);

            $record_no = 1;
            while($row = mysqli_fetch_row($result))
            {
                $record_no++;
                foreach($row as $key => $value)
                {
                    echo '    '
                        . htmlspecialchars($ary_of_fieldinfo[$key]->name) . "  : ";
                    echo htmlspecialchars($value) . "\n";

                }
                echo "============================================================\n";
            }

            mysqli_free_result($result);

            mysqli_close($link);

            echo "</pre>";

        ?>

    </body>
</html>