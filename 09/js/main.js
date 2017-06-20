$(function () {
    $(document).ready(function () {
        /** PHPから返される結果格納用 */
        var result = null;
        /**
         * タイマーで5000ミリ(5)秒枚にAjax通信を行い、send.phpにアクセスする
         */
        setInterval(function () {
            Log("タイマー処理");
            /**
             * Ajax通信メソッド
             * @param type  : HTTP通信の種類
             * @param url   : リクエスト送信先のURL
             * @param data  : サーバに送信する値
             */
            $.ajax({
                type: "POST"
                , url: "json.php"
                , contentType: 'application/json' // リクエストの Content-Type
                    
                , dataType: "json"
                , /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function (arr) {
                    Log("success");
                    //結果が0件の場合
                    if (arr == null) {
                        Log('データが0件でした');
                    }
                    else {
                        //返ってきたデータの表示
                        //var $content = $('#content');
                        for (var i = 0; i < arr.length; i++) {
                            //                        $content.append("<li>" + data[i].name + "</li>");
                            Log(arr[i].id + " " + arr[i].message_id + " " + arr[i].send_time);
                        }
                    }
                }
                , /**
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