<?php
include("headder.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>
    <style>
        .Seats {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Style for the grid */
        .seat-grid {
            display: grid;
            grid-template-columns: repeat(14, 50px);
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: grey;
            background-color: white;
            border: solid 1px green;
            text-align: center;
            border-radius: 5px;
            /* Add border for visibility */
            cursor: pointer;
        }

        .seat-label:hover {
            background-color: green;
        }

        /* Style for selected seats */
        .seat-checkbox:checked+.seat-label {
            background-color: green;
        }
    </style>
</head>

<body>

    <div class="main">
        <center>
            <?php
            if (isset($_GET["movieid"])) {
                $movieid = $_GET["movieid"];
                $sql = "SELECT * FROM movies WHERE movieid= $movieid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $moviename = $row["title"];
            }
            ?>
            <h2>Select your seat for <?php echo $moviename; ?></h2>

            <!-- Seat grid -->
            <div class="Seats">
                <form id="seatForm" action="bookedseats.php" method="post"> <!-- Changed to POST method for security -->

                    <div class="seat-grid">
                        <?php
                        // Assuming you have 80 seats
                        $totalSeats = 1;
                        for ($i = 84; $i >= $totalSeats; $i--) {
                            echo "<input type='checkbox' id='seat{$i}' class='seat-checkbox' name='seats[]' value='seat{$i}'>";
                            echo "<label for='seat{$i}' class='seat-label'>$i</label>";
                        }
                        ?>
                    </div>

                    <!-- Submit (Confirm) Button -->
                    <button type="button" onclick="showSelectedSeats()">Confirm Selection</button>
                </form>
            </div>
        </center>
    </div>
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
<?php
include("html/footer.html");
mysqli_close($conn);
?>