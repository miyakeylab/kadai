<?php 
require_once "functions.php";

//1.  DB接続します
$result = DbInit();

if($result == true)
{
    $sql = "SELECT * FROM gs_08_user_table";
    $OtherUser = DbAccessSql_GetOtherUser_url_nologin($sql);
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
                    <ul class="nav navbar-nav navbar-inverse navbar-right">
                        <li class="dropdown active "> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Users<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?=$OtherUser ?>
                            </ul>
                        </li>
                        <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>
        <p><a href="./index.php">戻る</a></p>
        <footer> </footer>
    </body>
</html>