<?php 

require_once "functions.php";

$master_1="";
$master_2="";
$master_3="";
$master_4="";
$master_5="";
$master_6="";


if($_SERVER["REQUEST_METHOD"] != "POST"){
    // ブラウザからHTMLページを要求された場合
    //1.  DB接続します
    //1.  DB接続します
    $result = DbInit('gs_db48','utf8','localhost','root','');
    if($result == true)
    {
        //２．SQL実行
        $master_1 = DbAccessSql("SELECT * FROM gs_07_user_table");
        $master_2 = DbAccessSql("SELECT * FROM gs_07_book_table");
        $master_3 = DbAccessSql("SELECT * FROM gs_07_book_zaiko_table");
        $master_4 = DbAccessSql("SELECT * FROM gs_07_book_rental_table");
        $master_5 = DbAccessSql("SELECT * FROM gs_07_book_okini_table");
        $master_6 = DbAccessSql("SELECT * FROM gs_07_black_list_table");
    }
    
    
}else{
    // フォームからPOSTによって要求された場合
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
        <title>My SQL Tips</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script>
            $(function() {

                $("#sqlbtn_1").on("click", function() {
                    $("#sqltext_1").val("SELECT * FROM gs_07_user_table");
                });
                $("#sqlcpybtn_1").on("click", function() {
                    var text = document.getElementById("sqltext_1");
                    text.select();
                    document.execCommand("copy");
                });
                
                $("#sqlbtn_2").on("click", function() {
                    $("#sqltext_2").val("SELECT user_name FROM gs_07_user_table WHERE id IN (SELECT user_id FROM gs_07_black_list_table)");
                });
                $("#sqlcpybtn_2").on("click", function() {
                    var text = document.getElementById("sqltext_2");
                    text.select();
                    document.execCommand("copy");
                });
                
                $("#sqlbtn_3").on("click", function() {
                    $("#sqltext_3").val("INSERT INTO gs_07_book_okini_table(user_id,book_id,add_time) VALUES('***', 'b***', sysdate());");
                });
                $("#sqlcpybtn_3").on("click", function() {
                    var text = document.getElementById("sqltext_3");
                    text.select();
                    document.execCommand("copy");
                });

                $("#sqlbtn_4").on("click", function() {
                    $("#sqltext_4").val("DELETE FROM gs_07_book_okini_table WHERE user_id = '***';");
                });
                $("#sqlcpybtn_4").on("click", function() {
                    var text = document.getElementById("sqltext_4");
                    text.select();
                    document.execCommand("copy");
                });
                
                $("#sqlbtn_5").on("click", function() {
                    $("#sqltext_5").val("DELETE FROM gs_07_book_okini_table;");
                });
                $("#sqlcpybtn_5").on("click", function() {
                    var text = document.getElementById("sqltext_5");
                    text.select();
                    document.execCommand("copy");
                });
                $("#sqlbtn_6").on("click", function() {
                    $("#sqltext_6").val("SELECT * FROM gs_07_book_okini_table INNER JOIN gs_07_user_table ON (gs_07_book_okini_table.user_id = gs_07_user_table.id);");
                });
                $("#sqlcpybtn_6").on("click", function() {
                    var text = document.getElementById("sqltext_6");
                    text.select();
                    document.execCommand("copy");
                });
                
                $("#sqlbtn_7").on("click", function() {
                    $("#sqltext_7").val("SELECT * FROM gs_07_book_rental_table WHERE rental_end_date < CURDATE() AND rental_flg = '1';");
                });
                $("#sqlcpybtn_7").on("click", function() {
                    var text = document.getElementById("sqltext_7");
                    text.select();
                    document.execCommand("copy");
                });
                
                $("#sqlbtn_8").on("click", function() {
                    $("#sqltext_8").val("SELECT book_id,COUNT(book_id) FROM gs_07_book_zaiko_table GROUP BY book_id;");
                });
                $("#sqlcpybtn_8").on("click", function() {
                    var text = document.getElementById("sqltext_8");
                    text.select();
                    document.execCommand("copy");
                });

            });
        </script>
    </head>

    <body>

        <div class="container">
            <div class="starter-template">
                <h1>My SQL Tips</h1>
                <p class="lead"><br>このページはSQL文の使い方をまとめようとしてます。<br>コピーしたSQLは実行ページで実施することができます。
                    <br>【本のレンタル管理システム】を例に使用しています。
                    <br>一番下に現在のテーブルの一覧が表示されています。<br></p>

            </div>

            <p class="lead">
                <br>①ユーザーテーブル一覧の取得
            </p>
            <textarea id="sqltext_1" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_1" >SQL生成</button>
            <button id="sqlcpybtn_1" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>②ブラックリストのユーザーの名前の取得
            </p>
            <textarea id="sqltext_2" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_2" >SQL生成</button>
            <button id="sqlcpybtn_2" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>③ユーザーID(***)のお気に入りに本ID(b***)を追加
            </p>
            <textarea id="sqltext_3" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_3" >SQL生成</button>
            <button id="sqlcpybtn_3" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>④ユーザーID(***)のお気に入りを削除
            </p>
            <textarea id="sqltext_4" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_4" >SQL生成</button>
            <button id="sqlcpybtn_4" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>⑤お気に入り全データ削除
            </p>
            <textarea id="sqltext_5" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_5" >SQL生成</button>
            <button id="sqlcpybtn_5" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>⑥お気に入りとユーザーテーブルを結合
            </p>
            <textarea id="sqltext_6" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_6" >SQL生成</button>
            <button id="sqlcpybtn_6" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>⑦レンタル中で、現在の日付でレンタル期限が過ぎている本
            </p>
            <textarea id="sqltext_7" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_7" >SQL生成</button>
            <button id="sqlcpybtn_7" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>
            
            <p class="lead">
                <br>⑧本の在庫数を取得
            </p>
            <textarea id="sqltext_8" class="search-box" wrap="soft" ></textarea><br>
            <button id="sqlbtn_8" >SQL生成</button>
            <button id="sqlcpybtn_8" >テキストエリアをコピー</button>
            <a  href="sql.php">SQL実行ページへ</a>

            <div >
                <h3>ユーザーテーブル(gs_07_user_table)</h3>
                <table class="table table-bordered"><?=$master_1?></table>
            </div>
            <div >
                <h3>本テーブル(gs_07_book_table)</h3>
                <table class="table table-bordered"><?=$master_2?></table>
            </div>
            <div >
                <h3>本在庫テーブル(gs_07_book_zaiko_table)</h3>
                <table class="table table-bordered"><?=$master_3?></table>
            </div>
            <div >
                <h3>本レンタルテーブル(gs_07_book_rental_table)</h3>
                <table class="table table-bordered"><?=$master_4?></table>
            </div>
            <div >
                <h3>本お気に入りテーブル(gs_07_book_okini_table)</h3>
                <table class="table table-bordered"><?=$master_5?></table>
            </div>
            <div >
                <h3>ユーザーブラックリストテーブル(gs_07_black_list_table)</h3>
                <table class="table table-bordered"><?=$master_6?></table>
            </div>
        </div><!-- /.container -->
    </body>
</html>
