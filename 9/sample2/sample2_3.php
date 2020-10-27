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
        <form method="post" action="sample2_1.php">
            <button type="submit" name="Btn4" value="Btn4"style="width:100%;height:50px">投稿する</button>
        </form>
        <form method="post" action="sample2_2.php">
            <button type="submit" name="Btn5" value="Btn5"style="width:100%;height:50px">修正する</button>
            <input type="hidden" name="Txt" value="<?php echo $a; ?>">
        </form>
    </body>
</html>