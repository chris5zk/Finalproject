<?= $this->extend('templates\home_default') ?>
<?= $this->section('content') ?>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>King Tzeng的鐵人地圖</title>
    <style type="text/css" media="screen">
    html {
        height: 100%;
        width: 100%;
        background-image: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
    }

    #map {
        position: absolute;
        left: 0;
        height: 80%;
        width: 100vw;
    }

    #body {
        height: 100%;
        width: 100vw;
        position: relative;
        top: 0;
        left: 0;
    }

    h1,
    h2 {
        text-align: center;
    }

    h2 {
        width: 100%;
        background-color: rgba(255, 255, 255, 0.45);
    }
    </style>
</head>

<body>
    <form>
    請輸入文字:
    <input type="text" id="text" name="text_name" style="width: 100%; height: 400px; " /> 
    </form>

   
	
<form action="/somewhere/to/upload" enctype="multipart/form-data">

<input name="progressbarTW_img" type="file" accept="image/gif, image/jpeg, image/png">
<button>post</button>
</form> 
<div class="body">

        <div id="map"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
    function initMap() {
        var latlng = { lat: 25.046891, lng: 121.516602 }; // 給一個初始位置
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14, //放大的倍率
            center: latlng //初始化的地圖中心位置
        });
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var marker = new google.maps.Marker({
                    position: pos,
                    icon:'marker.png',
                    map: map
                });
                map.setZoom(17);
                map.setCenter(pos);
            });
        } else {
            // Browser doesn't support Geolocation
            alert("未允許或遭遇錯誤！");
        }
    } //init_end
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_Za7RqKvUuEg2Nln0EcpUVN3k2fZtDuE&callback=initMap">
    </script>
<a href="#top">回到頂端</a>
</body>

<?= $this->endSection() ?>