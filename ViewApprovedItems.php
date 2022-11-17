<!DOCTYPE html>
<html>
<head>
	<title>ViewWorkItems</title>
	<link rel="stylesheet" type="text/css" href="CSS/ViewApprovedItems.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
						<li> <h4><a href="homePage.php?logout='1'" >Logout</a></h4></li>
            		</ul>
            	</div>
        	</nav>
        </div>
    </header>
</div> 
<section id="home">
    <div class="main">
    <h1>Following are the Approved WorkItems:</h1>
    <br>
    <form action="" method="post">
    <label for="filter-1">Choose the filter</label>
        <select name="filter">
            <option value="" disabled selected>--Choose option--</option>
            <option value="1">View all approved workitems</option>
            <option value="2">View all workitems approved by me </option>
            <option value="3">View all workitems approved except mine </option>
        </select>
        <button type="submit" id="applyBtn" name="submit" onclick="GetSelected()" >Apply</button>
    </form>
    <script>
        function GetSelected() {
        document.getElementById("applyBtn").value = localStorage.getItem("Phone");
    }
    </script>
    <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>State</th>
        <th>District</th>
        <th>Cluster</th>
        <th>Gram Panchayat</th>
        <th>Component</th>
        <th>Sub Component</th>
        <th>Phase</th>
        <th>Status</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Date and Time Taken</th>
        <th>Workitem Image</th>
        <th>Uploaded By User</th>
        <th>User Phone Number</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $db_conn = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");
    $dbQuery = " SELECT * FROM approved_workitems ORDER BY workitem_id ASC";   
    if(isset($_POST['submit'])){
        if(!empty($_POST['filter'])){
            $phone=$_POST['submit'];
            $selected = $_POST['filter'];
            if($selected==2)
                $dbQuery = " SELECT * FROM approved_workitems WHERE workitem_id IN (SELECT workitem_id FROM approved_workitem_ids WHERE approvebyphonenumber = '".$phone."') ORDER BY workitem_id ASC";
            if($selected==3)
                $dbQuery = " SELECT * FROM approved_workitems WHERE workitem_id IN (SELECT workitem_id FROM approved_workitem_ids WHERE approvebyphonenumber != '".$phone."') ORDER BY workitem_id ASC";
            }
    }

    $result = pg_query($dbQuery) or die('Error message: ' . pg_last_error());
    
     while($row = pg_fetch_array($result)):?>
            <tr id='tableRow' >
                    <td><?php echo $row["workitem_id"]; ?></td>
                    <td><?php echo $row["state"]; ?></td>
                    <td><?php echo $row["district"]; ?></td>
                    <td><?php echo $row["cluster"]; ?></td>
                    <td><?php echo $row["gp"]; ?></td>
                    <td><?php echo $row["components"]; ?></td>
                    <td><?php echo $row["subcomponents"]; ?></td>
                    <td><?php echo $row["phase"]; ?></td>
                    <td><?php echo $row["status"]; ?></td>
                    <td><?php echo $row["latitude"]; ?></td>
                    <td><?php echo $row["longitude"]; ?></td>
                    <td><?php echo $row["datetime"]; ?></td>
                    <td ><?php echo "<img src= 'getFileImage.php?id=".$row['workitem_id']."' width=100px height=100px/>" ?> </td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["userphonenumber"]; ?></td>
                   
            </tr>
    <?php endwhile;?>
    </tbody>
  </table>
                
          
	</div>
</section>
<!-- 
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
</footer> -->

</body>
</html>

