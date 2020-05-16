<?php
    echo "<link rel='stylesheet' href='style.css'>";
    $mysqli = new mysqli("mysql.eecs.ku.edu", "kevdinh33", "Meej3ien", "kevdinh33");

    $search1 = isset($_POST['search-house']) ? $_POST['search-house'] : false;
    $search2 = isset($_POST['search-buyers']) ? $_POST['search-buyers'] : false;
    $search3 = isset($_POST['search-sellers']) ? $_POST['search-sellers'] : false;
    $search4 = isset($_POST['search-estate-agency']) ? $_POST['search-estate-agency'] : false;
    $search5 = isset($_POST['search-loans']) ? $_POST['search-loans'] : false;
    $search6 = isset($_POST['whose-house']) ? $_POST['whose-house'] : false;
    $search7 = isset($_POST['what-loan']) ? $_POST['what-loan'] : false;
    $search8 = isset($_POST['what-owner']) ? $_POST['what-owner'] : false;

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }


    if($search1){
        
        $query =  'SELECT * FROM Houses WHERE Houses.Address = ?;';

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
                echo "<td>" . $row['OwnerID'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }
    elseif($search2){
        
        $query =   'SELECT * FROM Buyers WHERE Buyers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search2);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>Email</th>
            <th>LastName</th>
            <th>FirstName</th>
            <th>Phone</th>
            <th>BuyerID</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['BuyerID'] . "</td>";
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
        
        $query =   'SELECT * FROM Sellers WHERE Sellers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search3);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>Address</th>
            <th>LastName</th>
            <th>FirstName</th>
            <th>Email</th>
            <th>Phone</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }
    elseif($search4){
        
        $query =   'SELECT * FROM EstateAgency WHERE EstateAgency.Name = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search4);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>License</th>
            <th>Name</th>
            <th>Contracts</th>
            <th>AgentID</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['License'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Contracts'] . "</td>";
                echo "<td>" . $row['AgentID'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }
    elseif($search5){
        
        $query =   'SELECT * FROM Loans WHERE Loans.BankLoan = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search5);

            $stmt->execute();

            $result = $stmt->get_result();

            $num_of_rows = $result->num_rows;

            echo "<table border='1'>
            <tr>
            <th>ULI</th>
            <th>BankLoan</th>
            <th>InterestRate</th>
            <th>MortgageLength</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ULI'] . "</td>";
                echo "<td>" . $row['BankLoan'] . "</td>";
                echo "<td>" . $row['InterestRate'] . "</td>";
                echo "<td>" . $row['MortgageLength'] . "</td>";
                echo "</tr>";
            }
            
            /* free results */
            $stmt->free_result();
            
            /* close statement */
            $stmt->close();

            echo "</table>";
        }
    }
    elseif($search6){
        $query =   'SELECT DISTINCT Houses.Address, Sellers.LastName
                    FROM Houses
                    INNER JOIN Sellers ON (Sellers.SellerID = Houses.OwnerID)
                    WHERE Sellers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search6);

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
    elseif($search7){
        $query =   'SELECT DISTINCT Loans.ULI, Buyers.FirstName, Buyers.LastName
                    FROM Buyers
                    INNER JOIN Loans ON (Loans.ULI = Buyers.FK_ULI)
                    WHERE Buyers.LastName = ?;';

        if($stmt = $mysqli->prepare($query)){

            $stmt->bind_param('s',$search7);

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
    elseif($search8){
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

?>
    <button onclick= "location.href='../index.html'" type="button" value="Home"></button>