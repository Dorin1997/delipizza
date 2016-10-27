@extends("welcome")
@section("content")

<div style='margin-top:50px;' >
    <div id="map" style="width:100%;height:500px"></div>
    <Script>
 function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2),
    zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>    

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>


</div>
        
        
        
  @endsection