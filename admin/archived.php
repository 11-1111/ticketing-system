<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- External CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
        $page="archived";
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>
    <?php
        $busSql = "Select * from book";
        $resultBusSql = mysqli_query($conn, $busSql);
        $arr = array();
        while($row = mysqli_fetch_assoc($resultBusSql))
            $arr[] = $row;
        $busJson = json_encode($arr);
    ?>  
    <table class="table table-striped">
        <h3 style="text-align: center; margin: 15px 0px 15px 0px; color:red">This Table shows deleted bookings from the database</h3>
        <thead style="color: purple;">
            <tr>
            <th scope="col">Fullname</th>
            <th scope="col">Phone</th>
            <th scope="col">Bus</th>
            <th scope="col">Route</th>
            <th scope="col">Seat</th>
            <th scope="col">Cost (Ksh)</th>
            <th scope="col">Departure</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM book";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if there are rows returned
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row using a while loop
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["cust_name"] . "</td>";
                    echo "<td>" . $row["cust_cont"] . "</td>";
                    echo "<td>" . $row["bus"] . "</td>";
                    echo "<td>" . $row["route_no"] . "</td>";
                    echo "<td>" . $row["seat_no"] . "</td>";
                    echo "<td>" . $row["cost_no"] . "</td>";
                    echo "<td>" . $row["dep_no"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    </main>
    <script src="../assets/scripts/admin_seat.js"></script>
</body>
</html>