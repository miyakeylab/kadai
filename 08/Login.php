<?php

require_once "functions.php";

//入力チェック(受信確認処理追加)
if(
    (!isset($_POST["email"]) || $_POST["email"]=="")
    ||(!isset($_POST["password"]) || $_POST["password"]=="")
){
  exit('ParamError');
}

//1. POSTデータ取得
$email = $_POST["email"];
$password=   $_POST["password"];

$result = DbInit('gs_db48','utf8','localhost','root','');

if($result ==true)
{
    $sql ="SELECT * FROM gs_08_user_table WHERE user_name =  :email AND user_pass =  :password";
    $id=  DbAccessSql_select_Getid($sql,$email,$password);
    
  //５．index.phpへリダイレクト
  header("Location: main.php?id=".$id);
  exit;
}
else
{
    exit("DBError");
}

?>