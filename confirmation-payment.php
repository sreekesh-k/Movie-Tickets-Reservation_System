<?php
include("headder.php");
if ((isset($_SESSION["username"]))) {
    $uname = $_SESSION["username"];
}
if ((isset($_SESSION["movieid"]))) {
    $movieid = $_SESSION["movieid"];
}
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            if (!empty($_POST["seats"])) {
                // Loop through each selected seat and insert into the bookings table
                foreach ($_POST["seats"] as $seatid) {
                    $insert_query = "INSERT INTO bookings (username, movieid, seatid) VALUES ('$uname', '$movieid', '$seatid')";
                    mysqli_query($conn, $insert_query);
                }
                // header("Location: bookings.php");
                // exit();
            } else {
                // No seats selected, display an error message or take appropriate action
                echo "Please select at least one seat.";
            }
        }
        ?>
    </div>
</body>

</html>