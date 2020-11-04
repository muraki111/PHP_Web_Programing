<?php
date_default_timezone_set('Asia/Tokyo');
$passlist=array( 'g1872000' => 'g1872000', 'g1872001' => 'g1872001');
$date_now = date('Y-m-d');	// 年月日
$time_now = date('H:i:s');	// 時分秒

$time_1_start = '9:30:00';//1限開始
$time_1_end = '11:00:00';//1限終了
$time_2_start = '11:10:00';//2限開始
$time_2_end = '12:40:00';//2限終了
$time_3_start = '13:30:00';//3限開始
$time_3_end = '15:00:00';//3限終了
$time_4_start = '15:10:00';//4限開始
$time_4_end = '16:40:00';//4限終了
$time_5_start = '16:50:00';//5限開始
$time_5_end = '18:20:00';//5限終了

if(!isset($_POST['user'])){//ログイン画面
    echo_main_page("");
    exit;
}elseif(isset($_POST['exit'])){//授業時間外画面

}
$user=$_POST['user'];//ユーザ名
$pass=$_POST['pass'];//パスワード

if( (!isset($passlist[$user])) || $passlist[$user] != $pass){//ログイン画面
    echo_main_page("IDまたはパスワードに誤りがあります");
    exit;
}

echo_select_page($user);//教科，出席番号選択画面

function echo_main_page($msg){//ログイン画面
    global $date_now,$time_now;
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
            <input type="text" name="user" value=""style="width:141px;height:19px"placeholder="ユーザーID"><br><br>
            <input type="password" name="pass" value=""style="width:141px;height:19px"placeholder="パスワード"><br><br>
            <font class="notice"style="color:#ff0000;">$msg</font>
            <br>
            <button type="submit" name="login" value="login"style="width:170px;height:25px;color:#ffffff;background-color:#01A9DB;border-color:#01A9DB">出席</button>
            <br>
            <br>
        </form>
        <a href="https://www.itc.tcu.ac.jp/campaign/howtounlock.html">ログインができなくなった方</a>
        </body>
    </html>
EOT;
}
function echo_select_page($who){//教科，出席番号選択画面
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            <h1 align="left" style="display:inline;"> 東京都市大学 </h1>
            $who
            <hr>
            授業科目を確認<br>
            <select name="SelectSubject" size="8" style="width: 188.333px">
                <option value="x" selected="">▽選択して下さい。</option>
                <option value="">数学</option>
                <option value="">理科</option>
                <option value="">社会</option>
                <option value="">音楽</option>
                <option value="">美術</option>
                <option value="">体育</option>
            </select>
            <br>
            <font class="notice"style="color:#0000FF;">※出席登録ボタンをクリックする前に、授業科目を選択してください。</font>
            <br>
            <br>
            教員が指示した番号を選択
            <br>
            <select name="InpNo" size="3">
                <option value="x" selected="">▽選択して下さい。</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
            <br>
            <br>
            教員の指示に従って出席登録をクリック
            <br>
            <font class="alert" style="color:#ff0000;">授業科目と教員番号を選択して下さい。</font>
            <br>
            <button type="submit" name="login" value="login"style="width:170px;height:25px;color:#ffffff;background-color:#01A9DB;border-color:#01A9DB">出席登録</button>
            <br>
            <br>
            ※教員の指示があるまで出席登録をクリックしないこと
        </body>
    </html>
EOT;
}
function echo_exit_page($who){//授業時間外画面
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
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