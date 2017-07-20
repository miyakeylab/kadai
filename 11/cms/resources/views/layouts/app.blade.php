<!-- resources/views/layouts/my_schedule.blade.php -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Book List</title>
        <!-- CSS と JavaScript -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/bootstrap-datetimepicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/pitscheduler.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{secure_asset('/js/moment.min.js')}}"></script>
        <script src="{{secure_asset('/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{secure_asset('/js/pitscheduler.min.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <a href="#" class="navbar-brand">ReadTime</a>
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#gnavi">
                  <span class="sr-only">メニュー</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
     
              <div id="gnavi" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                  <li><a href="../">メイン</a></li>
                  <li><a href="../my_schedule">マイスケジュール</a></li>
                  <li><a href="../books_reg">本管理</a></li>
                </ul>
              </div>
            </nav>
        </div>
        @yield('content')
    </body>
</html>