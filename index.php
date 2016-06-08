<!DOCTYPE html>
<html>
<head>
  <title>Marking Beberapa Lokasi dengan XML</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="WebGIS ini dibuat untuk uji coba">
  <meta name="keywords" content="webgis, mall, surakarta, marking, xml, geolocation">
  <meta name="author" content="Bengkel Tekno">

  <link rel="icon" href="assets/img/logo.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style type="text/css">
    #map {
      width: 900px;
      height: 415px;
      border: 1px solid black;
    }
  </style>
</head>
<body onload="load()">
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">WebGIS</a>
      </div>

      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Beranda</a></li>
          <li><a href="lokasi.php">Lokasi</a></li>
          <li><a href="rute.php">Rute</a></li>
          <li><a href="about.php">Tentang</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->

  <div class="container">
    <div class="page-header">
      <h1>WebGIS Mall se-Surakarta</h1>
    </div>

    <center>
      <div id="map"></div>
    </center>

    <hr>

    <footer>
      <p>&copy; 2016 <a href="avistudcorp.blogspot.co.id">Avistud Creativeless</a></p>
    </footer>

  </div>

  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script language='JavaScript' type="text/javascript">
    var txt="   belanja biar bahagia  |";
    var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
    txt=txt.substring(1,txt.length)+txt.charAt(0);
    segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
  </script>
  <script type="text/javascript"> //menampilkan peta
    var customIcons = {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(-7.567679, 110.807259),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam dataLokasi.php
      downloadUrl("marker.xml", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");

          var point = new google.maps.LatLng(
                  parseFloat(markers[i].getAttribute("lat")),
                  parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b><br/>" + address;
          var icon = customIcons;
          var marker = new google.maps.Marker({
              map: map,
              position: point,
              icon: icon.customIcons,
              shadow: icon.shadow
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {
    }
  </script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/offcanvas.js"></script>
</body>
</html>