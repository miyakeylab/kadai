<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>New Account</title>
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
            <div class="starter-template">
               <div class="pad-botm-10">
                <h1>New Account</h1>
                </div>
                <form method="post" action="NewAccount.php">
                   <div>
                    <label for="email"></label>
                    <input type="email" name="email" required="required" placeholder="Email Address" />
                    </div>
                    <div>
                    <label for="password"></label>
                    <input type="password" name="password" required="required" placeholder="Password" />
                    </div>
                    <input type="submit" class="button" title="new account" value="new account" />
                </form>
                <div class="form-footer">
                    <p><a href="index.php">loginへ戻る</a></p>
                </div>
            </div>
        </div>
    </body>
    <footer></footer>

</html>
