<?php
include("headder.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class='main'>
        <?php
        if (isset($_SESSION["username"])) {
            $uname = $_SESSION["username"];
        }
        $sql = "SELECT * FROM users u JOIN bookings b ON u.username=b.username JOIN movies m ON b.movieid=m.movieid WHERE u.username='$uname'";
        $result = mysqli_query($conn, $sql);
        $seatNumbers = array();
        if (mysqli_num_rows($result) > 0) {
            echo " <h2>$uname's Tickets</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                $seatNumbers[] = $row['seatid'];
            }
        } else {
            echo "<h2>You have not yet booked any tickets</h2>";
        }
        ?>
        <div class="container">
            <div class='content'>
                <div class='imgbox'>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        echo "
                        <img src='{$row["image_url"]}'>
                            ";
                    ?>
                </div>
                <div class='detailsbox'>
                <?php
                        echo "<h3>Booked by: " . $uname . "</h3><hr>";
                        echo "<h3>Movie: " . $row["title"] . "</h3><hr>";
                        // Display selected seats to the user for confirmation
                        $numberSeats = count($seatNumbers);
                        echo "<h3>Number of Seats: " . $numberSeats . "</h3><hr>";
                        echo "<h3>Selected Seats: ";
                        foreach ($seatNumbers as $key => $seat) {
                            $seatq = "SELECT * FROM seats WHERE seatid={$seat}";
                            $res = mysqli_query($conn, $seatq);
                            $ro = mysqli_fetch_array($res);
                            echo "{$ro["seatno"]}";
                            // Print comma if it's not the last seat
                            if ($key < $numberSeats - 1) {
                                echo ", ";
                            }
                        }
                        echo "</h3><hr>";
                        echo "Time: " . date("H:i:s");
                        $price = $_SESSION["price"];
                    }
                ?>
                <h3>Payment status: Success Rs.<?php echo $price; ?></h3>
                <hr>
                </div>
            </div>
        </div>
        <?php

        ?>
    </div>
</body>

</html>