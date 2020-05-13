<?php
echo "<link rel='stylesheet' href='style.css'>";
$user = $_POST['username'];
$comment = $_POST['comment'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "yoo7Feeg", "kevdinh33");

if ($mysqli->connect_error){
  printf("Connection Failed: %\n", $mysqli->connect_error);
  exit();
}
$query = "SELECT * FROM Users WHERE userid='$user'";
//Found user name
if($result = mysqli_query($mysqli, $query)){
  {
    if (mysqli_num_rows($result) > 0) {
      $postQuery = "INSERT INTO Posts (content, authorid)
      VALUES ('$comment', '$user')";
      if ($mysqli->query($postQuery) === TRUE){
        echo "<h1>Your post was successful.</h1>";
      }
    }else {
      echo "<h1> The user name does not exist.</h1>";
    }
  }

}else{
  echo "Error: " . $query . "<br>" . $mysqli->error;
}

echo "<br><br>
<div class='menu'>
  <a href='index.html'>
  <button type='button'>Return Home</button>
  </a>
</div>";

$mysqli->close();
 ?>
