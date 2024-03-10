<?php

include('../db_connection.php');

$bid = $_GET['bookingid'];
$query = "DELETE FROM `bookings` WHERE `bookingid` = '$bid'";

$run = mysqli_query($conn, $query);

if ($run == true) {
?>

    <script type="text/javascript">
        alert("Booking Deleted Successfully!");
        window.open('bookingdetail.php', '_self');
    </script>

<?php
}

?>