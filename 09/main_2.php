<?php 
require_once "functions.php";

$id=$_GET["id"];
$myid=$_GET["myid"];

$myidUrl = "main.php?id=".$myid;
//1.  DB接続します
$result = DbInit('gs_db48','utf8','localhost','root','');

if($result == true)
{
    $sql = "SELECT * FROM gs_08_user_url_table WHERE user_id = :id";
    //２．SQL実行
    $view = DbAccessSql_id_div($sql,$id);
    
    $sql = "SELECT * FROM gs_08_user_table WHERE id = :id";
    $name = DbAccessSql_id_username($sql,$id);
    

}
?>


<!doctype html>
<html class="no-js" lang="ja" ng-app="myApp">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Main</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" /> </head>

<body>
    <!-- Static navbar -->
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left"><?=$name ?></ul>
                <ul class="nav navbar-nav navbar-inverse navbar-right">
                    <li><a href="./index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav> 
    <p><a href="<?=$myidUrl ?>">戻る</a></p>
        <div class="wrapper">
            <?=$view ?>
        </div>
    <footer> </footer>
</body>
</html>