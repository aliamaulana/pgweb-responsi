<?php

// URL GeoServer Anda
$geoServerUrl = 'http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3AADMINISTRASIKECAMATAN_BULELENG&maxFeatures=50&outputFormat=application%2Fjson';

// Nama workspace dan layer di GeoServer
$workspace = 'diy';
$layerName = 'ADMINISTRASIKECAMATAN_BULELENG';

// Nama pengguna dan kata sandi GeoServer
$username = 'admin';
$password = 'geoserver';

// Membangun URL untuk mengambil GeoJSON dari GeoServer
$geoJsonUrl = "http://localhost:8080/geoserver/diy/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=diy%3AADMINISTRASIKECAMATAN_BULELENG&maxFeatures=50&outputFormat=application%2Fjson";

// Konfigurasi cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $geoJsonUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

// Eksekusi cURL dan dapatkan respons
$response = curl_exec($ch);

// Tutup koneksi cURL
curl_close($ch);

// Mengirimkan header JSON
header('Content-Type: application/json');

// Mengirimkan data GeoJSON ke klien
echo $response;

?> 