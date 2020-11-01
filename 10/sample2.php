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

?>