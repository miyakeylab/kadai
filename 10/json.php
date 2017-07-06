<?php
require_once "functions.php";

header('Content-Type: application/json; charset=UTF-8');
////Ajax通信ではなく、直接URLを叩かれた場合はエラーメッセージを表示
if (
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
    && (!empty($_SERVER['SCRIPT_FILENAME']) && 'json.php' === basename($_SERVER['SCRIPT_FILENAME']))
) 
{

    die ('このページは直接ロードしないでください。');
}

try
{
    //nullで初期化
    $users = null;
    $result = DbInit();
    $sql = "SELECT * from gs_09_message_table WHERE read_flg = 0";
    $stmt = DbAccessMessageObject($sql);

//    //取得したデータを配列に格納
    while ($row = $stmt->fetchObject())
    {
        $users[] = array(
            'id'=> $row->id
            ,'message_id' => $row->message_id
            ,'send_time' => $row->send_time
        );
        $update = "UPDATE gs_09_message_table SET read_flg = 1 WHERE id = :id";
        DbAccessMessageObject_update($update,$row->id);
    }

    echo json_encode( $users );
    exit;
}
catch (PDOException $e)
{
    //例外処理
    die('Error:' . $e->getMessage());

}