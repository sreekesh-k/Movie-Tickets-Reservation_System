<?php
include("db_connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/headerrstyle.css">
    <link rel="stylesheet" href="style/headerforbking.css">
</head>

<body>
    <?php
    if (isset($_SESSION["movieid"])) {
        $movieid = $_SESSION["movieid"];
        $sql = "SELECT * FROM movies WHERE movieid= $movieid";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $moviename = $row["title"];
    }
    if ((isset($_SESSION["username"]))) {
        $uname = $_SESSION["username"];
    }
    ?>
    <header>
        <div class='navbar-box'>
            <div class='navbar'>
                <div class="left-box">
                    <div class="in-box"><h2><?php echo $uname."'s booking for ".$moviename; ?></h2></div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>