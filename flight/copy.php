<?php
session_start(); 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbtbsphp";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['customer_route']) && isset($_POST['departure_date'])) {
    $customer_route = $_POST['customer_route'];
    $departure_date = $_POST['departure_date'];
    $bus_number=$_POST['route_dep_time'];
    // $route_id = $_POST['route_id'];
    print_r($bus_number);

    $departure_date_formatted = date('Y-m-d', strtotime($departure_date));

    // Escape variables to prevent SQL injection
    $customer_route = mysqli_real_escape_string($con, $customer_route);
    $departure_date_formatted = mysqli_real_escape_string($con, $departure_date_formatted);
    $query = mysqli_query($con, "SELECT * FROM routes WHERE route_cities = '$customer_route' AND route_dep_date = '$departure_date_formatted' AND route_dep_time = '$bus_number'");


   // $query = mysqli_query($con, "SELECT * FROM routes WHERE route_cities = '$customer_route' AND route_dep_date = '$departure_date_formatted'");
    
    $query_route = mysqli_query($con, "SELECT * FROM routes WHERE route_cities = '$customer_route' AND route_dep_date = '$departure_date_formatted' AND route_dep_time = '$bus_number'");


    while($row = mysqli_fetch_assoc($query_route)){
        $route_id = $row['route_id'];
         print_r($route_id);
    }


    $selected_seat_query = "SELECT booked_seat FROM bookings WHERE route_id = '$route_id'  ";
    $selected_seats = mysqli_query($con, $selected_seat_query);
    $booked_seats_array =[];

    while($row = mysqli_fetch_assoc($selected_seats)){
        $booked_seats_array[] = ($row['booked_seat']);
        $booked_seats_array = array_unique($booked_seats_array);
        
        // print_r($row['booked_seat']);
    }

    // print_r($booked_seats_array);

    if ($query) {
        if (mysqli_num_rows($query) == 0) {
            $_SESSION['error_message'] = "No Busses Scheduled on that date!";
            echo "<script>alert('No Buses Scheduled.');</script>";
            header("Location: c.php");
        } else {
            // while($row = mysqli_fetch_assoc($query)){
            //     print_r($row);
            // }
            // Output HTML table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Table Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
         body {
            background-image: url('img/use.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        table {
            background-color:azure;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333; /* Set background color for table headings to a shade of grey */
            color: #fff; /* Set text color for table headings to white */
            text-transform: uppercase; /* Convert text to uppercase */
        }
        button {
            background-color: #333; /* Set button background color to a shade of grey */
            color: #fff; /* Set button text color to white */
            border: none;
            padding: 8px 16px;
            border-radius: 20px; /* Make the button round */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add smooth transition effect */
            margin-top: 2px; /* Add some space between buttons */
        }
        button:hover {
            background-color: #444; /* Darken button background color on hover */
        }
        /* Styles for the table */
        /* Add your CSS styles here */
        .bus {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
         }
         input.seatnumber {
    width: 100px; /* Adjust width as needed */
    height: 30px; /* Adjust height as needed */
    padding: 5px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}
.spacer {
        width: 100px; /* Adjust width for space between input fields */
        display: inline-block;
    }

    .seat {
        width: 60px;
        height: 60px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        margin: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
    }

    .seat:hover {
    border: 2px solid #ffc61a; /* Use #ffc61a instead of yellow */
}


    .door {
        width: 50px;
        height: 130px;
        /* background-color: #ddd; */
        margin: 5px;
    }

    .spacing {
        flex-basis: 80px; /* Adjust the spacing width as needed */
    }
    .selected {
        background-color: #ffc61a !important;
    }
    .booked {
        background-color: yellow;
        background: yellow;
    }
    </style>
</head>
<body>

<h2>SCHEDULED DEPARTURES:</h2>

<table>
    <thead>
        <tr>
        <th>Route Id</th>
            <th>Route</th>
            <th>Bus Number</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Cost</th>
            <th>Action</th>
            <!-- Add other columns as needed -->
        </tr>
    </thead>
    <tbody>
<?php
            // Output data from the query
            while ($invoice = mysqli_fetch_assoc($query)) {
?>
        <div class>
            
            <tr>
                <td><?php echo $invoice['route_id']; ?></td>
                <td><?php echo $invoice['route_cities']; ?></td>
                <td><?php echo $invoice['bus_no']; ?></td>
                <td><?php echo $invoice['route_dep_date']; ?></td>
                <td><?php echo $invoice['route_dep_time']; ?></td>
                <td id="cost"><?php echo $invoice['route_step_cost']; ?></td>
                <td>
                    <input type="hidden" name="route_id" value="<?php echo $invoice['route_id']; ?>">
                    <input type="hidden" name="route_cities" value="<?php echo $invoice['route_cities']; ?>">
                    <input type="hidden" name="bus_no" value="<?php echo $invoice['bus_no']; ?>">
                    <input type="hidden" name="route_dep_date" value="<?php echo $invoice['route_dep_date']; ?>">
                    <input type="hidden" name="route_dep_time" value="<?php echo $invoice['route_dep_time']; ?>">
                    <input type="hidden" name="route_step_cost" class="seatnumber" value="<?php echo $invoice['route_step_cost']; ?>">
                    <!-- Button to Open the Modal -->
                    <button id="book" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Book
                    </button>
                    <!-- <button type="submit">Book</button> -->
                </td>
            </tr>
        </div>
<?php
            }
?>
    </tbody>
</table>



<!-- The Modal -->
<div  class="modal" id="myModal">
  <div  style="width: 800px" class="modal-dialog">
    <div style="width: 800px"  class="modal-content">

      <!-- Modal Header -->
      <div style="width: 800px" class="modal-header d-flex justify-content-between">
        <h4 class="modal-title">Select your bus seat</h4>
        <div class="d-flex justify-content-end">
            <button style="font-size:15px" type="button" class="close bg-warning" data-dismiss="modal">&times;</button>
        </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="bus">
        <?php
        $totalSeats = 38;
        $seatsPerColumn = 6;

        for ($i = 1; $i <= $totalSeats; $i++) {
            if ($i == 21) { // Add door entry after the first 4 seats
                echo '<div class="door"></div>';
            }
            
            echo '<div class="seat" id="' . $i . '">' . $i . '</div>';

            if ($i == 27 || $i == 36) { // Add spacing after the first 2 columns
                echo '<div class="spacing"></div>';
            }
        }
        ?>
    </div>



        
                <!-- // Output data from the query
                // while ($invoice = mysqli_fetch_assoc($query)) {
                    // print_r($invoice['route_id']);
                // } -->
            
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <?php
// Assuming $query is properly initialized with the result of your database query
$query = mysqli_query($con, "SELECT * FROM routes WHERE route_cities = '$customer_route' AND route_dep_date = '$departure_date_formatted' AND route_dep_time = '$bus_number'");
if ($invoicee = mysqli_fetch_assoc($query)) {
    // Print out the data for one row to verify its existence
    // print_r($invoice);
?>






<form class="d-flex justify-content-center" action="insert.php" method="post">
    <!-- <table> -->
        <!-- <tr> -->
            <!-- <td> -->
                <input type="hidden" name="route_id" value="<?php echo $invoicee['route_id']; ?>">
                <input type="hidden" name="route_cities" value="<?php echo $invoicee['route_cities']; ?>">
                <input type="hidden" name="bus_no" value="<?php echo $invoicee['bus_no']; ?>">
                <input type="hidden" name="route_dep_date" value="<?php echo $invoicee['route_dep_date']; ?>">
                <input type="hidden" name="route_dep_time" value="<?php echo $invoicee['route_dep_time']; ?>">
                <input type="text" name="route_step_cost" class="seatnumber" id="route_cost" readonly/>
                <input type="text" id="selectedSeat" name="selectedSeat" class="seatnumber" readonly required>

            <!-- </td> -->
        <!-- </tr> --><div class="spacer"></div>
    <!-- </table> -->
    <div> 
        <button type="submit" class="btn btn-secondary" data-dismiss="mdal">Book Now</button>
    </div>
</form>
<?php
}
?>


      </div>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<script>

    // Initialize variables to store the selected seats
    var selectedSeats = [];

    // bus booking price per seat 
    var initial_cost_input = document.getElementById('cost').innerText;
    console.log(initial_cost_input);

    // Add event listeners to each seat
    var seats = document.querySelectorAll('.seat');
    var selectedSeatInput = document.getElementById('selectedSeat');
    var total_cost_input = document.getElementById('route_cost');
    var cost = document.getElementById("cost");

    seats.forEach(function(seat) {
        seat.addEventListener('click', function() {
            // Toggle the 'selected' class for the clicked seat
            seat.classList.toggle('selected');

            // Get the seat number
            var seatNumber = seat.textContent;

            // Check if the seat is already in the selectedSeats array
            var index = selectedSeats.indexOf(seatNumber);

            if (index === -1) {
                // If the seat is not selected, add it to the array
                selectedSeats.push(seatNumber);
                // console.log(selectedSeats.length);
                // $invoice = mysqli_fetch_assoc($query);

                cost.textContent =  (initial_cost_input * selectedSeats.length);
                $total_cost = cost.textContent;
            } else {
                // If the seat is already selected, remove it from the array
                selectedSeats.splice(index, 1);
                cost.textContent = (initial_cost_input * selectedSeats.length);
                $total_cost = cost.textContent;

            }

            // Update the selected seats input value with the array of selected seats
            selectedSeatInput.value = selectedSeats.join(', ');
            total_cost_input.value = $total_cost;
        });
    });

    function handleClick(event){
        // prevent click events
        event.preventDefault();
        event.stopPropagation();
    }

    function colorBookedSeats() {
        var duplicate_bookedSeats = <?php echo json_encode($booked_seats_array); ?>;
        // for($i=0; $i <= bookedSeats.length; $i++){
        const bookedSeats = duplicate_bookedSeats.flatMap(item => item.split(',').map(x => x.trim()));
        // console.log(bookedSeats);

        // }
        // var bookedSeats = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
        // alert(bookedSeats);
        var seats = document.querySelectorAll('.seat');

        seats.forEach(function(seat) {
            var seatNumber = seat.textContent;
            
            
            // for($i=1; $i <= 18; $i++){
                var isBooked = bookedSeats.includes((seatNumber));
                // console.log(typeof(Number(seatNumber)));
                // console.log(typeof(seatNumber), '__', typeof(bookedSeats[1]) );
                // console.log(isBooked);

            // }
            // alert(seatNumber);

            if (isBooked) {
                document.getElementById(seatNumber).classList.add('booked');
                document.getElementById(seatNumber).addEventListener('click', handleClick);
                document.getElementById(seatNumber).style.pointerEvents='none';


                // document.getElementById(seatNumber).removeEventListener('click');
                // seat.classList.add('booked');
                // seat.removeEventListener('click');
            }
        });
        }

    // // Call the function when the form is loaded
    // window.onload = function() {
    //     colorBookedSeats();
    // };

    // Add event listener to the "Book" button
    var bookButton = document.getElementById('book');
    bookButton.addEventListener('click', function() {
        colorBookedSeats();
    });
</script>

</html>
<?php
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
}
?>
