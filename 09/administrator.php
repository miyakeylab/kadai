<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db48;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_08_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .= $result["name"]."[".$result["indate"]."]<br>";
      
      $view .= '<p>';
      $view .= '<a href="detail.php?id='. $result["id"].'">';
      $view .= $result["user_name"].'['.$result["reg_time"] ."]";
      $view .= '</a>';
      $view .= '<a href="delete.php?id='.$result["id"].'">';
      $view .=  "[削除]";
      $view .= '</a>';
      $view .= '</p>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Administrator</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body>
        <div class="container">
            <h1>ユーザー一覧</h1>
            <div>
                <div class="container jumbotron"><?=$view?></div>
            </div>
        </div>
    </body>
    <footer> <p><a href="index.php">loginへ戻る</a></p></footer>

</html>