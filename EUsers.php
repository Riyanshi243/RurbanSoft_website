
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
  </table> 
          
	</div>
</section>


</body>
</html>

