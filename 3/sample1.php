<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
        <table border=1 style="border-collapse:collapse;">
        <?php
            for($i = 1; $i <= 9; $i++)
            {
                echo"<tr>";
                for($j = 1; $j <= 9; $j++)
                    {
                        echo"<td>";
                        echo "$j*$i";
                        echo"</td>";
                    }
                echo"</tr>";
            }
        ?>
        </table>
    </body>
</html>