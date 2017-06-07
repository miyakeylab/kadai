<?php

require_once "functions.php";

$view="";

if($_SERVER["REQUEST_METHOD"] != "POST"){
    // ブラウザからHTMLページを要求された場合
  
}else{
    // フォームからPOSTによって要求された場合
    if (isset($_POST['sqlstr']) === TRUE) {
        
        $sql = $_POST['sqlstr'];
        if($sql != "")
        {
            //1.  DB接続します
            $result = DbInit('gs_db48','utf8','localhost','root','');
            if($result == true)
            {
            //２．SQL実行
            $view = DbAccessSql($sql);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Sqqqle</title>
    <script>
        $(function() {
            //
            //Luckyボタン押下時
            //
            $("#lucky").on("click", function() {
                alert("え？");
            });

        });
    </script>
</head>

<body>

    <header>
        <h1><span class="blue">S</span><span class="red">q</span><span class="yellow">q</span><span class="blue">q</span><span class="green">l</span><span class="red">e</span></h1>
    </header>

    <main>
        <form method="post" action="sql.php">
        <ul>
            <!--      intro1     -->
            <li class="search-pos"><textarea id="serchText" class="search-box" name="sqlstr" wrap="soft"></textarea></li>
            <li><span class=left>
            <!--      intro2     -->
                <input class="buttonSearch" id="search" type="submit" value="SQL実行">
<!--                <button class="buttonSearch" id="search"  >SQL実行</button>-->
                </span>
                <input class="buttonSearch-right" id="lucky" type="button" value="I'm Feeling Lucky">
<!--                <button class="buttonSearch-right" id="lucky">I'm Feeling Lucky</button>-->
                </li>
        </ul>
        </form>
        <div class="container">
            <table class="table table-bordered"><?=$view?></table>
        </div>
        <div>
            <a class="navbar-brand" href="index.php">戻る</a>
        </div>
    </main>

    <footer></footer>

</body>

</html>
