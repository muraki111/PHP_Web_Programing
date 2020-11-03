<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "dbpass";
$dbname = "sample10_db";
$tablename = "sample10";

if ($_POST['transition'] == "trans_input_new")
{
    //trans_input_new遷移処理、page_input表示処理
    echo_page_input();
}
elseif ($_POST['transition'] == "trans_confirm")
{
    //trans_confirm遷移処理、page_confirm表示処理
    echo_page_confirm();
}
elseif ($_POST['transition'] == "trans_submit")
{
    //trans_submit遷移処理、遷移先表示処理
}
elseif ($_POST['transition'] == "trans_return_top")
{
    //trans_return_top遷移処理、page_list表示処理
    echo_page_list();
}
elseif (!isset($_POST['transition']))
{
    // 初期ページ(page_list)表示
    echo_page_list();
}
else
{
    echo "Internal Error!"; // あり得ないエラー
}
function echo_page_list(){
    global $hostname, $username, $password, $dbname, $tablename;

    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>トップページ</title>
    </head>
    <body>
    <h1 align="center"> なんちゃって掲示板 </h1>
EOT;

    $link = mysqli_connect($hostname,$username,$password,$dbname);
    if (! $link){ exit("Connect error!"); }

    $result = mysqli_query($link,"select * from $tablename");
    if (!$result){ exit("Unexpected query error!"); }

    echo '<table border="1">';

    $ary_of_fieldinfo = mysqli_fetch_fields($result);

    foreach($ary_of_fieldinfo as $key => $value)
    {
        echo "<th>" . htmlspecialchars($value->name) . "</th>";
    }

    while ($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        foreach($row as $key => $value)
        {
            echo "<td>" . htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);

    mysqli_close($link);

    echo <<<EOT
        <form method="post" action="sample2.php">
            <button type="submit" name="button_new" value="button_new">新規入力</button>
            <input type="hidden" name="transition" value="trans_input_new">
        </form>
EOT;
    echo <<<EOT
    </body>
</html>
EOT;
}
function echo_page_input(){
    global $hostname, $username, $password, $dbname, $tablename;
    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>トップページ</title>
    </head>
    <body>
    <h1 align="center"> なんちゃって掲示板 </h1>
EOT;
    echo <<<EOT
    <form method="post" action="sample2.php">
    <textarea name="Txt" rows="5" cols="30" style="width:100%;height:300px">
    </textarea>
    <button type="hidden" name="Btn2" value="Btn2"style="width:100%;height:50px">投稿確認</button>
    <input type="hidden" name="transition" value="trans_confirm">
    </form>
    <form method="post" action="sample2.php">
        <button type="hidden" name="Btn3" value="Btn3"style="width:100%;height:50px">戻る</button>
        <input type="hidden" name="transition" value="trans_return_top">
    </form>
EOT;

}
function echo_page_confirm(){
    global $hostname, $username, $password, $dbname, $tablename;
    echo <<<EOT
    <h1 align="center"> なんちゃって掲示板 </h1>
    <h2 align="center">入力内容は</h2>
    <form method="post" action="sample2.php">
        <button type="hidden" name="Btn3" value="Btn3"style="width:100%;height:50px">戻る</button>
        <input type="hidden" name="transition" value="trans_input_new">
    </form>
EOT;
}
?>
