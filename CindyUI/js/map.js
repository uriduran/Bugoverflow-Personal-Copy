function init() {
	//alert("ready");
	var mapOptions = {
		center: new google.maps.LatLng(41.8781, -87.6298),
		zoom: 15,
		mapTypeId: google.maps.MapTypeId.SATELLITE,
		mapTypeControl: true
	};

	var mapCanvas = document.getElementById('map-div');

	var map = new google.maps.Map(mapCanvas, mapOptions);

  var icon = {
    url: "images/ladyicon.png",
    scaledSize: new google.maps.Size(50, 50), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(10, 10) // anchor
  };

	var marker = new google.maps.Marker({
    	map: map,
    	position: new google.maps.LatLng(41.8781, -87.6298),
    	icon: icon,
    	title: 'Bug Locations'
    });
    
    var infowindow = new google.maps.InfoWindow({
            content: windowContent
    });

    google.maps.event.addListener(marker, 'click', function(){
            infowindow.open(map, marker);
    });

    // Geolocation below
    function moveMap(loc){
      //console.log(loc.coords);
      map.panTo(new google.maps.LatLng(loc.coords.latitude, loc.coords.longitude));
      map.setZoom(16);
    }

    document.getElementById('mylocation-btn').addEventListener('click', function(){
    	navigator.geolocation.getCurrentPosition(moveMap);
    });

    document.getElementById('textbox-btn').addEventListener('click', function(){
      var geocoder = new google.maps.Geocoder();
      var address = jQuery('#address').val();

      geocoder.geocode( { 'address': address}, function(results, status) {

      if (status == google.maps.GeocoderStatus.OK) {
        var latitude = results[0].geometry.location.lat();
        var longitude = results[0].geometry.location.lng();
        jQuery('#coordinates').val(latitude+', '+longitude);
        } 
          else {
          alert('Can not locate address');
        }
      });
    });
}

google.maps.event.addDomListener(window, 'load', init);


