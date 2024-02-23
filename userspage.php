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
        // Assuming $conn is your database connection

        // Get the username (you mentioned you already have this)
        $username = $_SESSION["username"]; // Assuming you have stored the username in a session variable

        // Query to fetch the tickets booked by the user
        // Query to fetch the tickets booked by the user
        $sql = "SELECT m.title AS movie_title, COUNT(b.seatid) AS num_seats, SUM(s.price) AS total_paid, MIN(b.bookingdate) AS booking_date
FROM bookings b
JOIN movies m ON b.movieid = m.movieid
JOIN seats s ON b.seatid = s.seatid
WHERE b.username = (SELECT username FROM users WHERE username = '$username')
GROUP BY m.title";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>$username's Tickets</h2>";
            echo "<table>";
            echo "<tr><th>Movie</th><th>Seats</th><th>Paid</th><th>Booking Date</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['movie_title']}</td>";
                echo "<td>{$row['num_seats']}</td>";
                echo "<td>{$row['total_paid']}</td>";
                echo "<td>{$row['booking_date']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No tickets found for $username.";
        }

        ?>

    </div>
</body>

</html>