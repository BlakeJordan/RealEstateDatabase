<?php
echo "<link rel='stylesheet' href='../html/style.css'>";
$sellerFirstName = $_POST['sellerFirstName'];
$sellerLastName = $_POST['sellerLastName'];
$sellerEmail = $_POST['sellerEmail'];
$sellerPhone = $_POST['sellerPhone'];
$SqFt = $_POST['sqFt'];
$address =$_POST['address'];
$roomNum = $_POST['roomNum'];
$bathNum = $_POST['bathNum'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

console.log(sellerLastName);

if ($mysqli->connect_error){
  printf("Connection Failed: Could not connect to server. %\n", $mysqli->connect_error);
  exit();
}
//SQL code
if($user != "NULL"){
    $query1 = "INSERT INTO Sellers (Address, LastName, FirstName, Email, Phone)
    VALUES ('$address', '$sellerLastName', '$sellerFirstName', '$sellerEmail', '$sellerPhone')";
    $query2 = "INSERT INTO Houses (Address, SquareFootage, RoomNums, BathNums, OwnerID)
    VALUES ('$address', '$SqFt', '$roomNum', '$bathNum')";
  }

  //Success output
  if ($mysqli->query($query1) === TRUE && $mysqli->query($query2) === TRUE) {
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
