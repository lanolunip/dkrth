<!DOCTYPE html>
<html>
<body>

<h1>My First Google Map</h1>

<div id="googleMap" style="width:100%;height:400px;"></div>
<div id="lokasi_peta">Belum Ada</div>
<script>
function myMap() {
    var mapProp= {
    center:new google.maps.LatLng(-7.2575,112.7521),
    zoom:15,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker;

    google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
    });


    function placeMarker(location) {

        if (marker == null)
        {
            marker = new google.maps.Marker({
                position: location,
                map: map
            }); 
        } 
        else 
        {
            marker.setPosition(location); 
            
        } 
        ubahLokasi();
    }

    function ubahLokasi(){
        document.getElementById("lokasi_peta").innerHTML="<p>Lat:" + marker.getPosition().lat() + "</p> <p>Long:" + marker.getPosition().lng() + "</p>"; 
    }
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSF8UV4KQr_6dq14G2zXBAjL2ErBUUqWQ&callback=myMap"></script>
</body>
</html> 