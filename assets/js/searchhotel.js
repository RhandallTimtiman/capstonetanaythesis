function setMap(mapContainer, long = 121.2849, lat = 14.5005) {
  // The location in long-lat
  var longLat = {lat: lat, lng: long};
  // The map, centered at location
  var map = new google.maps.Map(
    mapContainer,
    {
      zoom: 18,
      center: longLat
    }
  );
  // The marker, positioned at location
  var marker = new google.maps.Marker({
    position: longLat,
    map: map
  });

  return map;
}

$(function(){
  $('#viewmap').on('click', function(){
    var latitude = $('#viewmap').attr('data-lat');
    var longhitude = $('#viewmap').attr('data-long');

    var map = setMap(document.getElementById('map'), parseFloat(longhitude), parseFloat(latitude));
    google.maps.event.trigger(map, 'resize');
    });
});
