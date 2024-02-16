<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "movies_db";

$conn = new mysqli($servername, $username, $pass, $dbname);
if ($conn->connect_error) {
    echo "Connection Failed" . $conn->connect_error;
} else {
}
