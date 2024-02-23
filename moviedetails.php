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
    <link rel="stylesheet" href="style/indexMain.css">

</head>

<body>
    <div class="background-box">
    </div>
    <div class="main">
        <div class="movie-details">
            <?php
            if (isset($_GET["movieid"])) {
                $movieid = $_GET["movieid"];
                if (isset($_SESSION["username"]))
                    $_SESSION["movieid"] = $movieid;
                $sql = "SELECT * FROM movies WHERE movieid= $movieid";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // Assuming $row["runtime"] contains the runtime in minutes
                $runtime_minutes = $row["runtime"];
                // Calculate hours and minutes
                $hours = floor($runtime_minutes / 60);
                $minutes = $runtime_minutes % 60;
                $date = strtotime($row["r_date"]);
                $lang = $row["language"];
                $genre = $row["genre"];
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
                        <h3>" . date("Y", $date) . " - {$row["certificate"]} - {$hours}h {$minutes}m</h3>
                    </div>
                    <div class='content-box'>
                        <div class = 'description'>
                            <p>{$row["description"]}</p>
                        ";
                $sql1 = "SELECT * FROM movies m JOIN moviesstars ms ON m.movieid= ms.moviesid Join stars s ON ms.starsid=s.starsid WHERE m.movieid='{$movieid}'";
                $result1 = mysqli_query($conn, "$sql1");

                $sql2 = "SELECT * FROM movies m JOIN moviesdirectors md ON m.movieid= md.moviesid Join directors d ON md.directorsid=d.directorid WHERE m.movieid='{$movieid}'";
                $result2 = mysqli_query($conn, "$sql2");

                if (mysqli_num_rows($result2) > 0) {

                    $row2 = mysqli_fetch_assoc($result2);
                    $director = $row2["directorname"];
                    echo "<hr><h4>Director: <a href ='https://en.wikipedia.org/wiki/{$director}'> {$row2["directorname"]}</a></h4>";
                }
                if (mysqli_num_rows($result1) > 0) {
                    $row1 = mysqli_fetch_assoc($result1);
                    $star = $row1["stars_name"];
                    echo "<hr><h4>Star: <a href ='https://en.wikipedia.org/wiki/{$star}'> {$row1["stars_name"]} </a></h4>";
                }
                if ($row["r_date"] > '2019-01-01') {
                    if (isset($_SESSION['username'])) {
                        echo
                        "<hr><br><center><a href='bookings.php'>
                            <button type='button' name='watch' class='bookorwatch'>
                            <big>Book Tickets</big>
                            </button>
                            </a></center>
                            ";
                    } else {
                        echo
                        "<hr><br><center>
                            <button type='button' name='watch' onclick='toggleLoginBox()' class='bookorwatch'>
                            <big>Login to Book Tickets</big>
                            </button>
                        </center>
                            ";
                    }
                } else {
                    echo "<hr><br><center><a href='https://www.google.com/search?q=watch+{$row["title"]}'>
                    <button type='button' name='watch' class='bookorwatch'>
                      <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'>
                        <path fill='#ffffff' d='M8 5v14l11-7z'/>
                        <path d='M0 0h24v24H0z' fill='none'/>
                      </svg>
                       <big>Watch Now</big>
                    </button>
                    </a></center>";
                }
                echo "  
                        </div>
                    </div>
                </div>";
            } else {
                echo "movie id not provided";
            }
            ?>
        </div>
        <div class="heading-box">
            <div style="flex: 1;">
                <h2>Similar <?php echo $lang . " " . $genre; ?> Movies</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href=<?php echo "movielist.php?language={$lang}&genre={$genre}"; ?> style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box" id="new-releases">
                <?php
                $sql = "SELECT * FROM movies WHERE genre ='{$genre}' AND language ='{$lang}' ORDER BY RAND() LIMIT 5";
                $result = mysqli_query($conn, "$sql");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
        <div class="heading-box">
            <div style="flex: 1;">
                <h2>Users Also Liked</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href=<?php echo "movielist.php?genre={$genre}"; ?> style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box" id="new-releases">
                <?php
                $sql = "SELECT * FROM movies WHERE genre ='{$genre}' ORDER BY RAND() LIMIT 5";
                $result = mysqli_query($conn, "$sql");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
        <div class="heading-box">
            <div style="flex: 1;">
                <h2>Directed by <?php echo $director; ?></h2>
            </div>
            <!-- <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href=<?php echo "movielist.php?genre={$genre}"; ?> style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div> -->
        </div>
        <div class="mfilm-box">
            <div class="film-box" id="new-releases">
                <?php
                $sql = "SELECT * FROM movies m JOIN moviesdirectors md ON m.movieid= md.moviesid Join directors d ON md.directorsid=d.directorid WHERE directorname='{$director}'";
                $result = mysqli_query($conn, "$sql");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
        <div class="heading-box">
            <div style="flex: 1;">
                <h2><?php echo $star; ?> Movies</h2>
            </div>
            <!-- <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href=<?php echo "movielist.php?genre={$genre}"; ?> style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div> -->
        </div>
        <div class="mfilm-box">
            <div class="film-box" id="new-releases">
                <?php
                $sql1 = "SELECT * FROM movies m JOIN moviesstars ms ON m.movieid= ms.moviesid Join stars s ON ms.starsid=s.starsid WHERE stars_name='{$star}'";
                $result = mysqli_query($conn, "$sql");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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
                <!-- <div class=catagory-box>
                    <div class='cata-box'>
                        {$row["certificate"]}
                    </div>
                    <div class='cata-box'>
                        {$hours}h {$minutes}m
                    </div>
                    <div class='cata-box'>" .
                        date("d-m-y", $date) .
                        "</div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>