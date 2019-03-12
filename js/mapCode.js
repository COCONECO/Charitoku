/* googleMapAPIにて地図を表示しています。

    google.maps.DirectionsServiceにてルートを作成
    google.maps.ElevationServiceにて標高データを取得
    google.maps.event.addDomListenerにてマーカーを表示
    google.maps.OverlayViewにて、キャラクターアイコンを表示
    Chart.jsにて、標高データをグラフ表示
 */

// マップオブジェクト作成
var mapObj = new google.maps.Map(document.getElementById("map"), {
    zoom: 7,
    scrollwheel: false,
    // scrollwheel: true,
    scaleControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

// 経由地点を設定 route_flag==1のみ対象
var wayPoints = [];
jQuery.each(latlang, function () {
    if (this.route_flag == 1) {
        wayPoints.push = new google.maps.LatLng(this.lat, this.lang);
        // console.log('aaaa',this.lat, this.lang);
    }
});

var label = [];
var elevationData = [];
var markerObj = new Array();
var routeLat = [];
var routeLng = [];
let max = 0;
let vals = 0;


new google.maps.DirectionsService().route({
    origin: origin, //スタート地点 
    destination: destination, //ゴール地点

    // travelMode: google.maps.DirectionsTravelMode.WALKING,
    travelMode: google.maps.DirectionsTravelMode.DRIVING,
    optimizeWaypoints: false, // 最適化を無効
    avoidHighways: true, // 高速は利用しない
    waypoints: wayPoints
}, function (result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        new google.maps.DirectionsRenderer({
            map: mapObj,
            suppressMarkers: true
        }).setDirections(result);

        // console.log(result.routes[0].legs[0]);
        // console.log(result.routes[0].legs[0]);

        new google.maps.ElevationService().getElevationAlongPath({
            path: result.routes[0].overview_path,
            samples: result.routes[0].overview_path.length
        }, function (results, status) {
            if (status == google.maps.ElevationStatus.OK) {
                for (var i in results) {
                    if (results[i].elevation) {
                        var elevation = Math.round(results[i].elevation);

                        // console.log(results[i].location.lat());
                        // console.log(results[i].location.lng());

                        routeLat.push(results[i].location.lat());
                        routeLng.push(results[i].location.lng());

                        // console.log(result);    

                        elevationData.push(elevation);
                        label.push('　');

                    }
                }
                let max = routeLat.length;
                let vals = 0;

                // スライダーの記述
                // jQuery.ui版の記述
                $("#myslider").slider({
                    max: max, //最大値
                    min: 0, //最小値
                    values: vals, //初期値
                    step: 1, //幅
                    range: false,

                    slide: function (event, ui) {
                    },
                    create: function (event, ui) {
                    },

                    change: function (event, ui) {
                        let val = $("#myslider").slider("option", "value");
                        // console.log(val);

                        // 緯度、経度データの再セット
                        if (val < max) {
                            let lat = routeLat.slice(val, val + 1);
                            let lng = routeLng.slice(val, val + 1);

                            // マーカーの移動
                            markerMoveByLatlng(moveMarkerObj, lat, lng);
                        };
                    }
                });

                // スライダーの記述
                // inputタグ版の記述
                $('input[type=range]').attr('value', 0);
                $('input[type=range]').attr('max', max);
                $('input[type=range]').attr('min', 0);

                $('input[type=range]').change(function () {
                    var val = $(this).val();
                    // console.log(val);

                    // 緯度、経度データの再セット
                    if (val < max) {
                        let lat = routeLat[val];
                        let lng = routeLng[val];

                        // マーカーの移動
                        markerMoveByLatlng(moveMarkerObj, lat, lng);
                        // console.log(val,lat,lng);
                    }
                });

            } else {
                alert(status);
            }
        });
    } else {
        alert(status);
    }
});

google.maps.event.addDomListener(window, 'load', function () {

    // マーカー情報を更新
    jQuery.each(latlang, function () {
        var orderNumber = this.order_number;
        var latlng = new google.maps.LatLng(this.lat, this.lang);
        var description = this.description;
        var subDescription = this.sub_description;
        var picture = this.picture;
        var url = this.url;
        var markerObj;

        markerObj = new google.maps.Marker({
            position: latlng,
            map: mapObj,
            label: {
                // color: '#0044aa',
                color: '#ffffff',
                fontFamily: 'sans-serif',
                fontSize: '14px',
                fontWeight: 'bold',
                text: String(orderNumber)
            }
        });

        // マーカークリックイベントを追加
        google.maps.event.addListener(markerObj, 'click', function () {

            // Html文字列を作成
            html = "";
            html += '<style type="text/css">';
            html +='p {font-size: 12px; font-family: sans-serif}';
            html += '</style>';
            html += '<p><img src="images/route/' + picture + '" width= 100px alt=""></img>';
            html += '<br><a href="' + url + '">' + ' ' + description + '</a>';
            html += '<br>' + subDescription + '</p>';

            // info Windowを作成
            var infoWindow = new google.maps.InfoWindow();
            infoWindow.setContent(html);
            infoWindow.open(mapObj, markerObj);
        })
    });

    // 移動マーカー作成
    moveMarkerInitialize(origin);

    // 標高グラフ作成
    elevationChart();
});


// 標高データをグラフ化
function elevationChart() {

    // 線グラフのラベル
    var label2 = '標高';

    // グラフデータの設定
    var config = {
        labels: label,
        datasets: [
            {
                label: label2,
                //塗りつぶしの背景色
                backgroundColor: "rgba(240,128,128,0.2)",
                //#6EB3F8    106,176,224
                borderColor: "rgba(109,178,244,0.9)",
                // borderColor: "rgba(240,128,128,0.9)",
                hoverBackgroundColor: "rgba(255,64,64,0.75)",
                hoverBorderColor: "rgba(255,64,64,1)",

                data: elevationData,
                hidden: false,
                //塗りつぶし無し
                // fill: false,
                lineTension: 0
            }
        ]
    };

    // グラフオブジェクト生成
    var ctx = document.getElementById("chart").getContext("2d");
    var chartObj = new Chart(ctx, {
        type: "line", data: config,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        //最小値を0にする
                        beginAtZero: true,
                        callback: function (value) {
                            return value + "m";
                        }
                    }
                }]
            }
        }
    });
}

function moveMarkerInitialize() {
    var result = origin.split(',');
    moveMarkerObj = new moveMarker(mapObj, result[0], result[1]);
}

function moveMarker(map, lat, lng) {
    this.lat_ = lat;
    this.lng_ = lng;
    this.setMap(map);
}

moveMarker.prototype = new google.maps.OverlayView();
moveMarker.prototype.draw = function () {
    if (!this.div_) {
        this.div_ = document.createElement("div");
        this.div_.style.position = "absolute";
        this.div_.style.color = "#ff0000";
        this.div_.innerHTML = '<img src="images/maker-michino.png" width= 60px</img>';
        var panes = this.getPanes();
        panes.overlayLayer.appendChild(this.div_);
    }
    var point = this.getProjection().fromLatLngToDivPixel(new google.maps.LatLng(this.lat_, this.lng_));
    this.div_.style.left = point.x - 30 + 'px';
    this.div_.style.top = point.y - 30 + 'px';
}
moveMarker.prototype.remove = function () {
    if (this.div_) {
        this.div_.parentNode.removeChild(this.div_);
        this.div_ = null;
    }
}
moveMarker.prototype.setPosition = function (lat, lng) {
    this.lat_ = lat;
    this.lng_ = lng;
    var point = this.getProjection().fromLatLngToDivPixel(new google.maps.LatLng(this.lat_, this.lng_));
    this.div_.style.left = point.x - 30 + 'px';
    this.div_.style.top = point.y - 30 + 'px';
}
moveMarker.prototype.getPosition = function () {
    return new google.maps.LatLng(this.lat_, this.lng_);
}
moveMarker.prototype.setPoint = function (x, y) {
    var latlng = this.getProjection().fromDivPixelToLatLng(new google.maps.Point(x, y));
    this.lat_ = latlng.lat();
    this.lng_ = latlng.lng();
    this.div_.style.left = x - 30 + 'px';
    this.div_.style.top = y - 30 + 'px';
}
moveMarker.prototype.getPoint = function () {
    return this.getProjection().fromLatLngToDivPixel(new google.maps.LatLng(this.lat_, this.lng_));
}

function markerMoveByLatlng(marker, lat, lng) {
    marker.setPosition(lat, lng);
}
