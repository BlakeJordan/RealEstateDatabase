<?php
   $mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

   if ($mysqli->connect_errno)
   {
     printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
   }

   $result = mysqli_query($mysqli,"SELECT * FROM Buyers");

   echo "<table border='1'>
   <tr>
   <th>Email</th>
   <th>LastName</th>
   <th>FirstName</th>
   <th>Phone</th>
   <th>BuyerID</th>
   </tr>";
   
   while($row = mysqli_fetch_array($result))
   {
   echo "<tr>";
   echo "<td>" . $row['Email'] . "</td>";
   echo "<td>" . $row['LastName'] . "</td>";
   echo "<td>" . $row['FirstName'] . "</td>";
   echo "<td>" . $row['Phone'] . "</td>";
   echo "<td>" . $row['BuyerID'] . "</td>";
   echo "</tr>";
   }
   echo "</table>";
   
   mysqli_close($mysqli);
?>