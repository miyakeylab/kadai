<?php

$pdo = null;
$logintime = null;
$MyId = 0;
function DbInit($dbname,$charset,$host,$user,$pass)
{
    $rtn = false;
    try {
        global $pdo;
        
        $pdo = new PDO('mysql:dbname='.$dbname.';charset='.$charset.';host='.$host,$user,$pass);
        $rtn = true;
    } catch (PDOException $e) {
        exit('【DB Exception】接続エラー:'.$e->getMessage());
    }
    
    return $rtn;
}

//DB接続関数（PDO）
function db_con(){
    $dbname='gs_db48';
    try {
        $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
        exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
}
/**
 * [[Description]]
 * @param [[Type]] $name   [[Description]]
 * @param [[Type]] $email  [[Description]]
 * @param [[Type]] $naiyou [[Description]]
 */
function DbAccess($name,$email,$naiyou)
{
    global $pdo;
    try
    {
    //３．データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name, email, naiyou,
indate )VALUES(NULL, :name, :email, :naiyou, sysdate())");
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();

    //４．データ登録処理後
    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        queryError($stmt);
    }else{
        //５．index.phpへリダイレクト
        header("Location: index.php");
        exit;
    }
    } catch (PDOException $e) {
        exit('DB Exception:'.$e->getMessage());
    }
}

//SQL処理エラー
function queryError($stmt){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

function DbAccessSql($sql)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();
        $first = true;
        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

            if($first == true)
            {
                $rtn .= "<tr>";
                for($i = 0; $i < $colcount;$i++)
                {
                    $rtn .= "<td>".key(array_slice($result, $i, 1, true))."</td>";
                }
                $first = false;
                $rtn .= "</tr>";
            }
            
            $rtn .= "<tr>";
            
            for($i = 0; $i < $colcount;$i++)
            {
                $rtn .= "<td>".current(array_slice($result, $i, 1, true))."</td>";
            }
            
            $rtn .= "</tr>";
        }
    }
    
    return $rtn;
    
}

function DbAccessSql_select_Getid($sql,$email,$pass)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $pass, PDO::PARAM_STR);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();

        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $rtn = $result["id"];
            break;
        }
    }

    return $rtn;

}


function DbAccessSql_id_username($sql,$id)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();

        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $rtn .= $result["user_name"];
            break;
        }
    }

    return $rtn;

}

function DbAccessSql_id_Addmin($sql,$id)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();

        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $rtn .= $result["kanri_flg"];
            break;
        }
    }

    return $rtn;

}


function DbAccessSql_id_div($sql,$id)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();
        $rtn .= "<div>";
        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            
            $rtn .= createvideotag($result["url"]);

        }
        $rtn .= "</div>";
    }

    return $rtn;

}

function DbAccessSql_GetOtherUser_url($sql,$id)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();

        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($result["id"] != $id)
            {
                $rtn .= "<li>";
                $rtn .= "<a href=main_other.php?id=".$result["id"].">";
                $rtn .= $result["user_name"];
                $rtn .= "</a>";
                $rtn .= "</li>";
            }

        }
    }

    return $rtn;
    
    
}
function DbAccessSql_GetOtherUser_url_nologin($sql)
{
    global $pdo;
    $rtn = "";
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    if($status==false)
    {
        //execute（SQL実行時にエラーがある場合）
        //$error = $stmt->errorInfo();
        //exit("ErrorQuery:".$error[2]);

    }else{
        $colcount = $stmt->columnCount();

        //Selectデータの数だけ自動でループしてくれる
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

            $rtn .= "<li>";
            $rtn .= "<a href=main_other.php?id=".$result["id"].">";
            $rtn .= $result["user_name"];
            $rtn .= "</a>";
            $rtn .= "</li>";
        }
    }

    return $rtn;


}
function DbAccessMessageObject($sql)
{
    global $pdo;
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();
    return $stmt;
}

function DbAccessMessageObject_update($sql,$Id)
{
    global $pdo;
    //２．SQL実行
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $Id, PDO::PARAM_INT);
    $status = $stmt->execute();
    return $stmt;
}

/**
 * youtubeのURLから埋め込みタグを生成する
 *
 * @param   string $param youtubeのURL
 * @return  string        埋め込みタグ
 */
function createvideotag($param)
{
    //URLがyoutubeのURLであるかをチェック
    if(preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
        //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
        $parse_url = parse_url($param);
        // 動画IDを取得
        if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
            $video_id = $v_matches[1];
        } else {
            // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
            return false;
        }
        $v_param = '';
        // パラメータにt=XXmXXsがあった時の埋め込みコード用パラメータ設定
        // t=〜〜の部分を抽出する正規表現は記述を誤るとlist=〜〜の部分を抽出してしまうので注意
        if (preg_match('#t=([0-9ms]+)#i', $parse_url['query'], $t_maches)) {
            $time = 0;
            if (preg_match('#(\d+)m#i', $t_maches[1], $minute)) {
                // iframeでは正の整数のみ有効なのでt=XXmXXsとなっている場合は整形する必要がある。
                $time = $minute[1]*60;
            }
            if (preg_match('#(\d+)s#i', $t_maches[1], $second)) {
                $time = $time+$second[1];
            }
            if (!preg_match('#(\d+)m#i', $t_maches[1]) && !preg_match('#(\d+)s#i', $t_maches[1])) {
                // t=(整数)の場合はそのままの値をセット ※秒数になる
                $time = $t_maches[1];
            }
            $v_param .= '?start=' . $time;
        }
        // パラメータにlist=XXXXがあった時の埋め込みコード用パラメータ設定
        if (preg_match('#list=([-\w]+)#i', $parse_url['query'], $l_maches)) {
            if (!empty($v_param)) {
                // $v_paramが既にセットされていたらそれに続ける
                $v_param .= '&list=' . $l_maches[1];
            } else {
                // $v_paramが既にセットされていなかったら先頭のパラメータとしてセット
                $v_param .= '?list=' . $l_maches[1];
            }
        }
        // 埋め込みコードを返す
        return '<iframe width="300" height="300" src="https://www.youtube.com/embed/' . $video_id . $v_param . '" frameborder="0" allowfullscreen></iframe>';
    }
    // パラメータが不正(youtubeのURLではない)ときは埋め込みコードを生成しない。
    return false;
}

function TimerStrat()
{
    echo "開始 ". date('h:i:s',time()) . "\n";
    for($i=0;$i<3;$i++)
    {
        if($i != 0)
        {
            AboutDelay($start,3); // start から３秒間まで待つ。
        }
        $start = time();
        // なんかの処理をここに記述する。
    }
    echo "終了 ". date('h:i:s',time()) . "\n";
}

function AboutDelay($start_time,$delay)
{
    while(time()-$start_time < $delay)
    {
        sleep(1);
    }
}

function SetLoginTime()
{
    global $logintime;
    $date = new DateTime();
    $logintime=  $date->format('Y-m-d H:i:s');
    
}

function GetLoginTime()
{
    global $logintime;
    
    return $logintime;
}

function SetMyId($id)
{
    global $MyId;
    $MyId = $id;
}

function GetMyId()
{
    global $MyId;

    return $MyId;
}
?>