<?php
include("headerforbookings.php");
if ((isset($_SESSION["username"]))) {
    $uname = $_SESSION["username"];
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    if (!empty($_POST["seats"])) {
        $selectedSeats = $_POST["seats"];
        // Store selected seats in session variable
        $_SESSION["selected_seats"] = $selectedSeats;
        header("Location: confirmation-payment.php");
        exit();
    } else {
        // No seats selected, display an error message or take appropriate action
        echo "Please select at least one seat.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>
    <link rel="stylesheet" href="style/bookingsMain.css">

</head>

<body>

    <div class="main">
        <center>
            <?php
            if (isset($_SESSION["movieid"])) {
                $movieid = $_SESSION["movieid"];
                $sql = "SELECT * FROM movies WHERE movieid= $movieid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $moviename = $row["title"];
            }
            ?>
            <h2>Select your seat for <?php echo $moviename; ?></h2>

            <!-- Seat grid --><!-- Seat grid (i want 120 here here) -->
            <div class="Seats">
                <form id="seatForm" action="bookings.php" method="post"> <!-- Changed to POST method for security -->

                    <div class="seat-grid">
                        <?php
                        // Array to store booked seat IDs
                        $bookedSeats = array();

                        // Query to fetch booked seat IDs for the selected movie
                        $sql1 = "SELECT seatid FROM bookings WHERE movieid='{$movieid}'";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            // Store booked seat IDs in the array
                            $bookedSeats[] = $row1["seatid"];
                        }

                        // Query to fetch all seats
                        $sql = "SELECT * FROM seats";
                        $result = mysqli_query($conn, $sql);

                        // Counter variable to keep track of the number of seats displayed
                        $seatCounter = 0;

                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if the current seat is booked
                            $disabled = in_array($row["seatid"], $bookedSeats) ? "disabled" : ""; // Disable checkbox if seat is booked

                            // Output the checkbox and label
                            echo "<input type='checkbox' id='seat{$row["seatno"]}' class='seat-checkbox' name='seats[]' value='{$row["seatid"]}' $disabled>";
                            echo "<label for='seat{$row["seatno"]}' class='seat-label'>{$row["seatno"]}</label>";

                            // Increment the seat counter
                            $seatCounter++;

                            // Check if the seat counter reaches 120, if so, break the loop
                            if ($seatCounter >= 120) {
                                break;
                            }
                        }
                        ?>
                    </div>
                    <br>

                    <!-- Seat grid2 -->
                    <div class="seat-grid2">
                        <?php
                        // Continue fetching seats from the result set
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if the current seat is booked
                            $disabled = in_array($row["seatid"], $bookedSeats) ? "disabled" : ""; // Disable checkbox if seat is booked

                            // Output the checkbox and label
                            echo "<input type='checkbox' id='seat{$row["seatno"]}' class='seat-checkbox' name='seats[]' value='{$row["seatid"]}' $disabled>";
                            echo "<label for='seat{$row["seatno"]}' class='seat-label'>{$row["seatno"]}</label>";
                        }
                        ?>
                    </div>


            </div>
            <!-- Submit (Confirm) Button -->
            <input type="submit" name="submit" value="Confirm">
            <!-- When this is submitted ....which all seats are selected will be entered into bookings
                    database as Insert into bookings(username,seatid,movieid) -->
            </form>
    </div>

    </center>
    </div>
    <!-- Script to display selected seats -->
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>