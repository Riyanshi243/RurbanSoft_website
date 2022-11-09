<!DOCTYPE html>
<html>
<head>
	<title>ViewWorkItemsOnMap</title>
	<link rel="stylesheet" type="text/css" href="CSS/ViewWorkItemsOnMap.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>
     <script type="text/javascript" src="js/jQueryFilter.js"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
                <!-- <td><select name="webste" class="sel">
    <option>--Select Website--</option>
    <option value="it">ItSolutionStuff.com</option>
    <option value="hd">HDTuto.com</option>
    <option value="nice">NiceSnippets.com</option>
</select>
   
<script type="text/javascript">
    $(".sel").change(function(){
        var selValue = $(this).val();
        alert(selValue);
    });
</script></td> -->
                <td>
                    <select name="component" class="component" id="component">
                    
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
                    <script type="text/javascript">
                        $(".component").change(function(){
                            var selValue = $(this).val();
                            alert(selValue);
                            document.getElementById("component").value = selValue;
                            
                        });
                    </script>
                </td>
                
                <td>
                    <select name="sub_component" id="sub_component">
                        <option value="" disabled selected>--Choose sub_component--</option>
                        <option value="1">All Sub Components</option>
                        <?php
                            $val=$_POST['component'];
                            $dbQuery = " SELECT DISTINCT sub_component_name FROM component_master WHERE component_name = '$val'";   
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
        <div id="map" style="width: 1200px; height: 700px; position:flex"></div>


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
    $dbQuery = " SELECT * FROM workitem";   
    $result=mysqli_query($db,$dbQuery);
    if (mysqli_num_rows($result)>0)
     while($row = mysqli_fetch_assoc($result)):?>
     marker = new L.marker([<?php echo $row["Latitude"]; ?>, <?php echo $row["Longitude"]; ?>])
    .bindPopup("<h4>State: <?php echo $row["State"]; ?> </h4> <h4>District: <?php echo $row["District"]; ?> </h4> <h4>Cluster: <?php echo $row["Cluster"]; ?> </h4> <h4>GP: <?php echo $row["GP"]; ?> </h4> <h4>Components: <?php echo $row["Components"]; ?>  </h4> <h4>SubComponents: <?php echo $row["SubComponents"]; ?> </h4><h4>Status:  <?php echo $row["Status"]; ?> </h4> <h4>Phase:  <?php echo $row["Phase"]; ?>  </h4> <h4>Capture Time: <?php echo $row["DateTime"]; ?> </h4> <img src='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Image']); ?>'  width='300' height='200' /> ")
    .addTo(map);
           
    <?php endwhile;?>

</script>
</html>

