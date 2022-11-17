<!-- <!DOCTYPE html>
<html>
<head>
	<title>ViewApprovedWorkItems</title>
	<link rel="stylesheet" type="text/css" href="CSS/PhaseWise.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="box-area">
        <header>
            <div class="wrapper">
            <nav class="navbar">
                <img src="Images/rurban.png" />
                <h1 class="heading">RurbanSoft</h1>
                <div>
                        <ul>
                            <li> <h4><a href="homePage.php" >Home</a></h4></li>
                            <li> <a href="homePage.php?logout='1'" >Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div> 
<section id="home">
    <div class="main">
    <div id="map" style="width: 1200px; height: 700px;"></div>

	</div>
</section>

<footer id="footer"> 
    <div class="bottom">
    <div>
        <img src="Images/digitalindialogo.png" width="300" height="100"/>
        <img src="Images/india-gov.png" width="200" height="100"/>
        <img src="Images/nic.in.png" width="400" height="100"/>
        <img src="Images/ministry-of-rural-development.jpg" width="300" height="100"/>
    </div>
    <center>
        <span class="credit">National Informatics Center | </span>
        <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
    </center>
    </div>
</footer>

</body>
<script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin="">
</script>
<script>

        var map = L.map('map').setView([21.206051, 81.447886], 8);
        mapLink =
        '<a href="http://openstreetmap.org">OpenStreetMap</a>';
        L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 5,
        }).addTo(map);
        <?php

            
            $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
            $dbQuery = " SELECT * FROM workitem WHERE ID IN (SELECT workItem_ID FROM workitem_approved)"; 
            
            
            $result=mysqli_query($db,$dbQuery);
            if (mysqli_num_rows($result)>0)
            while($row = mysqli_fetch_assoc($result)):?>
            marker = new L.marker([<?php echo $row["Latitude"]; ?>, <?php echo $row["Longitude"]; ?>])
            .bindPopup("<h4>State: <?php echo $row["State"]; ?> </h4> <h4>District: <?php echo $row["District"]; ?> </h4> <h4>Cluster: <?php echo $row["Cluster"]; ?> </h4> <h4>GP: <?php echo $row["GP"]; ?> </h4> <h4>Components: <?php echo $row["Components"]; ?>  </h4> <h4>SubComponents: <?php echo $row["SubComponents"]; ?> </h4><h4>Status:  <?php echo $row["Status"]; ?> </h4> <h4>Phase:  <?php echo $row["Phase"]; ?>  </h4> <h4>Capture Time: <?php echo $row["DateTime"]; ?> </h4> <img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Image']); ?>'  width='300' height='200' /> ")
            .addTo(map);
            
                
        <?php endwhile;?>

       
</script>
</html>
 -->
 <!DOCTYPE html>
<html lang="en">

<head>
    <title>ViewApprovedWorkItems</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/leaflet/leaflet.css">
    <link rel="stylesheet" type="text/css" href="CSS/PhaseWise.css">
</head>

<body>
<div class="box-area">
        <header>
            <div class="wrapper">
            <nav class="navbar">
                <img src="Images/rurban.png" />
                <h1 class="heading">RurbanSoft</h1>
                <div>
                        <ul>
                            <li> <h4><a href="homePage.php" >Home</a></h4></li>
                            <li> <a href="homePage.php?logout='1'" >Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </div> 
    <section id="home">
    <div class="main">
    <div id="map" style="width: 1200px; height: 700px;"></div>

	</div>
</section>

    <!-- <div id='map'></div> -->

    <script type="text/javascript" src="resources/data/indSt_4326.geojson"></script>
    <script src="resources/leaflet/leaflet.js"></script>
    <script>
        var geoServerIPPort = "10.96.4.34:8081";
var geoServerWorkspace = "Torrent";
var stateLayerName = "Torrent:ind_st";

var baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?',
    {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | GIS Simplified'
    });

var map = L.map('map', {
    center: [22.735656, 79.892578],
    zoom: 5,
    zoomControl: false,
    layers: [baseLayer]
});

// control that shows state info on hover
var info = L.control();

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

info.update = function (props) {
    this._div.innerHTML = '<h2>No.of workitems</h2>' + (props ?
        '<br /><b>' + props.name + '</b><br />' + (props.cases)  : '<br />Hover mouse over the state');
};

info.addTo(map);


// get color depending on population density value
function getColor(d) {
    return d > 6 ? '#a63603' :
        d > 4 ? '#e6550d' :
            d > 2 ? '#fd8d3c' :
                d > 0 ? '#fdae6b' : '#fae9d7';
}

function style(feature) {
    return {
        weight: 1,
        opacity: 1,
        color: 'grey',
        dashArray: '',
        fillOpacity: 0.9,
        fillColor: getColor(feature.properties.cases)
    };
}
       <?php

            $db_conn = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");

            $query = 'SELECT * FROM approved_workitems';
            $result = pg_query($query) or die('Error message: ' . pg_last_error());
            
            while($row = pg_fetch_array($result)):?>
            marker = new L.marker([<?php echo $row["latitude"]; ?>, <?php echo $row["longitude"]; ?>])
            .bindPopup("<h4>State: <?php echo $row["state"]; ?> </h4> <h4>District: <?php echo $row["district"]; ?> </h4> <h4>Cluster: <?php echo $row["cluster"]; ?> </h4> <h4>GP: <?php echo $row["gp"]; ?> </h4> <h4>Components: <?php echo $row["components"]; ?>  </h4> <h4>SubComponents: <?php echo $row["subcomponents"]; ?> </h4><h4>Status:  <?php echo $row["status"]; ?> </h4> <h4>Phase:  <?php echo $row["phase"]; ?>  </h4> <h4>Capture Time: <?php echo $row["datetime"]; ?> </h4> <?php echo "<img src= 'getFileImage.php?id=".$row['workitem_id']."' width=300px height=200px/>" ?> ")
            .addTo(map);
            
                
        <?php endwhile;?>

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }

    info.update(layer.feature.properties);
}

var geojson;

function resetHighlight(e) {
    geojson.resetStyle(e.target);
    info.update();
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}

/* global statesData */
geojson = L.geoJson(indSt, {
    style: style,
    onEachFeature: onEachFeature
}).addTo(map);
var legend = L.control({ position: 'bottomright' });

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend');
    var grades = [1, 2, 4, 6, 8];
    var labels = [];
    var from, to;

    for (var i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];

        labels.push(
            '<i style="background:' + getColor(from + 1) + '"></i> ' +
            from + (to ? ' &ndash; ' + to + ' ' : ' + '));
    }

    div.innerHTML = labels.join('<br>');
    return div;
};

legend.addTo(map);

    </script>

<footer id="footer"> 
    <div class="bottom">
    <div>
        <img src="Images/digitalindialogo.png" width="300" height="100"/>
        <img src="Images/india-gov.png" width="200" height="100"/>
        <img src="Images/nic.in.png" width="400" height="100"/>
        <img src="Images/ministry-of-rural-development.jpg" width="300" height="100"/>
    </div>
    <center>
        <span class="credit">National Informatics Center | </span>
        <span class="far fa-copyright"></span><span> 2022 All rights reserved.</span>
    </center>
    </div>
</footer>
</body>

</html>