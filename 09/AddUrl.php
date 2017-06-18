<?php
//入力チェック(受信確認処理追加)
if(
    !isset($_POST["url"]) || $_POST["url"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$url   = $_POST["url"];
$id   = $_POST["id"];
//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_08_user_url_table(user_id, url)VALUES( :id, :url)");
$stmt->bindValue(':id', $id);
$stmt->bindValue(':url', $url);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: main.php?id=".$id);
  exit;
}
?>
