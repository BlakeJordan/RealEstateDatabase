<?php
echo "<link rel='stylesheet' href='style.css'>";
$userid =$_POST['sellerAddress'];
$password = $_POST['sellerEmail'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

if ($mysqli->connect_error){
  printf("Connection Failed: Could not connect to server. %\n", $mysqli->connect_error);
  exit();
}
//SQL code
if($user != "NULL"){
    $query = "INSERT INTO Users (userid, password)
    VALUES ('$userid', '$password')";
  }
  
  //Success output
  if ($mysqli->query($query) === TRUE) {
    echo "<h1>Seller has been successfully added.</h1>";
  }
  else if($user == "NULL"){
    echo "<h1>No fields can be left blank.<h1>";
  }
  else{
    echo "<h2>Error: Server connection error" . $query . "<h2><br>" . $mysqli->error;
  }
  echo "<br><br>
  <div class='menu'>
    <a href='../html/AdminHome.html'>
    <button type='button'>Return to Admin Home</button>
    </a>
  </div>";
  
  $mysqli->close();
   ?>