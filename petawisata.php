<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Kabupaten Buleleng</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Search CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />

  <!-- Geolocation CSS Library for Plugin -->
  <link rel="stylesheet"
    href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />

  <!-- Leaflet Mouse Position CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />

  <!-- Leaflet Measure CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />

  <!-- EasyPrint CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />

  <!-- Marker Cluster -->
  <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.css">
  <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.Default.css">

  <!--Routing-->
  <link rel="stylesheet" href="assets/plugins/leaflet-routing/leaflet-routing-machine.css" />

    <style>
        #map {
            height: 100vh;
            margin-left: 40px;
            margin-right: 40px;
            margin-bottom: 40px;
        }

        /* Background pada Judul */
        *.info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
        }

        info h2 {
            margin: 0 0 5px;
            color: #777;
        }
    </style>


</head>

<body>

    <div id="map"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Search JavaScript Library -->
  <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>

<!-- Geolocation Javascript Library -->
<script
  src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>

<!-- Leaflet Mouse Position JavaScript Library -->
<script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>

<!-- Leaflet Measure JavaScript Library -->
<script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>

<!-- EasyPrint JavaScript Library -->
<script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

<!-- Marker Cluster -->
<script src="assets/plugins/leaflet-markercluster/leaflet.markercluster.js"></script>
<script src="assets/plugins/leaflet-markercluster/leaflet.markercluster-src.js"></script>

<!--Routing-->
<script src="assets/plugins/leaflet-routing/leaflet-routing-machine.js"></script>
<script src="assets/plugins/leaflet-routing/leaflet-routing-machine.min.js"></script>

    <script>
        var map = L.map('map').setView([-8.246623214366041, 115.00246452963869], 5);

        /* Judul dan Subjudul */
    var title = new L.Control();
    title.onAdd = function (map) {
      this._div = L.DomUtil.create('div', 'info');
      this.update();
      return this._div;
    };
    title.update = function () {
      this._div.innerHTML = '<h3> Eksplorasi Keindahan | Peta Sebaran Destinasi Wisata  </h3> <h4>Kabupaten Buleleng</h4>'
    };
    title.addTo(map);



        /* Tile Basemap */
        var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIGUGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
        });

        var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/ { z } / { y } / { x }', {
            attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{ x }', {
            attribution: 'Tiles & copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIGUGM</a>'

        });

        var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org / ">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        basemap1.addTo(map);
        

        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4,
        };

        var overlayMaps = {

        };



        L.control.layers(baseMaps, overlayMaps, { collapsed: false, position: 'topright' }).addTo(map);

        var cek = L.geoJson(null, {
            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {
                    // icon: L.icon({
                    //   iconUrl: "assets/img/marker/fas_rumahsakit_rujukan.png",
                    //   iconSize: [32, 32],
                    //   iconAnchor: [16, 32],
                    //   popupAnchor: [0, -32],
                    //   tooltipAnchor: [16, -20]
                    // })
                });
            },
            onEachFeature: function (feature, layer) {
                var content = "Kecamatan: " + feature.properties.namobj + "<br>";
                layer.on({
                    click: function (e) {
                        cek.bindPopup(content).openPopup();
                    },
                    mouseover: function (e) {
                        cek.bindTooltip(feature.properties.namobj).openTooltip();
                    },
                    mouseout: function (e) {
                        cek.closePopup();
                        cek.closeTooltip();
                    }
                });
            }
        });


        $.getJSON("geohub.php", function (data) {
            cek.addData(data);
            cek.addTo(map);
            map.fitBounds(cek.getBounds());
        });


        /* Image Legend */
    L.Control.Legend = L.Control.extend({
      onAdd: function (map) {
        var img = L.DomUtil.create('img');
        img.src = 'assets/img/legend/legendawisata.png';
        img.style.width = '350px';
        return img;
      }
    });

    L.control.Legend = function (opts) {
      return new L.Control.Legend(opts);
    }

    L.control.Legend({ position: 'bottomleft' }).addTo(map);




    /* Image Watermark */
    L.Control.Watermark = L.Control.extend({
      onAdd: function (map) {
        var img = L.DomUtil.create('img');
        img.src = 'assets/img/logo/logo-branding-buleleng.png';
        img.style.width = '300px';
        return img;
      }
    });

    L.control.watermark = function (opts) {
      return new L.Control.Watermark(opts);
    }

    L.control.watermark({ position: 'bottomleft' }).addTo(map);


    /*Plugin Search */
    var searchControl = new L.Control.Search({
      position: "topleft",
      layer: cek, //Nama variabel layer
      propertyName: 'namobj', //Field untuk pencarian
      marker: false,
      moveToLocation: function (latlng, title, map) {
        var zoom = map.getBoundsZoom(latlng.layer.getBounds());
        map.setView(latlng, zoom);
      }
    });
    searchControl.on('search:locationfound', function (e) {
      e.layer.setStyle({
        fillColor: '#ffff00',
        color: '#0000ff'
      });
    }).on('search:collapse', function (e) {
      featuresLayer.eachLayer(function (layer) {
        featuresLayer.resetStyle(layer);
      });
    });
    map.addControl(searchControl);




    /*Plugin Geolocation */
    var locateControl = L.control.locate({
      position: "topleft",
      drawCircle: true,
      follow: true,
      setView: true,
      keepCurrentZoomLevel: false,
      markerStyle: {
        weight: 1,
        opacity: 0.8,
        fillOpacity: 0.8,
      },
      circleStyle: {
        weight: 1,
        clickable: false,
      },
      icon: "fas fa-crosshairs",
      metric: true,
      strings: {
        title: "Click for Your Location",
        popup: "You're here. Accuracy {distance} {unit}",
        outsideMapBoundsMsg: "Not available"
      },
      locateOptions: {
        maxZoom: 16,
        watch: true,
        enableHighAccuracy: true,
        maximumAge: 10000,
        timeout: 10000
      },
    }).addTo(map);


    /*Plugin Mouse Position Coordinate */
    L.control.mousePosition({ position: "bottomright", separator: ",", prefix: "Point Coodinate: " }).addTo(map);


    /*Plugin Measurement Tool */
    var measureControl = new L.Control.Measure({
      position: "topleft",
      primaryLengthUnit: "meters",
      secondaryLengthUnit: "kilometers",
      primaryAreaUnit: "hectares",
      secondaryAreaUnit: "sqmeters",
      activeColor: "#FF0000",
      completedColor: "#00FF00",
    });
    measureControl.addTo(map);

    /*Plugin EasyPrint */
    L.easyPrint({
      title: "Print",
    }).addTo(map);


    /*Plugin Routing*/
     L.Routing.control({
      waypoints: [
         L.latLng(-8.246623214366041, 115.00246452963869),
         L.latLng(-8.191713381221415, 114.75039030651457)
       ],
       routeWhileDragging: true
     }).addTo(map);
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "buleleng";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM wisata";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $lat = $row["lattitude"];
                $long = $row["longitude"];
                $info = $row["nama"];
                $lokasi = $row["lokasi"];
                $jenis = $row["jenis_wisata"];
                $tiket = $row["tiket_masuk"];
                $jam = $row["jam_buka"];
                $rat = $row["rating"];
                echo "L.marker([$lat, $long]).addTo(map).bindPopup(' Nama : $info <br> Lokasi : $lokasi <br> Jenis Wisata : $jenis <br> Harga Tiket: $tiket <br> Jam Buka: $jam <br> Rating : $rat');";
            } 
        }
        else {
            echo "0 results";
        }
            $conn->close();
    ?>


    </script>


</body>

</html>