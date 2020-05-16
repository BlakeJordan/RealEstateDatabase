<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

    $search1 = isset($_POST['multi-owner']) ? $_POST['multi-owner'] : false;
    $search2 = isset($_POST['whose-house']) ? $_POST['whose-house'] : false;
    $search3 = isset($_POST['what-loan']) ? $_POST['what-loan'] : false;

    $option = isset($_POST['tableOptions']) ? $_POST['tableOptions'] : false;

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    if($search1){
        $result = mysqli_query($mysqli,"SELECT DISTINCT Sellers.LastName, Sellers.FirstName
                                        FROM Sellers
                                        INNER JOIN Houses ON (Sellers.SellerID = Houses.OwnerID)
                                        WHERE Sellers.SellerID IN ( SELECT OwnerID FROM Houses
                                        GROUP BY OwnerID HAVING count(*) > 1);");

        echo "<table border='1'>
        <tr>
        <th>LastName</th>
        <th>FirstName</th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "</tr>";
        }   
        echo "</table>";
    }
    //Get the list of houses by searching a sellers last name
    elseif($search2){
        
        $query = 'SELECT DISTINCT Houses.Address, Sellers.LastName
                                        FROM Houses
                                        INNER JOIN Sellers ON (Sellers.SellerID = Houses.OwnerID)
                                        WHERE Sellers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search2);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>Address</th>
            <th>LastName</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }

    elseif($search3){
        
        $query =   'SELECT DISTINCT Loans.ULI, Buyers.FirstName, Buyers.LastName
                    FROM Buyers
                    INNER JOIN Loans ON (Loans.ULI = Buyers.FK_ULI)
                    WHERE Buyers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search3);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>ULI</th>
            <th>FirstName</th>
            <th>LastName</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ULI'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
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