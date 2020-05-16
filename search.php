<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

    $search1 = isset($_POST['search-house']) ? $_POST['search-house'] : false;
    $search2 = isset($_POST['search-buyers']) ? $_POST['search-buyers'] : false;
    $search3 = isset($_POST['search-sellers']) ? $_POST['search-sellers'] : false;
    $search4 = isset($_POST['search-estate-agency']) ? $_POST['search-estate-agency'] : false;
    $search5 = isset($_POST['search-loans']) ? $_POST['search-loans'] : false;

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    

    elseif($search1){
        
        $query =   'SELECT * FROM Houses WHERE Houses.Address = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search1);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>Address</th>
            <th>SquareFootage</th>
            <th>RoomNums</th>
            <th>BathNums</th>
            <th>OwnerID</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['SquareFootage'] . "</td>";
                echo "<td>" . $row['RoomNums'] . "</td>";
                echo "<td>" . $row['BathNums'] . "</td>";
                echo "<td>" . $row['OwnerId'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }


    else {
        if($option[0] == '1'){
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

        elseif($option[0] == '2'){
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
        elseif($option[0] == '6'){
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
        elseif($option[0] == '3'){
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
        elseif($option[0] == '4'){
            $result = mysqli_query($mysqli,"SELECT * FROM EstateAgency");

            echo "<table border='1'>
            <tr>
            <th>Licence</th>
            <th>Name</th>
            <th>Contracts</th>
            <th>House List</th>
            <th>Agent ID</th>
            </tr>";
            
            while($row = mysqli_fetch_array($result))
            {
            echo "<tr>";
            echo "<td>" . $row['License'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Contracts'] . "</td>";
            echo "<td>" . $row['HouseList'] . "</td>";
            echo "<td>" . $row['AgentID'] . "</td>";
            echo "</tr>";
            }
            echo "</table>";
        }
        elseif($option[0] == '5'){
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
        else{
            echo "<h1>" . $option . "</h1>";
        }
    }
    mysqli_close($mysqli);
?>