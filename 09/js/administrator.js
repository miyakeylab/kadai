/**
 * 地図オブジェクト
 */
var map;

var low = [151, 83, 34];   // color of mag 1.0
var high = [5, 69, 54];  // color of mag 6.0 and above
var minMag = 1.0;
var maxMag = 6.0;

var KeyState=0;

$(function() {
    $(window).keydown(function (e) {
        keyProc(e);
    });
});


/**
 * キー入力
 * @param   {object}  e イベントデータ
 */
function keyProc(e) {
    Log("keydown " + e.keyCode);
    // 上
    if (e.keyCode === 38 && (KeyState === 0 || KeyState === 1)) {
        KeyState++;
        // 下
    } else if (e.keyCode === 40 && (KeyState === 2 || KeyState === 3)) {
        KeyState++;
        //左
    } else if (e.keyCode === 37 && (KeyState === 4 || KeyState === 6)) {
        KeyState++;
        //右
    } else if (e.keyCode === 39 && (KeyState === 5 || KeyState === 7)) {
        KeyState++;
        //A
    } else if (e.keyCode === 65 && (KeyState === 9)) {
        KeyState++;
        $("command").html(
            '<form method="post" action="message.php"><input type="hidden" name="message" value="1" ><input type="submit" value="ゴゴゴゴ"></form>)';
        //B
    } else if (e.keyCode === 66 && (KeyState === 8)) {
        KeyState++;

    } else {
        KeyState = 0;
    }
}

/**
 * map初期化コールバック
 */
function initialize() {
    // g'z辺り
    mapsInit(35.6672762, 139.7115615);

    $('#user_map').css('pointer-events', 'none');

}

function styleFeature(feature) {

    // fraction represents where the value sits between the min and max
    var fraction = (Math.min(feature.getProperty('mag'), maxMag) - minMag) /
        (maxMag - minMag);

    var color = interpolateHsl(low, high, fraction);

    return {
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            strokeWeight: 0.5,
            strokeColor: '#fff',
            fillColor: color,
            fillOpacity: 2 / feature.getProperty('mag'),
            // while an exponent would technically be correct, quadratic looks nicer
            scale: Math.pow(feature.getProperty('mag'), 2)
        },
        zIndex: Math.floor(feature.getProperty('mag'))
    };
}

function interpolateHsl(lowHsl, highHsl, fraction) {
    var color = [];
    for (var i = 0; i < 3; i++) {
        // Calculate color based on the fraction.
        color[i] = (highHsl[i] - lowHsl[i]) * fraction + lowHsl[i];
    }

    return 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)';
}


/**
 * 位置情報の取得成功時の処理
 * @param {object} position 現在の緯度・経度
 */
function mapsInit(lat, lon) {
    //lat=緯度、lon=経度 を取得
    Log("lat:" + lat + " lon:" + lon);
    var fenway = {
        lat: lat
        , lng: lon
    };
    // 地図生成
    map = new google.maps.Map(document.getElementById('user_map'), {
        center: fenway
        , zoom: 2
        , styles: [{
            elementType: 'geometry'
            , stylers: [{
                color: '#343f3e'
            }]
        }, {
            elementType: 'labels.text.stroke'
            , stylers: [{
                color: '#242f3e'
            }]
        }, {
            elementType: 'labels.text.fill'
            , stylers: [{
                color: '#746855'
            }]
        }, {
            featureType: 'administrative.locality'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#d59563'
            }]
        }, {
            featureType: 'poi'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#00ff00'
            }]
        }, {
            featureType: 'poi.park'
            , elementType: 'geometry'
            , stylers: [{
                color: '#00ff00'
            }]
        }, {
            featureType: 'poi.park'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#00ff00'
            }]
        }, {
            featureType: 'road'
            , elementType: 'geometry'
            , stylers: [{
                color: '#ffff00'
            }]
        }, {
            featureType: 'road'
            , elementType: 'geometry.stroke'
            , stylers: [{
                color: "#ffff00"
            }]
        }, {
            featureType: 'road'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#ffff00'
            }]
        }, {
            featureType: 'road.highway'
            , elementType: 'geometry'
            , stylers: [{
                color: '#ee9900'
            }]
        }, {
            featureType: 'road.highway'
            , elementType: 'geometry.stroke'
            , stylers: [{
                color: '#ee9900'
            }]
        }, {
            featureType: 'road.highway'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#ee9900'
            }]
        }, {
            featureType: 'transit'
            , elementType: 'geometry'
            , stylers: [{
                color: '#2f3948'
            }]
        }, {
            featureType: 'transit.station'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#d59563'
            }]
        }, {
            featureType: 'water'
            , elementType: 'geometry'
            , stylers: [{
                color: '#00cccc'
            }]
        }, {
            featureType: 'water'
            , elementType: 'labels.text.fill'
            , stylers: [{
                color: '#00cccc'
            }]
        }, {
            featureType: 'water'
            , elementType: 'labels.text.stroke'
            , stylers: [{
                color: '#00cccc'
            }]
        }]
    });

}

