<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve route and departure date from POST request
$route = $_POST['routeNO'];
//$departure_date = $_POST['departureDate'];
//$departure_date_formatted = date('Y-m-d', strtotime($departure_date));

//$departure_date_formatted = mysqli_real_escape_string($con, $departure_date_formatted);

// Prepare SQL statement to fetch departure times based on route and departure date
$sql = "SELECT DISTINCT route_dep_time FROM routes WHERE route_cities = '$route'  ORDER BY route_dep_time";
$result = $con->query($sql);
$output ='<option value="" disabled selected>-Selected Bus-</option>';

if ($result->num_rows > 0) {
    // Output HTML options for bus numbers
    while ($row = $result->fetch_assoc()) {
        $output .= "<option value='" . $row['route_dep_time'] . "'>" . $row['route_dep_time'] . "</option>";
    }
    echo $output;
} else {
    // If no bus numbers found, display a default option
    echo "<option value=''>time numbers not found</option>";
}

// Close database connection
$con->close();
?>
