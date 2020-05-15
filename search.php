<?php
   $mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

   $Table = $_POST['tables'];

   if ($mysqli->connect_errno)
   {
     printf("Connect failed: %s\n", $mysqli->connect_error);
     exit();
   }

   if($Table == 'Buyers'){
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
    }

    elseif($Table == 'sellers'){
        $result = mysqli_query($mysqli,"SELECT * FROM Sellers");

        echo "<table border='1'>
        <tr>
        <th>Address</th>
        <th>LastName</th>
        <th>FirstName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>SellerID</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td>" . $row['SellerID'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    elseif($Table == 'users'){
        $result = mysqli_query($mysqli,"SELECT * FROM Users");

        echo "<table border='1'>
        <tr>
        <th>UserID</th>
        <th>Password</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['userid'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    elseif($Table == 'houses'){
        $result = mysqli_query($mysqli,"SELECT * FROM Houses");

        echo "<table border='1'>
        <tr>
        <th>Address</th>
        <th>Square Footage</th>
        <th>Number of Rooms</th>
        <th>Number of Baths</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['SquareFootage'] . "</td>";
        echo "<td>" . $row['RoomNums'] . "</td>";
        echo "<td>" . $row['BathNums'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    elseif($Table == 'estate-agency'){
        $result = mysqli_query($mysqli,"SELECT * FROM EstateAgency");

        echo "<table border='1'>
        <tr>
        <th>Liscence</th>
        <th>Name</th>
        <th>Contracts</th>
        <th>House List</th>
        <th>Agent ID</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['Liscence'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Contracts'] . "</td>";
        echo "<td>" . $row['HouseList'] . "</td>";
        echo "<td>" . $row['AgentID'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    elseif($Table == 'loans'){
        $result = mysqli_query($mysqli,"SELECT * FROM Loans");

        echo "<table border='1'>
        <tr>
        <th>ULI</th>
        <th>Bank Loan</th>
        <th>Interest Rate</th>
        <th>Mortgage Length</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['ULI'] . "</td>";
        echo "<td>" . $row['BankLoan'] . "</td>";
        echo "<td>" . $row['InterestRate'] . "</td>";
        echo "<td>" . $row['MortgageLength'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";
    }
    else{}
   mysqli_close($mysqli);
?>