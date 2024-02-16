<?php
include("headder.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieDetails</title>
    <link rel="stylesheet" href="style/moviedetailsmain.css">
    <link rel="stylesheet" href="style/moviedetailsLeftbox.css">
    <link rel="stylesheet" href="style/moviedetailsRight.css">
</head>

<body>
    <div class="background-box">
    </div>
    <div class="main">
        <div class="movie-details">
            <?php
            if (isset($_GET["movieid"])) {
                $movieid = $_GET["movieid"];
                $sql = "SELECT * FROM movies WHERE movieid= $movieid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // Assuming $row["runtime"] contains the runtime in minutes
                $runtime_minutes = $row["runtime"];
                // Calculate hours and minutes
                $hours = floor($runtime_minutes / 60);
                $minutes = $runtime_minutes % 60;
                $date = strtotime($row["r_date"]);
                echo "
                <div class='movie-image'>
                    <div class='image-container'>
                        <img src='{$row["image_url"]}'>
                    </div>
                    <div class='movie-rating'>
                        <div class='rating-box'>
                            {$row["language"]}
                        </div>
                        <div class='rating-box'>
                            {$row["genre"]}
                        </div>
                        <div class='rating-box'>
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24' fill='yellow'>
                                <path d='M0 0h24v24H0z' fill='none' />
                                <path d='M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z' />
                                <path d='M0 0h24v24H0z' fill='none' />
                            </svg>
                            <big>{$row["imdb_rating"]}</big>/10
                          
                        </div>
                    </div>
                </div>
                <div class='movie-desc'>
                    <div class='transparent-box'>
                        <h1>" . strtoupper($row["title"]) . "</h1>  
                    </div>
                    <div class='content-box'>
                        <div class = 'description'>
                            <p>{$row["description"]}</p>
                            <div class= catagory-box>
                                <div class='cata-box'>
                                {$row["certificate"]} 
                                </div>
                                <div class='cata-box'>
                                {$hours}h {$minutes}m
                                </div>
                                <div class='cata-box'>" .
                                date("d-m-y", $date) .
                                "</div>
                            </div> 
                            <hr>
                        </div>
                    </div>
                </div>";
            } else {
                echo "movie id not provided";
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>