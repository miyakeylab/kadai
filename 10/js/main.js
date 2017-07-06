$(function () {

    $(document).ready(function () {
        /** PHPから返される結果格納用 */
        var result = null;
        /**
         * Ajax通信を行い、json.phpにアクセスする
         */
        setInterval(function () {
            var id = $("#id").val();
            Log("タイマー処理" + id);
            /**
             * Ajax通信メソッド
             * @param type  : HTTP通信の種類
             * @param url   : リクエスト送信先のURL
             * @param data  : サーバに送信する値
             */
            $.ajax({
                type: "POST",
                url: "json.php",
                contentType: 'application/json',
                dataType: "json",
                data: {
                    myid: id
                },
                /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function (arr) {
                    Log("success");
                    //結果が0件の場合
                    if (arr == null) {
                        Log('データが0件でした');
                    } else {
                        //返ってきたデータの表示
                        //var $content = $('#content');
                        for (var i = 0; i < arr.length; i++) {
                            // log
                            Log(arr[i].id + " " + arr[i].message_id + " " + arr[i].send_time);
                            //MessageIdを実行
                            switch (arr[i].message_id) {
                                case '1':
                                    Log("ゴゴゴゴ");
                                    $('body').html('<img src="img/gogogogo.png" />');
                                    var TimeId = setInterval(function () {
                                        Log("ゴゴゴゴタイマー処理");
                                        location.reload();
                                        clearInterval(TimeId);
                                    }, 1000);
                                    break;
                                case '2':
                                    Log("アリアリ");
                                    var cnt = 0;
                                    $('body').html('<img src="img/ari.png" />');
                                    var TimeId = setInterval(function () {
                                        Log("アリアリタイマー処理");
                                        cnt++;
                                        if (cnt < 10) {
                                            $('body').append('<img src="img/ari.png" />');
                                        } else {
                                            location.reload();
                                            clearInterval(TimeId);
                                        }
                                    }, 200);
                                    break;
                                case '3':
                                    Log("オラオラ");
                                    var cnt = 0;
                                    $('body').html('<img src="img/ora.png" />');
                                    var TimeId = setInterval(function () {
                                        Log("オラオラタイマー処理");
                                        cnt++;
                                        if (cnt < 10) {
                                            $('body').append('<img src="img/ora.png" />');
                                        } else {
                                            location.reload();
                                            clearInterval(TimeId);
                                        }
                                    }, 200);
                                    break;
                                default:
                                    Log("default");
                                    break;
                            }

                        }
                    }
                },
                /**
                 * Ajax通信が失敗した場合に呼び出されるメソッド
                 */
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    //エラーメッセージの表示
                    Log('Error : ' + errorThrown);
                }
            });
        }, 5000);
    });
});
