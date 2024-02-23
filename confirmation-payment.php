<?php
include("headerforbookings.php");
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
        $selectedSeats = isset($_SESSION["selected_seats"]) ? $_SESSION["selected_seats"] : array();
        // Display selected seats to the user for confirmation
        echo"SELECTED SEATS: ";
        foreach ($selectedSeats as $seat) {
            echo " $seat ";
        }
        ?>
    </div>
</body>

</html>