var map, infoWindow;
      function initMap() {
		
		map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
		gestureHandling: 'greedy',
		disableDefaultUI: true
        });
        infoWindow = new google.maps.InfoWindow;
		
		// MARCADORES
		var uluru = {lat: -23.5236534, lng: -46.4762795};
		var marker = new google.maps.Marker({position: uluru, map: map});
		var uluru = {lat: -23.5362496, lng: -46.4823017};
		var marker = new google.maps.Marker({position: uluru, map: map});
		var uluru = {lat: -23.5490403, lng: -46.4828271};
		var marker = new google.maps.Marker({position: uluru, map: map});
		
        // Geolocalização
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Sua localização.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: O serviço de geolocalização falhou.' :
                              'Error: Seu navegador não suporta a geolocalização.');
        infoWindow.open(map);
      }