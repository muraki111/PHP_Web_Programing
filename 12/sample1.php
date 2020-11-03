<?php
$passlist=array( 'g1872000' => 'g1872000', 'hoge2' => 'hoge2pass');

if(!isset($_POST['user']))
{
    echo_auth_page("");
    exit;
}
$user=$_POST['user'];
$pass=$_POST['pass'];

if( (!isset($passlist[$user])) || $passlist[$user] != $pass)
{
    echo_auth_page("IDまたはパスワードに誤りがあります");
    exit;
}

echo_hello_page($user);


////////////////////////////////////////////////////////////////////////
function echo_auth_page($msg)
{
echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>東京都市大学　出席管理システム</title>
    </head>
    <body>
    <h1 align="left"> 東京都市大学 </h1>
    出席確認システム
    <hr>
    <br>
    <form method="POST" action="sample1.php">
        <input type="text" name="user" value=""style="width:141px;height:25px"placeholder="ユーザーID"><br><br>
        <input type="password" name="pass" value=""style="width:141px;height:25px"placeholder="パスワード"><br><br>
        $msg<br>
        <button type="submit" name="login" value="login"style="width:170px;height:25px">出席</button><br><br>
    </form>
    <a href="https://www.itc.tcu.ac.jp/campaign/howtounlock.html">ログインができなくなった方</a>

    </body>
</html>
EOT;
}
////////////////////////////////////////////////////////////////////////
function echo_hello_page($who)
{
echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
$who
<hr>
現在時間に該当する時限が取得できませんでした。再度ログイン画面より操作して下さい。
    </body>
</html>
EOT;
}
?>