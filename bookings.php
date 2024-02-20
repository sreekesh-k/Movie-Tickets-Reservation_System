<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>
    <style>
        /* Style for the grid */
        .seat-grid {
            display: grid;
            grid-template-columns: repeat(8, 50px);
            /* Adjust according to your preference */
            gap: 5px;
            /* Adjust according to your preference */
        }

        /* Style for each seat checkbox */
        .seat-checkbox {
            display: none;
            /* Hide the checkboxes */
        }

        /* Style for the label representing each seat */
        .seat-label {
            width: 50px;
            /* Adjust according to your preference */
            height: 50px;
            /* Adjust according to your preference */
            display: block;
            background-color: white;
            border: 1px solid black;
            /* Add border for visibility */
            cursor: pointer;
        }

        /* Style for selected seats */
        .seat-checkbox:checked+.seat-label {
            background-color: green;
        }
    </style>
</head>

<body>

    <h2>Select your seat:</h2>

    <!-- Seat grid -->
    <form id="seatForm" action="bookedseats.php" method="post"> <!-- Changed to POST method for security -->
        <div class="seat-grid">
            <?php
            // Assuming you have 80 seats
            $totalSeats = 80;
            for ($i = 1; $i <= $totalSeats; $i++) {
                echo "<input type='checkbox' id='seat{$i}' class='seat-checkbox' name='seats[]' value='seat{$i}'>";
                echo "<label for='seat{$i}' class='seat-label'></label>";
            }
            ?>
        </div>
        <!-- Submit (Confirm) Button -->
        <button type="button" onclick="showSelectedSeats()">Confirm Selection</button>
    </form>

    <!-- Script to display selected seats -->
    <script>
        function showSelectedSeats() {
            var selectedSeats = document.querySelectorAll('.seat-checkbox:checked');
            var selectedSeatsArray = Array.from(selectedSeats).map(seat => seat.value);
            alert("Selected Seats: " + selectedSeatsArray.join(", "));
            // You can also perform other actions with the selected seats here, such as submitting the form
            // document.getElementById("seatForm").submit();
        }
    </script>

</body>

</html>