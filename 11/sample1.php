<?php
$passlist=array( 'hogehoge' => 'hogepass', 'hoge2' => 'hoge2pass');

if(!isset($_POST['user']))
{
    echo_auth_page("ログイン");
    exit;
}
$user=$_POST['user'];
$pass=$_POST['pass'];

if( (!isset($passlist[$user])) || $passlist[$user] != $pass)
{
    echo_auth_page("パスワードが違います");
    exit;
}

if (isset($_POST['mypage']))
{
    echo_mypage_page($user);
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
        <title>ページタイトル</title>
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
global $user ,$pass;
echo <<<EOT
こんにちは $who さん
<form method="POST" action="sample1.php">
        <button type="submit" name="mypage" value="mypage">マイページ</button>
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
</form>
EOT;
}
function echo_mypage_page($who)
{
    global $user , $pass;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>ページタイトル</title>
        </head>
        <body>
    $who さんのマイページ
    <form method="POST" action="sample1.php">
        <button type="submit" name="mypage" value="mypage">ログアウト</button>
        </body>
    </html>
EOT;
}
?>