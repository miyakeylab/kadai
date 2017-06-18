/**
 * 地図オブジェクト
 */
var map;

$(function() {
    // 初期化処理
});

/**
 * map初期化コールバック
 */
function initialize() {
    // g'z辺り
    mapsInit(35.6672762, 139.7115615);
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