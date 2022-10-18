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
    $db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');
    $dbQuery = " SELECT * FROM workitem WHERE ID IN (SELECT workItem_ID FROM workitem_approved) ORDER BY ID ASC";   
    if(isset($_POST['submit'])){
        if(!empty($_POST['filter'])){
            $phone=$_POST['submit'];
            $selected = $_POST['filter'];
            if($selected==2)
                $dbQuery = " SELECT * FROM workitem WHERE ID IN (SELECT workItem_ID FROM workitem_approved WHERE ApproveByPhoneNumber = '".$phone."') ORDER BY ID ASC";
            if($selected==3)
                $dbQuery = " SELECT * FROM workitem WHERE ID IN (SELECT workItem_ID FROM workitem_approved WHERE ApproveByPhoneNumber != '".$phone."') ORDER BY ID ASC";
            }
    }

    $result=mysqli_query($db,$dbQuery);
    if (mysqli_num_rows($result)>0)
     while($row = mysqli_fetch_assoc($result)):?>
            <tr id='tableRow' >
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["State"]; ?></td>
                    <td><?php echo $row["District"]; ?></td>
                    <td><?php echo $row["Cluster"]; ?></td>
                    <td><?php echo $row["GP"]; ?></td>
                    <td><?php echo $row["Components"]; ?></td>
                    <td><?php echo $row["SubComponents"]; ?></td>
                    <td><?php echo $row["Phase"]; ?></td>
                    <td><?php echo $row["Status"]; ?></td>
                    <td><?php echo $row["Latitude"]; ?></td>
                    <td><?php echo $row["Longitude"]; ?></td>
                    <td><?php echo $row["DateTime"]; ?></td>
                    <td ><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Image']); ?>"  width="100" height="100"/> </td>
                    <td><?php echo $row["UserName"]; ?></td>
                    <td><?php echo $row["UserPhoneNumber"]; ?></td>
                   
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

