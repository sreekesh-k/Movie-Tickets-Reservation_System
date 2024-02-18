<?php
include("headder.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/movielist.css">
</head>

<body>
    <div class="main">
        <div style=" display: flex;flex-wrap: wrap; gap:10px;">
            <?php
            $sql = "SELECT * FROM movies";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo
                "<a href='moviedetails.php?movieid={$row["movieid"]}'>
                    <div class='card'> 
                        <div class='image-box'>
                            <img src='{$row["image_url"]}'>
                         </div>
                        <div class='content'>
                            <h2>{$row["title"]}</h2>
                            <p>{$row["description"]}</p>
                        </div>
                    </div>
                </a>";
            }
            ?>
        </div>
    </div>

</body>

</html>