<?php
include("headerforbookings.php");
if (!(isset($_SESSION["username"])) || !isset($_SESSION["selected_seats"])) {
    header("Location: index.php");
    exit();
}

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
            <h2>Your Ticket</h2>
            <hr style="background-color:green;height:2px;margin-bottom:0px">
            <hr style="max-width:70%; background-color:green;height:2px;margin-top:1px;">
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
                    echo "<h3>Booked by: " . $_SESSION["username"] . "</h3><hr>";
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
                    echo "Time: " . date("H:i:s");
                    $price = $_SESSION["price"];
                    ?>
                    <h3>Payment status: Success Rs.<?php echo $price; ?></h3>
                    <hr>
                </div>
            </div>
            <div class='inputbox'>
                <a href='removebooked.php' style="text-decoration:none;"><button type="submit">Thankyou</button></a>
            </div>
        </div>
        <?php

        ?>
    </div>
</body>

</html>