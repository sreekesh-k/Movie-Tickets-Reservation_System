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
        <div style="display: flex;flex-wrap: wrap; gap:30px;width:100%; align-items: center; justify-content:flex-start;">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $conditions = array();
                if (isset($_GET["movieid"])) {
                    $conditions[] = "movieid = " . $_GET["movieid"];
                }
                if (isset($_GET["title"])) {
                    $conditions[] = "title LIKE '%" . $_GET["title"] . "%'";
                }
                if (isset($_GET["imdb_rating"])) {
                    $conditions[] = "imdb_rating >" . $_GET["imdb_rating"];
                }
                if (isset($_GET["r_date"])) {
                    $conditions[] = "r_date >" . $_GET["r_date"];
                }
                if (isset($_GET["genre"])) {
                    $conditions[] = "genre LIKE '%" . $_GET["genre"] . "%'";
                }
                if (isset($_GET["language"])) {
                    $conditions[] = "language LIKE '%" . $_GET["language"] . "%'";
                }
                // Check if any conditions are added
                if (!empty($conditions)) {
                    $where_clause = " WHERE " . implode(" AND ", $conditions);
                } else {
                    $where_clause = "";
                }
                $sql = "SELECT * FROM movies" . $where_clause;
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
            }


            ?>
        </div>
    </div>

</body>

</html>