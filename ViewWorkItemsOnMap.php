<!DOCTYPE html>
<html>
<head>
	<title>ViewWorkItemsOnMap</title>
	<link rel="stylesheet" type="text/css" href="CSS/ViewWorkItemsOnMap.css">
    <link rel="stylesheet" href="https://js.arcgis.com/3.29/dijit/themes/tundra/tundra.css">
    <link rel="stylesheet" href="https://js.arcgis.com/3.29/esri/css/esri.css">
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
    <h1>All WorkItems on MAP</h1><br>
    <div>
    <form action="" method="post">
    
        <table>
            <tr>
                <td colspan="4">
                    <label for="filter-1">Apply filters</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="state">
                        <option value="" disabled selected>--Choose state--</option>
                        <option value="1">All States</option>
                        <?php
                            $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
                            $dbQuery = " SELECT DISTINCT state_name FROM cluster_master ORDER BY state_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["state_name"]; ?>"><?php echo $row["state_name"]; ?></option>  
                        <?php endwhile; ?>
                    </select>
                </td>
                <td>
                    <select name="district">
                        <option value="" disabled selected>--Choose district--</option>
                        <option value="1">All districts</option>
                        <?php
                            $dbQuery = " SELECT DISTINCT district_name FROM cluster_master ORDER BY district_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["district_name"]; ?>"><?php echo $row["district_name"]; ?></option>  
                        <?php endwhile;?>
                    </select>
                </td>
                <td>
                    <select name="cluster">
                        <option value="" disabled selected>--Choose Cluster--</option>
                        <option value="1">All Cluster</option>
                        <?php
                            $dbQuery = " SELECT DISTINCT cluster_name FROM cluster_master ORDER BY cluster_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["cluster_name"]; ?>"><?php echo $row["cluster_name"]; ?></option>  
                        <?php endwhile;?>
                    </select>
                </td>
                <td>
                    <select name="gp">
                        <option value="" disabled selected>--Choose GP--</option>
                        <option value="1">All GP</option>
                        <?php
                            $dbQuery = " SELECT DISTINCT gp_name FROM cluster_master ORDER BY gp_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["gp_name"]; ?>"><?php echo $row["gp_name"]; ?></option>  
                        <?php endwhile;?>
                    </select>
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    <select name="component">
                        <option value="" disabled selected>--Choose component--</option>
                        <option value="1">All Components</option>
                        <?php
                            $dbQuery = " SELECT DISTINCT component_name FROM component_master ORDER BY component_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["component_name"]; ?>"><?php echo $row["component_name"]; ?></option>  
                        <?php endwhile;?>
                    </select>
                </td>
                <td>
                    <select name="sub_component">
                        <option value="" disabled selected>--Choose sub_component--</option>
                        <option value="1">All Sub Components</option>
                        <?php
                            $dbQuery = " SELECT DISTINCT sub_component_name FROM component_master ORDER BY sub_component_name ASC";   
                            $result=mysqli_query($db,$dbQuery);
                            if (mysqli_num_rows($result)>0)
                            while($row = mysqli_fetch_assoc($result)):?>
                                <option value="<?php echo $row["sub_component_name"]; ?>"><?php echo $row["sub_component_name"]; ?></option>  
                        <?php endwhile;?>
                    </select>
                </td>
                <td>
                    <select name="phase">
                        <option value="" disabled selected>--Choose phase--</option>
                        <option value="1">All Phases</option>
                        <option value="2">Phase I</option>
                        <option value="3">Phase II</option>
                        <option value="4">Phase III</option>
                    </select>
                </td>
                <td>
                    <select name="status">
                        <option value="" disabled selected>--Choose status--</option>
                        <option value="1">All status</option>
                        <option value="2">Started</option>
                        <option value="3">In Progress</option>
                        <option value="4">Completed</option>
                        <option value="4">Stopped</option>
                    </select>
                </td>
                
            </tr>
            <tr>
                <td colspan="4">
                    <button type="submit" id="applyBtn" class="btn" name="submit" onclick="GetSelected()" >Apply Filters</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    <br>
    <br>
    <br>
    <?php  
    function get_confirmed_locations(){
        $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
        $dbQuery = " SELECT Latitude, Longitude FROM workitem ";
        $sqldata =mysqli_query($db,$dbQuery);
    
        $rows = array();
    
        while($r = mysqli_fetch_assoc($sqldata)) {
            $rows[] = $r;
        }
    
        $indexed = array_map('array_values', $rows);
    
        echo json_encode($indexed);
        if (!$rows) {
            return null;
        }
    }
    ?>

        <div id="googleMap" style="width:1200px;height:800px;"></div>

        <script>
            function myMap() {
                var mapProp= {
                center:new google.maps.LatLng(20.5937, 78.9629),
                zoom:5,
               };
            var markers = {};
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var locations = <?php get_confirmed_locations() ?>;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                
                map: map
            });

            // const infowindow = new google.maps.InfoWindow({
            //     content: "contentString",
            //     ariaLabel: "Uluru",
            // });
            // marker.addListener("click", () => {
            //     infowindow.open({
            //     anchor: marker,
            //     map,
            //     });
            // });

           
        }
    }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQPnyGMJj5BL8vlDs-lOGCfipyWXduLbI&callback=myMap"></script>
          
        
       
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
</html>

