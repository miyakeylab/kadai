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

    <body>
        <div class="container">
            <div class="starter-template">
               <div class="pad-botm-10">
                <h1>Sign In</h1>
                </div>
                <form method="post" action="login.php">
                   <div>
                    <label for="email"></label>
                    <input type="email" name="email" required="required" placeholder="Email Address" />
                    </div>
                    <div>
                    <label for="password"></label>
                    <input type="password" name="password" required="required" placeholder="Password" />
                    </div>
                    <input type="submit" class="button" title="Sign In" value="Sign In" />
                </form>
                <div class="form-footer">
                    <p><a href="reg.php">Create an account</a></p>
                    <p><a href="administrator.php">Administrator</a></p>
                </div>
            </div>
        </div>
        <!-- header -->
        <hgroup class="heading">
            <h1 class="major">Login Form </h1>
        </hgroup>

        <!-- form starts here -->
        <form class="sign-up">
            <h1 class="sign-up-title">Sign up in seconds</h1>
            <input type="text" class="sign-up-input" placeholder="What's your username?" autofocus>
            <input type="password" class="sign-up-input" placeholder="Choose a password">
            <input type="submit" value="Sign me up!" class="sign-up-button">
        </form>

        <div class="about">
            <p class="about-links">
                <a href="http://www.cssflow.com/snippets/sign-up-form" target="_parent">View Article</a>
                <a href="http://www.cssflow.com/snippets/sign-up-form.zip" target="_parent">Download</a>
            </p>
            <p class="about-author">
                &copy; 2013 <a href="http://thibaut.me" target="_blank">Thibaut Courouble</a> -
                <a href="http://www.cssflow.com/mit-license" target="_blank">MIT License</a><br>
                Original PSD by <a href="http://dribbble.com/shots/1037950-Sign-up-freebie" target="_blank">Dylan Opet</a>
            </p>
        </div>
    </body>
    <footer></footer>

</html>
