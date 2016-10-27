@extends("welcome")
@section("content")

<div style='margin-top:50px;' >
<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>Delicius Pizza</h3>
    <div id="map"></div>
    <script>
        
      function initMap() {
        var uluru = {lat: 47.0196894, lng: 28.83098689999997};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
          
          
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZKGfTHWTmiDWcRX8Vosk3cXbMxPSGJN8&callback=initMap">
    </script>
  </body>
</html>   
  @endsection