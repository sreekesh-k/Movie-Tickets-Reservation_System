<?php
session_start();
include("db_connection.php");

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $query = "SELECT * FROM users WHERE username='{$username}'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $response = array("success" => false);
    } else {
        $insert_query = "INSERT INTO users(username,password,emailid) VALUES ('{$username}','{$password}','{$email}')";
        if (mysqli_query($conn, $insert_query)) {
            $response = array("success"=> true);
        }else{
            $response = array("success"=> false);
        }
    }
    echo json_encode($response);
} else {
    // Handle case where username or password is not provided
    $response = array("success" => false, "message" => "Username or password not provided");
    echo json_encode($response);
}
