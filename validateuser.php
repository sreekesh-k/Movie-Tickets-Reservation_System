<?php
session_start();
include("db_connection.php");

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE (username='{$username}' OR emailid='{$username}') AND password='{$password}'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $username = $row["username"];
        $_SESSION["username"] = $username;
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }
    echo json_encode($response);
} else {
    // Handle case where username or password is not provided
    $response = array("success" => false, "message" => "Username or password not provided");
    echo json_encode($response);
}
