<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sign In</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/index.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body background="./img/gahag-0022199324-1.jpg">
        <div class="container">
            <div class="starter-template">
                <hgroup class="heading">
                    <h1 class="major">Login Form </h1>
                </hgroup>
                <!-- form starts here -->
                <form class="sign-up" method="post" action="login.php">
                    <h1 class="sign-up-title">Sign up in seconds</h1>
                    <input type="text" name="id" class="sign-up-input" placeholder="What's your username?" autofocus>
                    <input type="password" name="password" class="sign-up-input" placeholder="Choose a password">
                    <input type="submit" value="Sign me up!" class="sign-up-button">
                </form>
                <div class="form-footer">
                    <p><a href="reg.php">Create an account</a></p>
                    <p><a href="administrator.php">Administrator</a></p>
                </div>
            </div>
        </div>
        <!-- header -->

    </body>
    <footer></footer>

</html>
