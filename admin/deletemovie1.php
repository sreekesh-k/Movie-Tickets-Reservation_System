<?php

include('../db_connection.php');

$mid = $_GET['movieid'];
$query = "DELETE FROM `movies` WHERE `movieid` = '$mid'";

$run = mysqli_query($conn, $query);

if ($run == true) {
?>

	<script type="text/javascript">
		alert("Movie Deleted Successfully!");
		window.open('admindash.php', '_self');
	</script>

<?php
}

?>