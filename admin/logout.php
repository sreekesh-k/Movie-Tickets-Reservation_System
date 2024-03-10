<?php
session_start();

unset($_SESSION['aid']);

// Redirect to the index page or any other page
header("Location: adminlogin.php");
exit;
