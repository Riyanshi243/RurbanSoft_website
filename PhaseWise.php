<!DOCTYPE html>
<html>
<head>
	<title>ViewWorkItemsPhaseWise</title>
	<link rel="stylesheet" type="text/css" href="CSS/PhaseWise.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>
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
    <!-- <div id="map" style="width: 600px; height: 400px;"></div> -->

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
     crossorigin=""></script>
<script>
    var map = L.map('map').setView([26.505, 81.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
var marker = L.marker([26.5, 81.09]).addTo(map);
 var popup = marker.bindPopup('<b>Hello world!</b><br />I am a popup.');
  popup.openPopup();
</script>
</html>

