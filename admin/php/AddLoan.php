<?php
echo "<link rel='stylesheet' href='../html/style.css'>";
$loanID = $_POST['loanID'];
$bank = $_POST['bank'];
$intRate = $_POST['intRate'];
$mortLength = $_POST['mortLength'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

if ($mysqli->connect_error){
  printf("Connection Failed: Could not connect to server. %\n", $mysqli->connect_error);
  exit();
}
//SQL code
if($user != "NULL"){
    $query = "INSERT INTO Loans (ULI, BankLoan, InterestRate, MortgageLength)
    VALUES ('$loanID', '$bank', '$intRate', '$mortLength')";
  }

  //Success output
  if ($mysqli->query($query) === TRUE) {
    echo "<h1>Loan has been successfully added.</h1>";
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
