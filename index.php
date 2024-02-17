<?php
include("headder.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndexPage</title>
    <link rel="stylesheet" href="style/indexMain.css">
    <link rel="stylesheet" href="style/indexNewreleases.css">
    <link rel="stylesheet" href="style/indexNotification.css">
    <script src="scripts/NewReleasesScript.js" defer></script>
    <script src="scripts/notificationBar.js" defer></script>
</head>

<body>
    <div class="new-releases">
        <div class="heading-box">
            <h2>New Releases</h2>
        </div>
        <a href="#new-releases">
            <div class="label-box">
                <div class="container">
                    <?php
                    $sql = "SELECT * FROM newreleases JOIN movies ON movieid=mid AND r_date > '2019-01-01' ORDER BY RAND()";
                    $result = mysqli_query($conn, "$sql");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo
                            "<div class='mcard active'>
                                <img class='background' src='{$row["backdrop_url"]}' alt=''>
                                <div class='mcard-content'>
                                    <div class='profile-image'>
                                        <img src='Images/Logos/LogoIcon.png'>
                                    </div>
                                    <h3 class='title'>{$row["title"]}</h3>
                                </div>
                                <div class='backdrop'></div>
                            </div>";
                        }
                    } else {
                        echo "NO RESULTS:";
                    }
                    ?>
                </div>
            </div>
        </a>
    </div>
    <div class="main">
        <div class="heading-box">
            <div style="flex: 1;">
                <h2>Book now</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box" id="new-releases">
                <?php
                $sql = "SELECT * FROM newreleases JOIN movies ON movieid=mid AND r_date > '2019-01-01' ORDER BY RAND() LIMIT 5";
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
        <div class="notification-box">
            <div class="logo-name-notif">
                <img src="Images/Logos/logo.png">
            </div>
            <div class="message">
                <h1 id="message"></h1>
            </div>
        </div>
        <div class="heading-box">
            <div style="flex: 1;">
                <h2>Must Watch</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box">
                <?php
                $sql = "SELECT * FROM movies WHERE imdb_rating > 7.0 AND language IN (SELECT language FROM movies WHERE imdb_rating > 8.0 ORDER BY RAND())GROUP BY language";
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
                <h2>English</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box">
                <?php
                $sql = "SELECT * FROM movies WHERE imdb_rating > 8.0 AND language='English'  ORDER BY RAND() LIMIT 5";
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
                <h2>Malayalam</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box">
                <?php
                $sql = "SELECT * FROM movies WHERE imdb_rating > 8.0 AND language='Malayalam' ORDER BY RAND() LIMIT 5";
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
                <h2>Hindi</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box">
                <?php
                $sql = "SELECT * FROM movies WHERE imdb_rating > 8.0 AND language='Hindi' ORDER BY RAND() LIMIT 5";
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
                <h2>Tamil</h2>
            </div>
            <div style="flex: 1;display:flex; align-items: center;justify-content:flex-end"><a href="" style="color: rgb(68, 248, 134);text-decoration: none;">view more></a></div>
        </div>
        <div class="mfilm-box">
            <div class="film-box">
                <?php
                $sql = "SELECT * FROM movies WHERE imdb_rating > 8.0 AND language='Tamil' ORDER BY RAND() LIMIT 5";
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
    </div>

</body>

</html>
<?php
include("html/footer.html");
mysqli_close($conn);
?>