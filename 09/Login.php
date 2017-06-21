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
$email = $_POST["id"];
$password=   $_POST["password"];

$result = DbInit('gs_db48','utf8','localhost','root','');

if($result ==true)
{
    $sql =\Common\DEF_LOGIN_SQL;
    $id=  DbAccessSql_select_Getid($sql,$email,$password);

    SetMyId($id);
  //５．index.phpへリダイレクト
  header("Location: main.php?id=".$id);
  exit;
}
else
{
    exit("DBError");
}

?>