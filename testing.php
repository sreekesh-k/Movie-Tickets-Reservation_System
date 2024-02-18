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
    $sql1 = "SELECT * FROM movies m JOIN moviesstars ms ON m.movieid= ms.moviesid Join stars s ON ms.starsid=s.starsid WHERE m.movieid=47";
    $result1 = mysqli_query($conn, "$sql1");
    $sql2 = "SELECT * FROM movies m JOIN moviesdirectors md ON m.movieid= md.moviesid Join directors d ON md.directorsid=d.directorid WHERE m.movieid=47";
    $result2 = mysqli_query($conn, "$sql2");
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            echo "<hr><h4>Director: <a href ='https://en.wikipedia.org/wiki/{$row1["stars_name"]}'> {$row1["stars_name"]} </a></h4><br>";
        }
    }
    if (mysqli_num_rows($result2) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo "<hr><h4>Star: <a href ='https://en.wikipedia.org/wiki/{$row2["directorname"]}'> {$row2["directorname"]}</a></h4><br>";
        }
    }
    ?>
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>