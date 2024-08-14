<?php  require '../assets/partials/_admin-check.php';  

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script defer src="test.js"></script>


    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    
</head>
<body>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <th>PNR</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Bus</th>
                            <th>Route</th>
                            <th>Seat</th>
                            <th>Amount</th>
                            <th>Departure</th>
                            <th>Booked</th>
                            <th>Actions</th>
            </tr>
        </thead>
        <?php
        function get_from_table($conn, $table, $primaryKey, $pKeyValue, $toget)
        {
            $sql = "SELECT * FROM $table WHERE $primaryKey='$pKeyValue'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
    
            if($row)
            {
                return $row["$toget"];
            }
            return false;
        }
        $resultSql = "SELECT * FROM `bookings` ORDER BY booking_created DESC";
                            
            $resultSqlResult = mysqli_query($conn, $resultSql);
                            while($row = mysqli_fetch_assoc($resultSqlResult))
                            {
                                    // echo "<pre>";
                                    // var_export($row);
                                    // echo "</pre>";
                                $id = $row["id"];
                                $customer_id = $row["customer_id"];
                                $route_id = $row["route_id"];

                                $pnr = $row["booking_id"];

                                $customer_name = get_from_table($conn, "customers","customer_id", $customer_id, "customer_name");
                                
                                $customer_phone = get_from_table($conn,"customers","customer_id", $customer_id, "customer_phone");

                                $bus_no = get_from_table($conn, "routes", "route_id", $route_id, "bus_no");

                                $route = $row["customer_route"];

                                $booked_seat = $row["booked_seat"];
                                
                                $booked_amount = $row["booked_amount"];

                                $dep_date = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_date");

                                $dep_time = get_from_table($conn, "routes", "route_id", $route_id, "route_dep_time");

                                $booked_timing = $row["booking_created"];
                        ?>
        <tbody>
        <tr>
                            <td>
                                <?php 
                                    echo $pnr;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $customer_name;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $customer_phone;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $bus_no;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $route;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $booked_seat;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo '$'.$booked_amount;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $dep_date . " , ". $dep_time;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $booked_timing;
                                ?>
                            </td>
        </tr>
            
        </tbody>
        <?php 
                        }
                    ?> 
    </table>
</body>
</html>