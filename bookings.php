<?php
include("headder.php");
if ((isset($_SESSION["username"]))) {
    $uname = $_SESSION["username"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Booking</title>
    <link rel="stylesheet" href="style/bookingsMain.css">
    <!-- <script src="scripts/seatbooking.js" defer></script> -->
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

            <!-- Seat grid -->
            <div class="Seats">
                <form id="seatForm" action="confirmation-payment.php" method="post"> <!-- Changed to POST method for security -->

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
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if the current seat is booked
                            $disabled = in_array($row["seatid"], $bookedSeats) ? "disabled" : ""; // Disable checkbox if seat is booked

                            // Output the checkbox and label
                            echo "<input type='checkbox' id='seat{$row["seatno"]}' class='seat-checkbox' name='seats[]' value='{$row["seatid"]}' $disabled>";
                            echo "<label for='seat{$row["seatno"]}' class='seat-label'>{$row["seatno"]}</label>";
                        }
                        ?>

                    </div>

                    <!-- Submit (Confirm) Button -->
                    <input type="submit" name="submit" value="Confirm">
                    <!-- When this si submitted ....which all seats are selected will be entered into bookings
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