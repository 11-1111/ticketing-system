<?php
// Connect to database
include('config.php');

// Fetch dates based on selected route cities
$route_cities = $_POST['customer_route'];
$sql = "SELECT DISTINCT route_dep_date FROM routes WHERE route_cities = '$route_cities'";
$result = $con->query($sql);

$response = array();
if ($result) {
    $dates = array();
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['route_dep_date'];
    }
    $response['success'] = true;
    $response['dates'] = $dates;
} else {
    $response['success'] = false;
    $response['error'] = 'Error fetching dates from the database.';
}

header('Content-type: application/json');
echo json_encode($response);
?>
