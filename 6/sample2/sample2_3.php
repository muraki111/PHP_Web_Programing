<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>なんちゃって掲示板システム</title>
    </head>
    <body>
        <h1 align="center"> なんちゃって掲示板 </h1>
        <h2 align="center">入力内容は</h2>
        <table border="1" align="center">
            <?php
                $a=$_POST['Txt'];
                echo "<td>";
                echo htmlspecialchars($a) . '<br>';
                echo "</td>";
            ?>
        </table>
        <form method="post" action="sample1_1.php">
        <button type="submit" name="Btn3" value="Btn3"style="width:100%;height:50px">投稿する</button>
        </form>
    </body>
</html>