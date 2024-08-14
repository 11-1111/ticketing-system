seats.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticketing System</title>
    <style>
        .seat {
            width: 30px;
            height: 30px;
            background-color: #ccc;
            border: 1px solid #aaa;
            margin: 5px;
            text-align: center;
            line-height: 30px;
            cursor: pointer;
        }
        .selected {
            background-color: #f00; /* Change color for selected seats */
        }
    </style>
</head>
<body>
    <h2>Screen</h2>
    <form id="bookingForm" action="process_booking.php" method="post">
        <div id="seats">
            <!-- Seat layout goes here -->
            <div class="row">
                <div class="seat" data-seat="A1">A1</div>
                <div class="seat" data-seat="A2">A2</div>
                <div class="seat" data-seat="A3">A3</div>
                <!-- Add more seats as needed -->
            </div>
            <div class="row">
                <div class="seat" data-seat="B1">B1</div>
                <div class="seat" data-seat="B2">B2</div>
                <div class="seat" data-seat="B3">B3</div>
                <!-- Add more seats as needed -->
            </div>
            <!-- Repeat rows and seats to match the theater layout -->
        </div>

        <label for="selectedSeat">Selected Seat:</label>
        <input type="text" id="selectedSeat" name="selectedSeat" readonly>

        <!-- Add submit button -->
        <button type="submit">Submit</button>
    </form>

    <script>
    // JavaScript to handle seat selection
    document.querySelectorAll('.seat').forEach(seat => {
        seat.addEventListener('click', () => {
            seat.classList.toggle('selected');
            document.getElementById('selectedSeat').value = seat.getAttribute('data-seat');
            // Enable or disable the submit button based on whether a seat is selected
            document.getElementById('submitButton').disabled = document.querySelectorAll('.selected').length === 0;
        });
    });
</script>
</body>
</html>
