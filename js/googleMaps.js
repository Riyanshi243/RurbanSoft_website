// /* 
//  * Map Activity 
//  * It include two php files code for showing marker on the Maps
//  * 1. WorkItem
//  * 2. Phase_wise
//  */

// var map;
// var markers = [];
// function initMap(){
//     var latlng = {lat: 20.5937, lng: 78.9629};
//     map = new google.maps.Map(document.getElementById('map'), {
//           center: latlng ,
//           zoom: 4
//         });
//        // map.addListener('onload',addFeatureLayer());
//     ///////////////////////////////////    
//     /*require([
//         "esri/map", "esri/layers/FeatureLayer", "esri/InfoTemplate",
//         "esri/symbols/SimpleLineSymbol", "esri/symbols/SimpleFillSymbol",
//         "esri/renderers/UniqueValueRenderer", "esri/Color",
//         "dojo/domReady!"
//       ], function(
//         Map, FeatureLayer, InfoTemplate,
//         SimpleLineSymbol, SimpleFillSymbol,
//         UniqueValueRenderer, Color
//       ) {
//         map = new Map("map", {
//           //basemap: "streets",
//           //center: [78,21],
//           //zoom: 4,
//           //slider: false
//         });
//         map.on("load", addFeatureLayer);

//         function addFeatureLayer() {
//           var defaultSymbol = new SimpleFillSymbol().setStyle(SimpleFillSymbol.STYLE_NULL);
//           defaultSymbol.outline.setStyle(SimpleLineSymbol.STYLE_NULL);

//           //create renderer
//           var renderer = new UniqueValueRenderer(defaultSymbol, "STCODE11");

//           //add symbol for each possible value
// 		  for(var i=0; i<38; i++) {
// 		  if(i<6)
// 		  renderer.addValue('0'+i, new SimpleFillSymbol().setColor(new Color([255, 0, 0, 0.5])));
// 		  else if(i<10)
// 		  renderer.addValue('0'+i, new SimpleFillSymbol().setColor(new Color([0, 255, 0, 0.5])));
// 		  else if(i<16)
// 		  renderer.addValue(i, new SimpleFillSymbol().setColor(new Color([0, 0, 255, 0.5])));
// 		  else if(i<21)
// 		  renderer.addValue(i, new SimpleFillSymbol().setColor(new Color([255, 0, 255, 0.5])));
// 		  else if(i<26)
// 		  renderer.addValue(i, new SimpleFillSymbol().setColor(new Color([255, 255, 15, 0.75])));
// 		  else if(i<31)
// 		  renderer.addValue(i, new SimpleFillSymbol().setColor(new Color([0, 255, 255, 0.5])));
// 		  else if(i<38)
// 		  renderer.addValue(i, new SimpleFillSymbol().setColor(new Color([127, 127, 127, 0.5])));
		  
// 		  }
          
//           var featureLayer = new FeatureLayer("http://rsgis.nic.in/ArcGIS/rest/services/adminbd/MapServer/0", {
//             infoTemplate: new InfoTemplate("&nbsp;", "${*}"),
//             mode: FeatureLayer.MODE_ONDEMAND,
//             outFields: ["*"]
//           });
          
//           featureLayer.setRenderer(renderer);
//           map.addLayer(featureLayer);
//         }
//       });*/ 
//     ///////////////////////////////////
//     map.data.loadGeoJson('GeoJSON/india_st.geojson');
//     //map.data.loadGeoJson('http://sampleserver1.arcgisonline.com/ArcGIS/rest/services/Demographics/ESRI_Census_USA/MapServer?f=json');
//     //map.data.loadGeoJson('GeoJSON/india_ds.geojson');
    
//     // Color each letter gray. Change the color when the isColorful property
//     // is set to true.
//     map.data.setStyle(function(feature) {
//         var color = 'gray';
//         return /** @type {google.maps.Data.StyleOptions} */({
//             fillColor: color,
//             strokeColor: color,
//             strokeWeight: 1
//         });
//     });
    
//     var allData = JSON.parse(document.getElementById('allData').innerHTML);
//     showWorkitemMarker(allData);
//     showPhaseMarker(allData);
// }

// function showWorkitemMarker(allData){
//     var infoWind = new google.maps.InfoWindow({maxWidth: 450});
//     Array.prototype.forEach.call(allData, function(data){   
//         //Text contents
//         //Values From db to local variable
//         var lat = data.LAT;
//         var lng = data.LNG;
   
//         var i = data.ID;
        
//         var state = data.STATE;
//         var dist = data.DISTRICT;
//         var cluster = data.CLUSTER;
//         var gp = data.GP;
//         var compo = data.COMPONENT;
//         var subCompo = data.SUB_COMPONENT;
//         var phase = data.PHASE; 
//         var cmt = data.COMMENT;
//         var image = "workitem/getImageFile.php?id="+i;
    
//        // alert(image);
//         var content =   "<div style='background-color: white;'><div align='center'><a href="+image+"><img style='height:100px; width:150px;' src="+image+" /></a><br></div>"+
//                         "<div><b><b>State :</b></b> "+state +
//                         "<br><b><b>District :</b></b> "+dist +
//                         "<br><b><b>Cluster :</b></b> "+cluster +
//                         "<br><b><b>GP :</b></b> "+gp+
//                         "<br><b><b>Component :</b></b> "+compo +
//                         "<br><b><b>Sub-Component :</b></b> "+subCompo +
//                         "<br><b><b>Phase :</b></b> "+phase +
//                         "<br><b><b>Comment :</b></b> "+cmt +
//                         "<br></div></div>"; 
                
//         var marker = new google.maps.Marker({
//             position: new google.maps.LatLng(lat, lng),
//             icon:'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
//             map: map,
            
//         });
//         markers.push(marker);
//         marker.addListener('click', function(){
//             infoWind.setContent(content);
//             infoWind.open(map, marker);
//         })
               
//     });
// }

// // Adds a marker to the map and push to the array.
// function addMarker(location) {
//         var marker = new google.maps.Marker({
//           position: location,
//           map: map
//         });
//         markers.push(marker);
//       }

// // Sets the map on all markers in the array.
// function setMapOnAll(map) {
//     for (var i = 0; i < markers.length; i++) {
//         markers[i].setMap(map);
//     }
// }

// // Removes the markers from the map, but keeps them in the array.
// function clearMarkers() {
//     setMapOnAll(null);
// }

// // Shows any markers currently in the array.
// function showMarkers() {
//     setMapOnAll(map);
// }


// //loading state GeoJSON data file 
// function loadStateGeoJSON(){
//     //alert("load state geojson");
//     var callback = function(feature) {
//         // If you want, check here for some constraints.
//         map.data.remove(feature);
//     };
//     map.data.forEach(callback);
//     map.data.loadGeoJson('GeoJSON/india_st.geojson');
// }

// //loading District GeoJSON data file 
// function  loadDistrictGeoJSON(){
//      var callback = function(feature) {
//         // If you want, check here for some constraints.
//         map.data.remove(feature);
//    };
//     map.data.forEach(callback);
//     map.data.loadGeoJson('GeoJSON/india_ds.geojson');  
// }

// //setting boundaries for specific state
// function ShowStateSpecificBoundary(state){
//     var str = state.toUpperCase();
//     //alert(str);
//     map.data.setStyle(function(feature) {
//     var STATE = feature.getProperty('STATE');
//     var color = "gray";
//     if (STATE == str) {
//       color = "red";
//     }
//     return {
//       fillColor: color,
//       strokeWeight: 1
//     }
//   });
// }

// //setting boundaries for specific district
// function ShowDistrictSpecificBoundary(district){
//     loadDistrictGeoJSON();
//     var str = district.toUpperCase();
//     alert(str);
//     map.data.setStyle(function(feature) {
//     var DISTRICT = feature.getProperty('DISTRICT');
//     var color = "gray";
//     if (DISTRICT == str) {
//       color = "green";
//     }
//     return {
//       fillColor: color,
//       strokeWeight: 1,
//       colorstroke:1
//     }
//   });
// }

// //phase marker 
// function showPhaseMarker(allData){
//     var infoWind = new google.maps.InfoWindow;
//     Array.prototype.forEach.call(allData, function(data){   //Text contents
//         var i = data.id;
//         var state = data.state;
//         var district = data.district;
//         var cluster = data.cluster;
//         var thrust = data.economic;
//         var lat = data.lat;
//         var lng = data.lng;        
//         var tribe = data.tribal_nontribal;
        
//         var content =   "<div><img src='images/indianflag.jpg'/>"+
//                         "<br><b><b>State :</b></b> "+state +
//                         "<br><b><b>District :</b></b> "+district +
//                         "<br><b><b>Cluster :</b></b> "+cluster +
//                         "<br><b><b>Ecomonic Amenities :</b></b> "+thrust+
//                         "<br><b><b>Tribe :</b></b> "+tribe+
//                         "</div>"; 
//         /*var marker = new google.maps.Marker({
//                 position: new google.maps.LatLng(lat, lng),
//                 icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
//                 map: map,
//             });
//         */
//         // if condition is used just for giving the color to the markers.. 
//         if(data.phase =='I'){
//             var marker = new google.maps.Marker({
//                 position: new google.maps.LatLng(lat, lng),
//                 icon:'http://maps.google.com/mapfiles/ms/icons/pink-dot.png',
//                 map: map,
//             });
//         }
//         else if(data.phase == 'II'){
//             //alert('2');
//             var marker = new google.maps.Marker({
//                 position: new google.maps.LatLng(lat, lng),
//                 icon:'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
//                 map: map,
//             });
//         }
//         else{
//             var marker = new google.maps.Marker({
//                 position: new google.maps.LatLng(lat, lng),
//                 icon:'http://maps.google.com/mapfiles/ms/icons/orange-dot.png',
//                 map: map,
//             });
//         }
        
//         markers.push(marker);
//             marker.addListener('click', function(){
//                 infoWind.setContent(content);
//                 infoWind.open(map, marker);
//             });
//     });
// }




