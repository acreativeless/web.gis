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
      width: 800px;
      height: 330px;
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
          <li><a href="index.php">Beranda</a></li>
          <li class="active"><a href="#">Lokasi</a></li>
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

    <div class="row">
    	<div class="col-lg-3">
    		<div class="panel panel-primary">
				  <div class="panel-heading text-center">Daftar Mall</div>
				  <div class="panel-body" style="max-height: 10; overflow-y: scroll; height: 290px;">
				  	<ul class="nav nav-pills nav-stacked">
						  <li><a href="#" onclick="getHTMLText(1)">Solo Grand Mall</a></li>
							<li><a href="#" onclick="getHTMLText(2)">Paragon Mall</a></li>
							<li><a href="#" onclick="getHTMLText(3)">Solo Center Point</a></li>
							<li><a href="#" onclick="getHTMLText(4)">Luwes Nusukan</a></li>
							<li><a href="#" onclick="getHTMLText(5)">Luwes Pasar Legi</a></li>
							<li><a href="#" onclick="getHTMLText(6)">LotteMart Tipes</a></li>
							<li><a href="#" onclick="getHTMLText(7)">Solo Square</a></li>
							<li><a href="#" onclick="getHTMLText(8)">Hartono Mall</a></li>
							<li><a href="#" onclick="getHTMLText(9)">The Park Mall</a></li>
							<li><a href="#" onclick="getHTMLText(10)">Luwes Gentan</a></li>
							<li><a href="#" onclick="getHTMLText(11)">Carrefour Solo Baru</a></li>
							<li><a href="#" onclick="getHTMLText(12)">Palur Plaza</a></li>
							<li><a href="#" onclick="getHTMLText(13)">Matahari Singosaren</a></li>
							<li><a href="#" onclick="getHTMLText(14)">Goro Assalam</a></li>
							<li><a href="#" onclick="getHTMLText(15)">Luwes Kartosuro</a></li>
							<li><a href="#" onclick="getHTMLText(16)">Carrefour Pabelan</a></li>
						</ul>
				  </div>
				</div>
    	</div>
    	<div class="col-lg-9">
    		<div id="map"></div>
    	</div>
    </div>

    <hr>

    <footer>
      <p>&copy; 2016 <a href="../avistudcorp.blogspot.co.id">AVISTUD Creativeless</a></p>
    </footer>
  </div>

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
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function doNothing() {
    }
    </script>
		
		<script type="text/javascript">
			(function() {
				window.onload = function(){
					var latLng = new google.maps.LatLng(-7.567055,110.81666);
					var options = {
						zoom: 15,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
				}
			})();

			function getHTMLText(a){
				if (a==1){ //<!-- Solo Grand Mall -->
					var latLng = new google.maps.LatLng(-7.566679, 110.807259);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Solo Grand Mall'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==2){ //<!-- Paragon Mall -->
					var latLng = new google.maps.LatLng(-7.5623086, 110.809875);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Paragon Mall'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==3){ //<!-- Solo Center Point -->
					var latLng = new google.maps.LatLng(-7.563675, 110.798516);
					var options = {
						zoom: 17,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var isiku = '<h1>Solo Center Point</h1>'
								+'<img src="/gambar/SCC.jpg">';
					var infoWindow = new google.maps.InfoWindow({
						content: isiku
					});
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Solo Center Point'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==4){ //<!-- Luwes Nusukan -->
					var latLng = new google.maps.LatLng(-7.541743, 110.820069);
					var options = {
						zoom: 17,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Luwes Nusukan'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==5){ //<!-- Luwes Pasar Legi -->
					var latLng = new google.maps.LatLng(-7.563471, 110.824098);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Luwes Pasar Legi'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==6){ //<!-- LotteMart Tipes -->
					var latLng = new google.maps.LatLng(-7.577733, 110.808038);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'LotteMart Tipes'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==7){ //<!-- Solo Square -->
					var latLng = new google.maps.LatLng(-7.5609728, 110.7883958);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Solo Square'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==8){ //<!-- Hartono Mall -->
					var latLng = new google.maps.LatLng(-7.601208, 110.814741);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Hartono Mall'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==9){ //<!-- The Park Mall -->
					var latLng = new google.maps.LatLng(-7.599008, 110.816741);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'The Park Mall'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==10){ //<!-- Luwes Gentan Center Park -->
					var latLng = new google.maps.LatLng(-7.5777111, 110.7834636);
					var options = {
						zoom: 17,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Luwes Gentan'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==11){ //<!-- Carrefour Solo Baru -->
					var latLng = new google.maps.LatLng(-7.608884, 110.8102854);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Carrefour Solo Baru'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==12){ //<!-- Palur Plaza -->
					var latLng = new google.maps.LatLng(-7.566811, 110.8737637);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Palur Plaza'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==13){ //<!-- Matahari Department Store Singosaren -->
					var latLng = new google.maps.LatLng(-7.5732235, 110.820568);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Matahari Singosaren'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==14){ //<!-- Goro Assalam Hypermart -->
					var latLng = new google.maps.LatLng(-7.5579249, 110.7748565);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Goro Assalam'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==15){ //<!-- Luwes Kartosuro -->
					var latLng = new google.maps.LatLng(-7.542669, 110.7447008);
					var options = {
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Luwes Kartosuro'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}

				if (a==16){ //<!-- Carrefour Solo Pabelan -->
					var latLng = new google.maps.LatLng(-7.5608087, 110.7675422);
					var options = { 
						zoom: 16,
						center: latLng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map(document.getElementById('map'), options);
					var marker = new google.maps.Marker({
						position: latLng,
						animation: google.maps.Animation.DROP,
						map: map,
						title: 'Carrefour Pabelan'
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.open(map, marker);
					})();
				}
				var map = new google.maps.Map(document.getElementById('map'), options);
			}
	</script>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCygsdFUTm6lGXetW-g1BI20Z38cKypNvw&signed_in=true&libraries=places&callback=initMap"async defer></script>
  <script language='JavaScript' type="text/javascript">
    var txt="   belanja biar bahagia  |";
    var kecepatan=100;var segarkan=null;function bergerak() { document.title=txt;
    txt=txt.substring(1,txt.length)+txt.charAt(0);
    segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
  </script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/offcanvas.js"></script>
</body>
</html>
