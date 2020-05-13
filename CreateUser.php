<?php
echo "<link rel='stylesheet' href='style.css'>";
//Initializing variables
$user = $_POST['username'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");
//Checking connections
if ($mysqli->connect_error){
  printf("Connection Failed: %\n", $mysqli->connect_error);
  exit();
}
//SQL code
if($user != "NULL"){
  $query = "INSERT INTO Users (userid)
  VALUES ('$user')";
}

//Success output
if ($mysqli->query($query) === TRUE) {
  echo "<h1>User name created successfully.</h1>";
}
else if($user == "NULL"){
  echo "<h1>User Name cannot be blank.<h1>";
}
else{
  echo "<h2>Error: " . $query . "<h2><br>" . $mysqli->error;
}
echo "<br><br>
<div class='menu'>
  <a href='index.html'>
  <button type='button'>Return Home</button>
  </a>
</div>";

$mysqli->close();
 ?>
