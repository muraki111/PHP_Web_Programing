<?php
date_default_timezone_set('Asia/Tokyo');//時間帯(タイムゾーン)
$passlist=array( 'g1872000' => 'g1872000', 'g1872001' => 'g1872001', 'teacher' => 'teacher');//ユーザ名・パスワード
$date_now = date('Y-m-d');	// 現在のの年月日
$time_now = date('H:i:s');	// 現在の時分秒

$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';
$dbname = 'sample12_db';
$StuNum = 10;//生徒の数(テーブル数)
for($i = 0; $i < $StuNum; $i++){//テーブルの名前
    $str = sprintf("%03d",$i + 1);
    $tablename[$i] = 'g1872'.$str;
}

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

$result = mysqli_query($link,"USE $dbname");
if(!$result) {//データベース初期生成
    $result = mysqli_query($link,"CREATE DATABASE $dbname CHARACTER SET utf8");//データベース生成
    $result = mysqli_query($link,"USE $dbname");//データベース指定
    for($i = 0; $i < $StuNum; $i++){//生徒の数分テーブルを作成する
        $result = mysqli_query(//テーブル生成
            $link,"CREATE TABLE if not exists $tablename[$i] (
                id INT NOT NULL AUTO_INCREMENT,
                Mth int,
                Sci int,
                Sct int,
                Msc int,
                Art int,
                PE int,
                PRIMARY KEY(id)
            ) CHARACTER SET utf8"
        );
        for ($j = 1; $j <= 12; $j++) {
            $result = mysqli_query(
                $link,"INSERT into $tablename[$i](Mth,Sci,Sct,Msc,Art,PE) values(0,0,0,0,0,0)"
            );
            if(!$result) { echo "update table $tablename[$i] failed!\n"; echo "<br />";}
        }
    }
}

//1限:0 2限:1 3限:2 4限:3 5限:4
$Subject =[//時限の開始・終了格納
    [0,'9:30:00','Start'],//1限開始
    [1,'11:00:00','End'],//1限終了
    [2,'11:10:00','Start'],//2限開始
    [3,'12:40:00','End'],//2限終了
    [4,'13:30:00','Start'],//3限開始
    [5,'15:00:00','End'],//3限終了
    [6,'15:10:00','Start'],//4限開始
    [7,'16:40:00','End'],//4限終了
    [8,'16:50:00','Start'],//5限開始
    [9,'18:20:00','End'],//5限終了
];

if(!isset($_POST['user'])){//「ログイン画面」に遷移
    echo_login_page("");//ログイン画面
    exit;
}
$user=$_POST['user'];//ユーザ名
$pass=$_POST['pass'];//パスワード
if(isset($_POST['selected'])){//「教科，出席番号選択後画面」に遷移
    $SelectSubject=$_POST['SelectSubject'];
    $SelectNo=$_POST['SelectNo'];
    if(($SelectSubject == "x") || ($SelectNo== "x")){
        echo_select_page($user,"エラーです");
        exit;
    }
    echo_selected_page($user,$SelectSubject,$SelectNo);
    exit;
}
if(isset($_POST['confirm'])){
    $SelectSubject=$_POST['SelectSubject'];
    echo_confim_page($user,$SelectSubject);
    exit;
}
if( (!isset($passlist[$user])) || $passlist[$user] != $pass){//ユーザ名・パスワードの誤り時に「ログイン画面」に再帰
    echo_login_page("IDまたはパスワードに誤りがあります");//「ログイン画面」に再帰
    exit;
}
for($i = 0; $i<=9; $i+=2){//5限分の繰り返しでifの条件判定
    if($user=="teacher"){
        echo_SelectToConfirm_page($user);
        exit;
    }elseif((strtotime($time_now) >= strtotime($Subject[$i][1])) && (strtotime($time_now) <= strtotime($Subject[$i+1][1]))){//授業時間内の場合「教科，出席番号選択画面」に遷移
        echo_select_page($user,"");//授業時間内かつ，ユーザ名・パスワードが正しい場合「教科，出席番号選択画面」に遷移
        exit;
    }elseif((strtotime($time_now) >= strtotime($Subject[$i+1][1])) && (strtotime($time_now) <= strtotime($Subject[$i+2][1]))){//授業時間外の場合「授業時間外画面」に遷移
        echo_exit_page($user);//授業時間外画面
        exit;
    }elseif((strtotime($Subject[0][1]) <= strtotime($Subject[9][1]))){
        echo_exit_page($user);//授業時間外画面
        exit;
    }
}
mysqli_close($link);

function echo_login_page($msg){//ログイン画面
    global $date_now,$time_now;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
        <img src="tcu_logo.gif" alt="" border="0">
        <br>
        出席確認システム
        <hr color="#737373">
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
function echo_select_page($who,$msg){//教科，出席番号選択画面
    global $user ,$pass;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            <img src="tcu_logo.gif" alt="" border="0">
            <br>
            $who
            <hr color="#737373">
            授業科目を確認<br>
            <form method="POST" action="sample1.php" name="Subject">
                <select name="SelectSubject" size="8" style="width: 188.333px">
                    <option value="x" selected="">▽選択して下さい。</option>
                    <option value="Mth">数学</option>
                    <option value="Sci">理科</option>
                    <option value="Sct">社会</option>
                    <option value="Msc">音楽</option>
                    <option value="Art">美術</option>
                    <option value="PE">体育</option>
                </select>
            <br>
            <font class="notice"style="color:#0000FF;">※出席登録ボタンをクリックする前に、授業科目を選択してください。</font>
            <br>
            <br>
            教員が指示した番号を選択
            <br>
                <select name="SelectNo" size="3">
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
            <font class="notice"style="color:#ff0000;">$msg</font>
            <br>
                <button type="submit" name="selected" value="selected"style="width:170px;height:25px;color:#ffffff;background-color:#01A9DB;border-color:#01A9DB">出席登録</button>
                <input type="hidden" name="user" value="$user">
                <input type="hidden" name="pass" value="$pass">
            </form>
            <br>
            <br>
            ※教員の指示があるまで出席登録をクリックしないこと
        </body>
    </html>
EOT;
}
function echo_exit_page($who){//授業時間外画面
    global $time_now,$Subject;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            $who
            <hr color="#737373">
            現在時間に該当する時限が取得できませんでした。再度ログイン画面より操作して下さい。
            <br>
        </body>
    </html>
EOT;
}
function echo_selected_page($who,$Subject,$No){//教科，出席番号選択後画面
    global $user ,$pass ,$link;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            <img src="tcu_logo.gif" alt="" border="0">
            $who
            <hr color="#737373">
            出席を受け付けました。
            <br>
            <br>
            授業科目：
        </body>
    </html>
EOT;
    switch ($Subject){//教科表示
        case 'Mth':
            echo '数学';
            break;
        case 'Sci':
            echo '理科';
            break;
        case 'Sct':
            echo '社会';
            break;
        case 'Msc':
            echo '音楽';
            break;
        case 'Art':
            echo '美術';
            break;
        case 'PE':
            echo '体育';
            break;
    }
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <body>
            <br>
            指示番号：
            $No
        </body>
    </html>
EOT;
$result = mysqli_query($link,"update $user set $Subject = $No where $Subject = 0 limit 1");
}
function echo_SelectToConfirm_page($who){//出席を確認する教科の選択画面
    global $user ,$pass;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            <img src="tcu_logo.gif" alt="" border="0">
            <br>
            $who
            <hr color="#737373">
            出席を確認する授業科目を選択<br>
            <form method="POST" action="sample1.php" name="Subject">
                <select name="SelectSubject" size="8" style="width: 188.333px">
                    <option value="x" selected="">▽選択して下さい。</option>
                    <option value="Mth">数学</option>
                    <option value="Sci">理科</option>
                    <option value="Sct">社会</option>
                    <option value="Msc">音楽</option>
                    <option value="Art">美術</option>
                    <option value="PE">体育</option>
                </select>
            <br>
            <br>
                <button type="submit" name="confirm" value="confirm"style="width:170px;height:25px;color:#ffffff;background-color:#01A9DB;border-color:#01A9DB">出席確認</button>
                <input type="hidden" name="user" value="$user">
                <input type="hidden" name="pass" value="$pass">
            </form>
        </body>
    </html>
EOT;
}
function echo_confim_page($who,$Subject){//教科，選択後画面
    global $user ,$pass ,$link,$tablename;
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8" />
            <title>東京都市大学　出席管理システム</title>
        </head>
        <body>
            <img src="tcu_logo.gif" alt="" border="0">
            $who
            <hr color="#737373">
            <form method="POST" action="sample1.php" name="Subject">
            <select name="SelectSubject" size="8" style="width: 188.333px">
                    <option value="x" selected="">▽選択して下さい。</option>
                    <option value="Mth">数学</option>
                    <option value="Sci">理科</option>
                    <option value="Sct">社会</option>
                    <option value="Msc">音楽</option>
                    <option value="Art">美術</option>
                    <option value="PE">体育</option>
                </select>
                <br>
                <br>
                <button type="submit" name="confirm" value="confirm"style="width:170px;height:25px;color:#ffffff;background-color:#01A9DB;border-color:#01A9DB">表示教科の変更</button>
                <input type="hidden" name="user" value="$user">
                <input type="hidden" name="pass" value="$pass">
                <input type="hidden" name="confirm">
            </form>
            <br>
            現在確認している教科：
        </body>
    </html>
EOT;
    switch ($Subject){//教科表示
        case 'Mth':
            echo '数学';
            break;
        case 'Sci':
            echo '理科';
            break;
        case 'Sct':
            echo '社会';
            break;
        case 'Msc':
            echo '音楽';
            break;
        case 'Art':
            echo '美術';
            break;
        case 'PE':
            echo '体育';
            break;
    }
echo "<br />";
//select a.Mth, b.Mth from g1872001 a, g1872002 b where a.id = b.id order by a.id;
}
?>