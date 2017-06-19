$(function() {
    $(document).ready(function() {
        /** PHPから返される結果格納用 */
        var result = null;

        /**
         * タイマーで5000ミリ(5)秒枚にAjax通信を行い、send.phpにアクセスする
         */
        setInterval(function()
                    {
            //GETメソッドで送るデータを定義します var data = {パラメータ名 : 値};
            var data = {request : "SEND"};
            Log("タイマー処理");
            /**
            * Ajax通信メソッド
            * @param type  : HTTP通信の種類
            * @param url   : リクエスト送信先のURL
            * @param data  : サーバに送信する値
            */
            $.ajax({
                type: "GET",
                url: "send.php",
                data: data,
                dataType: "text",
                /**
                 * Ajax通信が成功した場合に呼び出されるメソッド
                 */
                success: function(data, dataType)
                {
                    //初回アクセス時
                    if(result == null) 
                    {
                        Log("初回データ:" + data);
                        result = data;
                    }
                    
                    //PHPより取得した値が違えばメッセージを<div id="text"></div>に出す
                    if(result != data)
                    {
                        Log("値が変更されました :" + data);
                    }
                    result = data;
                },
                /**
                 * Ajax通信が失敗した場合に呼び出されるメソッド
                 */
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    //エラーメッセージの表示
                    Log('Error : ' + errorThrown);
                }
            });
        }, 5000);
    });
});