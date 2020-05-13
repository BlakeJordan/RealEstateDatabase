<?php
echo "<link rel='stylesheet' href='style.css'>";
//intializing variables
$mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

/* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT userid FROM Users";
echo "<h1>All Users</h1>";
echo "<table border=1 class='receipt' width = fit align= 'center'>";
echo "<tr>
        <th>User</th>
      </tr>";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>". $row["userid"];
      echo "</td></tr>";
    }
    /* free result set */
    $result->free();
}
echo "</table>";

echo "<br><br>
<div class='menu'>
  <a href='AdminHome.html'>
  <button type='button'>Return</button>
  </a>
</div>";

/* close connection */

$mysqli->close();
?>
