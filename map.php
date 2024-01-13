<?php
require 'db.php';
?>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Ambulance Tracking System</title>
        
    </head>
    <body>
    
    <header>
        <h1>Ambulance Tracking System</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
    </nav>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phone Location Map</title>
  <!-- Include Leaflet CSS and JavaScript -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>

  <!-- Create a div to hold the map -->
  <div id="map" style="height: 400px;"></div>

  <p id="lat">Latitude: </p>
  <p id="lng"> Longitude: </p>

  <script>
    // Your JavaScript code will go here
    
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize the map
    var map = L.map('map').setView([0, 0], 13);

    // Add a tile layer (you can use other tile providers)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Get the user's current location using Geolocation API
    if ('geolocation' in navigator) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var lat = position.coords.latitude;
        var lon = position.coords.longitude;
        
        document.getElementById('lat').textContent = 'Latitude: ' + lat;
          document.getElementById('lng').textContent = 'Longitude: ' + lon;
        console.log(lat);
        console.log(lon);

        document.cookie="lat="+lat;
        document.cookie="lon="+lon;
        // Update the map with the user's location
        map.setView([lat, lon], 13);

        // Add a marker at the user's location
        L.marker([lat, lon]).addTo(map)
          .bindPopup('Your Phone Location').openPopup();

          debugger;
          var http = new XMLHttpRequest();
          var url = 'location.php';
          var params = 'lat='+ lat + '&lon='+ lon;
          http.open('POST', url, true);
          http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          http.onreadystatechange = function() {//Call a function when the state changes.
    // if(http.readyState == 4 && http.status == 200) {
    //     alert(http.responseText);
    // }
}
http.send(params);

      }, function (error) {
        console.error('Error getting location:', error.message);
      });
    } else {
      console.error('Geolocation is not supported by your browser');
    }
  });
</script>
  </script>

</body>
</html>
<?
$lat = $_COOKIE['lat'];
$lon = $_COOKIE['lon'];
echo 'inserting $lat $lon';
InsertLocation($lat, $lon);

?>