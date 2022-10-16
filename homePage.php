<?php 
  session_start(); 

  if (!isset($_SESSION['PhoneNumber'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['PhoneNumber']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>HomePage</title>
	<link rel="stylesheet" type="text/css" href="CSS/homePage.css">
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
						<li> <a href="homePage.php?logout='1'" >Logout</a></li>
            		</ul>
            	</div>
        	</nav>
        </div>
    </header>
</div> 
<section id="home">
    <div class="main">
		<div class="content">
  	<!-- notification message -->
  		<?php if (isset($_SESSION['success'])) : ?>
      		<div class="error success" >
      			<h2 style="color:green">
          			<?php  echo $_SESSION['success']; unset($_SESSION['success']); ?>
      			</h2>
      		</div>
  		<?php endif ?>
      <?php  if (isset($_SESSION['Name'])) : ?>
    		<h2 class="user">Welcome <strong><?php echo $_SESSION['Name']; ?></strong></h2>
    	<?php endif ?>
		</div>
        
        <div class="rows">
          <div class="boxs" id="AllWorkItems">
            <p class="headings"> View all WorkItems as List </p>
          </div>
          <script>
                var AllWorkItems = document.getElementById('AllWorkItems');
                AllWorkItems.style.cursor = 'pointer';
                AllWorkItems.onclick = function() {
                    window.open("ViewWorkItems.php","_self");
                };
          </script>

          <div class="boxs" id="AllWorkItemsOnMap">
            <p class="headings"> View all WorkItems on Map </p>
          </div>
          <script>
                var AllWorkItemsOnMap = document.getElementById('AllWorkItemsOnMap');
                AllWorkItemsOnMap.style.cursor = 'pointer';
                AllWorkItemsOnMap.onclick = function() {
                    window.open("ViewWorkItemsOnMap.php","_self");
                };
          </script>

          <div class="boxs" id="ApproveWorkItems">
            <p class="headings"> Approve WorkItems </p>
          </div>
          <script>
                var ApproveWorkItems = document.getElementById('ApproveWorkItems');
                ApproveWorkItems.style.cursor = 'pointer';
                ApproveWorkItems.onclick = function() {
                    window.open("ApproveWorkItems.php","_self");
                };
          </script>

          <div class="boxs" id="PhaseWise">
            <p class="headings"> View WorkItems Phase Wise </p>
          </div>
          <script>
                var PhaseWise = document.getElementById('PhaseWise');
                PhaseWise.style.cursor = 'pointer';
                PhaseWise.onclick = function() {
                    window.open("PhaseWise.php","_self");
                };
          </script>

          <div class="boxs" id="EUsers">
            <p class="headings"> View Existing Users </p>
          </div>
          <script>
                var EUsers = document.getElementById('EUsers');
                EUsers.style.cursor = 'pointer';
                EUsers.onclick = function() {
                    window.open("EUsers.php","_self");
                };
          </script>

        </div>
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

