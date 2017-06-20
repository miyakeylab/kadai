<?php 
require_once "functions.php";

SetloginTime();

$id=$_GET["id"];

//1.  DB接続します
$result = DbInit('gs_db48','utf8','localhost','root','');

if($result == true)
{
    $sql = "SELECT * FROM gs_08_user_url_table WHERE user_id = :id";
    //２．SQL実行
    $view = DbAccessSql_id_div($sql,$id);
    
    $sql = "SELECT * FROM gs_08_user_table WHERE id = :id";
    $name = DbAccessSql_id_username($sql,$id);
    
    $sql = "SELECT * FROM gs_08_user_table";
    $OtherUser = DbAccessSql_GetOtherUser_url($sql,$id);
    
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
    <script src="js/common.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" /> </head>

<body>
    <!-- Static navbar -->
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left"><?=$name ?></ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown active "> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?=$OtherUser ?>
                        </ul>
                    </li>
                    <li><a href="./index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav> 
    <form method="post" action="AddUrl.php" class="pad-botm-10">
        <div>
            <label for="url"></label>
            <span class="glyphicon glyphicon-film" aria-hidden="true"></span><span> URL:</span><span><input type="text" name="url"  />
            <input type="submit" class="button" title="Add" value="Add" /></span>
        </div>
        <input type="hidden" name="id" value="<?=$id ?>"/>
    </form>
        <div class="wrapper">
            <?=$view ?>
        </div>
    <footer> </footer>
</body>
</html>