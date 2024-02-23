<!DOCTYPE html>
<html>
<head>
    <title>Checkbox Example</title>
    <script>
        function calculateTotal() {
            var total = 0;
            var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
            checkboxes.forEach(function(checkbox) {
                total += parseFloat(checkbox.value);
            });
            document.getElementById('submitBtn').value = "Total Price: $" + total.toFixed(2);
        }

        function showSubmitButton() {
            var submitButton = document.getElementById('submitBtn');
            submitButton.style.display = 'block';
        }
    </script>
</head>
<body>
    <form action="process.php" method="post">
        <?php
            // Assume you have fetched the data from the database and stored it in $boxes variable
            $boxes = [
                ['id' => 1, 'number' => 'Box 1', 'price' => 10],
                ['id' => 2, 'number' => 'Box 2', 'price' => 15],
                ['id' => 3, 'number' => 'Box 3', 'price' => 20]
            ];

            foreach ($boxes as $box) {
                echo '<input type="checkbox" name="selected_boxes[]" value="' . $box['price'] . '" onclick="calculateTotal(); showSubmitButton();">' . $box['number'] . ' - $' . $box['price'] . '<br>';
            }
        ?>
        <br>
        <input type="submit" id="submitBtn" style="display:none;" value="Proceed Rs: $0.00">
    </form>
</body>
</html>
