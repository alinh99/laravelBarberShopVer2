var mapProp = {
    center: new google.maps.LatLng(21.033333, 105.849998),
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
var myCenter = new google.maps.LatLng(21.033333, 105.849998);
var marker = new google.maps.Marker({
    position: myCenter,
    icon: 'map-icon.png',
    animation: google.maps.Animation.BOUNCE
});

marker.setMap(map);

var haNoi = new google.maps.LatLng(21.033333, 105.849998);
var haiPhong = new google.maps.LatLng(20.850000, 106.666664);
var daNang = new google.maps.LatLng(16.049999, 108.199997);
var myTrip = [daNang, haiPhong, haNoi];
var flightPath = new google.maps.Polyline({
    path: myTrip,
    strokeColor: "#0000FF",
    strokeOpacity: 0.8,
    strokeWeight: 2
});

var infowindow = new google.maps.InfoWindow({
    content: "Hello World!"
});

infowindow.open(map, marker);

google.maps.event.addListener(marker, 'click    ', function() {
    map.setZoom(9);
    map.setCenter(marker.getPosition());
});

var infowindow = new google.maps.InfoWindow({
    content: "Hello World!"
});

google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
});

google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);
});

function placeMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
    });
    var infowindow = new google.maps.InfoWindow({
        content: 'Latitude: ' + location.lat() +
            'Longitude: ' + location.lng()
    });
    infowindow.open(map, marker);
}