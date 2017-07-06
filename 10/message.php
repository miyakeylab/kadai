<?php
require_once("functions.php");
$message = $_POST["message"];

$pdo = db_con();

$stmt = $pdo->prepare("INSERT INTO gs_09_message_table(message_id,send_time,user_id,read_flg)
VALUES( :message, sysdate(), '0','0')");
$stmt->bindValue(':message', $message, PDO::PARAM_INT);
$status = $stmt->execute();
//５．index.phpへリダイレクト
header("Location: administrator.php");
exit;
?>