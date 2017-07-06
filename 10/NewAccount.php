<?php

require_once "functions.php";
require_once "commonData.php";

//入力チェック(受信確認処理追加)
if(
    (!isset($_POST["id"]) || $_POST["id"]=="")
    ||(!isset($_POST["password"]) || $_POST["password"]=="")
){
  exit('ParamError');
}

//1. POSTデータ取得
$id = $_POST["id"];
$password=   $_POST["password"];
//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}
// パスワード変換
$pas_hash = password_hash($password, PASSWORD_DEFAULT);

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_08_user_table(user_name, user_pass,reg_time)VALUES( :email, :password,sysdate())");
$stmt->bindValue(':email', $id);
$stmt->bindValue(':password', $pas_hash);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
    $result = DbInit();
    if($result ==true)
    {
        $sql =\Common\DEF_LOGIN_SQL;
        $id=  DbAccessSql_select_Getid($sql,$email,$password);
        if($id != "")
        {
            $_SESSION["chk_ssid"]  = session_id();
            $_SESSION["id"] = $id;
          //５．index.phpへリダイレクト
          header("Location: main.php");
          exit;
        }
        else
        {
            header("Location: index.php");
            exit;
        }
    }
    else
    {
        header("Location: index.php");
        exit;
    }
}
?>
