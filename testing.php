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
        <button id="declineBtn">Decline</button>
        <button id="confirmBtn">Confirm</button>
    </div>
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