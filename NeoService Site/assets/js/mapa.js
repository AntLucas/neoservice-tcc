mapboxgl.accessToken = 'pk.eyJ1IjoibWFlbWkiLCJhIjoiY2puYjZsc2YxMWxnNDNrbWwyMDlmcjY5byJ9.yjXV-R2JmPrcsXc3h0d5OQ';
if (!mapboxgl.supported()) {
  alert('Seu navegador não suporta nosso sistema de mapas, tente outro navegador :(');
} else {
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-47.9292, -15.7801],
    zoom: 3
  });
}

map.addControl(new mapboxgl.GeolocateControl({
  positionOptions: {
      enableHighAccuracy: true
  },
  trackUserLocation: true
}));
map.on('load', function () {
  // Add a layer showing the places.
  map.addLayer({
      "id": "places",
      "type": "symbol",
      "source": {
          "type": "geojson",
          "data": {
              "type": "FeatureCollection",
              "features": [{
                  "type": "Feature",
                  "properties": {
                      "description": "<strong>Etec da Zona Leste</strong><p><a href=\"www.google.com\" target=\"_blank\" title=\"Abra em outra janela\">Exemplo de HREF</a> será utilizado como forma de possível contato com empresa/usuário. </p>",
                      "icon": "rocket"
                  },
                  "geometry": {
                      "type": "Point",
                      "coordinates": [-46.4774307, -23.523519]
                  }
              }, {
                  "type": "Feature",
                  "properties": {
                      "description": "<strong>EMPRESA FICTICIA LTDA</strong><p><strong>CNPJ: 27.485.363/0001-10</strong></p><p></a>CONTRATANDO: TÉCNICO DE INFORMÁTICA</p><p>SALÁRIO: A COMBINAR</p><p>HORÁRIO: 09h ~ 18h</p>",
                      "icon": "rocket"
                  },
                  "geometry": {
                      "type": "Point",
                      "coordinates": [-46.4830317, -23.5334324]
                  }
              }]
          }
      },
      "layout": {
          "icon-image": "{icon}-15",
          "icon-allow-overlap": true
      }
  });

  // When a click event occurs on a feature in the places layer, open a popup at the
    // location of the feature, with description HTML from its properties.
    map.on('click', 'places', function (e) {
      var coordinates = e.features[0].geometry.coordinates.slice();
      var description = e.features[0].properties.description;

      // Ensure that if the map is zoomed out such that multiple
      // copies of the feature are visible, the popup appears
      // over the copy being pointed to.
      while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
          coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
      }

      new mapboxgl.Popup()
          .setLngLat(coordinates)
          .setHTML(description)
          .addTo(map);
  });

  // Change the cursor to a pointer when the mouse is over the places layer.
  map.on('mouseenter', 'places', function () {
      map.getCanvas().style.cursor = 'pointer';
  });

  // Change it back to a pointer when it leaves.
  map.on('mouseleave', 'places', function () {
      map.getCanvas().style.cursor = '';
  });
});

var geocoder = new MapboxGeocoder({
  accessToken: mapboxgl.accessToken
});

map.addControl(geocoder);

// After the map style has loaded on the page, add a source layer and default
// styling for a single point.
map.on('load', function() {
  map.addSource('single-point', {
      "type": "geojson",
      "data": {
          "type": "FeatureCollection",
          "features": []
      }
  });

  map.addLayer({
      "id": "point",
      "source": "single-point",
      "type": "circle",
      "paint": {
          "circle-radius": 10,
          "circle-color": "#007cbf"
      }
  });

  // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
  // makes a selection and add a symbol that matches the result.
  geocoder.on('result', function(ev) {
      map.getSource('single-point').setData(ev.result.geometry);
  });
});