<?php
$passlist=array( 'tcu' => 'tcupass', 'tcu2' => 'tcu2pass');

if(!isset($_POST['user'])){
    echo_auth_page("ログイン");
    exit;
}
$user=$_POST['user'];
$pass=$_POST['pass'];

if( (!isset($passlist[$user])) || $passlist[$user] != $pass){
    echo_auth_page("パスワードが違います");
    exit;
}

echo_hello_page($user);


function echo_auth_page($msg){
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

function echo_hello_page($who){
echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
こんにちは $who さん
    </body>
</html>
EOT;
}
?>