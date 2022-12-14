<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>ApproveWorkItems</title>
	<link rel="stylesheet" type="text/css" href="CSS/ApproveWorkItems.css">
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
    <h1>Following are the Existing WorkItems in Central Database which are not Approved</h1>
    <h3>Approve the WorkItems by selecting the required checkboxes</h3>
    <br>
    <form method="post" action="">
    <table class="table table-hover" id="workitem" method="post" action="">
    <thead>
      <tr>
        <th>Approve</th>
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
    $dbQuery = " SELECT * FROM workitem WHERE ID NOT IN (SELECT workItem_ID FROM workitem_approved)";   
    $result=mysqli_query($db,$dbQuery);
    if (mysqli_num_rows($result)>0)
     while($row = mysqli_fetch_assoc($result)):?>
            <tr id='tableRow' class="no-print">
                    <td><input type="checkbox" name="check[]" value="<?php echo $row["ID"]; ?>"/></td>
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
    <tr>
        <td colspan="16"><button type="submit" id="approveBtn" class="btn" name="approve" onclick="GetSelected()" >Approve</button></td>
    </tr>
            
    </tbody>
    </table>
    </form>


    <script>
        function GetSelected() {

        //Reference the Table.
        document.getElementById("approveBtn").value = localStorage.getItem("Phone");
        var grid = document.getElementById("workitem");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var checkNum=0;
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                checkNum +=1;
            }
        }
        if(checkNum==0)
        {
            var message = "No workitem selected, please select some workitems and then continue.";
            alert(message);
        }
        else
        {
            var message = checkNum +" workitems have been approved.";
            alert(message);
        }
    }
        </script>
                
          
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

