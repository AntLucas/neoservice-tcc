mapboxgl.accessToken = 'pk.eyJ1IjoibWFlbWkiLCJhIjoiY2puYjZsc2YxMWxnNDNrbWwyMDlmcjY5byJ9.yjXV-R2JmPrcsXc3h0d5OQ';
var map = new mapboxgl.Map({
  container: 'map', // container id
  style: 'mapbox://styles/mapbox/light-v9', // stylesheet location
  center: [-84.5, 38.05], // starting position
  zoom: 11 // starting zoom
});

var hospitals = {
  type: 'FeatureCollection',
  features: [
    { type: 'Feature', properties: { Name: 'VA Medical Center -- Leestown Division', Address: '2250 Leestown Rd' }, geometry: { type: 'Point', coordinates: [-84.539487, 38.072916] } },
    { type: 'Feature', properties: { Name: 'St. Joseph East', Address: '150 N Eagle Creek Dr' }, geometry: { type: 'Point', coordinates: [-84.440434, 37.998757] } },
    { type: 'Feature', properties: { Name: 'Central Baptist Hospital', Address: '1740 Nicholasville Rd' }, geometry: { type: 'Point', coordinates: [-84.512283, 38.018918] } },
    { type: 'Feature', properties: { Name: 'VA Medical Center -- Cooper Dr Division', Address: '1101 Veterans Dr' }, geometry: { type: 'Point', coordinates: [-84.506483, 38.02972] } },
    { type: 'Feature', properties: { Name: 'Shriners Hospital for Children', Address: '1900 Richmond Rd' }, geometry: { type: 'Point', coordinates: [-84.472941, 38.022564] } },
    { type: 'Feature', properties: { Name: 'Eastern State Hospital', Address: '627 W Fourth St' }, geometry: { type: 'Point', coordinates: [-84.498816, 38.060791] } },
    { type: 'Feature', properties: { Name: 'Cardinal Hill Rehabilitation Hospital', Address: '2050 Versailles Rd' }, geometry: { type: 'Point', coordinates: [-84.54212, 38.046568] } },
    { type: 'Feature', properties: { Name: 'St. Joseph Hospital', Address: '1 St Joseph Dr' }, geometry: { type: 'Point', coordinates: [-84.523636, 38.032475] } },
    { type: 'Feature', properties: { Name: 'UK Healthcare Good Samaritan Hospital', Address: '310 S Limestone' }, geometry: { type: 'Point', coordinates: [-84.501222, 38.042123] } },
    { type: 'Feature', properties: { Name: 'UK Medical Center', Address: '800 Rose St' }, geometry: { type: 'Point', coordinates: [-84.508205, 38.031254] } }
  ]
};


map.on('load', function() {
  map.addLayer({
    id: 'hospitals',
    type: 'symbol',
    source: {
      type: 'geojson',
      data: hospitals
    },
    layout: {
      'icon-image': 'hospital-15'
    },
    paint: { }
  });

  map.addLayer({
    id: 'libraries',
    type: 'symbol',
    source: {
      type: 'geojson',
      data: libraries
    },
    layout: {
      'icon-image': 'rocket-15'
    },
    paint: { }
  });

  map.addSource('nearest-hospital', {
    type: 'geojson',
    data: {
      type: 'FeatureCollection',
      features: []
    }
  });
});

var popup = new mapboxgl.Popup();

map.on('mousemove', function(e) {

  var features = map.queryRenderedFeatures(e.point, { layers: ['hospitals', 'libraries'] });
  if (!features.length) {
    popup.remove();
    return;
  }

  var feature = features[0];

  popup.setLngLat(feature.geometry.coordinates)
  .setHTML(feature.properties.Name)
  .addTo(map);

  map.getCanvas().style.cursor = features.length ? 'pointer' : '';

});

map.on('click', function(e) {
  var libraryFeatures = map.queryRenderedFeatures(e.point, { layers: ['libraries'] });
  if (!libraryFeatures.length) {
    return;
  }

  var libraryFeature = libraryFeatures[0];

  var nearestHospital = turf.nearest(libraryFeature, hospitals);

  if (nearestHospital !== null) {

    map.getSource('nearest-hospital').setData({
      type: 'FeatureCollection',
      features: [nearestHospital]
    });

    map.addLayer({
      id: 'nearest-hospital',
      type: 'circle',
      source: 'nearest-hospital',
      paint: {
        'circle-radius': 12,
        'circle-color': '#486DE0'
      }
    }, 'hospitals');
  }
});