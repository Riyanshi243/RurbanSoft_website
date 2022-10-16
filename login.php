<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="CSS/login.css">
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
            <h2>Login</h2>
        </div>
        <form method="post" action="login.php">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <label>Registered Phone Number</label>
                <input type="number" name="phoneNumber" >
            </div>
            <div class="input-group">
              <label>Password</label>
              <input type="password" name="password">
            </div>
            <div class="input-group">
              <button type="submit" class="btn" name="login_user">Login</button>
            </div>
            <p>Not yet a user? <a href="register.php">Register up</a></p>
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