mapboxgl.accessToken = 'pk.eyJ1IjoibWFlbWkiLCJhIjoiY2puYjZsc2YxMWxnNDNrbWwyMDlmcjY5byJ9.yjXV-R2JmPrcsXc3h0d5OQ';
if (!mapboxgl.supported()) {
  alert('Seu navegador não suporta nosso sistema de mapas, tente em outro navegador :(');
} else {
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [-46.6388,  -23.5489],
    zoom: 10
  });
}

  map.addControl(new MapboxDirections({
    accessToken: mapboxgl.accessToken
}), 'bottom-right');
  
  map.addControl(new mapboxgl.GeolocateControl({
  positionOptions: {
      enableHighAccuracy: true
  },
  trackUserLocation: true
  }));
  
map.on('load', function() {

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
                      "description": "<strong>FEIRA TECNOLÓGICA ETEC-ZL</strong><p><a href=\"https://www.cps.sp.gov.br/tag/feira-tecnologica/\" target=\"_blank\" title=\"Abra em outra janela\">Site da Feira Tecnológica - CPS</a></p><p>EXEMPLO DE MARCAÇÃO QUE SERÁ UTILIZADO COMO VISUALIZAÇÃO PARA UMA VAGA DE UMA EMPRESA.</p>",
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
                      "coordinates": [-46.4689961, -23.5254726]
                  }
                }]
            }
        },
        "layout": {
            "icon-image": "{icon}-15",
            "icon-allow-overlap": true
        }
    });

    // Create a popup, but don't add it to the map yet.
    var popup = new mapboxgl.Popup({
        closeButton: false,
        closeOnClick: false
    });

    map.on('mouseenter', 'places', function(e) {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor = 'pointer';

        var coordinates = e.features[0].geometry.coordinates.slice();
        var description = e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }

        // Populate the popup and set its coordinates
        // based on the feature found.
        popup.setLngLat(coordinates)
            .setHTML(description)
            .addTo(map);
    });

    map.on('mouseleave', 'places', function() {
        map.getCanvas().style.cursor = '';
        popup.remove();
    });
});


var geocoder = new MapboxGeocoder({
  accessToken: mapboxgl.accessToken
});

map.addControl(geocoder);

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