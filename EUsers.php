
<!DOCTYPE html>
<html>
<head>
	<title>ExistingUsers</title>
	<link rel="stylesheet" type="text/css" href="CSS/EUsers.css">
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
						<li><h4> <a href="homePage.php?logout='1'" >Logout</a></h4></li>
            		</ul>
            	</div>
        	</nav>
        </div>
    </header>
</div> 
<section id="home">
    <div class="main">
    <h1>Following are the Existing Users in Central Database:</h1>
    <br>
    <!-- <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Phone Number</th>
        <th>EmailId</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
    $dbQuery = " SELECT * FROM users";   
    $result=mysqli_query($db,$dbQuery);
    if (mysqli_num_rows($result)>0)
     while($row = mysqli_fetch_assoc($result)):?>
            <tr id='tableRow' >
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["Designation"]; ?></td>
                    <td><?php echo $row["PhoneNumber"]; ?></td>
                    <td><?php echo $row["EmailId"]; ?></td>
                    
            </tr>
    <?php endwhile;?>
    </tbody>
  </table> -->

  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Phone Number</th>
        <th>EmailId</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
    $db_conn = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");

    $query = 'SELECT * FROM users';
    $result = pg_query($query) or die('Error message: ' . pg_last_error());

    while ($row = pg_fetch_array($result)) :?>
      <tr id='tableRow' >
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["designation"]; ?></td>
              <td><?php echo $row["phonenumber"]; ?></td>
              <td><?php echo $row["emailid"]; ?></td>
              
      </tr>
<?php endwhile;?>
    </tbody>
  <!-- </table>
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

     $query = 'SELECT * FROM workitem';
     $result = pg_query($query) or die('Error message: ' . pg_last_error());
 
     while ($row = pg_fetch_array($result)) :?>
            <tr id='tableRow' >
                    <td><?php echo $row["id"]; ?></td>
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
                    <td ><?php echo "<img src= './getFileImage.php?id=".$row['id']."' width=100px height=100px/>" ?> </td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["userphonenumber"]; ?></td>
                   
            </tr>
    <?php endwhile;?>
    </tbody>
  </table> -->
                
          
	</div>
</section>

<!-- <footer id="footer"> 
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

