<?php

//1.POSTでParamを取得
$id = $_GET["id"];

//2.DB接続など
try {
    $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.DELETE FROM gs_an_table SET ....; で更新(bindValue)
$stmt = $pdo->prepare("DELETE FROM gs_08_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    //５．index.phpへリダイレクト
    header("Location: administrator.php");
    exit;
}
?>