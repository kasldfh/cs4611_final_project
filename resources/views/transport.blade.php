@extends('layout')
@section('js')
    <?php $nav = "transport"?>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script>
      console.log('lele');
      function count() {
        console.log('hi');
      }
		  function calculateRoute(from, to) {
			// Center initialized to Duluth, MN
			var myOptions = {
			  zoom: 10,
			  center: new google.maps.LatLng(46.8, 92.1),
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			// Draw the map
			var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);

			var directionsService = new google.maps.DirectionsService();
			var directionsRequest = {
			  origin: from,
			  destination: to,
			  travelMode: google.maps.DirectionsTravelMode.DRIVING,
			  unitSystem: google.maps.UnitSystem.METRIC
			};
			directionsService.route(
			  directionsRequest,
			  function(response, status)
			  {
				if (status == google.maps.DirectionsStatus.OK)
				{
				  new google.maps.DirectionsRenderer({
					map: mapObject,
					directions: response
				  });
				}
				else
				  $("#error").append("Unable to retrieve your route<br />");
			  }
			);
		  }

		  $(document).ready(function() {
			// If the browser supports the Geolocation API
			if (typeof navigator.geolocation == "undefined") {
			  $("#error").text("Your browser doesn't support the Geolocation API");
			  return;
			}

			$("#from-link, #to-link").click(function(event) {
			  event.preventDefault();
			  var addressId = this.id.substring(0, this.id.indexOf("-"));

			  navigator.geolocation.getCurrentPosition(function(position) {
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
				  "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
				},
				function(results, status) {
				  if (status == google.maps.GeocoderStatus.OK)
					$("#" + addressId).val(results[0].formatted_address);
				  else
					$("#error").append("Unable to retrieve your address<br />");
				});
			  },
			  function(positionError){
				$("#error").append("Error: " + positionError.message + "<br />");
			  },
			  {
				enableHighAccuracy: true,
				timeout: 10 * 1000 // 10 seconds
			  });
			});

			$("#calculate-route").submit(function(event) {
			  event.preventDefault();
			  calculateRoute($("#from").val(), $("#to").val());
			});
      calculateRoute("{!!$from!!}", "{!!$to!!}");
		  });
		</script>
@endsection
@section('style')
		<style type="text/css">
		  #map {
			width: 1000px;
			height: 800px;
			margin-top: 10px;
		  }
		</style>
@endsection
@section('content')
	<h1>Map from {!!$from!!} to {!!$to!!}</h1>
	<div id="map"></div>
	<p id="error"></p>
@endsection
