<?php
echo "<link rel='stylesheet' href='style.css'>";
$buyerEmail = $_POST['buyerEmail'];
$buyerLastName = $_POST['buyerLastName'];
$buyerFirstName = $_POST['buyerFirstName'];
$buyerPhone = $_POST['buyerPhone'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

if ($mysqli->connect_error){
  printf("Connection Failed: Could not connect to server. %\n", $mysqli->connect_error);
  exit();
}
//SQL code
if($user != "NULL"){
    $query = "INSERT INTO Buyers (Email, LastName, FirstName, Phone)
    VALUES ('$buyerEmail', '$buyerLastName', '$buyerFirstName', '$buyerPhone')";
  }
  
  //Success output
  if ($mysqli->query($query) === TRUE) {
    echo "<h1>Buyer has been successfully added.</h1>";
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