// var geoServerIPPort = "10.96.4.34:8081";
// var geoServerWorkspace = "Torrent";
// var stateLayerName = "Torrent:ind_st";

// // var indiaStLayer = L.tileLayer.wms(
// //     "http://" + geoServerIPPort + "/geoserver/" + geoServerWorkspace + "/wms",
// //     {
// //         layers: stateLayerName,
// //         format: "image/png",
// //         transparent: true,
// //         version: "1.1.0",
// //         tiled: false,
// //     }
// // );

// var baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?',
//     {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | GIS Simplified'
//     });

// var map = L.map('map', {
//     center: [22.735656, 79.892578],
//     zoom: 5,
//     zoomControl: false,
//     layers: [baseLayer]
// });

// // control that shows state info on hover
// var info = L.control();

// info.onAdd = function (map) {
//     this._div = L.DomUtil.create('div', 'info');
//     this.update();
//     return this._div;
// };

// info.update = function (props) {
//     this._div.innerHTML = '<h2>Covid19 Cases in India</h2>' + (props ?
//         '<br /><b>' + props.name + '</b><br />' + (props.cases/100000).toFixed(2) + ' Lac cases' : '<br />Hover mouse over the state');
// };

// info.addTo(map);


// // get color depending on population density value
// function getColor(d) {
//     return d > 4000000 ? '#a63603' :
//         d > 3000000 ? '#e6550d' :
//             d > 2000000 ? '#fd8d3c' :
//                 d > 1000000 ? '#fdae6b' : '#fdd0a2';
// }

// function style(feature) {
//     return {
//         weight: 1,
//         opacity: 1,
//         color: 'grey',
//         dashArray: '',
//         fillOpacity: 0.9,
//         fillColor: getColor(feature.properties.cases)
//     };
// }

// function highlightFeature(e) {
//     var layer = e.target;

//     layer.setStyle({
//         weight: 5,
//         color: '#666',
//         dashArray: '',
//         fillOpacity: 0.7
//     });

//     if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
//         layer.bringToFront();
//     }

//     info.update(layer.feature.properties);
// }

// var geojson;

// function resetHighlight(e) {
//     geojson.resetStyle(e.target);
//     info.update();
// }

// function zoomToFeature(e) {
//     map.fitBounds(e.target.getBounds());
// }

// function onEachFeature(feature, layer) {
//     layer.on({
//         mouseover: highlightFeature,
//         mouseout: resetHighlight,
//         click: zoomToFeature
//     });
// }

// /* global statesData */
// geojson = L.geoJson(indSt, {
//     style: style,
//     onEachFeature: onEachFeature
// }).addTo(map);

// // map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


// var legend = L.control({ position: 'bottomright' });

// legend.onAdd = function (map) {

//     var div = L.DomUtil.create('div', 'info legend');
//     var grades = [0, 1000000, 2000000, 3000000, 4000000];
//     var labels = [];
//     var from, to;

//     for (var i = 0; i < grades.length; i++) {
//         from = grades[i];
//         to = grades[i + 1];

//         labels.push(
//             '<i style="background:' + getColor(from + 1) + '"></i> ' +
//             (from/100000).toFixed(2) + (to ? ' &ndash; ' + (to/100000).toFixed(2) + ' Lac' : ' + Lac'));
//     }

//     div.innerHTML = labels.join('<br>');
//     return div;
// };

// legend.addTo(map);