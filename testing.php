<?php
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM movies JOIN moviesdirectors ON moviesid = moviesid JOIN directors ON directorsid=directorid AND moviesid=2";
    $result = mysqli_query($conn, "$sql");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row["directorname"] . " ";
            echo $row["title"] . "<br>";
        }
    }
    ?>
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>