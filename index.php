<!DOCTYPE html >
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Marking Beberapa Lokasi dengan XML</title>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link href="bootstrap.min.css" rel="stylesheet">

        <style>
            html, body {
                font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
                font-size: small;
            }
            #map {
                width: 900px;
                height: 580px;
                border: 1px solid black;
            }
        </style>

        <script type="text/javascript"> //menampilkan peta
            var customIcons = {
                icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
                shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            };

            function load() {
                var map = new google.maps.Map(document.getElementById("map"), {
                    center: new google.maps.LatLng(-7.566679, 110.807259),
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
                var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

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

    </head>

    <body onLoad="load()">
		<center>
			<form action="index.php" method="post">
				<input type="text" name="start" id="start" placeholder="Posisi awal">
								
				<select id="end" name="end">
					<option value="Solo Grand Mall">Solo Grand Mall</option>
					<option value="Paragon Mall">Paragon Mall</option>
					<option value="Solo Center Point">Solo Center Point</option>
					<option value="Luwes Nusukan">Luwes Nusukan</option>
					<option value="Estu Luwes 2">Luwes Pasar Legi</option>
					<option value="LotteMart Wholesale - Solo">LotteMart Tipes</option>
					<option value="Solo Square">Solo Square</option>
					<option value="Hartono Mall Solo Baru">Hartono Mall Solo Baru</option>
				</select>
				
				<input type="submit" value="Cari Rute">
			</form>
		</center>
		<br />

		<div id="map"></div>
		<?php
		if((isset($_POST['start'])) AND ($_POST['end'] <> "")) {
		$saddr = $_POST['start'];
		$daddr = $_REQUEST['end'];
		include ('direction.php');
		}
		?>
		<script> //autocomplete untuk textbox
			function initMap() {
				var input = /** @type {!HTMLInputElement} */(
						document.getElementById('start'));

				var autocomplete = new google.maps.places.Autocomplete(input);
				autocomplete.bindTo('bounds', map);

				var infowindow = new google.maps.InfoWindow();
				var marker = new google.maps.Marker({
					map: map,
					anchorPoint: new google.maps.Point(0, -29)
				});

				autocomplete.addListener('place_changed', function() {
					infowindow.close();
					marker.setVisible(false);
					var place = autocomplete.getPlace();
					if (!place.geometry) {
						window.alert("Autocomplete's returned place contains no geometry");
						return;
					}

					// If the place has a geometry, then present it on a map.
					if (place.geometry.viewport) {
						map.fitBounds(place.geometry.viewport);
					} else {
						map.setCenter(place.geometry.location);
						map.setZoom(15);  // Why 17? Because it looks good. Good mbahmu wi, apik 15
					}
					marker.setIcon(/** @type {google.maps.Icon} */({
						url: place.icon,
						size: new google.maps.Size(71, 71),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(35, 35)
					}));
					marker.setPosition(place.geometry.location);
					marker.setVisible(true);

					var address = '';
					if (place.address_components) {
						address = [
							(place.address_components[0] && place.address_components[0].short_name || ''),
							(place.address_components[1] && place.address_components[1].short_name || ''),
							(place.address_components[2] && place.address_components[2].short_name || '')
						].join(' ');
					}

					infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
					infowindow.open(map, marker);
				});

				// Sets a listener on a radio button to change the filter type on Places
				// Autocomplete.
				function setupClickListener(id, types) {
					var radioButton = document.getElementById(id);
					radioButton.addEventListener('click', function() {
						autocomplete.setTypes(types);
					});
				}
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCygsdFUTm6lGXetW-g1BI20Z38cKypNvw&signed_in=true&libraries=places&callback=initMap"async defer></script>


		</center><br />
		<center>Copyright &copy; 2015 | corporate with AVISTUD Creativeless</center>
	</body>
</html>
