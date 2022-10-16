<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="CSS/register.css">
</head>
  <body>
      <div class="box-area">
        <header>
          <div class="wrapper">
            <nav class="navbar">
            <img src="Images/rurban.png" />
            <h1 class="heading">RurbanSoft</h1>
            </nav>
          </div>
        </header>
      </div>
    <section id="home">
      <div class="main">
        <div class="header2">
          <h2>Register</h2>
        </div>
    
        <form method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Name</label>
                <input type="text" name="Name">
            </div>
            <div class="input-group">
              <label>Designation</label>
              <input type="text" name="Designation">
            </div>
            <div class="input-group">
                <label>Phone Number</label>
                <input type="number" name="PhoneNumber">
            </div>
            <div class="input-group">
              <label>Email</label>
              <input type="email" name="EmailId">
            </div>
            <div class="input-group">
              <label>Password</label>
              <input type="password" name="Password">
            </div>
            <div class="input-group">
              <button type="submit" class="btn" name="reg_user">Register</button>
            </div>
            <p>	Already a member? <a href="login.php">Sign in</a></p>
        </form>
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