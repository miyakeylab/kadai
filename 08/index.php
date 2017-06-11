<?php 

require_once "functions.php";

if($_SERVER["REQUEST_METHOD"] != "POST"){
    // ブラウザからHTMLページを要求された場合
    //1.  DB接続します

    
}else{
    // フォームからPOSTによって要求された場合
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Time Feed</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script>
        var defaultPosiArr, nowDragObj;
        $(document).ready(function() {
            //初期位置記録
            defaultPosiArr = new Array();
            for (var cnt = 1; cnt <= 3; cnt++) {
                defaultPosiArr[cnt] = $('#drag' + cnt).position();
            }

            //ドラッグオブジェクト設定
            $('.drag').draggable({
                //この下２行の記述で、ドラッグしているものが前面に表示される
                stack: '.drag',
                zIndex: 10,
                start: function() {
                    //今ドラッグしているオブジェクトを格納しておく
                    nowDragObj = $(this);
                },
                revert: function(event, ui) {
                    var num = Number($(this).attr('id').split('drag').join(''));

                    //ドロップターゲットに吸着しない場合は初期位置に戻す
                    $(this).data('ui-draggable').originalPosition = {
                        top: defaultPosiArr[num].top,
                        left: defaultPosiArr[num].left
                    };

                    return !event;
                }
            });

            //ドロップオブジェクト設定
            $('.drop').droppable({
                drop: function(event, ui) {
                    //ドロップされたら吸着する
                    var dropposi = $(this).position();
                    nowDragObj.css('top', (dropposi.top) + 'px');
                    nowDragObj.css('left', (dropposi.left) + 'px');
                    $('#drag1_pos').append('<div id="drag4" class="drag">W</div>');
                    $('.drag').draggable({
                        //この下２行の記述で、ドラッグしているものが前面に表示される
                        stack: '.drag',
                        zIndex: 10,
                        start: function() {
                            //今ドラッグしているオブジェクトを格納しておく
                            nowDragObj = $(this);
                        },
                        revert: function(event, ui) {
                            var num = Number($(this).attr('id').split('drag').join(''));

                            //ドロップターゲットに吸着しない場合は初期位置に戻す
                            $(this).data('ui-draggable').originalPosition = {
                                top: defaultPosiArr[num].top,
                                left: defaultPosiArr[num].left
                            };

                            return !event;
                        }
                    });
                }
            });
            var canvas = document.getElementById('c1');　 //canvas(c1)のノードオブジェクト
            var img = new Image(); //新規画像オブジェクト
            img.src = "./img/vintage-old-retro-clock.png"; //読み込みたい画像のパス
            img.onload = function() {
                if (canvas.getContext) {
                    var context = canvas.getContext('2d');
                    //元イメージの座標(0, 0)から幅100高さ50の範囲を使用して、座標(10, 10)の位置に、サイズ200×50でイメージを表示
                    context.drawImage(img, 0, 0, 200, 200, 0, 0, 200, 200);
                }
            }


            var cs = document.getElementById('nowCanvas');
            var hiduke = new Date();
            var nowHour = hiduke.getHours();
            var nowMin = hiduke.getMinutes();
            var wSixe = (window.innerWidth / 24) * nowHour;
            wSixe += (60 / 52) * nowMin;

            cs.style.left = wSixe + "px";
            var ctx = cs.getContext('2d');
            var csWidth = cs.width;
            var csHeight = cs.height;
            var center = {
                x: csWidth / 2,
                y: csHeight / 2
            };

            // 線の基本スタイル
            ctx.strokeStyle = '#ff4567';
            ctx.lineWidth = 5;
            var drawVerticalLineAnim = function() {
                var beginPos = 0,
                    movePos = beginPos,
                    addVal = 10,
                    endPos = csHeight - 10,
                    isAnim = function() {
                        return (movePos < endPos);
                    };

                var render = function() {
                    ctx.beginPath();
                    ctx.moveTo(center.x, beginPos);
                    ctx.lineTo(center.x, movePos);
                    ctx.closePath();
                    ctx.stroke();

                    // 描画を繰り返す条件
                    if (isAnim() === true) {
                        movePos += addVal;
                        // ↑のaddで終了点を超えることがあるため上限を決める
                        movePos = (isAnim() === false) ? endPos : movePos;
                        requestAnimationFrame(render)
                    }
                };
                render();
            };
            drawVerticalLineAnim();



        });

    </script>
</head>

<body>
    <div class="container">
        <div class="starter-template">
            <h1>Time Feed</h1>
        </div>
    </div>

    <canvas id="nowCanvas" width="5" height="1200"></canvas>
    <div>
        <table class="table table-bordered">
            <tr>
                <th>0時</th>
                <th>1時</th>
                <th>2時</th>
                <th>3時</th>
                <th>4時</th>
                <th>5時</th>
                <th>6時</th>
                <th>7時</th>
                <th>8時</th>
                <th>9時</th>
                <th>10時</th>
                <th>11時</th>
                <th>12時</th>
                <th>13時</th>
                <th>14時</th>
                <th>15時</th>
                <th>16時</th>
                <th>17時</th>
                <th>18時</th>
                <th>19時</th>
                <th>20時</th>
                <th>21時</th>
                <th>22時</th>
                <th>23時</th>
            </tr>
            <tr>
                <td class="tdDrop">
                    <div id="drop0" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop1" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop2" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop3" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop4" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop5" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop0" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop7" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop8" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop9" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop10" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop11" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop12" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop13" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop14" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop15" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop16" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop17" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop18" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop19" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop20" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop21" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop22" class="drop"></div>
                </td>
                <td class="tdDrop">
                    <div id="drop23" class="drop"></div>
                </td>
            </tr>
        </table>
    </div>
    <div id="drag1_pos">
        <div id="drag1" class="drag">W</div>
    </div>
    <div id="drag1_label">WORK</div>
    <div id="drag2_pos">
        <div id="drag2" class="drag">B</div>
    </div>
    <div id="drag2_label">BLOCK</div>
    <div id="drag3_pos">
        <div id="drag3" class="drag">S</div>
    </div>
    <div id="drag3_label">STUDY</div>

    <!-- /.container -->
    <div class="back"><canvas id="c1" width="200" height="200"></canvas></div>
</body>

</html>
