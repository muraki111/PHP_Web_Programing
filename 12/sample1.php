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
$msg
    <form method="POST" action="sample1.php">
        username <input type="text" name="user" value=""><br>
        password <input type="password" name="pass" value=""><br>
        <button type="submit" name="login" value="login">Login</button>
    </form>
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