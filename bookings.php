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
                <form id="seatForm" action="" method="post"> <!-- Changed to POST method for security -->

                    <div class="seat-grid">
                        <?php
                        $sql = "SELECT * FROM seats";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<input type='checkbox' id='seat{$row["seatno"]}' class='seat-checkbox' name='seats[]' value='seat{$row["seatno"]}'>";
                            echo "<label for='seat{$row["seatno"]}' class='seat-label'>{$row["seatno"]}</label>";
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
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>