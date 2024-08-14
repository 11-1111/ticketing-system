<?php
session_start();

// print_r($_SESSION['customer_id']);


$customer_id = $_SESSION['customer_id'];


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
?>
    



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertt.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">

<div class="registration_form">
<h4> PROCEED BOOKING</h4>
<div class="form_wrap">

    <?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form submission
    $route_id = $_POST['route_id'];
    $bus_no=$_POST['bus_no'];

    ///print_r($route_id);
   // print_r($bus_no);
    $route_cities = $_POST['route_cities'];
    $route_seat_number = $_POST['selectedSeat'];
    $route_step_cost = $_POST['route_step_cost'];
    $route_dep_date=$_POST['route_dep_date'];
    $route_dep_time=$_POST['route_dep_time'];
    
    //generate a 8 uuid code that starts with prefix BK
    $booking_id = 'BK' . substr(uniqid(), 0, 8);
    
    

    // Prepare SQL statement to fetch route_id from routes table
    // $stmt_route = $conn->prepare("SELECT route_id FROM routes WHERE route_cities = ?");
    // $stmt_route->bind_param("s", $route_cities);
    // $stmt_route->execute();
    // $stmt_route->store_result();
    // $stmt_route->bind_result($route_id);
    // $stmt_route->fetch();

    // Prepare SQL statement to insert data into the bookings table
    $stmt_booking = $conn->prepare("INSERT INTO bookings (booking_id, customer_id, route_id, customer_route, booked_amount, booked_seat) VALUES (?, ?, ?, ?, ?, ?)");
    

    $stmt_booking->bind_param("ssssss", $booking_id, $customer_id,  $route_id, $route_cities, $route_step_cost, $route_seat_number);
    echo "<div class='container'>";

    // Execute SQL statement for booking insertion
    if ($stmt_booking->execute()) {

       
        //echo "<p style='font-weight: bold; color: brown; font-family: Arial, sans-serif; font-size: 18px; margin-top: -10px;'>Proceed with Booking</p>";

        echo "<table>";
        //echo "<tr><th colspan='2'>Bus Information</th></tr>";
        echo "<tr><td><strong>BUS NUMBER</strong></td><td>" . strtoupper($bus_no) . "</td></tr>";
        echo "<tr><td><strong>DATE</strong></td><td>" . strtoupper($route_dep_time) . "</td></tr>";
        echo "<tr><td><strong>TIME</strong></td><td>" . strtoupper($route_dep_date) . "</td></tr>";
        echo "</table>";
      //  header("Location: details.php");


    } else {
        echo "Error: " . $stmt_booking->error;
    }

    // Close statements
    // $stmt_route->close();
    // $stmt_booking->close();
}

// $sql = "SELECT * FROM customers WHERE customer_id = '$customer_id'";

// $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         // Output data of each row
//         while($row = $result->fetch_assoc()) {
//             // Display customer data
//             echo "Customer ID: " . $row["customer_id"] . "<br>";
//             echo "Customer Name: " . $row["customer_name"] . "<br>";
//             echo "Customer Phone: " . $row["customer_phone"] . "<br>";
//             echo "Customer Email: " . $row["customer_mail"] . "<br>";
//             // Add more fields as needed
//         }
//     } else {
//         echo "0 results";
//     }
    //$conn->close();
    $sql = "SELECT booking_created FROM bookings WHERE route_id = ? AND customer_id = ?";
    $route_id = $_POST['route_id']; // Replace with actual route ID
    $bus_no=$_POST['bus_no']; // Replace with actual customer ID

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $route_id, $customer_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Fetch the timestamp (assuming it's in a column named 'booking_created')
    while ($row = $result->fetch_assoc()) {
        $booking_created = $row['booking_created'];
        //echo "Booking Created: " . $booking_created;
    }
} else {
    echo "No results found";
}







    $sqlu = "SELECT * FROM bookings WHERE route_id = '$route_id' AND customer_id = '$customer_id'";
    $resultu = $conn->query($sqlu);

    if ($resultu->num_rows > 0) {
        // Output data of each row
        $row = $resultu->fetch_assoc();
        $booking_id=$row["booking_id"];
       // print_r($booking_id);
    
    }


    $sql = "SELECT customers.*, bookings.*
            FROM customers
            JOIN bookings ON customers.customer_id = bookings.customer_id
            WHERE bookings.route_id = '$route_id' AND customers.customer_id = '$customer_id' ORDER BY booking_created DESC";

    //$sql = "SELECT * FROM bookings WHERE route_id = '$route_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        $row = $result->fetch_assoc();
        $cid=$row["customer_id"];
        $cname=$row["customer_name"];
        $cphone=$row["customer_phone"];
        $cmail=$row["customer_mail"];
       // print_r($row["customer_name"]);
      // print_r($cname);
            // Display customer data
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

            .input {
                width: 600%; /* Example width */
                padding: 70px; /* Example padding */
                border: 1px solid #ccc; /* Example border */
                border-radius: 5px; /* Example border radius */
                box-sizing: border-box; /* Ensure padding and border are included in the width */
                /* Add more CSS properties as needed */

            .br {
                margin-bottom: 90px; /* Adjust the value as needed */
              }
              .root {
                display: flex;
              }
              .spacer {
                margin-bottom: 20px; /* Adjust the margin as needed */
            }
            .div1 {
                margin-right: 600px; /* Adjust the margin as needed */
            }
            .left-div {
                margin-left: 50px; /* Adjust the value as needed */
            }
        }
        
      </style>";
      
      //echo "<div class='container'>";
     
echo "<table>";
//echo "<tr><th colspan='2'>Customer Information</th></tr>";
echo "<tr><td><strong>Customer ID</strong></td><td>" . $row["customer_id"] . "</td></tr>";
echo "<tr><td><strong>Customer Name</strong></td><td>" . $row["customer_name"] . "</td></tr>";
echo "<tr><td><strong>Customer Phone</strong></td><td>" . $row["customer_phone"] . "</td></tr>";
echo "<tr><td><strong>Customer Email</strong></td><td>" . $row["customer_mail"] . "</td></tr>";
echo "</table>";

echo "<table>";
//echo "<tr><th colspan='2'>Booking Details</th></tr>";
echo "<tr><td><strong>Customer Seats</strong></td><td>" . $row["booked_seat"] . "</td></tr>";
echo "<tr><td><strong>Price</strong></td><td>ksh. " . $row["booked_amount"] . "</td></tr>";
$route = str_replace(',', ' ➔ ', $row["customer_route"]);
echo "<tr><td><strong>Route</strong></td><td>" . $route . "</td></tr>";
echo "</table>";
echo "</div>";
           // echo "Route: " . $row["customer_route"] . "<br>";
           // echo "Customer Email: " . $row["customer_mail"] . "<br>";
            // Add more fields as needed
    } else {
        echo "0 results";
    }
    $_SESSION['data_displayed'] = true;
    $conn->close();

    
  //  $callbackurl = 'https://37dc-105-161-202-36.ngrok-free.app/SimpleBusTicket-PHP/Mpesa-Daraja-Api-main/callback.php';
   // $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

// Close connection
//$conn->close();
?>








<div>
<form id="payment-form" action="http://localhost/SimpleBusTicket-PHP/Mpesa-Daraja-Api-main/stkpush.php"  method="POST">
    <input type="hidden" name="route_step_cost" value="<?php echo $route_step_cost; ?>">
   
    <div class="root">
        <div class="div1">
            <label for="contact">Contact:</label>
            <input class="input" type="tel" id="contact" name="contact" placeholder="254712346786" required>
        </div>
        <div class="spacer"></div>
        <div class="left-div">
        <button id="checkout-btn" class="checkout-button"  style="width: 200px;font-weight: bold;" type="submit">pay</button>

        </div>
        <div class="spacer"></div>
    </div>
    
</form>



</div>
<div>
<form method='post' action='http://localhost/SimpleBusTicket-PHP/receipt.php'>
    <!-- Your form fields -->

    <!-- Add hidden input fields to pass customer data -->
    <input type="hidden" name="booking_id" value="<?php echo $booking_id; ?>">
    <input type="hidden" name="route_id" value="<?php echo  $route_id; ?>">
    <input type="hidden" name="route_dep_time" value="<?php echo $route_dep_time; ?>">
    <input type="hidden" name="route_dep_date" value="<?php echo $route_dep_date; ?>">
    <input type="hidden" name="route_seat_number" value="<?php echo $route_seat_number; ?>">
    <input type="hidden" name="bus_no" value="<?php echo $bus_no; ?>">
    <input type="hidden" name="cphone" value="<?php echo $cphone; ?>">
    <input type="hidden" name="cid" value="<?php echo $cid; ?>">
    <input type="hidden" name="route_cities" value="<?php echo $route_cities; ?>">
    <input type="hidden" name="route_step_cost" value="<?php echo $route_step_cost; ?>">
    <input type="hidden" name="cmail" value="<?php echo $cmail; ?>">
    <input type="hidden" name="cname" value="<?php echo  $cname; ?>">
    <input type="hidden" name="booking_created" value="<?php echo  $booking_created; ?>">
    <!-- Add more hidden fields for other customer data as needed -->

 <button type="submit" class="styled-button"><i class='bx bxs-file-pdf'></i>Generate Receipt</button>
</form>

</div>


</div>
</div>
</div>


</body>
</html>
