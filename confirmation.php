<?php
include("db_connection.php");
session_start();
if (!(isset($_SESSION["username"]))||!isset($_SESSION["selected_seats"])) {
    header("Location: index.php");
    exit();
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type='submit' id="declineBtn" name='decline' value='decline'>
            <input type='submit' id="confirmBtn" name='confirm' value='confirm'>
        </form>

    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["decline"])) {
            sleep(1);
            unset($_SESSION["selected_seats"]);
            unset($_SESSION["movieid"]);
            unset($_SESSION["price"]);
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
            }, 3000);
            // Change 3000 to the duration of your animation
        });
    </script>
</body>

</html>