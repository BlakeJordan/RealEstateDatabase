<?php
echo "<link rel='stylesheet' href='style.css'>";
$postid = $_POST['choice'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "yoo7Feeg", "kevdinh33");
if ($mysqli->connect_error) {
    printf("Connect failed: %\n", $mysqli->connect_error);
    exit();
}

echo "<h1>Posts deleted</h1>";
if (count($postid) == 0) {
  echo "<p align='center'> Nothing was selected.<p>";
}
else{
  for ($i=0; $i < count($postid); $i++) {
    $query = $mysqli->query("DELETE FROM Posts WHERE postid='$postid[$i]'");
    echo "<p align='center'> Post ID $postid[$i] was deleted.";
  }
}

echo "<br><br>
<div class='menu'>
  <a href='AdminHome.html'>
  <button type='button'>Return</button>
  </a>
</div>";
$mysqli->close();
?>
