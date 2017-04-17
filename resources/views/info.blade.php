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
      <div style="color:white">
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
    <br>
    <div class="formasiceamainouanoutate  color1">
                        <div class="infojos color1">
                                <h3 class="noutatiantet">Delicious Pizza</h3>
                                <span>Specific: Pizza <br>
                                    Livrare: 15 lei in tot orasul <br>
                                    Timp de servire: 45 minute de la preluarea comenzii <br>
                                    Orar: Luni - Joi 11:00- 23:00 <br>
                                    Sambata: 11:00 - 01:00 <br>
                                    Duminica: 13:00 - 11:00 <br>
                                </span>
                              
                        </div>
                        <div class=" telefon color1">

                                    <span > <strong> <br> Numarul de telefon fix </strong> <br> <br> </span>
                                        <span>0299-23-149</span>
                                        <h4>Numarul de telefon mob. 1</h4>
                                        <span> 060-235-157 </span>
                                          <h4>Numarul de telefon mob. 2</h4>
                                          <span> 079-148-489 <br></span>

                        </div>
                </div>
    </div>
  </body>
</html>   
  @endsection