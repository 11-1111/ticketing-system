process_booking.php
<?php
// Database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp"; // Change this to your actual database name

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected seat from the form submission
$selected_seat = $_POST['selectedSeat'];

// Insert the selected seat into the database
$sql = "INSERT INTO bookings (booked_seat) VALUES ('$selected_seat')";

if ($conn->query($sql) === TRUE) {
    echo "Seat added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
