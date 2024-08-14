<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['customer_route'])) {
    $customer_route=$_POST['customer_route'];
    
    // $route_id = $_POST['route_id'];
    //print_r($customer_route);

   
}
// Your database connection code here

//$start_date = "2024-04-04"; // Example start date
//$end_date = "2024-04-06"; // Example end date

$sql = "SELECT * 
        FROM bookings AS b
        INNER JOIN routes AS r ON b.route_id = r.route_id
        INNER JOIN customers AS c ON b.customer_id = c.customer_id
        WHERE b.customer_route = '$customer_route'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<style>
        body {
            background-color: #f5f5f5; /* Replace #f5f5f5 with your desired background color */
            margin: 0;
            padding: 0;
            height: 100vh; /* Ensure full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
      </style>";
    echo "<div class='container'>";
    echo "<table style='border-collapse: collapse; width: 100%;'>"; // Add missing semicolon after style attribute
echo "<tr>";
echo "<th style='background-color:#007bff; color: white; font-size: 20px;'>BusNumber</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>CustomerRoute</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>Customer Name</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>Booked Amount</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>BookedSeat</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>Depature Date</th>";
echo "<th style='background-color: #007bff; color: white; font-size: 20px;'>Depature Time</th>";
echo "</tr>";

// Fetch and display table data
while ($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    echo "<td style='border: 1px solid black; width: 150px;'>" . $row["bus_no"] . "</td>";
    echo "<td style='border: 1px solid black; width: 150px;'>" . $row["customer_route"] . "</td>";
    echo "<td style='border: 1px solid black; width: 200px;'>" . $row["customer_name"] . "</td>";
    echo "<td style='border: 1px solid black; width: 150px;'>" . $row["booked_amount"] . "</td>";
    echo "<td style='border: 1px solid black; width: 100px;'>" . $row["booked_seat"] . "</td>";
    echo "<td style='border: 1px solid black; width: 150px;'>" . $row["route_dep_date"] . "</td>";
    echo "<td style='border: 1px solid black; width: 150px;'>" . $row["route_dep_time"] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";


    echo "<div style='padding:20px'>";
    echo "<form method='post' action='http://localhost/SimpleBusTicket-PHP/invoice-db.php'>";
        echo "<input type='hidden' name='customer_route' value='$customer_route'>";
        echo "<button style='padding:9px; background-color:green; font-size:13px; color:white; border-radius: 5px;'>";
        echo "Generate Report";
        echo "</button>";
        echo "</form>";
        
        
        echo "</div>";
        // echo '<a style="color:white; text-decoration:none" href="../invoice-db.php">Generate Report Now</a>';
    }
 else {
    echo "0 results";
}

$conn->close();
?>

