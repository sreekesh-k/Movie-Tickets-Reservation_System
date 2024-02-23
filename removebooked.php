<?php
unset($_SESSION["selected_seats"]);
unset($_SESSION["movieid"]);
unset($_SESSION["price"]);
header("Location: index.php");
exit();
