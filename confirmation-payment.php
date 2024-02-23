<?php
include("headerforbookings.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/payment.css">
</head>

<body>
    <div class='main'>
        <div class="container">
            <h2>Checkout Page</h2>
            <hr style="background-color:green;height:2px;margin-bottom:0px">
            <hr style="max-width:70%; background-color:green;height:2px;margin-top:1px;">
            <form action="payed.php" method="post">
                <div class='content'>
                    <div class='imgbox'>
                        <?php
                        if (isset($_SESSION["movieid"])) {
                            $sql = "SELECT * FROM movies WHERE movieid='{$_SESSION["movieid"]}'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);
                            echo "
                            <img src='{$row["image_url"]}'>
                            ";
                        }
                        ?>
                    </div>
                    <div class='detailsbox'>
                        <?php
                        echo "<h3>Movie: " . $row["title"] . "</h3><hr>";
                        $selectedSeats = isset($_SESSION["selected_seats"]) ? $_SESSION["selected_seats"] : array();
                        // Display selected seats to the user for confirmation
                        $numberSeats = count($selectedSeats);
                        echo "<h3>Number of Seats: " . $numberSeats . "</h3><hr>";
                        echo "<h3>Selected Seats: ";
                        foreach ($selectedSeats as $key => $seat) {
                            $seatq = "SELECT * FROM seats WHERE seatid={$seat}";
                            $res = mysqli_query($conn, $seatq);
                            $row = mysqli_fetch_array($res);
                            echo "{$row["seatno"]}";
                            // Print comma if it's not the last seat
                            if ($key < $numberSeats - 1) {
                                echo ", ";
                            }
                        }
                        echo "</h3><hr>";
                        $price = $_SESSION["price"];
                        ?>
                    </div>
                </div>
                <div class='inputbox'>
                    <input type="submit" value="Pay Rs.<?php echo $price; ?>">
                </div>
            </form>
        </div>
        <?php

        ?>
    </div>
</body>

</html>