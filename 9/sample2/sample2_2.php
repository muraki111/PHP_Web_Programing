<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>なんちゃって掲示板システム</title>
    </head>
    <body>
        <h1 align="center"> なんちゃって掲示板 </h1>
        <form method="post" action="sample2_3.php">
            <textarea name="Txt" rows="5" cols="30" style="width:100%;height:300px">
            <?php
                if ( isset( $_POST['Txt'] ) ) {
                    $a=$_POST['Txt'];
                    echo ($a);
                } else {
                }
            ?>
            </textarea>
            <button type="submit" name="Btn2" value="Btn2"style="width:100%;height:50px">投稿確認</button>
        </form>
        <form method="post" action="sample2_1.php">
            <button type="submit" name="Btn3" value="Btn3"style="width:100%;height:50px">戻る</button>
        </form>
    </body>
</html>