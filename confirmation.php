<?php
include("db_connection.php");
session_start();
if ((isset($_SESSION["username"]))) {
    $uname = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="style/pmt.css">
</head>

<body>
    <div class="container">
        <div id="paymentAnimation"></div>
        <h2>Confirm Payment</h2>
        <form action="" method="post">
            <input type='button' id="declineBtn" name='decline' value='Decline'>
            <input type='button' id="confirmBtn" name='confirm' value='Confirm'>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["decline"])) {
            sleep(1);
            unset($_SESSION["seats"]);
            unset($_SESSION["movieid"]);
            header("Location: index.php");
        }
        if (isset($_POST["confirm"])) {
            sleep(2);
            header("Location: index.php");
        }
    }
    ?>
    <script defer>
        document.getElementById("confirmBtn").addEventListener("click", function() {
            document.getElementById("paymentAnimation").style.display = "block";
            setTimeout(function() {
                document.getElementById("paymentAnimation").style.display = "none";
                alert("Payment Successful!");

            }, 1000);
            // Change 3000 to the duration of your animation
        });

        document.getElementById("declineBtn").addEventListener("click", function() {
            alert("Payment Declined.");
        });
    </script>
</body>

</html>