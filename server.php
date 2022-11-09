<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'mrurban');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['Name']);
  $email = mysqli_real_escape_string($db, $_POST['EmailId']);
  $phoneNumber = mysqli_real_escape_string($db, $_POST['PhoneNumber']);
  $designation = mysqli_real_escape_string($db, $_POST['Designation']);
  $password = mysqli_real_escape_string($db, $_POST['Password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phoneNumber)) { array_push($errors, "Phone Number is required"); }
  if (empty($designation)) { array_push($errors, "Designation is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same phonenumber and/or email
  $user_check_query = "SELECT * FROM users WHERE PhoneNumber='$phoneNumber' AND EmailId ='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Name'] === $name) {
      array_push($errors, "Name already exists");
    }

    if ($user['EmailId'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO users (Name, PhoneNumber, EmailId, Designation, Password) VALUES('$name', '$phoneNumber', '$email', '$designation', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['PhoneNumber'] = $phoneNumber;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: homePage.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($phoneNumber)) {
  	array_push($errors, "Phone Number is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE PhoneNumber='$phoneNumber' AND Password='$password'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['Name'] = $row["Name"];
  	  $_SESSION['PhoneNumber'] = $phoneNumber;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: homePage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if(isset($_POST['approve'])){
  if(!empty($_POST['check'])){
  $phone=$_POST['approve'];
  $query = "SELECT Name FROM users WHERE PhoneNumber='$phone'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  $name=$row["Name"];
  $current_timestamp = microtime(TRUE);
  $timestamp = date("d-m-Y", $current_timestamp);
  foreach($_POST['check'] as $value){
    $dbQuery = "INSERT INTO workitem_approved (workItem_ID, ApprovedByName, ApproveByPhoneNumber, ApprovedDate) VALUES ('".$value."', '".$name."', '".$phone."', '".$timestamp."')";   
    $result=mysqli_query($db,$dbQuery);
  }
 }
}

if(isset($_POST['approve'])){
  if(!empty($_POST['check'])){
  $phone=$_POST['approve'];
  $db_conn = pg_connect("host=localhost dbname=mrurban user=postgres password=Riyanshi") or die("could not connect to NRuM Postgres database");

  $query = "SELECT Name FROM users WHERE PhoneNumber='$phone'";

  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);
  $name=$row["Name"];
  $current_timestamp = microtime(TRUE);
  $timestamp = date("d-m-Y", $current_timestamp);

  foreach($_POST['check'] as $value){
    $dbQuery = "INSERT INTO workitem_approved (workitem_id, approvedbyname, approvebyphonenumber, approveddate) VALUES ('".$value."', '".$name."', '".$phone."', '".$timestamp."')";   
    $result=pg_query($dbQuery);
  }

  foreach($_POST['check'] as $value){
    
  $query = "SELECT * FROM workitem WHERE ID='$value'";
  $results = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($results);

  $UserName = $row['UserName']; 
  $UserPhoneNumber=$row['UserPhoneNumber'];
  $State=$row['State'];
  $District=$row['District'];
  $Cluster=$row['Cluster'];
  $GP=$row['GP'];
  $Components=$row['Components'];
  $SubComponents=$row['SubComponents'];
  $Status=$row['Status'];
  $Phase=$row['Phase'];
  $Latitude=$row['Latitude'];
  $Longitude=$row['Longitude'];
  $Image= base64_encode($row['Image']);
  $DateTime=$row['DateTime'];

  
    $dbQuery = "INSERT INTO workitem (id, username, userphonenumber, state, district, cluster, gp, components, subcomponents, status, phase, latitude, longitude, image, datetime)  VALUES ('".$value."', '".$UserName."', '".$UserPhoneNumber."', '".$State."', '".$District."', '".$Cluster."','".$GP."','".$Components."','".$SubComponents."','".$Status."','".$Phase."','".$Latitude."','".$Longitude."','".$Image."','".$DateTime."')";   
    $result=pg_query($dbQuery);

    // $dbQuery = "INSERT INTO workitem (image) values decode('".$Image."', 'base64')";   
    // $result=pg_query($dbQuery);
    
  }



 }
}

?>