<?php


//共通で使うものを別ファイルにしておきましょう。
$pdo = null;

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
        $error = $stmt->errorInfo();
        exit("QueryError:".$error[2]);
    }else{
        //５．index.phpへリダイレクト
        header("Location: index.php");
        exit;
    }
    } catch (PDOException $e) {
        exit('DB Exception:'.$e->getMessage());
    }
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



?>