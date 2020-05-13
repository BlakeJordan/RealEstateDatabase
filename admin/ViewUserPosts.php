<?php
echo "<link rel='stylesheet' href='style.css'>";
$user = $_POST['choice'];
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "yoo7Feeg", "kevdinh33");
if ($mysqli->connect_error) {
    printf("Connect failed: %\n", $mysqli->connect_error);
    exit();
}
$query = $mysqli->query("SELECT content FROM Posts WHERE authorid='$user'");
if ($result = $query){
  echo "<h1>User's Posts</h1>";
  echo "<table border=1 class='receipt' width = 'fit' align='center'>";
  echo "<tr>
          <th>$user's Posts</th>
        </tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>". $row["content"];
    echo "</td></tr>";
  }
  $result->free();
  echo "</table>";

}
echo "<br><br>
<div class='menu'>
  <a href='AdminHome.html'>
  <button type='button'>Return</button>
  </a>
</div>";
$mysqli->close();
?>
