<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// SQL query to select data from a particular column
$sql = "SELECT route_id FROM bookings";

// Execute query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display data from the particular column
        echo $row["route_id"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
